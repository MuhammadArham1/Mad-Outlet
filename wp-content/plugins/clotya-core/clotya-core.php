<?php
/**
* Plugin Name: Clotya Core
* Description: Premium & Advanced Essential Elements for Elementor
* Plugin URI:  http://themeforest.net/user/KlbTheme
* Version:     1.4.2
* Author:      KlbTheme
* Author URI:  http://themeforest.net/user/KlbTheme
*/


/*
* Exit if accessed directly.
*/

if ( ! defined( 'ABSPATH' ) ) exit;

final class Clotya_Elementor_Addons
{
    /**
    * Plugin Version
    *
    * @since 1.0
    *
    * @var string The plugin version.
    */
    const VERSION = '1.0.0';

    /**
    * Minimum Elementor Version
    *
    * @since 1.0
    *
    * @var string Minimum Elementor version required to run the plugin.
    */
    const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

    /**
    * Minimum PHP Version
    *
    * @since 1.0
    *
    * @var string Minimum PHP version required to run the plugin.
    */
    const MINIMUM_PHP_VERSION = '7.0';

    /**
    * Instance
    *
    * @since 1.0
    *
    * @access private
    * @static
    *
    * @var Clotya_Elementor_Addons The single instance of the class.
    */
    private static $_instance = null;

    /**
    * Instance
    *
    * Ensures only one instance of the class is loaded or can be loaded.
    *
    * @since 1.0
    *
    * @access public
    * @static
    *
    * @return Clotya_Elementor_Addons An instance of the class.
    */
    public static function instance()
    {

        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
    * Constructor
    *
    * @since 1.0
    *
    * @access public
    */
    public function __construct()
    {
        add_action( 'init', [ $this, 'i18n' ] );
        add_action( 'plugins_loaded', [ $this, 'init' ] );
    }

    /**
    * Load Textdomain
    *
    * Load plugin localization files.
    *
    * Fired by `init` action hook.
    *
    * @since 1.0
    *
    * @access public
    */
    public function i18n()
    {
        load_plugin_textdomain( 'clotya-core' );
    }
	
   /**
    * Initialize the plugin
    *
    * Load the plugin only after Elementor (and other plugins) are loaded.
    * Checks for basic plugin requirements, if one check fail don't continue,
    * if all check have passed load the files required to run the plugin.
    *
    * Fired by `plugins_loaded` action hook.
    *
    * @since 1.0
    *
    * @access public
    */
    public function init()
    {
        // Check if Elementor is installed and activated
        if ( ! did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', [ $this, 'clotya_admin_notice_missing_main_plugin' ] );
            return;
        }
        // Check for required Elementor version
        if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
            add_action( 'admin_notices', [ $this, 'clotya_admin_notice_minimum_elementor_version' ] );
            return;
        }
        // Check for required PHP version
        if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
            add_action( 'admin_notices', [ $this, 'clotya_admin_notice_minimum_php_version' ] );
            return;
        }
		
		// Categories registered
        add_action( 'elementor/elements/categories_registered', [ $this, 'clotya_add_widget_category' ] );

		/* Init Include */
        require_once( __DIR__ . '/init.php' );

        /* Customizer Kirki */
        require_once( __DIR__ . '/inc/customizer.php' );

        /* Style php */
        require_once( __DIR__ . '/inc/style.php' );
		
		/* Aq Resizer Image Resize */
        require_once( __DIR__ . '/inc/aq_resizer.php' );
		
		/* Breadcrumb */
        require_once( __DIR__ . '/inc/breadcrumb.php' );


		/* Post view for popular posts widget */
        require_once( __DIR__ . '/inc/post_view.php' );
		
		/* Menu Endpoints - Mega Menu*/
		require_once( __DIR__ . '/inc/menu-endpoints/menu-endpoints.php' );
		
		/* GDPR */
        require_once( __DIR__ . '/gdpr/gdpr.php' );

		/* Newsletter */
        require_once( __DIR__ . '/newsletter-popup/newsletter.php' );

        /* Popular Posts Widget */
        require_once( __DIR__ . '/widgets/widget-popular-posts.php' );


		/* WooCommerce Filter */
        require_once( __DIR__ . '/woocommerce-filter/woocommerce-filter.php' );
		
		/* Location Taxonomy */
		if(get_theme_mod('clotya_location_filter',0) == 1){
			require_once( __DIR__ . '/taxonomy/location_taxonomy.php' );
		}
		
