<?php

namespace Elementor;

class Clotya_Counter_Text_Widget extends Widget_Base {

    public function get_name() {
        return 'clotya-counter-text';
    }
    public function get_title() {
        return 'Counter Text (K)';
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
		
		$this->add_control('due_date',
			[
				'label' => esc_html__( 'Due Date', 'machic-core' ),
				'type' => Controls_Manager::DATE_TIME,
				'default' => '2022/10/14',
				'picker_options' => ['enableTime' => false],
			]
		);
		
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'clotya' ),
                'type' => Controls_Manager::TEXT,
                'default' => '10% discount on your dream clothes:',
                'description'=> 'Add a title.',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'clotya' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Vivamus finibus, est condimentum feugiat aliquet, felis sem euismod risus',
                'description'=> 'Add a subtitle.',
				'label_block' => true,
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
		
		$this->add_control( 'background_color',
			[
               'label' => esc_html__( 'Background Color', 'clotya-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '#fbf1ec',
               'selectors' => ['{{WRAPPER}} .module-coupon-banner .module-body' => 'background-color: {{VALUE}};']
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
               'selectors' => ['{{WRAPPER}} .module-body p' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'title_hvrcolor',
			[
               'label' => esc_html__( 'Title Hover Color', 'clotya-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .module-body p:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .module-body p ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .module-body p',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'clotya-core' ),

                'selector' => '{{WRAPPER}} .module-body p',
				
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
               'selectors' => ['{{WRAPPER}} .module-body span' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'subtitle_hvrcolor',
           [
               'label' => esc_html__( 'Subtitle Hover Color', 'clotya-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .module-body span:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .module-body span ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .module-body span',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'label' => esc_html__( 'Typography', 'clotya-core' ),

                'selector' => '{{WRAPPER}} .module-body span',
				
            ]
        );
		
		$this->add_control( 'dua_date_heading',
            [
                'label' => esc_html__( 'DATE', 'clotya-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'dua_date_color',
			[
               'label' => esc_html__( 'Dua Date Color', 'clotya-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .countdown .count-item' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'dua_date_bg_color',
			[
               'label' => esc_html__( 'Dua Date Background Color', 'clotya-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .countdown .count-item' => 'background-color: {{VALUE}};']
			]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$output = '';
		
		$date = date_create($settings['due_date']);
		
		echo '<div class="site-module module-coupon-banner with-countdown">';
		echo '<div class="module-body">';
		echo '<p>'.esc_html($settings['title']).'</p>';
		echo '<div class="countdown" data-date="'.esc_attr(date_format($date,"Y/m/d")).'" data-text="'.esc_attr__('Expired', 'clotya-core').'">';
		echo '<div class="count-item">';
		echo '<div class="days">00</div>';
		echo '<div class="count-label">'.esc_html__('d', 'clotya-core').'</div>';
		echo '</div><!-- count-item -->';
		echo '<span>:</span>';
		echo '<div class="count-item">';
		echo '<div class="hours">00</div>';
		echo '<div class="count-label">'.esc_html__('h', 'clotya-core').'</div>';
		echo '</div><!-- count-item -->';
		echo '<span>:</span>';
		echo '<div class="count-item">';
		echo '<div class="minutes">00</div>';
		echo '<div class="count-label">'.esc_html__('m', 'clotya-core').'</div>';
		echo '</div><!-- count-item -->';
		echo '<span>:</span>';
		echo '<div class="count-item">';
		echo '<div class="second">00</div>';
		echo '<div class="count-label">'.esc_html__('s', 'clotya-core').'</div>';
		echo '</div><!-- count-item -->';
		echo '</div><!-- countdown -->';
		echo '<span>'.esc_html($settings['subtitle']).'</span>';
		echo '</div><!-- module-body -->';
		echo '</div><!-- site-module -->';

	}

}
