<?php

namespace Elementor;

class Clotya_Testimonial_Box_Widget extends Widget_Base {

    public function get_name() {
        return 'clotya-testimonial-box';
    }
    public function get_title() {
        return 'Testimonial Box (K)';
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

		$defaultimage = plugins_url( 'images/testimonial-logo.png', __DIR__ );
		$defaultsignature = plugins_url( 'images/signature.png', __DIR__ );
		
        $this->add_control( 'logo',
            [
                'label' => esc_html__( 'Logo', 'clotya' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $defaultimage],
            ]
        );
		
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'clotya' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Big patterns are back in fashion',
                'description'=> 'Add a title.',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'comment',
            [
                'label' => esc_html__( 'Comment', 'clotya' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodobendo viverra maecenas accumsan lacus vel facilisis libero.',
                'description'=> 'Add a description.',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'signature',
            [
                'label' => esc_html__( 'Signature', 'clotya' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $defaultsignature],
            ]
        );
		
        $this->add_control( 'name',
            [
                'label' => esc_html__( 'Name', 'clotya' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'CHANEL CEO',
                'description'=> 'Add a name.',
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

		$this->add_control( 'name_heading',
            [
                'label' => esc_html__( 'NAME', 'clotya-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'name_color',
			[
               'label' => esc_html__( 'Name Color', 'clotya-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-author' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'name_hvrcolor',
			[
               'label' => esc_html__( 'Name Hover Color', 'clotya-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .entry-author:hover' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'name_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'clotya-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .entry-author ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'name_text_shadow',
				'selector' => '{{WRAPPER}} .entry-author',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'name_typo',
                'label' => esc_html__( 'Typography', 'clotya-core' ),

                'selector' => '{{WRAPPER}} .entry-author',
				
            ]
        );
		
		$this->add_control( 'comment_heading',
            [
                'label' => esc_html__( 'COMMENT', 'clotya-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'comment_color',
           [
               'label' => esc_html__( 'Comment Color', 'clotya-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-comment' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'comment_hvrcolor',
           [
               'label' => esc_html__( 'Comment Hover Color', 'clotya-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .entry-comment:hover' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'comment_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'clotya-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .entry-comment ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'comment_text_shadow',
				'selector' => '{{WRAPPER}} .entry-comment',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'comment_typo',
                'label' => esc_html__( 'Typography', 'clotya-core' ),

                'selector' => '{{WRAPPER}} .entry-comment',
				
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		
		echo '<div class="site-module module-brand-testimonial">';
		echo '<img src="'.esc_url($settings['logo']['url']).'" class="brand">';
		echo '<div class="entry-comment">';
		echo '<p>'.clotya_sanitize_data($settings['comment']).'</p>';
		echo '</div><!-- entry-comment -->';
		echo '<img src="'.esc_url($settings['signature']['url']).'" class="signature">';
		echo '<h4 class="entry-author">'.esc_html($settings['name']).'</h4>';
		echo '</div><!-- site-module -->';

	}

}
