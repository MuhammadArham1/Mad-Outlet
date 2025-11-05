<?php

namespace Elementor;

class Clotya_Text_Banner_Widget extends Widget_Base {

    public function get_name() {
        return 'clotya-text-banner';
    }
    public function get_title() {
        return 'Text Banner (K)';
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

		$this->add_control( 'banner_type',
			[
				'label' => esc_html__( 'Banner Type', 'clotya-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'type1',
				'options' => [
					'select-type' => esc_html__( 'Select Type', 'clotya-core' ),
					'type1'	  => esc_html__( 'Type 1', 'clotya-core' ),
					'type2'	  => esc_html__( 'Type 2', 'clotya-core' ),
				],
			]
		);

        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'clotya-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Super discount for your <strong>first purchase.</strong>',
                'description'=> 'Add a title.',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'coupon_code',
            [
                'label' => esc_html__( 'Coupon Code', 'clotya-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'FREE15FIRST',
                'description'=> 'Add a coupon code.',
				'label_block' => true,
				'condition' => ['banner_type' => ['type1','select-type']]
            ]
        );
		
        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'clotya-core' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Use discount code in checkout!',
                'description'=> 'Add a subtitle.',
				'label_block' => true,
				'condition' => ['banner_type' => ['type1','select-type']]
            ]
        );
		
        $this->add_control( 'btn_link',
            [
                'label' => esc_html__( 'Button Link', 'clotya-core' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => esc_html__( 'Place URL here', 'clotya-core' ),
            ]
        );
				
		$this->end_controls_section();
		
		/*****   END CONTROLS SECTION   ******/
		
		/*****   START CONTROLS SECTION   ******/
		
		$this->start_controls_section('clotya_styling',
            [
                'label' => esc_html__( ' Style', 'clotya-core' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
		
		$this->add_control( 'background_color',
           [
               'label' => esc_html__( 'Background Color', 'clotya-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => [
					'{{WRAPPER}} .module-coupon-banner .module-body' => 'background-color: {{value}};',
               ]
           ]
        );
		
		$this->add_control( 'background_hvr',
           [
               'label' => esc_html__( 'Background Hover Color', 'clotya-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => [
					'{{WRAPPER}} .module-coupon-banner .module-body:hover' => 'background-color: {{value}};',
               ]
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
               'selectors' => ['{{WRAPPER}} .module-coupon-banner .module-body p' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .module-coupon-banner .module-body p ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_control( 'second_title_color',
           [
               'label' => esc_html__( 'Second Title Color', 'clotya-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .module-coupon-banner .module-body p strong' => 'color: {{VALUE}};'],
			  
           ]
        );
		
		$this->add_control( 'second_title_size',
            [
                'label' => esc_html__( 'Second Title Size', 'clotya-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => '',
                'selectors' => [ '{{WRAPPER}} .module-coupon-banner .module-body p strong ' => 'font-size: {{SIZE}}px;' ],
				
				
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .module-coupon-banner .module-body p',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'clotya-core' ),

                'selector' => '{{WRAPPER}} .module-coupon-banner .module-body p',
				
            ]
        );
		
		$this->add_control( 'coupon_heading',
            [
                'label' => esc_html__( 'COUPON', 'clotya-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before',
            ]
        );
		
		$this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'cpn_border',
                'label' => esc_html__( 'Border', 'clotya-core' ),
                'selector' => '{{WRAPPER}} .module-coupon-banner .module-body .discount-code',
            ]
        );
		
		$this->add_responsive_control( 'cpn_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'clotya-core' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'selectors' => ['{{WRAPPER}} .module-coupon-banner .module-body .discount-code ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'],
            ]
        );
		
		$this->add_control( 'coupon_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'clotya-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .module-coupon-banner .module-body .discount-code' => 'opacity: {{VALUE}};'],
            ]
        );
		
		$this->add_control( 'coupon_color',
           [
               'label' => esc_html__( 'Coupon Color', 'clotya-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .module-coupon-banner .module-body .discount-code' => 'color: {{VALUE}};'],
           ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'coupon_text_shadow',
				'selector' => '{{WRAPPER}} .module-coupon-banner .module-body .discount-code',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'coupon_typo',
                'label' => esc_html__( 'Typography', 'clotya-core' ),

                'selector' => '{{WRAPPER}} .module-coupon-banner .module-body .discount-code',
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
               'selectors' => ['{{WRAPPER}} .module-coupon-banner .module-body span' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .module-coupon-banner .module-body span ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .module-coupon-banner .module-body span',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'label' => esc_html__( 'Typography', 'clotya-core' ),

                'selector' => '{{WRAPPER}} .module-coupon-banner .module-body span',
				
            ]
        );
		
		$this->end_controls_section();
		
		/*****   END CONTROLS SECTION   ******/

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';

		echo '<div class="site-module module-coupon-banner">';
		echo '<div class="module-body">';
		echo '<p>'.clotya_sanitize_data($settings['title']).'</p>';
		echo '<div class="discount-code">'.esc_html($settings['coupon_code']).'</div>';
		echo '<span>'.esc_html($settings['subtitle']).'</span>';
		echo '<a class="overlay-link" href="'.esc_url($settings['btn_link']['url']).'" '.esc_attr($target.$nofollow).'></a>';
		echo '</div><!-- module-body -->';
		echo '</div><!-- site-module -->';

	}

}
