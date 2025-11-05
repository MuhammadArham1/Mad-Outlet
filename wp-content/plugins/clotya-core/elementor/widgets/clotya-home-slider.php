<?php

namespace Elementor;

class Clotya_Home_Slider_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'clotya-home-slider';
    }
    public function get_title() {
        return 'Home Slider (K)';
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
				'label' => esc_html__( 'Content', 'clotya-core' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control( 'slider_type',
			[
				'label' => esc_html__( 'Slider Type', 'clotya-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'type1',
				'options' => [
					'select-type' => esc_html__( 'Select Type', 'clotya-core' ),
					'type1'	  => esc_html__( 'Type 1', 'clotya-core' ),
					'type2'	  => esc_html__( 'Type 2', 'clotya-core' ),
					'type3'	  => esc_html__( 'Type 3', 'clotya-core' ),
					'type4'	  => esc_html__( 'Type 4', 'clotya-core' ),
				],
			]
		);

		$this->add_control( 'auto_play',
			[
				'label' => esc_html__( 'Auto Play', 'clotya-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'clotya-core' ),
				'label_off' => esc_html__( 'False', 'clotya-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);

        $this->add_control( 'auto_speed',
            [
                'label' => esc_html__( 'Auto Speed', 'chakta' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '1600',
                'pleaceholder' => esc_html__( 'Set auto speed.', 'chakta' ),
				'condition' => ['auto_play' => 'true']
            ]
        );
		
		$this->add_control( 'dots',
			[
				'label' => esc_html__( 'Dots', 'clotya-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'clotya-core' ),
				'label_off' => esc_html__( 'False', 'clotya-core' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);
		
		$this->add_control( 'arrows',
			[
				'label' => esc_html__( 'Arrows', 'clotya-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'clotya-core' ),
				'label_off' => esc_html__( 'False', 'clotya-core' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);

        $this->add_control( 'slide_speed',
            [
                'label' => esc_html__( 'Slide Speed', 'clotya-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '600',
                'pleaceholder' => esc_html__( 'Set slide speed.', 'clotya-core' ),
            ]
        );

		$defaultbg = plugins_url( 'images/slider-image.jpg', __DIR__ );
		
		$repeater = new Repeater();
        $repeater->add_control( 'slider_image',
            [
                'label' => esc_html__( 'Image', 'clotya-core' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $repeater->add_control( 'slider_title',
            [
                'label' => esc_html__( 'Item Title', 'chakta' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Street Fashion not only for the street',
                'pleaceholder' => esc_html__( 'Enter item title here.', 'chakta' )
            ]
        );
		
        $repeater->add_control( 'slider_subtitle',
            [
                'label' => esc_html__( 'Item Subtitle', 'chakta' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'WINTER 2022 COLLECTION',
                'pleaceholder' => esc_html__( 'Enter item subtitle here.', 'chakta' )
            ]
        );
		
        $repeater->add_control( 'slider_desc',
            [
                'label' => esc_html__( 'Item Description', 'chakta' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '',
                'pleaceholder' => esc_html__( 'Enter item desc here.', 'chakta' )
            ]
        );

        $repeater->add_control( 'slider_btn_title',
            [
                'label' => esc_html__( 'Button Title', 'chakta' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Shop Now',
                'pleaceholder' => esc_html__( 'Enter button title here', 'chakta' )
            ]
        );
        $repeater->add_control( 'slider_btn_link',
            [
                'label' => esc_html__( 'Button Link', 'chakta' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'chakta' )
            ]
        );
		
		$repeater->add_control( 'slider_text_type',
			[
				'label' => esc_html__( 'Text Type', 'clotya-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'light',
				'options' => [
					'select-type' => esc_html__( 'Select Type', 'clotya-core' ),
					'dark'	  => esc_html__( 'Dark', 'clotya-core' ),
					'light'	  => esc_html__( 'Light', 'clotya-core' ),
				],
			]
		);
		
        $this->add_control( 'slider_items',
            [
                'label' => esc_html__( 'Slide Items', 'clotya-core' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'slider_image' => ['url' => $defaultbg],
                        'slider_title' => 'Street Fashion not only for the street',
                        'slider_subtitle' => 'WINTER 2022 COLLECTION',
                        'slider_btn_title' => 'Shop Collection',
                        'slider_btn_link' => '#',
                    ],
                    [
                        'slider_image' => ['url' => $defaultbg],
                        'slider_title' => 'Street Fashion not only for the street',
                        'slider_subtitle' => 'WINTER 2022 COLLECTION',
                        'slider_btn_title' => 'Shop Collection',
                        'slider_btn_link' => '#',
                    ],
                    [
                        'slider_image' => ['url' => $defaultbg],
                        'slider_title' => 'Street Fashion not only for the street',
                        'slider_subtitle' => 'WINTER 2022 COLLECTION',
                        'slider_btn_title' => 'Shop Collection',
                        'slider_btn_link' => '#',
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
		
		$this->add_responsive_control( 'home_slider_alignment',
            [
                'label' => esc_html__( 'Alignment', 'clotya' ),
                'type' => Controls_Manager::CHOOSE,
                'selectors' => ['{{WRAPPER}} .banner-content .banner-inner' => 'text-align: {{VALUE}};'],
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
				'selector' => '{{WRAPPER}} .banner-image img',
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
		
		$this->add_control( 'subtitle_heading',
            [
                'label' => esc_html__( 'SUBTITLE', 'clotya-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'subtitle_color',
           [
               'label' => esc_html__( 'Subtitle Color', 'clotya-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-subtitle' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'subtitle_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'clotya-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .entry-subtitle ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .entry-subtitle',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'label' => esc_html__( 'Typography', 'clotya-core' ),

                'selector' => '{{WRAPPER}} .entry-subtitle',
				
            ]
        );
		
		$this->add_control( 'description_heading',
            [
                'label' => esc_html__( 'DESCRIPTION', 'clotya-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'description_color',
			[
               'label' => esc_html__( 'Description Color', 'clotya-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-description' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'description_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'clotya-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .entry-description ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'description_text_shadow',
				'selector' => '{{WRAPPER}} .entry-description ',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typo',
                'label' => esc_html__( 'Typography', 'clotya-core' ),

                'selector' => '{{WRAPPER}} .entry-description p',
				
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
		
        /*****   START CONTROLS SECTION   ******/
        $this->start_controls_section('btn_styling',
            [
                'label' => esc_html__( ' Button Style', 'clotya' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typo',
                'label' => esc_html__( 'Typography', 'clotya-core' ),

                'selector' => '{{WRAPPER}} a.btn '
            ]
        );
		
		$this->add_control( 'btn_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'clotya-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} a.btn' => 'opacity: {{VALUE}} ;'],
            ]
        );
		
		$this->add_control( 'btn_color',
            [
                'label' => esc_html__( 'Color', 'clotya-core' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => ['{{WRAPPER}} a.btn' => 'color: {{VALUE}};']
            ]
        );
       
	    $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btn_border',
                'label' => esc_html__( 'Border', 'clotya-core' ),
                'selector' => '{{WRAPPER}} a.btn ',
            ]
        );
        
		$this->add_responsive_control( 'btn_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'clotya-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} a.btn ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
            ]
        );
		
		$this->add_responsive_control( 'btn_padding',
            [
                'label' => esc_html__( 'Padding', 'clotya-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} a.btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],              
            ]
        );
       
		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'btn_background',
                'label' => esc_html__( 'Background', 'clotya-core' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} a.btn',
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/
		
		/*****   START CONTROLS SECTION   ******/
        $this->start_controls_section('clotya_nav_styling',
            [
                'label' => esc_html__( ' Nav Style', 'clotya' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
       

		$this->add_control( 'nav_clr',
           [
               'label' => esc_html__( 'Color', 'clotya' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .site-slider .owl-nav button' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'nav_background',
           [
               'label' => esc_html__( 'Background', 'clotya' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .site-slider .owl-nav button' => 'background-color: {{VALUE}} !important;']
           ]
        );
				
	    $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'nav_border',
                'label' => esc_html__( 'Border', 'clotya' ),
                'selector' => '{{WRAPPER}} .site-slider .owl-nav button ',
            ]
        );
        
		$this->add_responsive_control( 'nav_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'clotya' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}}  .site-slider .owl-nav button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],
            ]
        );
		
		$this->add_control( 'nav_size',
            [
                'label' => esc_html__( ' Size', 'clotya' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .site-slider .owl-nav button' => 'height: {{SIZE}}px;' ],
            ]
        );
		
		$this->add_control( 'home_slider_prev_heading',
            [
                'label' => __( 'PREV POSITION', 'clotya' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
       
	   $this->add_responsive_control( 'home_slider_prev_horizontal',
            [
                'label' => esc_html__( 'Horizontal Position ( % )', 'clotya' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .site-slider .owl-nav .owl-prev' => 'left:{{SIZE}}%;' ],
            ]
        );
       
	   $this->add_responsive_control( 'home_slider_prev_vertical',
            [
                'label' => esc_html__( 'Vertical Position ( % )', 'clotya' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .site-slider .owl-nav .owl-prev' => 'top:{{SIZE}}% !important;' ],
            ]
        );
        
		$this->add_control( 'home_slider_next_heading',
            [
                'label' => __( 'NEXT POSITION', 'clotya' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        
		$this->add_responsive_control( 'home_slider_next_horizontal',
            [
                'label' => esc_html__( 'Horizontal Position ( % )', 'clotya' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .site-slider .owl-nav .owl-next' => 'left:{{SIZE}}%;' ],
            ]
        );
        
		$this->add_responsive_control( 'home_slider_next_vertical',
            [
                'label' => esc_html__( 'Vertical Position ( % )', 'clotya' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .site-slider .owl-nav .owl-next' => 'top:{{SIZE}}% !important;' ],
            ]
        );
			
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		if($settings['slider_type'] == 'type4'){
			$slidetype = 'align-small-center';
			$contentalign = 'content-center';
			$overlay = 'overlay';
		} elseif($settings['slider_type'] == 'type3'){
			$slidetype = 'large';
			$overlay = 'overlay';
			$contentalign = 'content-left';
		} elseif($settings['slider_type'] == 'type2'){
			$slidetype = 'full-width';
			$overlay = '';
			$contentalign = 'content-left';
		} else {
			$slidetype = '';
			$overlay = '';
			$contentalign = 'content-left';
		}
		
		
		if ( $settings['slider_items'] ) {

			echo '<div class="site-module module-slider '.esc_attr($slidetype).'">';
			echo '<div class="module-body">';
			echo '<div class="site-slider slider owl-carousel arrow-1" data-desktop="1" data-tablet="1" data-mobile="1" data-speed="'.esc_attr($settings['slide_speed']).'" data-loop="true" data-gutter="0" data-dots="'.esc_attr($settings['dots']).'" data-nav="'.esc_attr($settings['arrows']).'" data-autoplay="'.esc_attr($settings['auto_play']).'" data-autospeed="'.esc_attr($settings['auto_speed']).'" data-autostop="true">';
			
			foreach ( $settings['slider_items'] as $item ) {
				$target = $item['slider_btn_link']['is_external'] ? ' target="_blank"' : '';
				$nofollow = $item['slider_btn_link']['nofollow'] ? ' rel="nofollow"' : '';
				
				echo '<div class="banner '.esc_attr($item['slider_text_type']).' content-middle '.esc_attr($contentalign).'">';
				echo '<div class="banner-content">';
				echo '<div class="banner-inner">';
				echo '<h4 class="entry-subtitle">'.esc_html($item['slider_subtitle']).'</h4>';
				echo '<h2 class="entry-title">'.esc_html($item['slider_title']).'</h2>';
				if($item['slider_desc']){
				echo '<div class="entry-description">';
				echo '<p>'.clotya_sanitize_data($item['slider_desc']).'</p>';
				echo '</div><!-- entry-description -->';
				}
				if($item['slider_btn_title']){
				echo '<a href="'.esc_url($item['slider_btn_link']['url']).'" class="btn link" '.esc_attr($target.$nofollow).'>'.esc_html($item['slider_btn_title']).' <i class="klbth-icon-right-arrow"></i></a>';
				}
				echo '</div><!-- banner-inner -->';
				echo '</div><!-- banner-content -->';
				echo '<div class="banner-image '.esc_attr($overlay).'"><img src="'.esc_url($item['slider_image']['url']).'" alt="slider"></div>';
				echo '<a href="'.esc_url($item['slider_btn_link']['url']).'" class="overlay-link"></a>';
				echo '</div><!-- banner -->';
			}
			
			echo '</div><!-- site-slider -->';
			echo '</div><!-- module-body -->';
			echo '</div><!-- site-module -->';


		}
	}

}

