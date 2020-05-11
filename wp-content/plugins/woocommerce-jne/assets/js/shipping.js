/*global $, jQuery, alert*/
jQuery(function ($) {

	// agenwebsite_woocommerce_jne_params is required to continue, ensure the object exists
	'use strict';

	if (typeof agenwebsite_woocommerce_jne_params === 'undefined') {
		return false;
	}
	
	// debug variable
	var debug = agenwebsite_woocommerce_jne_params.debug;

	// select2 configuration
	var agenwebsite_select2_conf = {
        width: '100%',
		formatNoMatches: function (term) { return agenwebsite_woocommerce_jne_params.i18n_no_matches; },
		placeholderOption: 'first'
	};

	// chosen configuration
	var agenwebsite_chosen_conf = {
		width: '100%'
	};

	function agenwebsite_create_field() {
		var fieldKotaParent = $('<p />').attr('id', 'calc_shipping_kota_field').addClass('form-row form-row-wide').append('<span />').css('clear', 'both'),
		fieldKota = $('<select />').attr({'name': 'calc_shipping_kota', 'id': 'calc_shipping_kota', 'placeholder': agenwebsite_woocommerce_jne_params.i18n_placeholder_kota});
		fieldKota.html('<option value="">' + agenwebsite_woocommerce_jne_params.i18n_placeholder_kecamatan + '</option>');
		fieldKotaParent.append(fieldKota);

		if( debug ) console.log( "JNE Shipping: Create field kota success" );

		return fieldKotaParent;
	}

	$(document).ready(function () {
		if (agenwebsite_woocommerce_jne_params.page === 'cart') {
			var country = $("#calc_shipping_country").val();
			if( country != 'ID' ) return false;
			$($('#calc_shipping_state').parent().parent()).after(agenwebsite_create_field);
			if ($().select2) {
				if( debug ) console.log( "JNE Shipping: Change country and all script shipping state using select2" );

				$('select.country_to_state').select2(agenwebsite_select2_conf);
				$('select#calc_shipping_state').select2(agenwebsite_select2_conf);
			}else if($().chosen){
				if( debug ) console.log( "JNE Shipping: Change country and all script shipping state using chosen. Still using chosen?" );

				$('select.country_to_state').chosen(agenwebsite_chosen_conf);
				$('select#calc_shipping_state').chosen(agenwebsite_chosen_conf);
			}
			$( '#calc_shipping_state' ).change();
		}

		if (agenwebsite_woocommerce_jne_params.page === 'billing' || agenwebsite_woocommerce_jne_params.page === 'shipping') {
			if( debug ) console.log( "JNE Shipping: params page billing and shipping call change()" );

			$( '#billing_state, #shipping_state, #calc_shipping_state' ).change();
		}

		if (agenwebsite_woocommerce_jne_params.page === 'checkout') {
			if( debug ) console.log( "JNE Shipping: params page checkout change()" );

			$( '#billing_state, #shipping_state' ).change();
		}
	});

	$('body').bind('updated_shipping_method', function () {
		if (agenwebsite_woocommerce_jne_params.page === 'cart') {
			$($('#calc_shipping_state').parent().parent()).after(agenwebsite_create_field);

			if ($().select2) {
				$('select.country_to_state').select2(agenwebsite_select2_conf);
				$('select#calc_shipping_state').select2(agenwebsite_select2_conf);
			}

			$('#calc_shipping_state').change();
		}
	});

	$('body').on('change', '#billing_state, #shipping_state, #calc_shipping_state', function () {

		var	country		= $("select.country_to_state, input.country_to_state").val(),
			provinsi	= $(this).find('option:selected').text(),
			data		= { action: 'woocommerce_jne_shipping_get_kota', provinsi: provinsi, _wpnonce: agenwebsite_woocommerce_jne_params._wpnonce },
			fieldProvID	= $(this).attr('id'),
			fieldKota,
			fieldKec,
			kotaSaved;

		switch (fieldProvID) {
			case 'billing_state':
				fieldKota   = $('#billing_kota');
				fieldKec    = $('#billing_city');
				break;
			case 'shipping_state':
				fieldKota   = $('#shipping_kota');
				fieldKec    = $('#shipping_city');
				break;
			case 'calc_shipping_state':
				fieldKota   = $('#calc_shipping_kota');
				fieldKec    = $('#calc_shipping_city');
				break;
			default:
			return false;
		}

		if ( typeof fieldKec.attr('value') !== typeof undefined && fieldKec.attr('value') !== false ) {
			if (fieldKec.attr('value').indexOf(',') >= 0) {
				kotaSaved = fieldKec.attr('value').split(', ')[1];
			}
		}

		if (country === 'ID') {
			fieldKota.parent().show();
			fieldKota.attr('disabled', true);
			fieldKec.attr('disabled', true);

			fieldKota.html('<option value="">' + agenwebsite_woocommerce_jne_params.i18n_loading_data + '</option>');
			var first_option = fieldKota.find('option:eq(1)').val();
			if ($().select2) {
				fieldKota.select2().select2('val', first_option);
			}else if($().chosen) {
				fieldKota.val(first_option).trigger('chosen:updated');
			}

			if (fieldKec.is('select')) {
				fieldKec.html('<option value="">' + agenwebsite_woocommerce_jne_params.i18n_loading_data + '</option>');
				if ($().select2) {
					fieldKec.select2().select2('val', first_option);
				}else if($().chosen){
					fieldKec.val(first_option).trigger('chosen:updated');
				}
			}
			if( debug ) console.log( "Request Data", fieldProvID, data );

			$.post(agenwebsite_woocommerce_jne_params.ajax_url, data, function (response) {
				if( debug ) console.log( "Response Data", fieldProvID, response );

				var pilihan_kota = '';
				if( response.constructor === Object || response.constructor === Array ) {
					for (var i = 0; i < response.length; i++) {
						var kota = response[i];
						var selected = '';
						if (kota == kotaSaved) {
							selected = 'selected="selected"';
						}
						pilihan_kota += '<option value="' + kota + '" ' + selected + '>' + kota + '</option>';
					}
				}
				
				fieldKota.html('<option value="">' + agenwebsite_woocommerce_jne_params.i18n_placeholder_kota + '</option>' + pilihan_kota);
				fieldKota.removeAttr('disabled');

				fieldKota.change();
			}).fail(function(err){
				if( debug ) console.error( err );
				fieldKota.removeAttr('disabled');
				fieldKota.html('<option value="">' + agenwebsite_woocommerce_jne_params.i18n_placeholder_kota + '</option>');
				fieldKec.removeAttr('disabled');
				fieldKec.html('<option value="">' + agenwebsite_woocommerce_jne_params.i18n_placeholder_kecamatan + '</option>');
			});
		} else {
			fieldKota.change();
			fieldKota.parent().hide();
		}
	});

	$('body').on('change', '#billing_kota, #shipping_kota, #calc_shipping_kota', function () {

		var	country			= $("select.country_to_state, input.country_to_state").val(),
			provinsi		= $(this).closest('div').find('#billing_state option:selected, #shipping_state option:selected, #calc_shipping_state option:selected'),
			kota			= $(this).find('option:selected'),
			data			= { action: 'woocommerce_jne_shipping_get_kecamatan', provinsi: provinsi.text(), kota: kota.text(), _wpnonce: agenwebsite_woocommerce_jne_params._wpnonce },
			AWPlaceholder	= agenwebsite_woocommerce_jne_params.i18n_placeholder_kecamatan,
			AWLabel			= agenwebsite_woocommerce_jne_params.i18n_label_kecamatan,
			required		= ' <abbr class="required" title="' + agenwebsite_woocommerce_jne_params.i18n_required_text + '">*</abbr>',
			fieldKotaID		= $(this).attr('id'),
			fieldKec,
			kecAttr,
			kecSaved;

		switch (fieldKotaID) {
			case 'billing_kota':
				fieldKec = $('#billing_city');
				break;
			case 'shipping_kota':
				fieldKec = $('#shipping_city');
				break;
			case 'calc_shipping_kota':
				fieldKec = $('#calc_shipping_city');
				break;
			default:
			return false;
		}
		
		kecAttr = { name: fieldKec.attr('name'), id : fieldKec.attr('id'), placeholder : fieldKec.attr('placeholder'), label : fieldKec.parent().find('label'), value : fieldKec.attr('value') };

		if ( typeof kecAttr.value !== typeof undefined && kecAttr.value !== false ) {
			if (kecAttr.value.indexOf(',') >= 0) {
				kecSaved = kecAttr.value.split(', ')[0];
			}
		}

		if (country === 'ID') {
			kecAttr.label.html(AWLabel + required);
			fieldKec.attr('disabled', true);

			if (fieldKec.is('select')) {
				fieldKec.html('<option value="">' + agenwebsite_woocommerce_jne_params.i18n_loading_data + '</option>');
				var first_option = fieldKec.find('option:eq(1)').val();
				if ($().select2) {
					fieldKec.select2().select2('val', first_option);
				}else if($().chosen) {
					fieldKec.val(first_option).trigger('chosen:updated');
				}
			}
			if( debug ) console.log( "Request Data", fieldKec, data );

			$.post(agenwebsite_woocommerce_jne_params.ajax_url, data, function (response) {
				if( debug ) console.log( "Response Data", fieldKec, response );

				var pilihan_kecamatan = '';
				if( response.constructor === Object || response.constructor === Array ) {
					for (var i = 0; i < response.length; i++) {
						var kecamatan = response[i];
						var selected = '';
						if (kecamatan === kecSaved) {
							selected = 'selected="selected"';
						}
						pilihan_kecamatan += '<option value="' + kecamatan + ', ' + kota.text() + '" ' + selected + '>' + kecamatan + '</option>';
					}
				}
				
				if (fieldKec.is('input')) {
					fieldKec.replaceWith($('<select />').attr({'name': kecAttr.name, 'id': kecAttr.id, 'placeholder': AWPlaceholder}).addClass('city_select'));
					fieldKec = $('#billing_kota, #shipping_kota, #calc_shipping_kota').closest('div').find('select#billing_city, select#shipping_city, select#calc_shipping_city');
				}

				fieldKec.html('<option value="">' + AWPlaceholder + '</option>' + pilihan_kecamatan);
                
				fieldKec.removeAttr('disabled');
				
				if ($().select2) {
					fieldKec.select2(agenwebsite_select2_conf);
				}else if($().chosen) {
					fieldKec.chosen(agenwebsite_chosen_conf);
					fieldKec.trigger('chosen:updated');
				}
			}).fail(function(err){
				if( debug ) console.error( err );
				fieldKec.html('<option value="">' + AWPlaceholder + '</option>');
				fieldKec.removeAttr('disabled');
			});
		} else {
			if (fieldKec.is('select')) {
				if (kecAttr.id !== 'calc_shipping_city') {
					fieldKec.parent().show().find('.chosen-container, .select2-container').remove();
				}
				fieldKec.replaceWith('<input type="text" class="input-text" name="' + kecAttr.name + '" id="' + kecAttr.id + '" placeholder="' + kecAttr.placeholder + '" />');
			}
		}
	});

	$('body').on('change', 'select.country_to_state, input.country_to_state', function () {

		var country     = $(this).val(),
		fieldProvID	= $(this).attr('id'),
		fieldKota,
		fieldKotaParent,
		fieldKec,
		kecAttr;

		switch (fieldProvID) {
			case 'billing_country':
				fieldKota = $("#billing_kota");
				fieldKec = $("#billing_city");
				break;
			case 'shipping_country':
				fieldKota = $("#shipping_kota");
				fieldKec = $("#shipping_city");
				break;
			case 'calc_shipping_country':
				fieldKota = $("#calc_shipping_kota");
				fieldKec = $("#calc_shipping_city");
				break;
			default:
			return false;
		}

		// Execute when page is cart
		if (agenwebsite_woocommerce_jne_params.page === 'cart') {
			if( country != 'ID' ) return false;
			$($('#calc_shipping_state').parent()).after(agenwebsite_create_field);
			if ($().select2) {
				if( debug ) console.log( "JNE Shipping: Change country and all script shipping state using select2" );

				$('select.country_to_state').select2(agenwebsite_select2_conf);
				$('select#calc_shipping_state').select2(agenwebsite_select2_conf);
			}else if($().chosen){
				if( debug ) console.log( "JNE Shipping: Change country and all script shipping state using chosen. Still using chosen?" );

				$('select.country_to_state').chosen(agenwebsite_chosen_conf);
				$('select#calc_shipping_state').chosen(agenwebsite_chosen_conf);
			}
		}

		kecAttr = { name: fieldKec.attr('name'), id: fieldKec.attr('id'), placeholder: fieldKec.attr('placeholder') };

		if (country !== 'ID') {

			fieldKotaParent = fieldKota.parent();
			fieldKotaParent.hide();
			fieldKotaParent.removeClass( 'form-row form-row-wide' ).addClass( 'form-row woocommerce-validated' );
			fieldKota.find('option').attr('value', 'default');

			if (fieldKec.is('select')) {
				fieldKec.parent().show().find('.chosen-container, .select2-container').remove();
				fieldKec.replaceWith('<input type="text" class="input-text" name="' + kecAttr.name + '" id="' + kecAttr.id + '" placeholder="City" />');
			}
		}
	});
	
	$('body').on('updated_wc_div', function () {
		if (agenwebsite_woocommerce_jne_params.page === 'cart') {
			$($('#calc_shipping_state').parent().parent()).after(agenwebsite_create_field);
			if ($().select2) {
				$('select.country_to_state').select2(agenwebsite_select2_conf);
				$('select#calc_shipping_state').select2(agenwebsite_select2_conf);
			}else if($().chosen){
				$('select.country_to_state').chosen(agenwebsite_chosen_conf);
				$('select#calc_shipping_state').chosen(agenwebsite_chosen_conf);
			}
		}
		$('#calc_shipping_state').change();
	});
});