<?php

namespace Elementor;

class Clotya_Image_Box_Widget extends Widget_Base {

    public function get_name() {
        return 'clotya-image-box';
    }
    public function get_title() {
        return 'Image Box (K)';
    }
    public function get_icon() {
        return 'eicon-slider-push';
    }
    public function get_categories() {
        return [ 'clotya' ];
    }

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'plugin-name' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$defaultimage = plugins_url( 'images/image-box.jpg', __DIR__ );
		
        $this->add_control( 'image',
            [
                'label' => esc_html__( 'Image', 'clotya' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $defaultimage],
            ]
        );
		
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'clotya' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Visit Our Store',
                'description'=> 'Add a title.',
				'label_block' => true,
            ]
        );
		
		$repeater = new Repeater();
        $repeater->add_control( 'list_text',
            [
                'label' => esc_html__( 'List Text', 'clotya' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Phone (+45) 7199 2516',
                'description'=> 'Add a text for the list.',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'list_items',
            [
                'label' => esc_html__( 'List Items', 'clotya-core' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
						'list_text' => 'Rains HQ, Jens Olsens Vej 13 ,8200 Aarhus N, Denmark',
                    ],
                    [
						'list_text' => 'Email : sayhello@clotyastore.com',
                    ],
                    [
						'list_text' => 'Phone (+45) 7199 2516',
                    ],


                ]
            ]
        );
		
		$this->end_controls_section();
		
		/*****   END CONTROLS SECTION   ******/
		
        /*****   START CONTROLS SECTION   ******/
		
		$this->start_controls_section('clotya_styling',
            [
                'label' => esc_html__( ' Style', 'clotya' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		
		$this->add_responsive_control( 'image_box_alignment',
            [
                'label' => esc_html__( 'Alignment', 'clotya' ),
                'type' => Controls_Manager::CHOOSE,
                'selectors' => ['{{WRAPPER}} .store-inner' => 'text-align: {{VALUE}};'],
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'clotya' ),
                        'icon' => 'eicon-text-align-left'
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'clotya' ),
                        'icon' => 'eicon-text-align-center'
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'clotya' ),
                        'icon' => 'eicon-text-align-right'
                    ]
                ],
                'toggle' => true,
                
            ]
        );
		
		$this->add_control( 'image_heading',
            [
                'label' => esc_html__( 'IMAGE', 'clotya-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'css_filters',
				'selector' => '{{WRAPPER}} .store-image img',
			]
		);
		
		$this->add_control( 'title_heading',
            [
                'label' => esc_html__( 'TITLE', 'clotya-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'title_color',
			[
               'label' => esc_html__( 'Title Color', 'clotya-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-title' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'title_hvrcolor',
			[
               'label' => esc_html__( 'Title Hover Color', 'clotya-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-title:hover' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'title_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'clotya-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .entry-title ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .entry-title',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'clotya-core' ),

                'selector' => '{{WRAPPER}} .entry-title',
				
            ]
        );
		
		$this->add_control( 'list_text_heading',
            [
                'label' => esc_html__( 'LIST TEXT', 'clotya-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'list_text_color',
			[
               'label' => esc_html__( 'List Text Color', 'clotya-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .module-store p' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'list_text_hvrcolor',
			[
               'label' => esc_html__( 'List Text Hover Color', 'clotya-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .module-store p:hover' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'list_text_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'clotya-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .module-store p ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'list_text_shadow',
				'selector' => '{{WRAPPER}} .module-store p',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'list_text_typo',
                'label' => esc_html__( 'Typography', 'clotya-core' ),

                'selector' => '{{WRAPPER}} .module-store p',
				
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$output = '';		
		
		
		echo '<div class="site-module module-store">';
		echo '<div class="store-image"><img src="'.esc_url($settings['image']['url']).'" alt="image"></div>';
		echo '<div class="store-detail">';
		echo '<div class="store-inner">';
		echo '<h3 class="entry-title">'.esc_html($settings['title']).'</h3>';
		if($settings['list_items']){
			foreach($settings['list_items'] as $item){
				echo '<p>'.clotya_sanitize_data($item['list_text']).'</p>';
			}
		}
		echo '</div><!-- store-inner -->';
		echo '</div><!-- store-detail -->';
		echo '</div><!-- site-module -->';




	}

}
