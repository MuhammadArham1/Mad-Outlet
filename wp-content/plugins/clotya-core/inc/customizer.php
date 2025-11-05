<?php
/*======
*
* Kirki Settings
*
======*/
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Kirki' ) ) {
	return;
}

Kirki::add_config(
	'clotya_customizer', array(
		'capability'  => 'edit_theme_options',
		'option_type' => 'theme_mod',
	)
);

/*======
*
* Sections
*
======*/
$sections = array(
	'shop_settings' => array (
		esc_attr__( 'Shop Settings', 'clotya-core' ),
		esc_attr__( 'You can customize the shop settings.', 'clotya-core' ),
	),
	
	'blog_settings' => array (
		esc_attr__( 'Blog Settings', 'clotya-core' ),
		esc_attr__( 'You can customize the blog settings.', 'clotya-core' ),
	),

	'header_settings' => array (
		esc_attr__( 'Header Settings', 'clotya-core' ),
		esc_attr__( 'You can customize the header settings.', 'clotya-core' ),
	),

	'main_color' => array (
		esc_attr__( 'Main Color', 'clotya-core' ),
		esc_attr__( 'You can customize the main color.', 'clotya-core' ),
	),

	'elementor_templates' => array (
		esc_attr__( 'Elementor Templates', 'clotya-core' ),
		esc_attr__( 'You can customize the elementor templates.', 'clotya-core' ),
	),
	
	'map_settings' => array (
		esc_attr__( 'Map Settings', 'clotya-core' ),
		esc_attr__( 'You can customize the map settings.', 'clotya-core' ),
	),

	'footer_settings' => array (
		esc_attr__( 'Footer Settings', 'clotya-core' ),
		esc_attr__( 'You can customize the footer settings.', 'clotya-core' ),
	),

	'gdpr_settings' => array (
		esc_attr__( 'GDPR Settings', 'clotya-core' ),
		esc_attr__( 'You can customize the GDPR settings.', 'clotya-core' ),
	),

	'newsletter_settings' => array (
		esc_attr__( 'Newsletter Settings', 'clotya-core' ),
		esc_attr__( 'You can customize the Newsletter Popup settings.', 'clotya-core' ),
	),
	
	'maintenance_settings' => array (
		esc_attr__( 'Maintenance Settings', 'clotya-core' ),
		esc_attr__( 'You can customize the Maintenance settings.', 'clotya-core' ),
	),
	
	'typography_settings' => array (
		esc_attr__( 'Fynode Typography', 'clotya-core' ),
		esc_attr__( 'You can customize the Typography settings.', 'clotya-core' ),
	),
	
	'other_settings' => array (
		esc_attr__( 'Other', 'clotya-core' ),
		esc_attr__( 'You can customize the other settings.', 'clotya-core' ),
	),

);

foreach ( $sections as $section_id => $section ) {
	$section_args = array(
		'title' => $section[0],
		'description' => $section[1],
	);

	if ( isset( $section[2] ) ) {
		$section_args['type'] = $section[2];
	}

	if( $section_id == "colors" ) {
		Kirki::add_section( str_replace( '-', '_', $section_id ), $section_args );
	} else {
		Kirki::add_section( 'clotya_' . str_replace( '-', '_', $section_id ) . '_section', $section_args );
	}
}


