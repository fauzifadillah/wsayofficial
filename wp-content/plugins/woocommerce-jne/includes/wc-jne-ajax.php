<?php
/**
 * Main AJAX Handles
 *
 * Handles for all request file
 *
 * @author AgenWebsite
 * @package WooCommerce JNE Shipping
 * @since 8.0.0
 */

if ( !defined( 'WOOCOMMERCE_JNE' ) ) { exit; } // Exit if accessed directly

if ( ! class_exists( 'WC_JNE_AJAX' ) ):

class WC_JNE_AJAX{
	
	/* @var string */
	private static $nonce_admin = 'woocommerce_jne_admin';
	
	/**
	 * Hook in methods
	 */
	public static function init(){
		
		// ajax_event => nopriv
		$ajax_event = array(
            'get_city_bykeyword'        => false,
            'get_provinsi_bykeyword'    => false,
            'check_version'             => false,
            'shipping_get_kota'         => true,
            'shipping_get_kecamatan'    => true,
            'check_status'              => false,
		);
			
		foreach( $ajax_event as $ajax_event => $nopriv ){
			add_action( 'wp_ajax_woocommerce_jne_' . $ajax_event, array( __CLASS__, $ajax_event ) );
			
			if( $nopriv ){
				add_action( 'wp_ajax_nopriv_woocommerce_jne_' . $ajax_event, array( __CLASS__, $ajax_event ) );	
			}
		}
			
	}		
	
	/**
	 * AJAX Checking status
	 *
	 * @access public
	 * @return json
	 * @since 8.0.0
	 **/
    public static function check_status(){

		$starttime = microtime(true);
        
        check_ajax_referer( self::$nonce_admin );
        
        $license = ( ! empty($_POST['license_code']) ) ? $_POST['license_code'] : WC_JNE()->get_license_code();
        
        WC_JNE()->api->license_code = $license;
		$result = WC_JNE()->api->remote_get( 'license_status' );
		
		$stoptime  = microtime(true);
        $response = floor( ($stoptime - $starttime) * 1000 );
		$result['result']['response_time'] = $response;

        ob_start();
        woocommerce_get_template( 'html-aw-product-status.php', array(
            'status' => $result['status'],
            'message' => $result['result']['message'],
            'data' => $result['result'],
        ), 'woocommerce-pos', untrailingslashit( WC_JNE()->plugin_path() ) . '/views/' );
        $output['message'] = ob_get_clean();        
        
        wp_send_json( $output );
        
        wp_die();
        
    }
	
	/**
	 * AJAX Check version to API AgenWebsite
	 *
	 * @access public
	 * @return json
	 * @since 8.0.0
	 **/
	public static function check_version(){
		
		check_ajax_referer( self::$nonce_admin );
		
		$url = 'api.agenwebsite.com/cek-versi/0.0.1/?action=cek_versi&product=woocommerce_jne_shipping&version=' . WOOCOMMERCE_JNE_VERSION;
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => $url,
			CURLOPT_TIMEOUT => 30
		));
		$result = curl_exec($curl);
		if(curl_errno($curl)) {
			curl_close($curl);
			return false;
		}
		curl_close($curl);
		
		$data = json_decode( $result, TRUE );
		
		$output['result'] = $data['result'];
		$output['version'] = WOOCOMMERCE_JNE_VERSION;
		if( $data['result'] != 1 ){
			$output['update_url'] = $data['update_url'];
			$output['latest_version'] = $data['versi'];				
		}
		
		wp_send_json( $output );
		
		wp_die();

	}
	
	/**
	 * AJAX Get data kota
	 *
	 * @access public
	 * @return json
	 * @since 8.0.0
	 **/
	public static function shipping_get_kota(){
		
		if( $_POST['provinsi'] == 'Select an option…' || $_POST['provinsi'] == 'Select a state…' ) wp_die();

		check_ajax_referer( WC_JNE()->get_nonce() );

        $args = array(
            'action' => 'get_kota',
            'keyword' => $_POST['provinsi']
        );

        $response = WC_JNE()->api->remote_get( 'kota', $args );

        wp_send_json( $response['result'] );

		wp_die();
		
	}
		
	/**
	 * AJAX Get data kecamatan
	 *
	 * @access public
	 * @return json
	 * @since 8.0.0
	 **/
	public static function shipping_get_kecamatan(){

		if( $_POST['kota'] == 'Pilih Kota / Kabupaten' ) wp_die();

		check_ajax_referer( WC_JNE()->get_nonce() );

        $args = array(
            'action' => 'get_kecamatan',
            'keyword' => $_POST['provinsi'] .'|'. $_POST['kota'],
        );

        $response = WC_JNE()->api->remote_get( 'kota', $args );
            
		wp_send_json( $response['result'] );

		wp_die();			
	}

}

WC_JNE_AJAX::init();
	
endif;