		/* Maintenance */
		if(get_theme_mod('clotya_maintenance_toggle', 0) == 1 || clotya_ft() == 'maintenance'){
			require_once( __DIR__ . '/inc/maintenance/maintenance.php' );
		}
		
        /* Custom plugin helper functions */
        require_once( __DIR__ . '/elementor/classes/class-helpers-functions.php' );
		
        /* Custom plugin helper functions */
        require_once( __DIR__ . '/elementor/classes/class-customizing-page-settings.php' );

        // Register Widget Styles
        add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'widget_styles' ] );
		
        // Register Widget Scripts
        add_action( 'elementor/frontend/after_enqueue_scripts', [ $this, 'widget_scripts' ] );
		
		// Register Widget Editor Style
		add_action( 'elementor/editor/after_enqueue_styles', [ $this, 'widget_editor_style' ] );

        // Register Widget Editor Scripts
        add_action( 'elementor/editor/after_enqueue_scripts', [ $this, 'widget_editor_scripts' ] );
		
        // Widgets registered
        add_action( 'elementor/widgets/register', [ $this, 'init_widgets' ] );
    }
	
    /**
    * Register Widgets Category
    *
    */
    public function clotya_add_widget_category( $elements_manager )
    {
        $elements_manager->add_category( 'clotya', ['title' => esc_html__( 'Clotya Core', 'clotya-core' )]);
    }	
	
    /**
    * Init Widgets
    *
    * Include widgets files and register them
    *
    * @since 1.0
    *
    * @access public
    */
    public function init_widgets()
    {

		// Home Slider
		require_once( __DIR__ . '/elementor/widgets/clotya-home-slider.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Clotya_Home_Slider_Widget() );
		
		// Banner Column
		require_once( __DIR__ . '/elementor/widgets/clotya-banner-column.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Clotya_Banner_Column_Widget() );
		
		// Clotya Icon Box
		require_once( __DIR__ . '/elementor/widgets/clotya-icon-box.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Clotya_Icon_Box_Widget() );
		
		// Clotya Banner Box
		require_once( __DIR__ . '/elementor/widgets/clotya-banner-box.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Clotya_Banner_Box_Widget() );
		
		// Clotya Banner Box 2
		require_once( __DIR__ . '/elementor/widgets/clotya-banner-box2.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Clotya_Banner_Box2_Widget() );
		
		// Clotya Banner Box 3
		require_once( __DIR__ . '/elementor/widgets/clotya-banner-box3.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Clotya_Banner_Box3_Widget() );
		
		// Clotya Banner Box 4
		require_once( __DIR__ . '/elementor/widgets/clotya-banner-box4.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Clotya_Banner_Box4_Widget() );
		
		// Clotya Product Carousel
		require_once( __DIR__ . '/elementor/widgets/clotya-product-carousel.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Clotya_Product_Carousel_Widget() );
		
		// Clotya Product Tab Carousel
		require_once( __DIR__ . '/elementor/widgets/clotya-product-tab-carousel.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Clotya_Product_Tab_Carousel_Widget() );
		
		// Clotya Product Grid
		require_once( __DIR__ . '/elementor/widgets/clotya-product-grid.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Clotya_Product_Grid_Widget() );
		
		// Clotya Custom Title
		require_once( __DIR__ . '/elementor/widgets/clotya-custom-title.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Clotya_Custom_Title_Widget() );
		
		// Clotya Counter Banner
		require_once( __DIR__ . '/elementor/widgets/clotya-counter-banner.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Clotya_Counter_Banner_Widget() );
		
		// Clotya Product Categories
		require_once( __DIR__ . '/elementor/widgets/clotya-product-categories.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Clotya_Product_Categories_Widget() );
		
		// Clotya Category Banner
		require_once( __DIR__ . '/elementor/widgets/clotya-category-banner.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Clotya_Category_Banner_Widget() );
		
		// Clotya Testimonial Carousel
		require_once( __DIR__ . '/elementor/widgets/clotya-testimonial-carousel.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Clotya_Testimonial_Carousel_Widget() );
		
		// Clotya Client Carousel
		require_once( __DIR__ . '/elementor/widgets/clotya-client-carousel.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Clotya_Client_Carousel_Widget() );
		
		// Clotya Offered Products
		require_once( __DIR__ . '/elementor/widgets/clotya-offered-products.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Clotya_Offered_Products_Widget() );
		
		// Clotya Text Banner
		require_once( __DIR__ . '/elementor/widgets/clotya-text-banner.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Clotya_Text_Banner_Widget() );
		
		// Clotya Latest Blog
		require_once( __DIR__ . '/elementor/widgets/clotya-latest-blog.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Clotya_Latest_Blog_Widget() );
		
		// Clotya Button
		require_once( __DIR__ . '/elementor/widgets/clotya-button.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Clotya_Button_Widget() );

		// Clotya Testimonial
		require_once( __DIR__ . '/elementor/widgets/clotya-testimonial-box.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Clotya_Testimonial_Box_Widget() );
		
		// Clotya Comment Text
		require_once( __DIR__ . '/elementor/widgets/clotya-comment-text.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Clotya_Comment_Text_Widget() );
		
		// Clotya Image Box
		require_once( __DIR__ . '/elementor/widgets/clotya-image-box.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Clotya_Image_Box_Widget() );
		
		// Clotya Text Grid
		require_once( __DIR__ . '/elementor/widgets/clotya-text-grid.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Clotya_Text_Grid_Widget() );
		
		// Clotya Counter Text
		require_once( __DIR__ . '/elementor/widgets/clotya-counter-text.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Clotya_Counter_Text_Widget() );
		
		// Clotya Contact Icon Box
		require_once( __DIR__ . '/elementor/widgets/clotya-contact-icon-box.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Clotya_Contact_Icon_Box_Widget() );
		
		// Clotya Contact Form 7
		require_once( __DIR__ . '/elementor/widgets/clotya-contact-form-7.php' );
		\Elementor\Plugin::instance()->widgets_manager->register( new \Elementor\Clotya_Contact_Form_7_Widget() );


	}
	
	
    /**
    * Admin notice
    *
    * Warning when the site doesn't have Elementor installed or activated.
    *
    * @since 1.0
    *
    * @access public
    */
    public function clotya_admin_notice_missing_main_plugin()
    {
        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor */
            esc_html__( '%1$s requires %2$s to be installed and activated.', 'clotya-core' ),
            '<strong>' . esc_html__( 'Clotya Core', 'clotya-core' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'clotya-core' ) . '</strong>'
        );
        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }

    /**
    * Admin notice
    *
    * Warning when the site doesn't have a minimum required Elementor version.
    *
    * @since 1.0
    *
    * @access public
    */
    public function clotya_admin_notice_minimum_elementor_version()
    {
        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
            esc_html__( '%1$s requires %2$s version %3$s or greater.', 'clotya-core' ),
            '<strong>' . esc_html__( 'Clotya Core', 'clotya-core' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'clotya-core' ) . '</strong>',
             self::MINIMUM_ELEMENTOR_VERSION
        );
        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }

    /**
    * Admin notice
    *
    * Warning when the site doesn't have a minimum required PHP version.
    *
    * @since 1.0
    *
    * @access public
    */
    public function clotya_admin_notice_minimum_php_version()
    {
        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
        $message = sprintf(
            /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
            esc_html__( '%1$s requires %2$s version %3$s or greater.', 'clotya-core' ),
            '<strong>' . esc_html__( 'Clotya Core', 'clotya-core' ) . '</strong>',
            '<strong>' . esc_html__( 'PHP', 'clotya-core' ) . '</strong>',
             self::MINIMUM_PHP_VERSION
        );
        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }
	
    public function widget_styles()
    {
    }

    public function widget_scripts()
    {


		if (is_admin ()){
			wp_enqueue_media ();
			wp_enqueue_script( 'widget-image', plugins_url( 'js/widget-image.js', __FILE__ ));
		}

        // custom-scripts
		if ( is_rtl() ) {
			wp_enqueue_script( 'clotya-core-custom-scripts-rtl', plugins_url( 'elementor/custom-scripts-rtl.js', __FILE__ ), true );
		} else {
			wp_enqueue_script( 'clotya-core-custom-scripts', plugins_url( 'elementor/custom-scripts.js', __FILE__ ), true );
		}
    }
	
    public function widget_editor_style(){
		wp_enqueue_style( 'klb-editor-style', plugins_url( 'elementor/editor-style.css', __FILE__ ), true );
    }

    public function widget_editor_scripts(){
		
		wp_enqueue_script( 'klb-editor-scripts', plugins_url( 'elementor/editor-scripts.js', __FILE__ ), true );

    }


} 
Clotya_Elementor_Addons::instance();