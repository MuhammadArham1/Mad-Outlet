<?php

namespace Elementor;

class Clotya_Banner_Column_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'clotya-banner-column';
    }
    public function get_title() {
        return 'Banner Column (K)';
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


		$defaultbg = plugins_url( 'images/banner-column.jpg', __DIR__ );
		
		$repeater = new Repeater();
        $repeater->add_control( 'banner_image',
            [
                'label' => esc_html__( 'Image', 'clotya-core' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $repeater->add_control( 'banner_title',
            [
                'label' => esc_html__( 'Item Title', 'chakta' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'MEN',
                'pleaceholder' => esc_html__( 'Enter item title here.', 'chakta' )
            ]
        );

        $repeater->add_control( 'banner_btn_link',
            [
                'label' => esc_html__( 'Button Link', 'chakta' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'chakta' )
            ]
        );
		
        $this->add_control( 'banner_items',
            [
                'label' => esc_html__( 'Banner Items', 'clotya-core' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'banner_image' => ['url' => $defaultbg],
                        'banner_title' => 'MEN',
                        'banner_btn_link' => '#',
                    ],
                    [
                        'banner_image' => ['url' => $defaultbg],
                        'banner_title' => 'WOMEN',
                        'banner_btn_link' => '#',
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
               'selectors' => ['{{WRAPPER}} .banner-content .entry-title' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .banner-content .entry-title ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .banner-content .entry-title',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'clotya-core' ),

                'selector' => '{{WRAPPER}} .banner-content .entry-title',
				
            ]
        );

		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		
		if ( $settings['banner_items'] ) {

			echo '<div class="site-module banner-grid column-2 full-width">';
			
			foreach ( $settings['banner_items'] as $item ) {
				$target = $item['banner_btn_link']['is_external'] ? ' target="_blank"' : '';
				$nofollow = $item['banner_btn_link']['nofollow'] ? ' rel="nofollow"' : '';
				
				echo '<div class="grid-item">';
				echo '<div class="banner-content"><h3 class="entry-title">'.esc_html($item['banner_title']).'</h3></div>';
				echo '<div class="banner-image"><img src="'.esc_url($item['banner_image']['url']).'"></div>';
				echo '<a href="'.esc_url($item['banner_btn_link']['url']).'" '.esc_attr($target.$nofollow).' class="overlay-link"></a>';
				echo '</div><!-- grid-item -->';
			}
			
			echo '</div><!-- site-module -->';


		}
	}

}

