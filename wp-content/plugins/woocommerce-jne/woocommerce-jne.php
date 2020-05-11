<?php
/**
 *
 * @link 			http://agenwebsite.com
 * @since 			8.0.0
 * @package 		WooCommerce JNE Shipping
 *
 * @wordpress-plugin
 * Plugin Name: 	WooCommerce JNE Shipping ( Free Version )
 * Plugin URI:		http://www.agenwebsite.com/products/woocommerce-jne-shipping
 * Description:		Plugin untuk WooCommerce dengan penambahan metode pengiriman JNE.
 * Version:			8.2.5
 * Author:			AgenWebsite
 * Author URI:		http://agenwebsite.com
 * License:			GPL-2.0+
 * License URI:		http://www.gnu.org/licenses/gpl-2.0.txt
 * WC requires at least: 3.0.0
 * WC tested up to: 3.6.3
 * 
 */

if ( !defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly

if ( ! class_exists( 'WooCommerce_JNE' ) ) :

/**
 * Initiliase Class
 *
 * @since 8.0.0
 **/
class WooCommerce_JNE{

    /**
     * @var boolean
     */
    public $debug = false;

	/**
	 * @var string
	 * @since 8.0.0
	 */
	public $version = '8.2.5';

	/**
	 * @var string
     * @since 8.0.0
	 */
	public $db_version = '8.0.0';

	/**
	 * @var string
	 */
	public $product_version = 'free';

	/**
	 * @var WC_JNE_Shipping $shipping
	 * @since 8.0.0
	 */
	public $shipping = null;

	/**
	 * @var WC_JNE_API $api
	 * @since 8.0.0
	 */
	public $api = null;

	/**
	 * @var woocommerce jne main class
	 * @since 8.0.0
	 */
	protected static $_instance = null;

	/**
	 * @var string
	 * @since 8.0.0
	 */
	private $nonce = '_woocommerce_jne__nonce';

	/**
	 * Various Links
	 * @var string
	 * @since 8.0.0
	 */
	public $url_docs = 'http://docs.agenwebsite.com/documentation/woocommerce-jne-shipping/';
	public $url_support = 'http://www.agenwebsite.com/support';

	/**
	 * WooCommerce JNE Instance
	 *
	 * @access public
	 * @return Main Instance
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Constructor
	 *
	 * @return self
	 * @since 8.0.0
	 */
	public function __construct(){
		$this->define_constants();
		$this->includes();
		$this->init_hooks();
	}

	/**
	 * Define Constant
	 *
	 * @access private
	 * @return void
	 * @since 8.0.0
	 */
    private function define_constants(){
        define( 'WOOCOMMERCE_JNE', TRUE );
        define( 'WOOCOMMERCE_JNE_VERSION', $this->version );
    }

	/**
	 * Inititialise Includes
	 *
	 * @access private
	 * @return void
	 * @since 8.0.0
	 */
    private function includes(){
		$this->shipping = WooCommerce_JNE::shipping();
		$this->includes_class();
    }

    /**
	 * Hooks action and filter
	 *
	 * @access private
	 * @return void
	 * @since 8.0.0
	 */
	private function init_hooks(){
		add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( &$this, 'add_settings_link' ) );
		add_action( 'wp_enqueue_scripts', array( &$this, 'load_scripts') );
		add_action( 'admin_enqueue_scripts', array( &$this, 'load_scripts_admin') );
        add_action( 'admin_notices', array( &$this, 'notice_set_license' ) );
	}

	/**
	 * Inititialise JNE Shipping module
	 *
	 * @access private
	 * @return WC_JNE_Shipping
	 * @since 8.0.0
	 */
	private static function shipping(){
	 	// Load files yang untuk modul shipping
		WooCommerce_JNE::load_file( 'shipping' );

        return new WC_JNE_Shipping();
	}

    /**
	 * Include file
	 *
	 * @access private
	 * @return void
	 * @since 8.0.0
	 */
    private function includes_class(){
        require_once( 'includes/wc-jne-ajax.php' );
		require_once( 'includes/wc-jne-api.php' );
		require_once( 'includes/vendor/browser.php' );

        $this->api = new WC_JNE_API( sprintf( 'woocommerce-jne-%s', $this->product_version ), $this->version, $this->get_license_code(), '' );

    }

	/**
	 * Load Requires Files by modules
	 *
	 * @access private
	 * @return void
	 * @since 8.0.0
	 */
	private static function load_file( $modules ){
		switch( $modules ){

			case 'shipping':
				require_once( 'includes/shipping/shipping.php' );
				require_once( 'includes/shipping/shipping-frontend.php' );
			break;

		}
	}

	/**
	 * Load JS & CSS FrontEnd
	 *
	 * @access public
	 * @return void
	 * @since 8.0.0
	 */
	public function load_scripts(){
        $suffix            = $this->debug ? '' : '.min';
        $assets_path    = str_replace( array( 'http:', 'https:' ), '', WC()->plugin_url() ) . '/assets/';

        // select2
        $select2_js_path = $assets_path . 'js/select2/select2' . $suffix . '.js';
        $select2_css_path = $assets_path . 'css/select2.css';
        if( ! wp_script_is( 'select2', 'registered' ) ) wp_register_script( 'select2', $select2_js_path, array( 'jquery' ) );
        if( ! wp_style_is( 'select2', 'registered' ) ) wp_register_style( 'select2', $select2_css_path );

        if( self::get_woocommerce_version() < 2.6 ){
            // chosen
            $chosen_js_path = $assets_path . 'js/chosen/chosen.jquery' . $suffix . '.js';
            $chosen_css_path = $assets_path . 'css/chosen.css';
            if( ! wp_script_is( 'chosen', 'registered' ) ) wp_register_script( 'chosen', $chosen_js_path, array( 'jquery' ), '1.0.0', true );
            if( ! wp_style_is( 'chosen', 'registered' ) ) wp_enqueue_style( 'woocommerce_chosen_styles', $chosen_css_path );
        }

        wp_register_script( 'woocommerce-jne-shipping',        $this->plugin_url() . '/assets/js/shipping' . $suffix . '.js',     array( 'jquery' ),    $this->version, true );

        // shipping
        if( $this->shipping->is_enable() ){
            if( is_checkout() || is_cart() || is_wc_endpoint_url( 'edit-address' ) ) {
                wp_enqueue_script( 'woocommerce-jne-shipping');
				wp_localize_script( 'woocommerce-jne-shipping', 'agenwebsite_woocommerce_jne_params', $this->localize_script( 'shipping' ) );
				
				wp_register_style( 'woocommerce-jne-shipping', $this->plugin_url() . '/assets/css/shipping.css' );
            	wp_enqueue_style( 'woocommerce-jne-shipping' );
            }
        }

        // load selec2 or chosen
        if( $this->shipping->is_enable() && is_cart() ){
            if( ! wp_script_is( 'select2' ) ) wp_enqueue_script( 'select2' );
            if( ! wp_style_is( 'select2' ) ) wp_enqueue_style( 'select2' );

            // if( ! wp_script_is( 'chosen' ) ) wp_enqueue_script( 'chosen' );
            // if( ! wp_style_is( 'chosen' ) ) wp_enqueue_style( 'chosen' );
        }

    }

	/**
	 * Load JS dan CSS admin
	 *
	 * @access public
	 * @return void
	 * @since 8.0.0
	 */
	public function load_scripts_admin(){
        global $pagenow;

        $suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

        // Load for admin common JS & CSS
        wp_register_script( 'woocommerce-jne-js-admin', $this->plugin_url() . '/assets/js/admin' . $suffix . '.js', array( 'jquery', 'zeroclipboard' ), '1.0.0', true );
        wp_register_style( 'woocommerce-jne-admin', $this->plugin_url() . '/assets/css/admin.css' );

        if( $pagenow == 'admin.php' && ( isset( $_GET['page'] ) && $_GET['page'] == 'wc-settings' ) && ( isset( $_GET['tab'] ) && $_GET['tab'] == 'shipping' ) && ( isset( $_GET['section'] ) && $_GET['section'] == 'jne_shipping' ) ) {

            wp_enqueue_script( 'woocommerce-jne-js-admin' );
            wp_enqueue_style( 'woocommerce-jne-admin' );

            // Load localize admin params
            wp_localize_script( 'woocommerce-jne-js-admin', 'agenwebsite_jne_admin_params', $this->localize_script( 'admin' ) );
        }

        if( $this->is_page_to_notice() ){
            wp_enqueue_style( 'woocommerce-jne-admin' );
        }

    }

	/**
	 * Localize Scripts
	 *
	 * @access public
	 * @return void
	 * @since 8.0.0
	 */
	public function localize_script( $handle ){
		switch( $handle ){
			case 'admin':
				return array(
					'i18n_reset_default'           => __( 'Peringatan! Semua pengaturan anda akan dihapus. Anda yakin untuk kembalikan ke pengaturan awal ?', 'woocommerce-jne' ),
					'i18n_is_available'            => __( 'sudah tersedia', 'woocommerce-jne' ),
					'license'                      => ( $_POST && isset($_POST['woocommerce_jne_shipping_license_code'] ) ) ? $_POST['woocommerce_jne_shipping_license_code'] : '',
                    'tab'                          => ( $_GET && isset($_GET['tab_jne']) ) ? $_GET['tab_jne'] : 'general',
					'ajax_url'                     => self::ajax_url(),
					'jne_admin_wpnonce'           => wp_create_nonce( 'woocommerce_jne_admin' )
				);
			break;
            case 'shipping':
				return array(
                    'i18n_placeholder_kota'         => __( 'Pilih Kota / Kabupaten', 'woocommerce-jne' ),
                    'i18n_placeholder_kecamatan'    => __( 'Pilih Kecamatan', 'woocommerce-jne' ),
                    'i18n_label_kecamatan'          => __( 'Kecamatan', 'woocommerce-jne' ),
                    'i18n_no_matches'               => __( 'Data tidak ditemukan', 'woocommerce-jne' ),
                    'i18n_required_text'            => __( 'required', 'woocommerce-jne' ),
                    'i18n_loading_data'             => __( 'Meminta data...', 'woocommerce-jne' ),
                    'wc_version'                    => self::get_woocommerce_version(),
                    'ajax_url'                      => self::ajax_url(),
                    'page'                          => self::get_page(),
                    '_wpnonce'                      => wp_create_nonce( $this->nonce )
				);
			break;
		}
	}

	/**
	 * Add setting link to plugin list table
	 *
	 * @access public
	 * @param  array $links Existing links
	 * @return array		Modified links
	 * @since 8.0.0
	 */
    public function add_settings_link( $links ){
        $plugin_links = array(
            '<a href="' . admin_url( 'admin.php?page=wc-settings&tab=shipping&section=jne_shipping' ) . '">' . __( 'Settings', 'woocommerce-jne' ) . '</a>',
            '<a href="' . $this->url_docs . '" target="new">' . __( 'Docs', 'woocommerce-jne' ) . '</a>',
        );

        return array_merge( $plugin_links, $links );
    }

	/**
	 * Notice to set license
	 *
	 * @access public
	 * @return HTML
	 * @since 8.0.0
	 */
    public function notice_set_license(){
        if( $this->is_page_to_notice() && ! $this->get_license_code() ){
            printf('<div class="updated notice_wc_jne woocommerce-jne"><p><b>%s</b> &#8211; %s</p><p class="submit">%s %s</p></div>',
                   __( 'Kode lisensi tidak ada. Masukkan kode lisensi untuk mengaktifkan WooCommerce JNE', 'woocommerce-jne' ),
                   __( 'anda bisa mendapatkan kode lisensi dari halaman akun AgenWebsite.', 'woocommerce-jne'  ),
                   '<a href="' . admin_url( 'admin.php?page=wc-settings&tab=shipping&section=jne_shipping' ) . '" class="button-primary">' . __( 'Masukkan kode lisensi', 'woocommerce-jne' ) . '</a>',
                   '<a href="' . esc_url( $this->url_docs ) . '" class="button-primary" target="new">' . __( 'Baca dokumentasi', 'woocommerce-jne' ) . '</a>' );
        }
    }

	/**
	 * Check page to notice
	 *
	 * @access public
	 * @return HTML
	 * @since 8.0.0
	 */
    public function is_page_to_notice(){
        global $pagenow;
        $user = wp_get_current_user();
        $screen = get_current_screen();
        if( $pagenow == 'plugins.php' || $screen->id == "woocommerce_page_wc-settings" ){
            if( isset( $_GET['section'] ) && $_GET['section'] === 'jne_shipping' ) return false;

            return true;
        }

        return false;
    }

	/**
	 * Check active shortcode
	 *
	 * @access public
	 * @return bool
	 * @since 8.0.0
	 */
    public function is_active_shortcode( $shortcode ){
        global $post;

        if( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, $shortcode ) ){
            return true;
        }

        return false;
    }

	/**
	 * Get status weight
	 *
	 * @access public
	 * @return HTML
	 * @since 8.0.0
	 */
	public function get_status_weight(){
		$weight_unit = $this->get_woocommerce_weight_unit();
		$status = array();
		$status['unit']	= $weight_unit;
		if( $weight_unit == 'g' || $weight_unit == 'kg' ){
			$status['message'] = 'yes';
		}else{
			$status['message'] = 'error';
		}

		return $status;
	}

	/**
	 * Get license code
	 *
	 * @access public
	 * @return string
	 * @since 8.0.0
	 **/
	public function get_license_code(){
		return get_option( 'woocommerce_jne_shipping_license_code' );
	}

	/**
	 * WooCommerce weight unit
	 *
	 * @access public
	 * @return string
	 * @since 8.0.0
	 **/
	public function get_woocommerce_weight_unit(){
		return get_option( 'woocommerce_weight_unit' );
	}

	/**
	 * Get nonce
	 *
	 * @access public
	 * @return string
	 * @since 8.0.0
	 */
	public function get_nonce(){
		return $this->nonce;
    }

    /**
	 * Get current page
	 *
	 * @access private
	 * @return string
	 * @since 8.0.0
	 **/
	private static function get_page(){
		// get billing or shipping
		$permalink = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
		$permalinks = explode( '/', $permalink );
		end($permalinks);
		$key = key( $permalinks );
		$currentPage = $permalinks[$key-1];

		if( is_cart() )
			$page = 'cart';
		elseif( is_checkout() )
			$page = 'checkout';
		elseif( $currentPage == 'billing' )
			$page = 'billing';
		elseif( $currentPage == 'shipping' )
			$page = 'shipping';
		else
			$page = '';

		return $page;
	}
	
	/**
     * Convert date
     *
     * @access pubc
     * @param string $date
     * @param string $format
     * @return string
     * @since 1.0.0
     **/
    public function convert_date( $date, $format ){
        return date( $format, strtotime( $date ) );
    }

    /**
	 * AJAX URL
	 *
	 * @access private
	 * @return string URL
	 * @since 8.0.0
	 **/
	private static function ajax_url(){
		return admin_url( 'admin-ajax.php' );
	}

    /**
	 * WooCommerce version
	 *
	 * @access public
	 * @return string
	 * @since 8.0.0
	 **/
	public function get_woocommerce_version(){
		 require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		 $data = get_plugins( '/' . plugin_basename( 'woocommerce' ) );
		 $version = explode('.',$data['woocommerce.php']['Version']);
		 return $data['woocommerce.php']['Version'];
	}

	/**
	 * Get the plugin url.
	 *
	 * @access public
	 * @return string
	 * @since 8.0.0
	 */
	public function plugin_url(){
		return untrailingslashit( plugins_url( '/', __FILE__ ) );
	}

	/**
	 * Get the plugin path.
	 *
	 * @access public
	 * @return string
	 * @since 8.0.0
	 */
	public function plugin_path(){
		return untrailingslashit( plugin_dir_path( __FILE__ ) );
	}

    /**
	 * Render help tip
	 *
	 * @access public
	 * @return HTML for the help tip image
	 * @since 8.0.0
	 **/
	public function help_tip( $tip, $float = 'none' ){
		return '<img class="help_tip" data-tip="' . $tip . '" src="' . $this->plugin_url() . '/assets/images/help.png" height="16" width="16" style="float:' . $float . ';" />';
	}

	/**
	 * Render link tip
	 *
	 * @access public
	 * @return HTML for the help tip link
	 * @since 8.0.0
	 **/
	public function link_tip( $tip, $text, $href, $target = NULL, $style = NULL ){
		return '<a href="' . $href . '" data-tip="' . $tip . '" target="' . $target . '" class="help_tip">' . $text . '</a>';
	}

	/**
	 * Check URL is exists
	 *
	 * @access public
	 * @return bool of the result response code
	 * @since 4.0.3
	 **/
	public function is_url_exists($url){
        $response = wp_remote_get($url);
        $response_code = wp_remote_retrieve_response_code($response);
        if(!empty($response_code) && $response_code == 200){
            return TRUE;
        }

        return FALSE;
	}
}

/**
 * Check if WooCommerce is active
 **/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

	/**
	 * Returns the main instance
	 *
	 * @since  8.0.0
	 * @return WooCommerce_JNE
	 */
	function WC_JNE(){
		return WooCommerce_JNE::instance();
	}

    // Let's fucking rock n roll! Yeah!
	WooCommerce_JNE::instance();

};

endif;