/*======
*
* Fields
*
======*/
function clotya_customizer_add_field ( $args ) {
	Kirki::add_field(
		'clotya_customizer',
		$args
	);
}

	/*====== Header ==================================================================================*/
		/*====== Header Panels ======*/
		Kirki::add_panel (
			'clotya_header_panel',
			array(
				'title' => esc_html__( 'Header Settings', 'clotya-core' ),
				'description' => esc_html__( 'You can customize the header from this panel.', 'clotya-core' ),
			)
		);

		$sections = array (
			'header_logo' => array(
				esc_attr__( 'Logo', 'clotya-core' ),
				esc_attr__( 'You can customize the logo which is on header..', 'clotya-core' )
			),
		
			'header_general' => array(
				esc_attr__( 'Header General', 'clotya-core' ),
				esc_attr__( 'You can customize the header.', 'clotya-core' )
			),
			
			'header_notification' => array(
				esc_attr__( 'Header Notification', 'clotya-core' ),
				esc_attr__( 'You can customize the header notification.', 'clotya-core' )
			),
			
			'header_social' => array(
				esc_attr__( 'Header Social', 'clotya-core' ),
				esc_attr__( 'You can customize the header social.', 'clotya-core' )
			),

			'header_preloader' => array(
				esc_attr__( 'Preloader', 'clotya-core' ),
				esc_attr__( 'You can customize the loader.', 'clotya-core' )
			),
			
			'header1_style' => array(
				esc_attr__( 'Header 1 Style', 'clotya' ),
				esc_attr__( 'You can customize the style.', 'clotya' )
			),
			
			'header2_style' => array(
				esc_attr__( 'Header 2 Style', 'clotya' ),
				esc_attr__( 'You can customize the style.', 'clotya' )
			),
			
			'header3_style' => array(
				esc_attr__( 'Header 3 Style', 'clotya' ),
				esc_attr__( 'You can customize the style.', 'clotya' )
			),
			
			'header4_style' => array(
				esc_attr__( 'Header 4 Style', 'clotya' ),
				esc_attr__( 'You can customize the style.', 'clotya' )
			),
			
			'header5_style' => array(
				esc_attr__( 'Header 5 Style', 'clotya' ),
				esc_attr__( 'You can customize the style.', 'clotya' )
			),
			
			'mobile_menu_style' => array(
				esc_attr__( 'Mobile Menu Style', 'clotya' ),
				esc_attr__( 'You can customize the style.', 'clotya' )
			),
			
			'mobile_bottom_menu_style' => array(
				esc_attr__( 'Mobile Bottom Menu Style', 'clotya' ),
				esc_attr__( 'You can customize the style.', 'clotya' )
			),

		);

		foreach ( $sections as $section_id => $section ) {
			$section_args = array(
				'title' => $section[0],
				'description' => $section[1],
				'panel' => 'clotya_header_panel',
			);

			if ( isset( $section[2] ) ) {
				$section_args['type'] = $section[2];
			}

			Kirki::add_section( 'clotya_' . str_replace( '-', '_', $section_id ) . '_section', $section_args );
		}
		
		/*====== Logo ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'clotya_logo',
				'label' => esc_attr__( 'Logo', 'clotya-core' ),
				'description' => esc_attr__( 'You can upload a logo.', 'clotya-core' ),
				'section' => 'clotya_header_logo_section',
				'choices' => array(
					'save_as' => 'id',
				),
			)
		);
		
		/*====== Logo ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'clotya_mobile_logo',
				'label' => esc_attr__( 'Mobile Logo', 'clotya-core' ),
				'description' => esc_attr__( 'You can upload a logo for the mobile.', 'clotya-core' ),
				'section' => 'clotya_header_logo_section',
				'choices' => array(
					'save_as' => 'id',
				),
			)
		);
		
		/*====== Logo Text ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'clotya_logo_text',
				'label' => esc_attr__( 'Set Logo Text', 'clotya-core' ),
				'description' => esc_attr__( 'You can set logo as text.', 'clotya-core' ),
				'section' => 'clotya_header_logo_section',
				'default' => 'Clotya',
			)
		);

		/*====== Logo Size ======*/
		clotya_customizer_add_field (
			array(
				'type'        => 'slider',
				'settings'    => 'clotya_logo_size',
				'label'       => esc_html__( 'Logo Size', 'clotya-core' ),
				'description' => esc_attr__( 'You can set size of the logo.', 'clotya-core' ),
				'section'     => 'clotya_header_logo_section',
				'default'     => 121,
				'transport'   => 'auto',
				'choices'     => [
					'min'  => 20,
					'max'  => 400,
					'step' => 1,
				],
				'output' => [
				[
					'element' => '.site-header .header-main .site-brand img',
					'property'    => 'width',
					'units' => 'px',
				], ],
			)
		);
		
		/*====== Mobil Logo Size ======*/
		clotya_customizer_add_field (
			array(
				'type'        => 'slider',
				'settings'    => 'clotya_mobil_logo_size',
				'label'       => esc_html__( 'Mobile Logo Size', 'clotya-core' ),
				'description' => esc_attr__( 'You can set size of the mobil logo.', 'clotya-core' ),
				'section'     => 'clotya_header_logo_section',
				'default'     => 112,
				'transport'   => 'auto',
				'choices'     => [
					'min'  => 20,
					'max'  => 300,
					'step' => 1,
				],
				'output' => [
				[
					'element' => '.site-header .header-mobile .site-brand img',
					'property'    => 'width',
					'units' => 'px',
				], ],
			)
		);
		
		/*====== Sidebar Logo Size ======*/
		clotya_customizer_add_field (
			array(
				'type'        => 'slider',
				'settings'    => 'clotya_sidebar_logo_size',
				'label'       => esc_html__( 'Sidebar Logo Size', 'clotya-core' ),
				'description' => esc_attr__( 'You can set size of the sidebar logo.', 'clotya-core' ),
				'section'     => 'clotya_header_logo_section',
				'default'     => 112,
				'transport'   => 'auto',
				'choices'     => [
					'min'  => 20,
					'max'  => 300,
					'step' => 1,
				],
				'output' => [
				[
					'element' => '.site-offcanvas .site-brand img',
					'property'    => 'width',
					'units' => 'px',
				], ],
			)
		);
		
		clotya_customizer_add_field(
			array (
			'type'        => 'select',
			'settings'    => 'clotya_header_type',
			'label'       => esc_html__( 'Header Type', 'clotya-core' ),
			'section'     => 'clotya_header_general_section',
			'default'     => 'type1',
			'priority'    => 10,
			'choices'     => array(
				'type1' => esc_attr__( 'Type 1', 'clotya-core' ),
				'type2' => esc_attr__( 'Type 2', 'clotya-core' ),
				'type3' => esc_attr__( 'Type 3', 'clotya-core' ),
				'type4' => esc_attr__( 'Type 4', 'clotya-core' ),
				'type5' => esc_attr__( 'Type 5', 'clotya-core' ),
			),
			) 
		);

		/*====== Middle Sticky Header Toggle ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_sticky_header',
				'label' => esc_attr__( 'Sticky Header', 'clotya-core' ),
				'description' => esc_attr__( 'You can choose status of the header.', 'clotya-core' ),
				'section' => 'clotya_header_general_section',
				'default' => '0',
			)
		);

		/*====== Mobile Sticky Header Toggle ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_mobile_sticky_header',
				'label' => esc_attr__( 'Mobile Sticky Header', 'clotya-core' ),
				'description' => esc_attr__( 'You can choose status of the header on the mobile.', 'clotya-core' ),
				'section' => 'clotya_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Toggle Menu Button Toggle ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_toggle_menu_button',
				'label' => esc_attr__( 'Toggle Menu Button', 'clotya-core' ),
				'description' => esc_attr__( 'You can choose status of the toggle menu button.', 'clotya-core' ),
				'section' => 'clotya_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Header Search Toggle ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_header_search',
				'label' => esc_attr__( 'Header Search', 'clotya-core' ),
				'description' => esc_attr__( 'You can choose status of the search on the header.', 'clotya-core' ),
				'section' => 'clotya_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Ajax Search Form ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_ajax_search_form',
				'label' => esc_attr__( 'Ajax Search Form', 'clotya-core' ),
				'description' => esc_attr__( 'Enable ajax search form for the header search.', 'clotya-core' ),
				'section' => 'clotya_header_general_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'clotya_header_search',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Mobile Search Toggle ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_mobile_header_search',
				'label' => esc_attr__( 'Mobile Search', 'clotya-core' ),
				'description' => esc_attr__( 'You can choose status of the mobile search on the header.', 'clotya-core' ),
				'section' => 'clotya_header_general_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'clotya_header_search',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Account Icon ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_header_account',
				'label' => esc_attr__( 'Account Icon / Login', 'clotya-core' ),
				'description' => esc_attr__( 'Disable or Enable User Login/Signup on the header.', 'clotya-core' ),
				'section' => 'clotya_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Header Popup Login ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_header_popup_login',
				'label' => esc_attr__( 'Popup Login?', 'clotya-core' ),
				'description' => esc_attr__( 'Disable or Enable the popup login on the header.', 'clotya-core' ),
				'section' => 'clotya_header_general_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'clotya_header_account',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Popup Login Image======*/
		clotya_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'clotya_header_popup_login_image',
				'label' => esc_attr__( 'Popup Login Image', 'clotya-core' ),
				'description' => esc_attr__( 'You can upload an image.', 'clotya-core' ),
				'section' => 'clotya_header_general_section',
				'choices' => array(
					'save_as' => 'id',
				),
				'required' => array(
					array(
					  'setting'  => 'clotya_header_popup_login',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Wishlist  ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_header_wishlist',
				'label' => esc_attr__( 'Wishlist', 'clotya-core' ),
				'description' => esc_attr__( 'Disable or Enable wishlist on the header.', 'clotya-core' ),
				'section' => 'clotya_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Header Cart Toggle ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_header_cart',
				'label' => esc_attr__( 'Header Cart', 'clotya-core' ),
				'description' => esc_attr__( 'You can choose status of the mini cart on the header.', 'clotya-core' ),
				'section' => 'clotya_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Header Mini Cart Type ======*/
		clotya_customizer_add_field(
			array (
			'type'        => 'radio-buttonset',
			'settings'    => 'clotya_header_mini_cart_type',
			'label'       => esc_html__( 'Mini Cart Type', 'clotya-core' ),
			'section'     => 'clotya_header_general_section',
			'default'     => 'default',
			'choices'     => array(
				'sidecart' => esc_attr__( 'Side Cart', 'clotya-core' ),
				'default' => esc_attr__( 'Default', 'clotya-core' ),
			),
			'required' => array(
				array(
				  'setting'  => 'clotya_header_cart',
				  'operator' => '==',
				  'value'    => '1',
				),
			),
			) 
		);
		
		/*====== Header Sidebar ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_header_sidebar',
				'label' => esc_attr__( 'Sidebar Menu', 'clotya-core' ),
				'description' => esc_attr__( 'Disable or Enable Sidebar Menu', 'clotya-core' ),
				'section' => 'clotya_header_general_section',
				'default' => '0',
			)
		);

		/*====== Header Sidebar Collapse ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_header_sidebar_collapse',
				'label' => esc_attr__( 'Disable Collapse on Frontpage', 'clotya-core' ),
				'description' => esc_attr__( 'Disable or Enable Sidebar Collapse on Home Page.', 'clotya-core' ),
				'section' => 'clotya_header_general_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'clotya_header_sidebar',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Top Right Menu Toggle ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_top_right_menu',
				'label' => esc_attr__( 'Top Right Menu', 'clotya-core' ),
				'description' => esc_attr__( 'Disable or Enable the top right menu.', 'clotya-core' ),
				'section' => 'clotya_header_general_section',
				'default' => '0',
			)
		);
		
		/*====== Top Notification Text1 Toggle======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_top_notification1_toggle',
				'label' => esc_attr__( 'Top Notification 1', 'clotya-core' ),
				'description' => esc_attr__( 'You can choose status of the notification 1 on the header.', 'clotya-core' ),
				'section' => 'clotya_header_notification_section',
				'default' => '0',
			)
		);
		
		/*====== Top Notification 1 Content ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'clotya_top_notification1_content',
				'label' => esc_attr__( 'Top Notification 1 Content', 'clotya-core' ),
				'description' => esc_attr__( 'You can add a text for the notification 1 content.', 'clotya-core' ),
				'section' => 'clotya_header_notification_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'clotya_top_notification1_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Top Notification Text2 Toggle======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_top_notification2_toggle',
				'label' => esc_attr__( 'Top Notification 2', 'clotya-core' ),
				'description' => esc_attr__( 'You can choose status of the notification 2 on the header.', 'clotya-core' ),
				'section' => 'clotya_header_notification_section',
				'default' => '0',
			)
		);
		
		/*====== Top Notification 2 Content ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'clotya_top_notification2_content',
				'label' => esc_attr__( 'Top Notification 2 Content', 'clotya-core' ),
				'description' => esc_attr__( 'You can add a text for the notification 2 content.', 'clotya-core' ),
				'section' => 'clotya_header_notification_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'clotya_top_notification2_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Social Toggle======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_header_social_toggle',
				'label' => esc_attr__( 'Header Social', 'clotya-core' ),
				'description' => esc_attr__( 'You can choose status of the social buttons on the header.', 'clotya-core' ),
				'section' => 'clotya_header_social_section',
				'default' => '0',
			)
		);
		
		/*====== Header Social Title ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'clotya_header_social_title',
				'label' => esc_attr__( 'Header Social Title', 'clotya-core' ),
				'description' => esc_attr__( 'You can add a text for the social title.', 'clotya-core' ),
				'section' => 'clotya_header_social_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'clotya_header_social_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Social Content Text ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'clotya_header_social_content',
				'label' => esc_attr__( 'Header Social Content', 'clotya-core' ),
				'description' => esc_attr__( 'You can add a text for the social dropdown.', 'clotya-core' ),
				'section' => 'clotya_header_social_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'clotya_header_social_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Header Social List ======*/
		new \Kirki\Field\Repeater(
			array(
				'settings' => 'clotya_header_social_list',
				'label' => esc_attr__( 'Social List', 'clotya-core' ),
				'description' => esc_attr__( 'You can set social icons.', 'clotya-core' ),
				'section' => 'clotya_header_social_section',
				'required' => array(
					array(
					  'setting'  => 'clotya_header_social_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
				'fields' => array(
					'social_icon' => array(
						'type' => 'text',
						'label' => esc_attr__( 'Icon', 'clotya-core' ),
						'description' => esc_attr__( 'You can set an icon. for example; "facebook"', 'clotya-core' ),
					),

					'social_url' => array(
						'type' => 'text',
						'label' => esc_attr__( 'URL', 'clotya-core' ),
						'description' => esc_attr__( 'You can set url for the item.', 'clotya-core' ),
					),
					
					'social_text' => array(
						'type' => 'text',
						'label' => esc_attr__( 'Text', 'clotya-core' ),
						'description' => esc_attr__( 'You can set a title.', 'clotya-core' ),
					),

				),
			)
		);

		/*====== PreLoader Toggle ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_preloader',
				'label' => esc_attr__( 'Enable Loader', 'clotya-core' ),
				'description' => esc_attr__( 'Disable or Enable the loader.', 'clotya-core' ),
				'section' => 'clotya_header_preloader_section',
				'default' => '0',
			)
		);
	
	/*====== Header 1 Style ================*/	

		/*====== Header 1 Top 1 Background Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#1a4845',
				'settings' => 'clotya_header1_top1_bg_color',
				'label' => esc_attr__( 'Header Top 1 Background Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'clotya-core' ),
				'section' => 'clotya_header1_style_section',
			)
		);
		
		/*====== Header1 Top 1 Notification Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'clotya_header1_top1_notification_color',
				'label' => esc_attr__( 'Header Top 1 Notification Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'clotya-core' ),
				'section' => 'clotya_header1_style_section',
			)
		);
		
		/*====== Header 1 Top 2 Background Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'clotya_header1_top2_bg_color',
				'label' => esc_attr__( 'Header Top 2 Background Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'clotya-core' ),
				'section' => 'clotya_header1_style_section',
			)
		);
		
		/*====== Header1 Top 2 Notification Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_header1_top2_notification_color',
				'label' => esc_attr__( 'Header Top 2 Notification Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'clotya-core' ),
				'section' => 'clotya_header1_style_section',
			)
		);
		
		/*====== Header 1 Top 2 Border Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#dee0ea',
				'settings' => 'clotya_header1_top2_border_color',
				'label' => esc_attr__( 'Header Top 2 Border Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  border.', 'clotya-core' ),
				'section' => 'clotya_header1_style_section',
			)
		);
		
		/*====== Header 1 Main Background Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'clotya_header1_main_bg_color',
				'label' => esc_attr__( 'Header Main Background Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'clotya-core' ),
				'section' => 'clotya_header1_style_section',
			)
		);
		
		/*====== Header 1 Main Border Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#dee0ea',
				'settings' => 'clotya_header1_main_border_color',
				'label' => esc_attr__( 'Header Main Border Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  border.', 'clotya-core' ),
				'section' => 'clotya_header1_style_section',
			)
		);
		
		/*====== Header1 Main Font Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_header1_main_font_color',
				'label' => esc_attr__( 'Header Main Font Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'clotya-core' ),
				'section' => 'clotya_header1_style_section',
			)
		);
		
		/*====== Header1 Main Font Hover Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_header1_main_font_hvrcolor',
				'label' => esc_attr__( 'Header Main Font Hover Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'clotya-core' ),
				'section' => 'clotya_header1_style_section',
			)
		);
		
		/*====== Header1 Main Submenu Font Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#8f8f8f',
				'settings' => 'clotya_header1_main_submenu_font_color',
				'label' => esc_attr__( 'Header Main Submenu Font Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'clotya-core' ),
				'section' => 'clotya_header1_style_section',
			)
		);
		
		/*====== Header1 Main Icon Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_header1_main_icon_color',
				'label' => esc_attr__( 'Header Main Icon Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'clotya-core' ),
				'section' => 'clotya_header1_style_section',
			)
		);
		
		/*====== Header1 Main Icon Hover Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_header1_main_icon_hvrcolor',
				'label' => esc_attr__( 'Header Main Icon Hover Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'clotya-core' ),
				'section' => 'clotya_header1_style_section',
			)
		);
		
		/*====== Header1 Top 1 Notification  Typography ======*/
		clotya_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'clotya_header1_top1_notification_size',
				'label'       => esc_attr__( 'Header Top 1 Notification Typography', 'clotya-core' ),
				'section'     => 'clotya_header1_style_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '12px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => ' .site-header.header-type1 .global-notification p ',
					],
				],
			)
		);
		
		/*====== Header1 Top 2 Notification  Typography ======*/
		clotya_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'clotya_header1_top2_notification_size',
				'label'       => esc_attr__( 'Header Top 2 Notification Typography', 'clotya-core' ),
				'section'     => 'clotya_header1_style_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '13px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => ' .site-header.header-type1 .header-topbar .header-message p ',
					],
				],
			)
		);
		
		/*====== Header1 Main Font Typography ======*/
		clotya_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'clotya_header1_main_font_size',
				'label'       => esc_attr__( 'Header Main Font Typography', 'clotya-core' ),
				'section'     => 'clotya_header1_style_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '15px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => ' .site-header.header-type1 .site-nav.primary .menu > li > a ',
					],
				],
			)
		);
	
	/*====== Header 2 Style ================*/	

		/*====== Header2 Top 1 Background Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_header2_top1_bg_color',
				'label' => esc_attr__( 'Header Top 1 Background Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'clotya-core' ),
				'section' => 'clotya_header2_style_section',
			)
		);
		
		/*====== Header2 Top 1 Notification Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'clotya_header2_top1_notification_color',
				'label' => esc_attr__( 'Header Top 1 Notification Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'clotya-core' ),
				'section' => 'clotya_header2_style_section',
			)
		);
		
		/*====== Header 2 Top 2 Background Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'clotya_header2_top2_bg_color',
				'label' => esc_attr__( 'Header Top 2 Background Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'clotya-core' ),
				'section' => 'clotya_header2_style_section',
			)
		);
		
		/*====== Header2 Top 2 Notification Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_header2_top2_notification_color',
				'label' => esc_attr__( 'Header Top 2 Notification Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'clotya-core' ),
				'section' => 'clotya_header2_style_section',
			)
		);
		
		/*====== Header 2 Top 2 Border Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#dee0ea',
				'settings' => 'clotya_header2_top2_border_color',
				'label' => esc_attr__( 'Header Top 2 Border Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  border.', 'clotya-core' ),
				'section' => 'clotya_header2_style_section',
			)
		);
		
		/*====== Header 2 Main Background Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'clotya_header2_main_bg_color',
				'label' => esc_attr__( 'Header Main Background Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'clotya-core' ),
				'section' => 'clotya_header2_style_section',
			)
		);
		
		/*====== Header 2 Main Border Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#dee0ea',
				'settings' => 'clotya_header2_main_border_color',
				'label' => esc_attr__( 'Header Main Border Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  border.', 'clotya-core' ),
				'section' => 'clotya_header2_style_section',
			)
		);
		
		/*====== Header2 Main Font Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_header2_main_font_color',
				'label' => esc_attr__( 'Header Main Font Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'clotya-core' ),
				'section' => 'clotya_header2_style_section',
			)
		);
		
		/*====== Header2 Main Font Hover Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_header2_main_font_hvrcolor',
				'label' => esc_attr__( 'Header Main Font Hover Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'clotya-core' ),
				'section' => 'clotya_header2_style_section',
			)
		);
		
		/*====== Header2 Category Font Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'clotya_header2_category_font_color',
				'label' => esc_attr__( 'Header Category Font Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'clotya-core' ),
				'section' => 'clotya_header2_style_section',
			)
		);
		
		/*====== Header2 Category Font Hover Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#212529',
				'settings' => 'clotya_header2_category_font_hvrcolor',
				'label' => esc_attr__( 'Header Category Font Hover Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'clotya-core' ),
				'section' => 'clotya_header2_style_section',
			)
		);
		
		/*====== Header2 Main Submenu Font Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#8f8f8f',
				'settings' => 'clotya_header2_main_submenu_font_color',
				'label' => esc_attr__( 'Header Main Submenu Font Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'clotya-core' ),
				'section' => 'clotya_header2_style_section',
			)
		);
		
		/*====== Header2 Main Icon Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_header2_main_icon_color',
				'label' => esc_attr__( 'Header Main Icon Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'clotya-core' ),
				'section' => 'clotya_header2_style_section',
			)
		);
		
		/*====== Header2 Main Icon Hover Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_header2_main_icon_hvrcolor',
				'label' => esc_attr__( 'Header Main Icon Hover Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'clotya-core' ),
				'section' => 'clotya_header2_style_section',
			)
		);
		
		/*====== Header2 Top 1 Notification  Typography ======*/
		clotya_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'clotya_header2_top1_notification_size',
				'label'       => esc_attr__( 'Header Top 1 Notification Typography', 'clotya-core' ),
				'section'     => 'clotya_header2_style_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '12px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => ' .site-header.header-type2 .global-notification p ',
					],
				],
			)
		);
		
		/*====== Header2 Top 2 Notification  Typography ======*/
		clotya_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'clotya_header2_top2_notification_size',
				'label'       => esc_attr__( 'Header Top 2 Notification Typography', 'clotya-core' ),
				'section'     => 'clotya_header2_style_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '13px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => ' .site-header.header-type2 .header-topbar .header-message p ',
					],
				],
			)
		);
		
		/*====== Header2 Main Font Typography ======*/
		clotya_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'clotya_header2_main_font_size',
				'label'       => esc_attr__( 'Header Main Font Typography', 'clotya-core' ),
				'section'     => 'clotya_header2_style_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '15px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => ' .site-header.header-type2 .site-nav.primary .menu > li > a ',
					],
				],
			)
		);
		
	/*====== Header 3 Style ================*/	
		
		/*====== Header3 Top 1 Background Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_header3_top1_bg_color',
				'label' => esc_attr__( 'Header Top 1 Background Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'clotya-core' ),
				'section' => 'clotya_header3_style_section',
			)
		);
		
		/*====== Header3 Top 1 Notification Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'clotya_header3_top1_notification_color',
				'label' => esc_attr__( 'Header Top 1 Notification Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'clotya-core' ),
				'section' => 'clotya_header3_style_section',
			)
		);
		
		/*====== Header 3 Main Background Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#00000000',
				'settings' => 'clotya_header3_main_bg_color',
				'label' => esc_attr__( 'Header Main Background Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'clotya-core' ),
				'section' => 'clotya_header3_style_section',
			)
		);
		
		/*====== Header 3 Main Border Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => 'rgba(255, 255, 255, 0.3)',
				'settings' => 'clotya_header3_main_border_color',
				'label' => esc_attr__( 'Header Main Border Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  border.', 'clotya-core' ),
				'section' => 'clotya_header3_style_section',
			)
		);
		
		/*====== Header3 Main Font Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'clotya_header3_main_font_color',
				'label' => esc_attr__( 'Header Main Font Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'clotya-core' ),
				'section' => 'clotya_header3_style_section',
			)
		);
		
		/*====== Header3 Main Font Hover Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'clotya_header3_main_font_hvrcolor',
				'label' => esc_attr__( 'Header Main Font Hover Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'clotya-core' ),
				'section' => 'clotya_header3_style_section',
			)
		);
		
		/*====== Header3 Main Submenu Title Font Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#8f8f8f',
				'settings' => 'clotya_header3_main_submenu_font_color',
				'label' => esc_attr__( 'Header Main Submenu Title Font Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'clotya-core' ),
				'section' => 'clotya_header3_style_section',
			)
		);
		
		/*====== Header3 Main Submenu Subtitle Font Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_header3_main_submenu_subtitle_font_color',
				'label' => esc_attr__( 'Header Main Submenu Subtitle Font Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'clotya-core' ),
				'section' => 'clotya_header3_style_section',
			)
		);
		
		/*====== Header3 Main Icon Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'clotya_header3_main_icon_color',
				'label' => esc_attr__( 'Header Main Icon Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'clotya-core' ),
				'section' => 'clotya_header3_style_section',
			)
		);
		
		/*====== Header3 Main Icon Hover Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'clotya_header3_main_icon_hvrcolor',
				'label' => esc_attr__( 'Header Main Icon Hover Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'clotya-core' ),
				'section' => 'clotya_header3_style_section',
			)
		);
		
		/*====== Header3 Top 1 Notification  Typography ======*/
		clotya_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'clotya_header3_top1_notification_size',
				'label'       => esc_attr__( 'Header Top 1 Notification Typography', 'clotya-core' ),
				'section'     => 'clotya_header3_style_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '12px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => ' .site-header.header-type3 .global-notification p ',
					],
				],
			)
		);
		
		/*====== Header3 Main Font Typography ======*/
		clotya_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'clotya_header3_main_font_size',
				'label'       => esc_attr__( 'Header Main Font Typography', 'clotya-core' ),
				'section'     => 'clotya_header3_style_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '15px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => ' .site-header.header-type3 .site-nav.primary .menu > li > a ',
					],
				],
			)
		);
	
	/*====== Header 4 Style ================*/
	
		/*====== Header 4 Top 1 Background Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ee403d',
				'settings' => 'clotya_header4_top1_bg_color',
				'label' => esc_attr__( 'Header Top 1 Background Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'clotya-core' ),
				'section' => 'clotya_header4_style_section',
			)
		);
		
		/*====== Header4 Top 1 Notification Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'clotya_header4_top1_notification_color',
				'label' => esc_attr__( 'Header Top 1 Notification Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'clotya-core' ),
				'section' => 'clotya_header4_style_section',
			)
		);
		
		/*====== Header 4 Top 2 Background Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'clotya_header4_top2_bg_color',
				'label' => esc_attr__( 'Header Top 2 Background Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'clotya-core' ),
				'section' => 'clotya_header4_style_section',
			)
		);
		
		/*====== Header4 Top 2 Notification Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_header4_top2_notification_color',
				'label' => esc_attr__( 'Header Top 2 Notification Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'clotya-core' ),
				'section' => 'clotya_header4_style_section',
			)
		);
		
		/*====== Header 4 Top 2 Border Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#dee0ea',
				'settings' => 'clotya_header4_top2_border_color',
				'label' => esc_attr__( 'Header Top 2 Border Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  border.', 'clotya-core' ),
				'section' => 'clotya_header4_style_section',
			)
		);
		
		/*====== Header 4 Main Background Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'clotya_header4_main_bg_color',
				'label' => esc_attr__( 'Header Main Background Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'clotya-core' ),
				'section' => 'clotya_header4_style_section',
			)
		);
		
		/*====== Header4 Main Font Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_header4_main_font_color',
				'label' => esc_attr__( 'Header Main Font Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'clotya-core' ),
				'section' => 'clotya_header4_style_section',
			)
		);
		
		/*====== Header4 Main Font Hover Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_header4_main_font_hvrcolor',
				'label' => esc_attr__( 'Header Main Font Hover Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'clotya-core' ),
				'section' => 'clotya_header4_style_section',
			)
		);
		
		/*====== Header4 Main Submenu Font Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#8f8f8f',
				'settings' => 'clotya_header4_main_submenu_font_color',
				'label' => esc_attr__( 'Header Main Submenu Font Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'clotya-core' ),
				'section' => 'clotya_header4_style_section',
			)
		);
		
		/*====== Header4 Main Icon Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_header4_main_icon_color',
				'label' => esc_attr__( 'Header Main Icon Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'clotya-core' ),
				'section' => 'clotya_header4_style_section',
			)
		);
		
		/*====== Header4 Main Icon Hover Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_header4_main_icon_hvrcolor',
				'label' => esc_attr__( 'Header Main Icon Hover Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'clotya-core' ),
				'section' => 'clotya_header4_style_section',
			)
		);
		
		/*====== Header4 Top 1 Notification  Typography ======*/
		clotya_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'clotya_header4_top1_notification_size',
				'label'       => esc_attr__( 'Header Top 1 Notification Typography', 'clotya-core' ),
				'section'     => 'clotya_header4_style_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '12px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => ' .site-header.header-type4 .global-notification p ',
					],
				],
			)
		);
		
		/*====== Header4 Top 2 Notification  Typography ======*/
		clotya_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'clotya_header4_top2_notification_size',
				'label'       => esc_attr__( 'Header Top 2 Notification Typography', 'clotya-core' ),
				'section'     => 'clotya_header4_style_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '13px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => ' .site-header.header-type4 .header-topbar .header-message p ',
					],
				],
			)
		);
		
		/*====== Header4 Main Font Typography ======*/
		clotya_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'clotya_header4_main_font_size',
				'label'       => esc_attr__( 'Header Main Font Typography', 'clotya-core' ),
				'section'     => 'clotya_header4_style_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '15px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => ' .site-header.header-type4 .site-nav.primary .menu > li > a ',
					],
				],
			)
		);
	
	/*====== Header 5 Style ================*/


		/*====== Header5 Top 1 Background Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_header5_top1_bg_color',
				'label' => esc_attr__( 'Header Top 1 Background Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'clotya-core' ),
				'section' => 'clotya_header5_style_section',
			)
		);
		
		/*====== Header5 Top 1 Notification Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'clotya_header5_top1_notification_color',
				'label' => esc_attr__( 'Header Top 1 Notification Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'clotya-core' ),
				'section' => 'clotya_header5_style_section',
			)
		);
		
		/*====== Header 5 Main Background Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'clotya_header5_main_bg_color',
				'label' => esc_attr__( 'Header Main Background Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'clotya-core' ),
				'section' => 'clotya_header5_style_section',
			)
		);
		
		/*====== Header 5 Main Border Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#dee0ea',
				'settings' => 'clotya_header5_main_border_color',
				'label' => esc_attr__( 'Header Main Border Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  border.', 'clotya-core' ),
				'section' => 'clotya_header5_style_section',
			)
		);
		
		/*====== Header5 Main Font Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_header5_main_font_color',
				'label' => esc_attr__( 'Header Main Font Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'clotya-core' ),
				'section' => 'clotya_header5_style_section',
			)
		);
		
		/*====== Header5 Main Font Hover Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_header5_main_font_hvrcolor',
				'label' => esc_attr__( 'Header Main Font Hover Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'clotya-core' ),
				'section' => 'clotya_header5_style_section',
			)
		);
		
		/*====== Header5 Main Submenu Font Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#8f8f8f',
				'settings' => 'clotya_header5_main_submenu_font_color',
				'label' => esc_attr__( 'Header Main Submenu Font Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'clotya-core' ),
				'section' => 'clotya_header5_style_section',
			)
		);
		
		/*====== Header5 Main Icon Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_header5_main_icon_color',
				'label' => esc_attr__( 'Header Main Icon Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'clotya-core' ),
				'section' => 'clotya_header5_style_section',
			)
		);
		
		/*====== Header5 Main Icon Hover Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_header5_main_icon_hvrcolor',
				'label' => esc_attr__( 'Header Main Icon Hover Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'clotya-core' ),
				'section' => 'clotya_header5_style_section',
			)
		);
		
		/*====== Header5 Top 1 Notification  Typography ======*/
		clotya_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'clotya_header5_top1_notification_size',
				'label'       => esc_attr__( 'Header Top 1 Notification Typography', 'clotya-core' ),
				'section'     => 'clotya_header5_style_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '12px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => ' .site-header.header-type5 .global-notification p ',
					],
				],
			)
		);
		
		/*====== Header5 Main Font Typography ======*/
		clotya_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'clotya_header5_main_font_size',
				'label'       => esc_attr__( 'Header Main Font Typography', 'clotya-core' ),
				'section'     => 'clotya_header5_style_section',
				'default'     => [
					'font-family'    => '',
					'variant'        => '',
					'font-size'      => '15px',
					'line-height'    => '',
					'letter-spacing' => '',
					'text-transform' => '',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'output'      => [
					[
						'element' => ' .site-header.header-type5 .site-nav.primary .menu > li > a ',
					],
				],
			)
		);
		
	/*====== Mobile Menu Style ========*/
		
		/*====== Mobile Menu Background Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'clotya_mobile_menu_bg_color',
				'label' => esc_attr__( 'Mobile Menu Background Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  background.', 'clotya-core' ),
				'section' => 'clotya_mobile_menu_style_section',
			)
		);
		
		/*====== Mobile Menu Border Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#dee0ea',
				'settings' => 'clotya_mobile_menu_border_color',
				'label' => esc_attr__( 'Mobile Menu Border Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  border.', 'clotya-core' ),
				'section' => 'clotya_mobile_menu_style_section',
			)
		);
		
		/*====== Mobile Menu Title Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#333',
				'settings' => 'clotya_mobile_menu_title_color',
				'label' => esc_attr__( 'Mobile Menu Title Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'clotya-core' ),
				'section' => 'clotya_mobile_menu_style_section',
			)
		);
		
		/*====== Mobile Menu Subtitle Font Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_mobile_menu_subtitle_color',
				'label' => esc_attr__( 'Mobile Menu Subtitle Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'clotya-core' ),
				'section' => 'clotya_mobile_menu_style_section',
			)
		);
		
		/*====== Mobile Menu Copyright Font Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_mobile_menu_copyright_font_color',
				'label' => esc_attr__( 'Mobile Menu Copyright Font Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'clotya-core' ),
				'section' => 'clotya_mobile_menu_style_section',
			)
		);	
		
	/*====== Mobile Bottom Menu Style ========*/	
		
		/*====== Mobile Bottom Menu Background Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'clotya_mobile_bottom_menu_bg_color',
				'label' => esc_attr__( 'Mobile Bottom Menu Background Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for  color.', 'clotya-core' ),
				'section' => 'clotya_mobile_bottom_menu_style_section',
			)
		);
		
		/*====== Mobile Bottom Menu Icon Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#8a8b8e',
				'settings' => 'clotya_mobile_bottom_menu_icon_color',
				'label' => esc_attr__( 'Mobile Bottom Menu Icon Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'clotya-core' ),
				'section' => 'clotya_mobile_bottom_menu_style_section',
			)
		);
		
		/*====== Mobile Bottom Menu Font Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#8a8b8e',
				'settings' => 'clotya_mobile_bottom_menu_font_color',
				'label' => esc_attr__( 'Mobile Bottom Menu Font Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'clotya-core' ),
				'section' => 'clotya_mobile_bottom_menu_style_section',
			)
		);	
		
	/*====== SHOP ====================================================================================*/
		/*====== Shop Panels ======*/
		Kirki::add_panel (
			'clotya_shop_panel',
			array(
				'title' => esc_html__( 'Shop Settings', 'clotya-core' ),
				'description' => esc_html__( 'You can customize the shop from this panel.', 'clotya-core' ),
			)
		);

		$sections = array (
			'shop_general' => array(
				esc_attr__( 'General', 'clotya-core' ),
				esc_attr__( 'You can customize shop settings.', 'clotya-core' )
			),
			
			'shop_product_box' => array(
				esc_attr__( 'Product Box', 'clotya-core' ),
				esc_attr__( 'You can customize the product box settings.', 'clotya-core' )
			),
			
			'shop_single' => array(
				esc_attr__( 'Product Detail', 'clotya-core' ),
				esc_attr__( 'You can customize the product single settings.', 'clotya-core' )
			),
			
			'shop_banner' => array(
				esc_attr__( 'Banner', 'clotya-core' ),
				esc_attr__( 'You can customize the banner.', 'clotya-core' )
			),

			'my_account' => array(
				esc_attr__( 'My Account', 'clotya-core' ),
				esc_attr__( 'You can customize the my account page.', 'clotya-core' )
			),

			'free_shipping_bar' => array(
				esc_attr__( 'Free Shipping Bar ', 'clotya-core' ),
				esc_attr__( 'You can customize the free shipping bar settings.', 'clotya-core' )
			),
			
			'shop_single_style' => array(
				esc_attr__( 'Product Detail Style', 'clotya-core' ),
				esc_attr__( 'You can customize the product single style settings.', 'clotya-core' )
			),
			
			'mini_cart_style' => array(
				esc_attr__( 'Mini Cart Style', 'clotya-core' ),
				esc_attr__( 'You can customize the mini cart style settings.', 'clotya-core' )
			),
			
		);

		foreach ( $sections as $section_id => $section ) {
			$section_args = array(
				'title' => $section[0],
				'description' => $section[1],
				'panel' => 'clotya_shop_panel',
			);

			if ( isset( $section[2] ) ) {
				$section_args['type'] = $section[2];
			}

			Kirki::add_section( 'clotya_' . str_replace( '-', '_', $section_id ) . '_section', $section_args );
		}
		
		/*====== Shop Layouts ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'radio-buttonset',
				'settings' => 'clotya_shop_layout',
				'label' => esc_attr__( 'Layout', 'clotya-core' ),
				'description' => esc_attr__( 'You can choose a layout for the shop.', 'clotya-core' ),
				'section' => 'clotya_shop_general_section',
				'default' => 'left-sidebar',
				'choices' => array(
					'left-sidebar' => esc_attr__( 'Left Sidebar', 'clotya-core' ),
					'full-width' => esc_attr__( 'Full Width', 'clotya-core' ),
					'right-sidebar' => esc_attr__( 'Right Sidebar', 'clotya-core' ),
				),
			)
		);

		/*====== Shop Width ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'radio-buttonset',
				'settings' => 'clotya_shop_width',
				'label' => esc_attr__( 'Shop Page Width', 'clotya-core' ),
				'description' => esc_attr__( 'You can choose a layout for the shop page.', 'clotya-core' ),
				'section' => 'clotya_shop_general_section',
				'default' => 'boxed',
				'choices' => array(
					'boxed' => esc_attr__( 'Boxed', 'clotya-core' ),
					'wide' => esc_attr__( 'Wide', 'clotya-core' ),
				),
			)
		);

		clotya_customizer_add_field(
			array (
			'type'        => 'radio-buttonset',
			'settings'    => 'clotya_paginate_type',
			'label'       => esc_html__( 'Pagination Type', 'clotya-core' ),
			'section'     => 'clotya_shop_general_section',
			'default'     => 'default',
			'priority'    => 10,
			'choices'     => array(
				'default' => esc_attr__( 'Default', 'clotya-core' ),
				'loadmore' => esc_attr__( 'Load More', 'clotya-core' ),
				'infinite' => esc_attr__( 'Infinite', 'clotya-core' ),
			),
			) 
		);

		/*====== Ajax on Shop Page ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_ajax_on_shop',
				'label' => esc_attr__( 'Ajax on Shop Page', 'clotya-core' ),
				'description' => esc_attr__( 'Disable or Enable Ajax for the shop page.', 'clotya-core' ),
				'section' => 'clotya_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Grid-List Toggle ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_grid_list_view',
				'label' => esc_attr__( 'Grid List View', 'clotya-core' ),
				'description' => esc_attr__( 'Disable or Enable grid list view on shop page.', 'clotya-core' ),
				'section' => 'clotya_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Perpage Toggle ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_perpage_view',
				'label' => esc_attr__( 'Perpage View', 'clotya-core' ),
				'description' => esc_attr__( 'Disable or Enable perpage view on shop page.', 'clotya-core' ),
				'section' => 'clotya_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Atrribute Swatches ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_attribute_swatches',
				'label' => esc_attr__( 'Attribute Swatches', 'clotya-core' ),
				'description' => esc_attr__( 'Disable or Enable the attribute types (Color - Button - Images).', 'clotya-core' ),
				'section' => 'clotya_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Ajax Notice Shop ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_shop_notice_ajax_addtocart',
				'label' => esc_attr__( 'Added to Cart Ajax Notice', 'clotya' ),
				'description' => esc_attr__( 'You can choose status of the ajax notice feature.', 'clotya' ),
				'section' => 'clotya_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Product Badge Tab ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_product_badge_tab',
				'label' => esc_attr__( 'Product Badge Tab', 'clotya-core' ),
				'description' => esc_attr__( 'You can choose status of the product badge tab.', 'clotya-core' ),
				'section' => 'clotya_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Wishlist Toggle ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_wishlist_button',
				'label' => esc_attr__( 'Custom Wishlist Button', 'clotya-core' ),
				'description' => esc_attr__( 'You can choose status of the wishlist button.', 'clotya-core' ),
				'section' => 'clotya_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Wishlist Page ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'clotya_wishlist_page',
				'label' => esc_attr__( 'Select a Wishlist Page', 'clotya-core' ),
				'description' => esc_attr__( 'You can select a wishlist page. [klbwl_list]', 'clotya-core' ),
				'section' => 'clotya_shop_general_section',
				'default' => '',
				'choices'     => Kirki\Util\Helper::get_posts(
					array(
						'posts_per_page' => 30,
						'post_type'      => 'page'
					) ,
				),
				'required' => array(
					array(
					  'setting'  => 'clotya_wishlist_button',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Shop Compare  ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_compare_button',
				'label' => esc_attr__( 'Compare', 'clotya-core' ),
				'description' => esc_attr__( 'You can choose status of the compare button.', 'clotya-core' ),
				'section' => 'clotya_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Compare Page ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'clotya_compare_page',
				'label' => esc_attr__( 'Select a Compare Page', 'clotya-core' ),
				'description' => esc_attr__( 'You can select a compare page. [klbcp_list]', 'clotya-core' ),
				'section' => 'clotya_shop_general_section',
				'default' => '',
				'choices'     => Kirki\Util\Helper::get_posts(
					array(
						'posts_per_page' => 30,
						'post_type'      => 'page'
					) ,
				),
				'required' => array(
					array(
					  'setting'  => 'clotya_compare_button',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);

		/*====== Mobile Bottom Menu======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_mobile_bottom_menu',
				'label' => esc_attr__( 'Mobile Bottom Menu', 'clotya-core' ),
				'description' => esc_attr__( 'Disable or Enable the bottom menu on mobile.', 'clotya-core' ),
				'section' => 'clotya_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Mobile Bottom Menu Edit Toggle======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_mobile_bottom_menu_edit_toggle',
				'label' => esc_attr__( 'Mobile Bottom Menu Edit', 'clotya-core' ),
				'description' => esc_attr__( 'Edit the mobile bottom menu.', 'clotya-core' ),
				'section' => 'clotya_shop_general_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'clotya_mobile_bottom_menu',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
				
			)
			
		);
		
		/*====== Mobile Menu Repeater ======*/
		new \Kirki\Field\Repeater(
			array(
				'settings' => 'clotya_mobile_bottom_menu_edit',
				'label' => esc_attr__( 'Mobile Bottom Menu Edit', 'clotya-core' ),
				'description' => esc_attr__( 'Edit the mobile bottom menu.', 'clotya-core' ),
				'section' => 'clotya_shop_general_section',
				'required' => array(
					array(
					  'setting'  => 'clotya_mobile_bottom_menu_edit_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
				'fields' => array(
					'mobile_menu_type' => array(
						'type' => 'select',
						'label' => esc_attr__( 'Select Type', 'clotya-core' ),
						'description' => esc_attr__( 'You can select a type', 'clotya-core' ),
						'default' => 'default',
						'choices' => array(
							'default' => esc_attr__( 'Default', 'clotya-core' ),
							'search' => esc_attr__( 'Search', 'clotya-core' ),
							'filter' => esc_attr__( 'Filter', 'clotya-core' ),
							'category' => esc_attr__( 'category', 'clotya-core' ),
						),
					),
				
					'mobile_menu_icon' => array(
						'type' => 'text',
						'label' => esc_attr__( 'Icon', 'clotya-core' ),
						'description' => esc_attr__( 'You can set an icon. for example; "store"', 'clotya-core' ),
					),
					'mobile_menu_text' => array(
						'type' => 'text',
						'label' => esc_attr__( ' Text', 'clotya-core' ),
						'description' => esc_attr__( 'You can enter a text.', 'clotya-core' ),
					),
					'mobile_menu_url' => array(
						'type' => 'text',
						'label' => esc_attr__( 'URL', 'clotya-core' ),
						'description' => esc_attr__( 'You can set url for the item.', 'clotya-core' ),
					),
				),
				
			)
		);

		/*====== Product Stock Quantity ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_stock_quantity',
				'label' => esc_attr__( 'Stock Quantity', 'clotya-core' ),
				'description' => esc_attr__( 'Show stock quantity on the label.', 'clotya-core' ),
				'section' => 'clotya_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Product Min/Max Quantity ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_min_max_quantity',
				'label' => esc_attr__( 'Min/Max Quantity', 'clotya-core' ),
				'description' => esc_attr__( 'Enable the additional quantity setting fields in product detail page.', 'clotya-core' ),
				'section' => 'clotya_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Category Description ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_category_description_after_content',
				'label' => esc_attr__( 'Category Desc After Content', 'clotya-core' ),
				'description' => esc_attr__( 'Add the category description after the products.', 'clotya-core' ),
				'section' => 'clotya_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Catalog Mode - Disable Add to Cart ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_catalog_mode',
				'label' => esc_attr__( 'Catalog Mode', 'clotya-core' ),
				'description' => esc_attr__( 'Disable Add to Cart button on the shop page.', 'clotya-core' ),
				'section' => 'clotya_shop_general_section',
				'default' => '0',
			)
		);	

		/*====== Recently Viewed Products ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_recently_viewed_products',
				'label' => esc_attr__( 'Recently Viewed Products', 'clotya-core' ),
				'description' => esc_attr__( 'Disable or Enable Recently Viewed Products.', 'clotya-core' ),
				'section' => 'clotya_shop_general_section',
				'default' => '0',
			)
		);

		/*====== Recently Viewed Products Coulmn ======*/
		clotya_customizer_add_field(
			array (
				'type'        => 'radio-buttonset',
				'settings'    => 'clotya_recently_viewed_products_column',
				'label'       => esc_html__( 'Recently Viewed Products Column', 'clotya-core' ),
				'section'     => 'clotya_shop_general_section',
				'default'     => '4',
				'priority'    => 10,
				'choices'     => array(
					'6' => esc_attr__( '6', 'clotya-core' ),
					'5' => esc_attr__( '5', 'clotya-core' ),
					'4' => esc_attr__( '4', 'clotya-core' ),
					'3' => esc_attr__( '3', 'clotya-core' ),
					'2' => esc_attr__( '2', 'clotya-core' ),
				),
				'required' => array(
					array(
					  'setting'  => 'clotya_recently_viewed_products',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			) 
		);

		/*====== Min Order Amount ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_min_order_amount_toggle',
				'label' => esc_attr__( 'Min Order Amount', 'clotya-core' ),
				'description' => esc_attr__( 'Enable Min Order Amount.', 'clotya-core' ),
				'section' => 'clotya_shop_general_section',
				'default' => '0',
			)
		);
		
		/*====== Min Order Amount Value ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'clotya_min_order_amount_value',
				'label' => esc_attr__( 'Min Order Value', 'clotya-core' ),
				'description' => esc_attr__( 'Set amount to specify a minimum order value.', 'clotya-core' ),
				'section' => 'clotya_shop_general_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'clotya_min_order_amount_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);

		/*====== Product Image Size ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'dimensions',
				'settings' => 'clotya_product_image_size',
				'label' => esc_attr__( 'Product Image Size', 'clotya-core' ),
				'description' => esc_attr__( 'You can set size of the product image for the shop page.', 'clotya-core' ),
				'section' => 'clotya_shop_general_section',
				'default' => array(
					'width' => '',
					'height' => '',
				),
			)
		);
		
		
		/*====== Product Box Type ======*/
		clotya_customizer_add_field(
			array (
			'type'        => 'radio-buttonset',
			'settings'    => 'clotya_product_box_type',
			'label'       => esc_html__( 'Shop Product Box Type', 'clotya-core' ),
			'section'     => 'clotya_shop_product_box_section',
			'default'     => 'type1',
			'priority'    => 10,
			'choices'     => array(
				'type1' => esc_attr__( 'Type 1', 'clotya-core' ),
				'type2' => esc_attr__( 'Type 2', 'clotya-core' ),
				'type3' => esc_attr__( 'Type 3', 'clotya-core' ),
				'type4' => esc_attr__( 'Type 4', 'clotya-core' ),
			),
			) 
		);
		
		/*====== Product Box Gallery Toggle ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_product_box_gallery',
				'label' => esc_attr__( 'Product Gallery', 'clotya-core' ),
				'description' => esc_attr__( 'Disable or Enable gallery on the product box.', 'clotya-core' ),
				'section' => 'clotya_shop_product_box_section',
				'default' => '0',
			)
		);
		
		/*====== Quick View Toggle ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_quick_view_button',
				'label' => esc_attr__( 'Quick View Button', 'clotya-core' ),
				'description' => esc_attr__( 'You can choose status of the quick view button.', 'clotya-core' ),
				'section' => 'clotya_shop_product_box_section',
				'default' => '0',
			)
		);
		
		/*====== Product SKU  ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_product_box_sku',
				'label' => esc_attr__( 'Product SKU', 'clotya-core' ),
				'description' => esc_attr__( 'Enable or Disable the sku on the product box', 'clotya-core' ),
				'section' => 'clotya_shop_product_box_section',
				'default' => '0',
			)
		);

		/*====== Product Attributes  ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_product_box_attributes',
				'label' => esc_attr__( 'Product Attributes', 'clotya-core' ),
				'description' => esc_attr__( 'Enable or Disable the attributes on the product box', 'clotya-core' ),
				'section' => 'clotya_shop_product_box_section',
				'default' => '0',
			)
		);

		/*====== Product Variable  ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_product_box_variable',
				'label' => esc_attr__( 'Product Variable', 'clotya-core' ),
				'description' => esc_attr__( 'Enable or Disable the variable on the product box', 'clotya-core' ),
				'section' => 'clotya_shop_product_box_section',
				'default' => '0',
			)
		);
		
		/*====== Shop Single Gallery Type ======*/
		clotya_customizer_add_field(
			array (
				'type'        => 'radio-buttonset',
				'settings'    => 'clotya_single_gallery_type',
				'label'       => esc_html__( 'Gallery Type (Product Detail)', 'clotya-core' ),
				'section'     => 'clotya_shop_single_section',
				'default'     => 'horizontal',
				'priority'    => 10,
				'choices'     => array(
					'horizontal' => esc_attr__( 'Horizontal', 'clotya-core' ),
					'vertical' => esc_attr__( 'Vertical', 'clotya-core' ),
					'1column'  => esc_attr__( '1column', 'clotya-core' ),
					'2columns' => esc_attr__( '2columns', 'clotya-core' ),
					'carousel2columns' => esc_attr__( 'Carousel 2columns', 'clotya-core' ),
				),
			) 
		);
		
		/*====== Shop Single Product Tab Type ======*/
		clotya_customizer_add_field(
			array (
				'type'        => 'radio-buttonset',
				'settings'    => 'clotya_single_product_tab_type',
				'label'       => esc_html__( 'Product Tab Type', 'clotya-core' ),
				'section'     => 'clotya_shop_single_section',
				'default'     => 'horizontal_tab',
				'choices'     => array(
					'horizontal_tab' 		  => esc_attr__( 'Horizontal Tab', 'clotya-core' ),
					'vertical_tab' 		      => esc_attr__( 'Vertical Tab', 'clotya-core' ),
					'accordion_tab' 		  => esc_attr__( 'Accordion Tab', 'clotya-core' ),
					'accordion_tab_content'   => esc_attr__( 'Accordion Tab Content', 'clotya-core' ),
				),
			) 
		);

		/*====== Shop Single Full width ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_single_full_width',
				'label' => esc_attr__( 'Full Width', 'clotya-core' ),
				'description' => esc_attr__( 'Stretch the single product page content.', 'clotya-core' ),
				'section' => 'clotya_shop_single_section',
				'default' => '0',
			)
		);

		/*====== Shop Single Image Zoom  ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_single_image_zoom',
				'label' => esc_attr__( 'Image Zoom', 'clotya-core' ),
				'description' => esc_attr__( 'You can choose status of the zoom feature.', 'clotya-core' ),
				'section' => 'clotya_shop_single_section',
				'default' => '0',
			)
		);
		
		/*====== Comment by Rating ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_comment_rating',
				'label' => esc_attr__( 'Comment Rating', 'clotya-core' ),
				'description' => esc_attr__( 'Disable or Enable the review slot.', 'clotya-core' ),
				'section' => 'clotya_shop_single_section',
				'default' => '0',
			)
		);

		/*====== Product360 View ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_shop_single_product360',
				'label' => esc_attr__( 'Product360 View', 'clotya-core' ),
				'description' => esc_attr__( 'Disable or Enable Product 360 View.', 'clotya-core' ),
				'section' => 'clotya_shop_single_section',
				'default' => '0',
			)
		);
		
		/*====== People Added In Cart  ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_people_added_in_cart',
				'label' => esc_attr__( 'People Added In Cart', 'clotya-core' ),
				'section' => 'clotya_shop_single_section',
				'default' => '0',
			)
		);
		
		/*====== Single Shipping Class  ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_single_shipping_class',
				'label' => esc_attr__( 'Single Shipping Class', 'clotya-core' ),
				'section' => 'clotya_shop_single_section',
				'default' => '0',
			)
		);

		/*====== Shop Single Ajax Add To Cart ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_shop_single_ajax_addtocart',
				'label' => esc_attr__( 'Ajax Add to Cart', 'clotya-core' ),
				'description' => esc_attr__( 'Disable or Enable ajax add to cart button.', 'clotya-core' ),
				'section' => 'clotya_shop_single_section',
				'default' => '0',
			)
		);
		
		/*======  Sticky Single Cart ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_single_sticky_cart',
				'label' => esc_attr__( 'Sticky Add to Cart', 'clotya-core' ),
				'description' => esc_attr__( 'Disable or Enable sticky cart button.', 'clotya-core' ),
				'section' => 'clotya_shop_single_section',
				'default' => '0',
			)
		);
		
		/*====== Single Sticky Titles ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_single_sticky_titles',
				'label' => esc_attr__( 'Sticky Titles', 'clotya-core' ),
				'description' => esc_attr__( 'Disable or Enable the sticky titles for desktop.', 'clotya-core' ),
				'section' => 'clotya_shop_single_section',
				'default' => '0',
			)
		);

		/*====== Mobile Sticky Single Cart ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_mobile_single_sticky_cart',
				'label' => esc_attr__( 'Mobile Sticky Add to Cart', 'clotya-core' ),
				'description' => esc_attr__( 'Disable or Enable sticky cart button on mobile.', 'clotya-core' ),
				'section' => 'clotya_shop_single_section',
				'default' => '0',
			)
		);

		/*====== Buy Now Single ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_shop_single_buy_now',
				'label' => esc_attr__( 'Buy Now Button', 'clotya-core' ),
				'description' => esc_attr__( 'Disable or Enable Buy Now button.', 'clotya-core' ),
				'section' => 'clotya_shop_single_section',
				'default' => '0',
			)
		);

		/*====== Related By Tags ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_related_by_tags',
				'label' => esc_attr__( 'Related Products with Tags', 'clotya-core' ),
				'description' => esc_attr__( 'Display the related products by tags.', 'clotya-core' ),
				'section' => 'clotya_shop_single_section',
				'default' => '0',
			)
		);
		
		/*====== Single Product Time Countdown ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_shop_single_time_countdown',
				'label' => esc_attr__( 'Time Countdown', 'clotya-core' ),
				'description' => esc_attr__( 'Display the sale time countdown.', 'clotya-core' ),
				'section' => 'clotya_shop_single_section',
				'default' => '0',
			)
		);

		/*====== Order on WhatsApp ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_shop_single_orderonwhatsapp',
				'label' => esc_attr__( 'Order on WhatsApp', 'clotya-core' ),
				'description' => esc_attr__( 'Enable the button on the product detail page.', 'clotya-core' ),
				'section' => 'clotya_shop_single_section',
				'default' => '0',
			)
		);
		
		/*====== Order on WhatsApp Number======*/
		clotya_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'clotya_shop_single_whatsapp_number',
				'label' => esc_attr__( 'WhatsApp Number', 'clotya-core' ),
				'description' => esc_attr__( 'You can add a phone number for order on WhatsApp.', 'clotya-core' ),
				'section' => 'clotya_shop_single_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'clotya_shop_single_orderonwhatsapp',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);

		/*====== Move Review Tab ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_shop_single_review_tab_move',
				'label' => esc_attr__( 'Move Review Tab', 'clotya-core' ),
				'description' => esc_attr__( 'Move the review tab out of tabs', 'clotya-core' ),
				'section' => 'clotya_shop_single_section',
				'default' => '0',
			)
		);

		/*====== Shop Single Social Share ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_shop_social_share',
				'label' => esc_attr__( 'Social Share (Product Detail)', 'clotya-core' ),
				'description' => esc_attr__( 'Disable or Enable social share buttons.', 'clotya-core' ),
				'section' => 'clotya_shop_single_section',
				'default' => '0',
			)
		);

		/*====== Shop Single Social Share ======*/
		clotya_customizer_add_field (
			array(
				'type'        => 'multicheck',
				'settings'    => 'clotya_shop_single_share',
				'section'     => 'clotya_shop_single_section',
				'default'     => array('facebook','twitter', 'pinterest', 'linkedin', 'reddit', 'whatsapp'  ),
				'priority'    => 10,
				'choices'     => [
					'facebook'  => esc_html__( 'Facebook', 	'clotya-core' ),
					'twitter' 	=> esc_html__( 'Twitter', 	'clotya-core' ),
					'pinterest' => esc_html__( 'Pinterest', 'clotya-core' ),
					'linkedin'  => esc_html__( 'Linkedin', 	'clotya-core' ),
					'reddit'  	=> esc_html__( 'Reddit', 	'clotya-core' ),
					'whatsapp'  => esc_html__( 'Whatsapp', 	'clotya-core' ),
				],
				'required' => array(
					array(
					  'setting'  => 'clotya_shop_social_share',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);

		/*====== Product Related Post Column ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'clotya_shop_related_post_column',
				'label' => esc_attr__( 'Related Post Column', 'clotya-core' ),
				'description' => esc_attr__( 'You can control related post column with this option.', 'clotya-core' ),
				'section' => 'clotya_shop_single_section',
				'default' => '4',
				'choices' => array(
					'5' => esc_attr__( '5 Columns', 'clotya-core' ),
					'4' => esc_attr__( '4 Columns', 'clotya-core' ),
					'3' => esc_attr__( '3 Columns', 'clotya-core' ),
					'2' => esc_attr__( '2 Columns', 'clotya-core' ),
				),
			)
		);
		
		/*====== Product Cross Sells Column ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'clotya_cross_sells_column',
				'label' => esc_attr__( 'Cross Sells Column', 'clotya-core' ),
				'description' => esc_attr__( 'You can control cross sells post column with this option.', 'clotya-core' ),
				'section' => 'clotya_shop_single_section',
				'default' => '4',
				'choices' => array(
					'6' => esc_attr__( '6 Columns', 'clotya-core' ),
					'5' => esc_attr__( '5 Columns', 'clotya-core' ),
					'4' => esc_attr__( '4 Columns', 'clotya-core' ),
					'3' => esc_attr__( '3 Columns', 'clotya-core' ),
					'2' => esc_attr__( '2 Columns', 'clotya-core' ),
				),
			)
		);
		
		/*====== Product Upsell Column ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'clotya_upsell_column',
				'label' => esc_attr__( 'Upsell Column', 'clotya-core' ),
				'description' => esc_attr__( 'You can control upsell post column with this option.', 'clotya-core' ),
				'section' => 'clotya_shop_single_section',
				'default' => '4',
				'choices' => array(
					'6' => esc_attr__( '6 Columns', 'clotya-core' ),
					'5' => esc_attr__( '5 Columns', 'clotya-core' ),
					'4' => esc_attr__( '4 Columns', 'clotya-core' ),
					'3' => esc_attr__( '3 Columns', 'clotya-core' ),
					'2' => esc_attr__( '2 Columns', 'clotya-core' ),
				),
			)
		);

		
		/*====== Shop Banner Image======*/
		clotya_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'clotya_shop_banner_image',
				'label' => esc_attr__( 'Image', 'clotya-core' ),
				'description' => esc_attr__( 'You can upload an image.', 'clotya-core' ),
				'section' => 'clotya_shop_banner_section',
				'choices' => array(
					'save_as' => 'id',
				),
			)
		);
		
		/*====== Shop Banner Title ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'clotya_shop_banner_title',
				'label' => esc_attr__( 'Set Title', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a title.', 'clotya-core' ),
				'section' => 'clotya_shop_banner_section',
				'default' => '',
			)
		);
		
		/*====== Shop Banner Subtitle ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'clotya_shop_banner_subtitle',
				'label' => esc_attr__( 'Set Subtitle', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a subtitle.', 'clotya-core' ),
				'section' => 'clotya_shop_banner_section',
				'default' => '',
			)
		);

		/*====== Shop Banner URL ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'clotya_shop_banner_button_url',
				'label' => esc_attr__( 'Set URL', 'clotya-core' ),
				'description' => esc_attr__( 'Set an url for the button', 'clotya-core' ),
				'section' => 'clotya_shop_banner_section',
				'default' => '#',
			)
		);
		

		/*====== Banner Repeater For each category ======*/
		add_action( 'init', function() {
			new \Kirki\Field\Repeater(
				array(
					'settings' => 'clotya_shop_banner_each_category',
					'label' => esc_attr__( 'Banner For Categories', 'clotya-core' ),
					'description' => esc_attr__( 'You can set banner for each category.', 'clotya-core' ),
					'section' => 'clotya_shop_banner_section',
					'fields' => array(
						
						'category_id' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'Select Category', 'clotya-core' ),
							'description' => esc_html__( 'Set a category', 'clotya-core' ),
							'priority'    => 10,
							'choices'     => Kirki_Helper::get_terms( array('taxonomy' => 'product_cat') )
						),
						
						'category_image' =>  array(
							'type' => 'image',
							'label' => esc_attr__( 'Image', 'clotya-core' ),
							'description' => esc_attr__( 'You can upload an image.', 'clotya-core' ),
						),
						
						'category_title' => array(
							'type' => 'text',
							'label' => esc_attr__( 'Set Title', 'clotya-core' ),
							'description' => esc_attr__( 'You can set a title.', 'clotya-core' ),
						),
						
						'category_subtitle' => array(
							'type' => 'text',
							'label' => esc_attr__( 'Set Subtitle', 'clotya-core' ),
							'description' => esc_attr__( 'You can set a subtitle.', 'clotya-core' ),
						),
						
						'category_button_url' => array(
							'type' => 'text',
							'label' => esc_attr__( 'Set URL', 'clotya-core' ),
							'description' => esc_attr__( 'Set an url for the button', 'clotya-core' ),
						),
					),
				)
			);
		} );
		
		/*====== Shop Banner Title Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_shop_banner_title_color',
				'label' => esc_attr__( 'Shop Banner Title Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'clotya-core' ),
				'section' => 'clotya_shop_banner_section',
			)
		);
		
		/*====== Shop Banner Subtitle Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_shop_banner_subtitle_color',
				'label' => esc_attr__( 'Shop Banner Subtitle Title Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'clotya-core' ),
				'section' => 'clotya_shop_banner_section',
			)
		);

		/*====== My Account Layouts ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'radio-buttonset',
				'settings' => 'clotya_my_account_layout',
				'label' => esc_attr__( 'Layout', 'clotya-core' ),
				'description' => esc_attr__( 'You can choose a layout for the login form.', 'clotya-core' ),
				'section' => 'clotya_my_account_section',
				'default' => 'default',
				'choices' => array(
					'default' => esc_attr__( 'Default', 'clotya-core' ),
					'logintab' => esc_attr__( 'Login Tab', 'clotya-core' ),
				),
			)
		);

		/*====== Registration Form First Name ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'clotya_registration_first_name',
				'label' => esc_attr__( 'Register - First Name', 'clotya-core' ),
				'section' => 'clotya_my_account_section',
				'default' => 'hidden',
				'choices' => array(
					'hidden' => esc_attr__( 'Hidden', 'clotya-core' ),
					'visible' => esc_attr__( 'Visible', 'clotya-core' ),
				),
			)
		);
		
		/*====== Registration Form Last Name ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'clotya_registration_last_name',
				'label' => esc_attr__( 'Register - Last Name', 'clotya-core' ),
				'section' => 'clotya_my_account_section',
				'default' => 'hidden',
				'choices' => array(
					'hidden' => esc_attr__( 'Hidden', 'clotya-core' ),
					'visible' => esc_attr__( 'Visible', 'clotya-core' ),
				),
			)
		);
		
		/*====== Registration Form Billing Company ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'clotya_registration_billing_company',
				'label' => esc_attr__( 'Register - Billing Company', 'clotya-core' ),
				'section' => 'clotya_my_account_section',
				'default' => 'hidden',
				'choices' => array(
					'hidden' => esc_attr__( 'Hidden', 'clotya-core' ),
					'visible' => esc_attr__( 'Visible', 'clotya-core' ),
				),
			)
		);
		
		/*====== Registration Form Billing Phone ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'clotya_registration_billing_phone',
				'label' => esc_attr__( 'Register - Billing Phone', 'clotya-core' ),
				'section' => 'clotya_my_account_section',
				'default' => 'hidden',
				'choices' => array(
					'hidden' => esc_attr__( 'Hidden', 'clotya-core' ),
					'visible' => esc_attr__( 'Visible', 'clotya-core' ),
				),
			)
		);

		/*====== Ajax Login-Register ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_ajax_login_form',
				'label' => esc_attr__( 'Activate Ajax for Login Form', 'clotya-core' ),
				'section' => 'clotya_my_account_section',
				'default' => '0',
			)
		);
		
	/*====== Free Shipping Settings =======================================================*/
	
		/*====== Free Shipping ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_free_shipping',
				'label' => esc_attr__( 'Free shipping bar', 'clotya-core' ),
				'section' => 'clotya_free_shipping_bar_section',
				'default' => '0',
			)
		);
		
		/*====== Free Shipping Goal Amount ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'shipping_progress_bar_amount',
				'label' => esc_attr__( 'Goal Amount', 'clotya-core' ),
				'description' => esc_attr__( 'Amount to reach 100% defined in your currency absolute value. For example: 300', 'clotya-core' ),
				'section' => 'clotya_free_shipping_bar_section',
				'default' => '100',
				'required' => array(
					array(
					  'setting'  => 'clotya_free_shipping',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Free Shipping Location Cart Page ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'shipping_progress_bar_location_card_page',
				'label' => esc_attr__( 'Cart page', 'clotya-core' ),
				'section' => 'clotya_free_shipping_bar_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'clotya_free_shipping',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Free Shipping Location Mini cart ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'shipping_progress_bar_location_mini_cart',
				'label' => esc_attr__( 'Mini cart', 'clotya-core' ),
				'section' => 'clotya_free_shipping_bar_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'clotya_free_shipping',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Free Shipping Location Checkout page ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'shipping_progress_bar_location_checkout',
				'label' => esc_attr__( 'Checkout page', 'clotya-core' ),
				'section' => 'clotya_free_shipping_bar_section',
				'default' => '0',
				'required' => array(
					array(
					  'setting'  => 'clotya_free_shipping',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Free Shipping Message Initial ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'shipping_progress_bar_message_initial',
				'label' => esc_attr__( 'Initial Message', 'clotya-core' ),
				'description' => esc_attr__( 'Message to show before reaching the goal. Use shortcode [remainder] to display the amount left to reach the minimum.', 'clotya-core' ),
				'section' => 'clotya_free_shipping_bar_section',
				'default' => 'Add [remainder] to cart and get free shipping!',
				'required' => array(
					array(
					  'setting'  => 'clotya_free_shipping',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Free Shipping Message Success ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'shipping_progress_bar_message_success',
				'label' => esc_attr__( 'Success message', 'clotya-core' ),
				'description' => esc_attr__( 'Message to show after reaching 100%.', 'clotya-core' ),
				'section' => 'clotya_free_shipping_bar_section',
				'default' => 'Your order qualifies for free shipping!',
				'required' => array(
					array(
					  'setting'  => 'clotya_free_shipping',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
	
	
	/*====== Shop Single Style Settings =======================================================*/
		
		/*====== Shop Single Background Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'clotya_shop_single_bg_color',
				'label' => esc_attr__( 'Shop Single Background Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'clotya-core' ),
				'section' => 'clotya_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Image Border Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_shop_single_image_border_color',
				'label' => esc_attr__( 'Shop Single Image Border Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'clotya-core' ),
				'section' => 'clotya_shop_single_style_section',
			)
		);	
		
		/*====== Shop Single Title Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_shop_single_title_color',
				'label' => esc_attr__( 'Shop Single Title Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'clotya-core' ),
				'section' => 'clotya_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Stock Background Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#f1fbef',
				'settings' => 'clotya_shop_single_stock_bg_color',
				'label' => esc_attr__( 'Shop Single Stock Background Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'clotya-core' ),
				'section' => 'clotya_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Stock Text Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#47b486',
				'settings' => 'clotya_shop_single_stock_text_color',
				'label' => esc_attr__( 'Shop Single Stock Text Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'clotya-core' ),
				'section' => 'clotya_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Out Of Stock Background Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fbefef',
				'settings' => 'clotya_shop_single_out_of_stock_bg_color',
				'label' => esc_attr__( 'Shop Single Out Of Stock Background Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'clotya-core' ),
				'section' => 'clotya_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Out Of Stock Text Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#f4344f',
				'settings' => 'clotya_shop_single_out_of_stock_text_color',
				'label' => esc_attr__( 'Shop Single Out Of Stock Text Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'clotya-core' ),
				'section' => 'clotya_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Regular Price Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_shop_single_regular_price_color',
				'label' => esc_attr__( 'Shop Single Regular Price Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'clotya-core' ),
				'section' => 'clotya_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Sale Price Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_shop_single_sale_price_color',
				'label' => esc_attr__( 'Shop Single Sale Price Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'clotya-core' ),
				'section' => 'clotya_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Description Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_shop_single_desc_color',
				'label' => esc_attr__( 'Shop Single Description Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'clotya-core' ),
				'section' => 'clotya_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Button Background Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_shop_single_button_bg_color',
				'label' => esc_attr__( 'Shop Single Button Background Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'clotya-core' ),
				'section' => 'clotya_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Button Background Hover Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#8f8f8f',
				'settings' => 'clotya_shop_single_button_bg_hvrcolor',
				'label' => esc_attr__( 'Shop Single Button Background Hover Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'clotya-core' ),
				'section' => 'clotya_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Button Border Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_shop_single_button_border_color',
				'label' => esc_attr__( 'Shop Single Button border Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for border.', 'clotya-core' ),
				'section' => 'clotya_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Button Border Hover Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#8f8f8f',
				'settings' => 'clotya_shop_single_button_border_hvrcolor',
				'label' => esc_attr__( 'Shop Single Button border Hover Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for border.', 'clotya-core' ),
				'section' => 'clotya_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Button Text Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'clotya_shop_single_button_text_color',
				'label' => esc_attr__( 'Shop Single Button Text Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'clotya-core' ),
				'section' => 'clotya_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Button Text Hover Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'clotya_shop_single_button_text_hvrcolor',
				'label' => esc_attr__( 'Shop Single Button Text Hover Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'clotya-core' ),
				'section' => 'clotya_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Extra Title Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_shop_single_extra_title_color',
				'label' => esc_attr__( 'Shop Single Extra Title Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'clotya-core' ),
				'section' => 'clotya_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Extra Icon Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_shop_single_extra_title_icon_color',
				'label' => esc_attr__( 'Shop Single Extra Icon Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'clotya-core' ),
				'section' => 'clotya_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Meta Title Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_shop_single_meta_title_color',
				'label' => esc_attr__( 'Shop Single Meta Title Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'clotya-core' ),
				'section' => 'clotya_shop_single_style_section',
			)
		);
		
		/*====== Shop Single Meta Subtitle Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_shop_single_meta_subtitle_color',
				'label' => esc_attr__( 'Shop Single Meta Subtitle Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'clotya-core' ),
				'section' => 'clotya_shop_single_style_section',
			)
		);
	
	/*====== Mini Cart Style Settings =======================================================*/
		
		/*====== View cart Button Background Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#aeb9be',
				'settings' => 'clotya_mini_cart_view_cart_button_bg_color',
				'label' => esc_attr__( 'View cart Button Background Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'clotya-core' ),
				'section' => 'clotya_mini_cart_style_section',
				'choices'     => [
					'alpha' => true,
				],
			)
		);
		
		/*====== View cart Button Background Hover Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#aeb9be',
				'settings' => 'clotya_mini_cart_view_cart_button_bg_hvrcolor',
				'label' => esc_attr__( 'View cart Button Background Hover Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'clotya-core' ),
				'section' => 'clotya_mini_cart_style_section',
				'choices'     => [
					'alpha' => true,
				],
			)
		);
		
		/*====== View cart Button Text Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#FFF',
				'settings' => 'clotya_mini_cart_view_cart_button_text_color',
				'label' => esc_attr__( 'View cart Button Text Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'clotya-core' ),
				'section' => 'clotya_mini_cart_style_section',
				'choices'     => [
					'alpha' => true,
				],
			)
		);
		
		/*====== View cart Button Text Hover Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#FFF',
				'settings' => 'clotya_mini_cart_view_cart_button_text_hvrcolor',
				'label' => esc_attr__( 'View cart Button Text Hover Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'clotya-core' ),
				'section' => 'clotya_mini_cart_style_section',
				'choices'     => [
					'alpha' => true,
				],
			)
		);	
		
		/*====== Checkout Button Background Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ef262c',
				'settings' => 'clotya_mini_cart_checkout_button_bg_color',
				'label' => esc_attr__( 'Checkout Button Background Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'clotya-core' ),
				'section' => 'clotya_mini_cart_style_section',
				'choices'     => [
					'alpha' => true,
				],
			)
		);
		
		/*====== Checkout Button Background Hover Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ef262c',
				'settings' => 'clotya_mini_cart_checkout_button_bg_hvrcolor',
				'label' => esc_attr__( 'Checkout Button Background Hover Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'clotya-core' ),
				'section' => 'clotya_mini_cart_style_section',
				'choices'     => [
					'alpha' => true,
				],
			)
		);
		
		/*====== Checkout Button Text Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'clotya_mini_cart_checkout_button_text_color',
				'label' => esc_attr__( 'Checkout Button Text Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'clotya-core' ),
				'section' => 'clotya_mini_cart_style_section',
				'choices'     => [
					'alpha' => true,
				],
			)
		);
		
		/*====== Checkout Button Text Hover Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'clotya_mini_cart_checkout_button_text_hvrcolor',
				'label' => esc_attr__( 'Checkout Button Text Hover Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'clotya-core' ),
				'section' => 'clotya_mini_cart_style_section',
				'choices'     => [
					'alpha' => true,
				],
			)
		);

	/*====== Blog Settings =======================================================*/
		/*====== Layouts ======*/
		
		clotya_customizer_add_field (
			array(
				'type' => 'radio-buttonset',
				'settings' => 'clotya_blog_layout',
				'label' => esc_attr__( 'Layout', 'clotya-core' ),
				'description' => esc_attr__( 'You can choose a layout.', 'clotya-core' ),
				'section' => 'clotya_blog_settings_section',
				'default' => 'right-sidebar',
				'choices' => array(
					'left-sidebar' => esc_attr__( 'Left Sidebar', 'clotya-core' ),
					'full-width' => esc_attr__( 'Full Width', 'clotya-core' ),
					'right-sidebar' => esc_attr__( 'Right Sidebar', 'clotya-core' ),
					'grid' => esc_attr__( 'Grid', 'clotya-core' ),
				),
			)
		);
		
		/*====== Blog Column ======*/
		clotya_customizer_add_field(
			array (
				'type'        => 'radio-buttonset',
				'settings'    => 'clotya_blog_grid_layout_column',
				'label'       => esc_html__( 'Blog Column', 'clotya-core' ),
				'section'     => 'clotya_blog_settings_section',
				'default'     => '2',
				'choices'     => array(
					'3' => esc_attr__( '3', 'clotya-core' ),
					'2' => esc_attr__( '2', 'clotya-core' ),
				),
				'required' => array(
					array(
					  'setting'  => 'clotya_blog_layout',
					  'operator' => '==',
					  'value'    => 'grid',
					),
				),
			) 
		);
		
		/*====== Main color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#ee403d',
				'settings' => 'clotya_main_color',
				'label' => esc_attr__( 'Main Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can customize the main color.', 'clotya-core' ),
				'section' => 'clotya_main_color_section',
			)
		);

		/*====== Color Danger ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#f4344f',
				'settings' => 'clotya_color_danger',
				'label' => esc_attr__( 'Color Danger', 'clotya-core' ),
				'description' => esc_attr__( 'You can customize the color danger.', 'clotya-core' ),
				'section' => 'clotya_main_color_section',
			)
		);
		
		/*====== Color Success======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#47b486',
				'settings' => 'clotya_color_success',
				'label' => esc_attr__( 'Color Success', 'clotya-core' ),
				'description' => esc_attr__( 'You can customize the color success.', 'clotya-core' ),
				'section' => 'clotya_main_color_section',
			)
		);
		
		/*====== Color Success Dark======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#287c58',
				'settings' => 'clotya_color_success_dark',
				'label' => esc_attr__( 'Color Success Dark', 'clotya-core' ),
				'description' => esc_attr__( 'You can customize the color success dark.', 'clotya-core' ),
				'section' => 'clotya_main_color_section',
			)
		);
		
		/*====== Color Success Light======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#c9e3d8',
				'settings' => 'clotya_color_success_light',
				'label' => esc_attr__( 'Color Success Light', 'clotya-core' ),
				'description' => esc_attr__( 'You can customize the color success light.', 'clotya-core' ),
				'section' => 'clotya_main_color_section',
			)
		);
		
		/*====== Color Warning======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#f5af28',
				'settings' => 'clotya_color_warning',
				'label' => esc_attr__( 'Color Warning', 'clotya-core' ),
				'description' => esc_attr__( 'You can customize the color warning.', 'clotya-core' ),
				'section' => 'clotya_main_color_section',
			)
		);
		
		/*====== Color Warning Light======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#f4e3d1',
				'settings' => 'clotya_color_warning_light',
				'label' => esc_attr__( 'Color Warning Light', 'clotya-core' ),
				'description' => esc_attr__( 'You can customize the color warning light.', 'clotya-core' ),
				'section' => 'clotya_main_color_section',
			)
		);

	/*====== Elementor Templates =======================================================*/
		/*====== Before Shop Elementor Templates ======*/
		clotya_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'clotya_before_main_shop_elementor_template',
				'label'       => esc_html__( 'Before Shop Elementor Template', 'clotya' ),
				'section'     => 'clotya_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates ', 'clotya' ),
				'choices'     => clotya_get_elementorTemplates('section'),
				
			)
		);
		
		/*====== After Shop Elementor Templates ======*/
		clotya_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'clotya_after_main_shop_elementor_template',
				'label'       => esc_html__( 'After Shop Elementor Template', 'clotya' ),
				'section'     => 'clotya_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates ', 'clotya' ),
				'choices'     => clotya_get_elementorTemplates('section'),
				
			)
		);
		
		/*====== Before Header Elementor Templates ======*/
		clotya_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'clotya_before_main_header_elementor_template',
				'label'       => esc_html__( 'Before Header Elementor Template', 'clotya' ),
				'section'     => 'clotya_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates, If you want to show any content before products ', 'clotya' ),
				'choices'     => clotya_get_elementorTemplates('section'),
				
			)
		);
	
		/*====== After Header Elementor Templates ======*/
		clotya_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'clotya_after_main_header_elementor_template',
				'label'       => esc_html__( 'After Header Elementor Template', 'clotya' ),
				'section'     => 'clotya_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates ', 'clotya' ),
				'choices'     => clotya_get_elementorTemplates('section'),
				
			)
		);
		
		/*====== Before Footer Elementor Template ======*/
		clotya_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'clotya_before_main_footer_elementor_template',
				'label'       => esc_html__( 'Before Footer Elementor Template', 'clotya' ),
				'section'     => 'clotya_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates, If you want to show any content before products ', 'clotya' ),
				'choices'     => clotya_get_elementorTemplates('section'),
				
			)
		);
		
		/*====== After Footer Elementor  Template ======*/
		clotya_customizer_add_field (
			array(
				'type'        => 'select',
				'settings'    => 'clotya_after_main_footer_elementor_template',
				'label'       => esc_html__( 'After Footer Elementor Templates', 'clotya' ),
				'section'     => 'clotya_elementor_templates_section',
				'default'     => '',
				'placeholder' => esc_html__( 'Select a template from elementor templates, If you want to show any content before products ', 'clotya' ),
				'choices'     => clotya_get_elementorTemplates('section'),
				
			)
		);

		/*====== Templates Repeater For each category ======*/
		add_action( 'init', function() {
			new \Kirki\Field\Repeater(
				array(
					'settings' => 'clotya_elementor_template_each_shop_category',
					'label' => esc_attr__( 'Template For Categories', 'clotya-core' ),
					'description' => esc_attr__( 'You can set template for each category.', 'clotya-core' ),
					'section' => 'clotya_elementor_templates_section',
					'fields' => array(
						
						'category_id' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'Select Category', 'clotya-core' ),
							'description' => esc_html__( 'Set a category', 'clotya-core' ),
							'priority'    => 10,
							'default'     => '',
							'choices'     => Kirki_Helper::get_terms( array('taxonomy' => 'product_cat') )
						),
						
						'clotya_before_main_shop_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'Before Shop Elementor Template', 'clotya-core' ),
							'choices'     => clotya_get_elementorTemplates('section'),
							'default'     => '',
							'placeholder' => esc_html__( 'Select a template from elementor templates, If you want to show any content before products ', 'clotya-core' ),
						),
						
						'clotya_after_main_shop_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'After Shop Elementor Template', 'clotya-core' ),
							'choices'     => clotya_get_elementorTemplates('section'),
						),
						
						'clotya_before_main_header_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'Before Header Elementor Template', 'clotya-core' ),
							'choices'     => clotya_get_elementorTemplates('section'),
						),
						
						'clotya_after_main_header_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'After Header Elementor Template', 'clotya-core' ),
							'choices'     => clotya_get_elementorTemplates('section'),
						),
						
						'clotya_before_main_footer_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'Before Footer Elementor Template', 'clotya-core' ),
							'choices'     => clotya_get_elementorTemplates('section'),
						),
						
						'clotya_after_main_footer_elementor_template_category' => array(
							'type'        => 'select',
							'label'       => esc_html__( 'After Footer Elementor Template', 'clotya-core' ),
							'choices'     => clotya_get_elementorTemplates('section'),
						),
						

					),
				)
			);
		} );


		/*====== Map Settings ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'clotya_mapapi',
				'label' => esc_attr__( 'Google Map Api key', 'clotya-core' ),
				'description' => esc_attr__( 'Add your google map api key', 'clotya-core' ),
				'section' => 'clotya_map_settings_section',
				'default' => '',
			)
		);
		
	/*====== Footer ======*/
		/*====== Footer Panels ======*/
		Kirki::add_panel (
			'clotya_footer_panel',
			array(
				'title' => esc_html__( 'Footer Settings', 'clotya-core' ),
				'description' => esc_html__( 'You can customize the footer from this panel.', 'clotya-core' ),
			)
		);

		$sections = array (
			'footer_subscribe' => array(
				esc_attr__( 'Subscribe', 'clotya-core' ),
				esc_attr__( 'You can customize the subscribe area.', 'clotya-core' )
			),
			
			'footer_general' => array(
				esc_attr__( 'Footer General', 'clotya-core' ),
				esc_attr__( 'You can customize the footer settings.', 'clotya-core' )
			),
			
			'footer_style' => array(
				esc_attr__( 'Footer Style', 'clotya' ),
				esc_attr__( 'You can customize the footer settings.', 'clotya-core' )
			),
			
		);

		foreach ( $sections as $section_id => $section ) {
			$section_args = array(
				'title' => $section[0],
				'description' => $section[1],
				'panel' => 'clotya_footer_panel',
			);

			if ( isset( $section[2] ) ) {
				$section_args['type'] = $section[2];
			}

			Kirki::add_section( 'clotya_' . str_replace( '-', '_', $section_id ) . '_section', $section_args );
		}

		
		/*====== Subcribe Toggle ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_footer_subscribe_area',
				'label' => esc_attr__( 'Subcribe', 'clotya-core' ),
				'description' => esc_attr__( 'Disable or Enable subscribe section.', 'clotya-core' ),
				'section' => 'clotya_footer_subscribe_section',
				'default' => '0',
			)
		);
		
		/*====== Subcribe FORM ID======*/
		clotya_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'clotya_footer_subscribe_formid',
				'label' => esc_attr__( 'Subscribe Form Id.', 'clotya-core' ),
				'description' => esc_attr__( 'You can find the form id in Dashboard > Mailchimp For Wp > Form.', 'clotya-core' ),
				'section' => 'clotya_footer_subscribe_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'clotya_footer_subscribe_area',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Subscribe Title ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'clotya_footer_subscribe_title',
				'label' => esc_attr__( 'Title', 'clotya-core' ),
				'description' => esc_attr__( 'You can set text for subscribe section.', 'clotya-core' ),
				'section' => 'clotya_footer_subscribe_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'clotya_footer_subscribe_area',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Subscribe Subtitle ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'clotya_footer_subscribe_subtitle',
				'label' => esc_attr__( 'Subtitle', 'clotya-core' ),
				'description' => esc_attr__( 'You can set text for subscribe section.', 'clotya-core' ),
				'section' => 'clotya_footer_subscribe_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'clotya_footer_subscribe_area',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Subscribe Contact Title ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'clotya_footer_contact_title',
				'label' => esc_attr__( 'Contact Title', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a title for the contact section.', 'clotya-core' ),
				'section' => 'clotya_footer_subscribe_section',
				'default' => '',
			)
		);
		
		/*====== Subscribe Contact Subtitle ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'clotya_footer_contact_subtitle',
				'label' => esc_attr__( 'Contact Subtitle', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a subtitle for the contact section.', 'clotya-core' ),
				'section' => 'clotya_footer_subscribe_section',
				'default' => '',
			)
		);

		/*====== Subscribe APP Image ======*/
		new \Kirki\Field\Repeater(
			array(
				'settings' => 'clotya_footer_subscribe_app_image',
				'label' => esc_attr__( 'Contact Images', 'clotya-core' ),
				'description' => esc_attr__( 'You can upload an image.', 'clotya-core' ),
				'section' => 'clotya_footer_subscribe_section',
				'fields' => array(
					'app_image' => array(
						'type' => 'image',
						'label' => esc_attr__( 'Image', 'clotya-core' ),
						'description' => esc_attr__( 'You can upload an image.', 'clotya-core' ),
					),
					
					'app_url' => array(
						'type' => 'text',
						'label' => esc_attr__( 'URL', 'clotya-core' ),
						'description' => esc_attr__( 'set an url for the image.', 'clotya-core' ),
					),
				),
			)
		);
		
		/*====== Subscribe Contact Description ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'clotya_footer_contact_desc',
				'label' => esc_attr__( 'Contact Description', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a description for the contact section.', 'clotya-core' ),
				'section' => 'clotya_footer_subscribe_section',
				'default' => '',
			)
		);
		
		/*====== Subscribe Background Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_subscribe_bg_color',
				'label' => esc_attr__( 'Subscribe Background Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'clotya-core' ),
				'section' => 'clotya_footer_subscribe_section',
			)
		);
		
		/*====== Subscribe Title Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'clotya_subscribe_title_color',
				'label' => esc_attr__( 'Subscribe Title Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'clotya-core' ),
				'section' => 'clotya_footer_subscribe_section',
			)
		);
		
		/*====== Subscribe Subtitle Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'clotya_subscribe_subtitle_color',
				'label' => esc_attr__( 'Subscribe Subtitle Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'clotya-core' ),
				'section' => 'clotya_footer_subscribe_section',
			)
		);
		
		/*====== Subscribe Contact Title Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'clotya_subscribe_contact_title_color',
				'label' => esc_attr__( 'Subscribe Contact Title Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'clotya-core' ),
				'section' => 'clotya_footer_subscribe_section',
			)
		);
		
		/*====== Subscribe Contact Subtitle Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'clotya_subscribe_contact_subtitle_color',
				'label' => esc_attr__( 'Subscribe Contact Subtitle Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'clotya-core' ),
				'section' => 'clotya_footer_subscribe_section',
			)
		);
		
		/*====== Subscribe Contact Description Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#75767c',
				'settings' => 'clotya_subscribe_contact_desc_color',
				'label' => esc_attr__( 'Subscribe Contact Description Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'clotya-core' ),
				'section' => 'clotya_footer_subscribe_section',
			)
		);
		
		/*====== Copyright ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'clotya_copyright',
				'label' => esc_attr__( 'Copyright', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a copyright text for the footer.', 'clotya-core' ),
				'section' => 'clotya_footer_general_section',
				'default' => '',
			)
		);
		
		/*====== Back to top  ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_scroll_to_top',
				'label' => esc_attr__( 'Back To Top Button', 'clotya-core' ),
				'section' => 'clotya_footer_general_section',
				'default' => '0',
			)
		);
		
		/*====== Subscribe Image ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'clotya_footer_payment_image',
				'label' => esc_attr__( 'Image', 'clotya-core' ),
				'description' => esc_attr__( 'You can upload an image.', 'clotya-core' ),
				'section' => 'clotya_footer_general_section',
				'choices' => array(
					'save_as' => 'id',
				),
			)
		);

		/*====== Payment Image URL ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'clotya_footer_payment_image_url',
				'label' => esc_attr__( 'Set Payment URL', 'clotya-core' ),
				'description' => esc_attr__( 'Set an url for the payment image', 'clotya-core' ),
				'section' => 'clotya_footer_general_section',
				'default' => '#',
			)
		);

		/*====== Footer Column ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'select',
				'settings' => 'clotya_footer_column',
				'label' => esc_attr__( 'Footer Column', 'clotya-core' ),
				'description' => esc_attr__( 'You can set footer column.', 'clotya-core' ),
				'section' => 'clotya_footer_general_section',
				'default' => '5columns',
				'choices' => array(
					'5columns' => esc_attr__( '5 Columns', 'clotya-core' ),
					'4columns' => esc_attr__( '4 Columns', 'clotya-core' ),
					'3columns' => esc_attr__( '3 Columns', 'clotya-core' ),
					'2columns' => esc_attr__( '2 Columns', 'clotya-core' ),
					'1column'  => esc_attr__( '1 Column', 'clotya-core' ),
				),
			)
		);
		
		/*======Footer Menu Toggle ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_footer_menu',
				'label' => esc_attr__( 'Footer Menu', 'clotya-core' ),
				'description' => esc_attr__( 'You can choose status of the footer menu on the footer.', 'clotya-core' ),
				'section' => 'clotya_footer_general_section',
				'default' => '0',
			)
		);
		
		
	/*====== Footer Style =============================*/	
		
		/*====== Footer Top Background Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'clotya_footer_top_bg_color',
				'label' => esc_attr__( 'Footer Top Background Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'clotya-core' ),
				'section' => 'clotya_footer_style_section',
			)
		);

		/*====== Footer Title Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_footer_title_color',
				'label' => esc_attr__( 'Footer Title Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'clotya-core' ),
				'section' => 'clotya_footer_style_section',
			)
		);
		
		/*====== Footer Subtitle Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_footer_subtitle_color',
				'label' => esc_attr__( 'Footer Subtitle Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'clotya-core' ),
				'section' => 'clotya_footer_style_section',
			)
		);
		
		/*====== Footer Border Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#dee0ea',
				'settings' => 'clotya_footer_border_color',
				'label' => esc_attr__( 'Footer Border Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for border.', 'clotya-core' ),
				'section' => 'clotya_footer_style_section',
			)
		);
		
		/*====== Footer Bottom Background Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#fff',
				'settings' => 'clotya_footer_bottom_bg_color',
				'label' => esc_attr__( 'Footer Bottom Background Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for background.', 'clotya-core' ),
				'section' => 'clotya_footer_style_section',
			)
		);
		
		/*====== Footer Copyright Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_footer_copyright_color',
				'label' => esc_attr__( 'Footer Copyright Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'clotya-core' ),
				'section' => 'clotya_footer_style_section',
			)
		);
		
		/*====== Footer Bottom Menu Color ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'color',
				'default' => '#000',
				'settings' => 'clotya_footer_bottom_menu_color',
				'label' => esc_attr__( 'Footer Menu Color', 'clotya-core' ),
				'description' => esc_attr__( 'You can set a color for color.', 'clotya-core' ),
				'section' => 'clotya_footer_style_section',
			)
		);	

		/*====== GDPR Toggle ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_gdpr_toggle',
				'label' => esc_attr__( 'Enable GDPR', 'clotya-core' ),
				'description' => esc_attr__( 'You can choose status of GDPR.', 'clotya-core' ),
				'section' => 'clotya_gdpr_settings_section',
				'default' => '0',
			)
		);

		/*====== GDPR Image======*/
		clotya_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'clotya_gdpr_image',
				'label' => esc_attr__( 'Image', 'clotya-core' ),
				'description' => esc_attr__( 'You can upload an image.', 'clotya-core' ),
				'section' => 'clotya_gdpr_settings_section',
				'choices' => array(
					'save_as' => 'id',
				),
				'required' => array(
					array(
					  'setting'  => 'clotya_gdpr_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== GDPR Text ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'clotya_gdpr_text',
				'label' => esc_attr__( 'GDPR Text', 'clotya-core' ),
				'section' => 'clotya_gdpr_settings_section',
				'default' => 'In order to provide you a personalized shopping experience, our site uses cookies. <br><a href="#">cookie policy</a>.',
				'required' => array(
					array(
					  'setting'  => 'clotya_gdpr_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== GDPR Expire Date ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'clotya_gdpr_expire_date',
				'label' => esc_attr__( 'GDPR Expire Date', 'clotya-core' ),
				'section' => 'clotya_gdpr_settings_section',
				'default' => '15',
				'required' => array(
					array(
					  'setting'  => 'clotya_gdpr_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== GDPR Button Text ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'clotya_gdpr_button_text',
				'label' => esc_attr__( 'GDPR Button Text', 'clotya-core' ),
				'section' => 'clotya_gdpr_settings_section',
				'default' => 'Accept Cookies',
				'required' => array(
					array(
					  'setting'  => 'clotya_gdpr_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);

		/*====== Newsletter Toggle ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_newsletter_popup_toggle',
				'label' => esc_attr__( 'Enable Newsletter', 'clotya-core' ),
				'description' => esc_attr__( 'You can choose status of Newsletter Popup.', 'clotya-core' ),
				'section' => 'clotya_newsletter_settings_section',
				'default' => '0',
			)
		);
		
		
		/*====== Newsletter Title ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'clotya_newsletter_popup_title',
				'label' => esc_attr__( 'Newsletter Title', 'clotya-core' ),
				'section' => 'clotya_newsletter_settings_section',
				'default' => 'Subscribe To Newsletter',
				'required' => array(
					array(
					  'setting'  => 'clotya_newsletter_popup_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Newsletter Subtitle ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'clotya_newsletter_popup_subtitle',
				'label' => esc_attr__( 'Newsletter Subtitle', 'clotya-core' ),
				'section' => 'clotya_newsletter_settings_section',
				'default' => 'Subscribe to the Clotya mailing list to receive updates on new arrivals, special offers and our promotions.',
				'required' => array(
					array(
					  'setting'  => 'clotya_newsletter_popup_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Subcribe Popup FORM ID======*/
		clotya_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'clotya_newsletter_popup_formid',
				'label' => esc_attr__( 'Newsletter Form Id.', 'clotya-core' ),
				'description' => esc_attr__( 'You can find the form id in Dashboard > Mailchimp For Wp > Form.', 'clotya-core' ),
				'section' => 'clotya_newsletter_settings_section',
				'default' => '',
				'required' => array(
					array(
					  'setting'  => 'clotya_newsletter_popup_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
		/*====== Subcribe Popup Expire Date ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'clotya_newsletter_popup_expire_date',
				'label' => esc_attr__( 'Newsletter Expire Date', 'clotya-core' ),
				'section' => 'clotya_newsletter_settings_section',
				'default' => '15',
				'required' => array(
					array(
					  'setting'  => 'clotya_newsletter_popup_toggle',
					  'operator' => '==',
					  'value'    => '1',
					),
				),
			)
		);
		
	/*====== Maintenance Toggle ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'toggle',
				'settings' => 'clotya_maintenance_toggle',
				'label' => esc_attr__( 'Enable Maintenance Mode', 'clotya-core' ),
				'description' => esc_attr__( 'You can choose status of Maintenance.', 'clotya-core' ),
				'section' => 'clotya_maintenance_settings_section',
				'default' => '0',
			)
		);
		
		/*====== Maintenance Title ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'clotya_maintenance_title',
				'label' => esc_attr__( 'Title', 'clotya-core' ),
				'section' => 'clotya_maintenance_settings_section',
				'default' => 'Coming',
				'active_callback' => [
					[
					  'setting'  => 'clotya_maintenance_toggle',
					  'operator' => '==',
					  'value'    => '1',
					]
				],
			)
		);

		/*====== Maintenance Second Title ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'clotya_maintenance_second_title',
				'label' => esc_attr__( 'Second Title', 'clotya-core' ),
				'section' => 'clotya_maintenance_settings_section',
				'default' => 'Soon',
				'active_callback' => [
					[
					  'setting'  => 'clotya_maintenance_toggle',
					  'operator' => '==',
					  'value'    => '1',
					]
				],
			)
		);
		
		/*====== Maintenance Subtitle ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'textarea',
				'settings' => 'clotya_maintenance_subtitle',
				'label' => esc_attr__( 'Subtitle', 'clotya-core' ),
				'section' => 'clotya_maintenance_settings_section',
				'default' => 'Get ready! Something really cool is coming!',
				'active_callback' => [
					[
					  'setting'  => 'clotya_maintenance_toggle',
					  'operator' => '==',
					  'value'    => '1',
					]
				],
			)
		);
		
		/*====== Maintenance Mailchimp FORM ID======*/
		clotya_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'clotya_maintenance_mailchimp_formid',
				'label' => esc_attr__( 'Mailchimp Form Id.', 'clotya-core' ),
				'description' => esc_attr__( 'You can find the form id in Dashboard > Mailchimp For Wp > Form.', 'clotya-core' ),
				'section' => 'clotya_maintenance_settings_section',
				'default' => '',
				'active_callback' => [
					[
					  'setting'  => 'clotya_maintenance_toggle',
					  'operator' => '==',
					  'value'    => '1',
					]
				],
			)
		);
		
		/*====== Maintenance Image ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'image',
				'settings' => 'clotya_maintenance_image',
				'label' => esc_attr__( 'Background Image', 'clotya-core' ),
				'description' => esc_attr__( 'You can upload an image.', 'clotya-core' ),
				'section' => 'clotya_maintenance_settings_section',
				'choices' => array(
					'save_as' => 'id',
				),
				'input_attrs' => array( 'class' => 'my_custom_class' ),
				'active_callback' => [
					[
					  'setting'  => 'clotya_maintenance_toggle',
					  'operator' => '==',
					  'value'    => '1',
					]
				],
			)
		);	
	/*====== Other Settings =============================*/	
	
		/*====== 404 Page ======*/
		clotya_customizer_add_field (
			array(
				'type' => 'Dropdown_Pages',
				'settings' => 'clotya_404_page',
				'label' => esc_attr__( 'Select a 404 Page', 'clotya-core' ),
				'description' => esc_attr__( 'Select a page that will be shown as your default 404 error page.', 'clotya-core' ),
				'section' => 'clotya_other_settings_section',
				'default' => '',
				'placeholder' => __( 'Select a page', 'clotya-core' ),
				'choices' => array(
					'default' => esc_attr__( 'Select a Page', 'clotya-core' ),
				),
			)
		);
		
		
	/*====== Typography Settings =============================*/		
		
	/*====== Body Typography ======*/
		clotya_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'clotya_body_typography',
				'label'       => esc_attr__( 'Body Typography', 'clotya-core' ),
				'section'     => 'clotya_typography_settings_section',
				'default'     => [
					'font-family'    => '"Jost", sans-serif',
					'variant'        => 'regular',
					'letter-spacing' => '-0.03px',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'choices' => [
					'fonts' => [
						'google'   => [],
						'families' => [
							'custom' => [
								'text'     => 'Jost Fonts',
								'children' => [
									[ 'id' => '"Jost", sans-serif', 'text' => 'jost' ],
								],
							],
						],
						'variants' => [
							'"Jost", sans-serif'      => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
						],
					],
				],
				
			)
		);

		clotya_customizer_add_field ( array(
			'type'        => 'custom',
			'settings'    => 'klb_separator1',
			'section'     => 'clotya_typography_settings_section',
			'default'     => '<hr>',
		) );

		/*====== Heading Typography h1,h2,h3,h4,h5,h6======*/
		clotya_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'clotya_heading_typography',
				'label'       => esc_attr__( 'Heading Typography', 'clotya-core' ),
				'section'     => 'clotya_typography_settings_section',
				'default'     => [
					'font-family'    => '"Jost", sans-serif',
					'variant'        => 'regular',
					'letter-spacing' => '0',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'choices' => [
					'fonts' => [
						'google'   => [],
						'families' => [
							'custom' => [
								'text'     => 'Jost Fonts',
								'children' => [
									[ 'id' => '"Jost", sans-serif', 'text' => 'jost' ],
								],
							],
						],
						'variants' => [
							'"Jost", sans-serif'      => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
						],
					],
				],
				
			)
		);

		clotya_customizer_add_field ( array(
			'type'        => 'custom',
			'settings'    => 'klb_separator2',
			'section'     => 'clotya_typography_settings_section',
			'default'     => '<hr>',
		) );

		/*====== Main Menu Typography======*/
		clotya_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'clotya_menu_typography',
				'label'       => esc_attr__( 'Menu Typography', 'clotya-core' ),
				'section'     => 'clotya_typography_settings_section',
				'default'     => [
					'font-family'    => '"Jost", sans-serif',
					'variant'        => '500',
					'font-size'      => '15px',
					'letter-spacing' => '-0.03px',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'choices' => [
					'fonts' => [
						'google'   => [],
						'families' => [
							'custom' => [
								'text'     => 'Jost Fonts',
								'children' => [
									[ 'id' => '"Jost", sans-serif', 'text' => 'jost' ],
								],
							],
						],
						'variants' => [
							'"Jost", sans-serif'      => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
						],
					],
				],
				
			)
		);
		
		// Separator
		clotya_customizer_add_field ( array(
			'type'        => 'custom',
			'settings'    => 'klb_separator3',
			'section'     => 'clotya_typography_settings_section',
			'default'     => '<hr>',
		) );
		
		/*====== Price Typography======*/
		clotya_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'clotya_price_typography',
				'label'       => esc_attr__( 'Price Typography', 'clotya-core' ),
				'section'     => 'clotya_typography_settings_section',
				'default'     => [
					'font-family'       => '"Jost", sans-serif',
					'variant'           => '500',
					'font-size'      	=> '15px',
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'choices' => [
					'fonts' => [
						'google'   => [],
						'families' => [
							'custom' => [
								'text'     => 'Jost Fonts',
								'children' => [
									[ 'id' => '"Jost", sans-serif', 'text' => 'jost' ],
								],
							],
						],
						'variants' => [
							'"Jost", sans-serif'      => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
						],
					],
				],
				
			)
		);
		
		// Separator
		clotya_customizer_add_field ( array(
			'type'        => 'custom',
			'settings'    => 'klb_separator4',
			'section'     => 'clotya_typography_settings_section',
			'default'     => '<hr>',
		) );
		
		/*====== Product Name Typography======*/
		clotya_customizer_add_field (
			array(
				'type'        => 'typography',
				'settings' => 'clotya_product_name_typography',
				'label'       => esc_attr__( 'Product Name Typography', 'clotya-core' ),
				'section'     => 'clotya_typography_settings_section',
				'default'     => [
					'font-family'       => '"Jost", sans-serif',
					'variant'           => 'regular',
					'font-size'      	=> '15px',
					'letter-spacing' 	=> '0',	
				],
				'priority'    => 10,
				'transport'   => 'auto',
				'choices' => [
					'fonts' => [
						'google'   => [],
						'families' => [
							'custom' => [
								'text'     => 'Jost Fonts',
								'children' => [
									[ 'id' => '"Jost", sans-serif', 'text' => 'jost' ],
								],
							],
						],
						'variants' => [
							'"Jost", sans-serif'      => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
						],
					],
				],
			)
		);
		
		// Separator
		clotya_customizer_add_field ( array(
			'type'        => 'custom',
			'settings'    => 'klb_separator5',
			'section'     => 'clotya_typography_settings_section',
			'default'     => '<hr>',
		) );
		
		clotya_customizer_add_field (
			array(
				'type' => 'text',
				'settings' => 'clotya_site_width',
				'label' => esc_attr__( 'Site Width', 'clotya-core' ),
				'section' => 'clotya_typography_settings_section',
				'default' => '1290px',
			)
		);	