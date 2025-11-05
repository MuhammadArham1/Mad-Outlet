<?php

function clotya_add_elementor_page_settings_controls( $page ) {

	$page->add_control( 'clotya_elementor_enable_sidebar_collapse',
		[
			'label'          => esc_html__( 'Sidebar Collapse', 'clotya-core' ),
            'type'           => \Elementor\Controls_Manager::SWITCHER,
			'label_on'       => esc_html__( 'Yes', 'clotya' ),
			'label_off'      => esc_html__( 'No', 'clotya' ),
			'return_value'   => 'yes',
			'default'        => 'no',
		]
	);

	$page->add_control( 'clotya_elementor_hide_page_header',
		[
			'label'          => esc_html__( 'Hide Header', 'clotya-core' ),
            'type'           => \Elementor\Controls_Manager::SWITCHER,
			'label_on'       => esc_html__( 'Yes', 'clotya-core' ),
			'label_off'      => esc_html__( 'No', 'clotya-core' ),
			'return_value'   => 'yes',
			'default'        => 'no',
		]
	);
	
	$page->add_control( 'clotya_elementor_page_header_type',
		[
			'label' => esc_html__( 'Header Type', 'clotya-core' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'default' => '',
			'options' => [
				'' => esc_html__( 'Select a type', 'clotya' ),
				'type1' 	  => esc_html__( 'Type 1', 'clotya' ),
				'type2'		  => esc_html__( 'Type 2', 'clotya' ),
				'type3'		  => esc_html__( 'Type 3', 'clotya' ),
				'type4'		  => esc_html__( 'Type 4', 'clotya' ),
				'type5'		  => esc_html__( 'Type 5', 'clotya' ),
			],
		]
	);
	
	$page->add_control( 'clotya_elementor_hide_page_footer',
		[
			'label'          => esc_html__( 'Hide Footer', 'clotya-core' ),
			'type'           => \Elementor\Controls_Manager::SWITCHER,
			'label_on'       => esc_html__( 'Yes', 'clotya-core' ),
			'label_off'      => esc_html__( 'No', 'clotya-core' ),
			'return_value'   => 'yes',
			'default'        => 'no',
		]
	);
	
	$page->add_control( 'clotya_elementor_logo',
		[
			'label'          => esc_html__( 'Set Logo', 'clotya-core' ),
            'type' 			 => \Elementor\Controls_Manager::MEDIA,
		]
	);

	$page->add_control(
		'page_width',
		[
			'label' => __( 'Width', 'clotya-core' ),
			'type' => \Elementor\Controls_Manager::SLIDER,
			'devices' => [ 'desktop' ],
			'size_units' => [ 'px'],
			'range' => [
				'px' => [
					'min' => 1100,
					'max' => 1650,
					'step' => 5,
				],
			],
			'default' => [
				'unit' => 'px',
				'size' => 1290,
			],
			'selectors' => [
				'{{WRAPPER}} .container' => 'max-width: {{SIZE}}{{UNIT}};',
				'{{WRAPPER}} .elementor-section.elementor-section-boxed>.elementor-container' => 'max-width: {{SIZE}}{{UNIT}};',
			],
		]
	);

}

add_action( 'elementor/element/wp-page/document_settings/before_section_end', 'clotya_add_elementor_page_settings_controls' );