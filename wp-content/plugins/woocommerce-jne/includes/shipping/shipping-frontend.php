<?php
/**
 * Frontend JNE Shipping
 *
 * Handles for the request to frontend
 *
 * @author AgenWebsite
 * @package WooCommerce JNE Shipping
 * @since 8.0.0
 */

if ( !defined( 'WOOCOMMERCE_JNE' ) ) { exit; } // Exit if accessed directly

if ( !class_exists( 'WC_JNE_Frontend' ) ) :

/**
 * Class WooCommerce JNE Frontend
 *
 * @since 8.0.0
 **/
class WC_JNE_Frontend{

    /**
     * Constructor
     *
     * @return void
     * @since 8.0.0
     **/
    public function __construct(){        
        // JNE reorder fields option
        add_filter( 'woocommerce_checkout_fields', array( &$this, 'JNE_reorder_fields' ), 15 );

        // JNE reorder billing address
        add_filter( 'woocommerce_billing_fields', array( &$this, 'JNE_reorder_billing_fields' ), 15 );

        // JNE reorder shipping address
        add_filter( 'woocommerce_shipping_fields', array( &$this, 'JNE_reorder_shipping_fields' ), 15 );

        // Enable city shipping calculator
        add_filter( 'woocommerce_shipping_calculator_enable_city', '__return_true' );

        // filter country locale to reorder state and city
        add_filter('woocommerce_get_country_locale', array( &$this, 'sorting_ID_locale') );
    }
    
    /**
     * Locale ID
     * Sorting fields address by priority for indonesia
     *
     * @access public
     * @param array $locales
     * @return array
     * @since 8.1.19
     */
    public function sorting_ID_locale($locales){
        $wc_version = WC_JNE()->get_woocommerce_version();
		
        $fields = array(
			'state' => array(
				'type'         => 'state',
				'label'        => __( 'Province', 'woocommerce' ),
				'required'     => true,
				'class'        => array( 'form-row-wide', 'address-field' ),
				'validate'     => array( 'state' ),
				'autocomplete' => 'address-level1',
				'priority'     => 70,
			),
			'city' => array(
				'label'        => __( 'Kecamatan', 'woocommerce' ),
				'required'     => true,
				'class'        => array( 'form-row-wide', 'address-field' ),
				'autocomplete' => 'address-level2',
				'priority'     => 80,
			),
		);

        if($wc_version[0] >= '3'){
            $locales['ID'] = $fields;
        }
        
        return $locales;
    }

    /**
     * JNE reorder fields option billing
     *
     * @access public
     * @param array $fields
     * @return array
     * @since 8.0.0
     **/
    public function JNE_reorder_billing_fields($fields) {
        $AW_fields['billing_country']               = $fields['billing_country'];
        $AW_fields['billing_first_name']            = $fields['billing_first_name'];
        $AW_fields['billing_last_name']             = $fields['billing_last_name'];
        $AW_fields['billing_company']               = $fields['billing_company'];
        $AW_fields['billing_address_1']             = $fields['billing_address_1'];
        $AW_fields['billing_address_2']             = $fields['billing_address_2'];
        $AW_fields['billing_postcode']              = $fields['billing_postcode'];
        $AW_fields['billing_state']                 = $fields['billing_state'];

        // Tambah custom field kota untuk billing field
        $AW_fields['billing_kota']                  = $this->get_field_kota();

        $AW_fields['billing_city']                  = $fields['billing_city'];
        $AW_fields['billing_city']['class']         = array( 'form-row-wide', 'address-field', 'update_totals_on_change' );

        $AW_fields['billing_email']                 = $fields['billing_email'];
        $AW_fields['billing_phone']                 = $fields['billing_phone'];

        return apply_filters( 'woocommerce_jne_billing_fields', $AW_fields );
    }

    /**
     * JNE reorder fields option shipping
     *
     * @access public
     * @param array $fields
     * @return array
     * @since 8.0.0
     **/
    public function JNE_reorder_shipping_fields($fields) {
        $AW_fields['shipping_country']              = $fields['shipping_country'];
        $AW_fields['shipping_first_name']           = $fields['shipping_first_name'];
        $AW_fields['shipping_last_name']            = $fields['shipping_last_name'];
        $AW_fields['shipping_company']              = $fields['shipping_company'];
        $AW_fields['shipping_address_1']            = $fields['shipping_address_1'];
        $AW_fields['shipping_address_2']            = $fields['shipping_address_2'];
        $AW_fields['shipping_postcode']             = $fields['shipping_postcode'];
        $AW_fields['shipping_state']                = $fields['shipping_state'];

        // Tambah custom field kota untuk shipping field
        $AW_fields['shipping_kota']                 = $this->get_field_kota();

        $AW_fields['shipping_city']                 = $fields['shipping_city'];
        $AW_fields['shipping_city']['class']        = array( 'form-row-wide','address-field', 'update_totals_on_change' );

        return apply_filters( 'woocommerce_jne_shipping_fields', $AW_fields );
    }

    /**
     * JNE reorder fields option
     *
     * @access public
     * @param array $fields
     * @return array
     * @since 8.0.0
     **/
    public function jne_reorder_fields($fields) {
        $reorder_field = array(
            'billing' => array(
                'billing_country',
                'billing_first_name',
                'billing_last_name',
                'billing_company',
                'billing_address_1',
                'billing_address_2',
                'billing_postcode',
                'billing_state',
                'billing_kota',
                'billing_city',
                'billing_email',
                'billing_phone'
            ),
            'shipping' => array(
                'shipping_country',
                'shipping_first_name',
                'shipping_last_name',
                'shipping_company',
                'shipping_address_1',
                'shipping_address_2',
                'shipping_postcode',
                'shipping_state',
                'shipping_kota',
                'shipping_city'
            )
        );
        
        foreach($reorder_field as $field_id => $field_data){
            $fields[$field_id][$field_id.'_kota'] = $this->get_field_kota();
            foreach($field_data as $field_name){
                $AW_fields[$field_id][$field_name] = $fields[$field_id][$field_name];
            }
        }

        $AW_fields['account']     = $fields['account'];
        $AW_fields['order']     = $fields['order'];

        return apply_filters( 'woocommerce_jne_checkout_fields', $AW_fields );
    }
    
    /**
     * Field Kota
     *
     * @access public
     * @return array $field_kota
     * @since 8.1.19
     */
    public function get_field_kota(){
        $field_kota = array(
            'type' => 'select',
            'label' => __( 'Kota / Kabupaten', 'woocommerce-jne' ),
            'class' => array( 'form-row-wide','address-field', 'update_totals_on_change' ),
            'options' => array('' => __( 'Pilih Kota / Kabupaten', 'woocommerce-jne' )),
            'required' => TRUE,
            'placeholder' => __( 'Pilih Kota / Kabupaten', 'woocommerce-jne' ),
            'priority' => 75
        );
        
        return $field_kota;
    }

}

endif;