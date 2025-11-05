<?php

namespace Elementor;

class Clotya_Comment_Text_Widget extends Widget_Base {

    public function get_name() {
        return 'clotya-comment-text';
    }
    public function get_title() {
        return 'Comment Text (K)';
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
		
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'clotya-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => '4.5 (10.000+) Rating',
                'description'=> 'Add a title.',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'comment',
            [
                'label' => esc_html__( 'Comment', 'clotya-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.',
                'description'=> 'Add a description.',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'name',
            [
                'label' => esc_html__( 'Name', 'clotya-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Petra van der Meer',
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
		
		$this->add_control( 'rating_heading',
            [
                'label' => esc_html__( 'RATING', 'clotya-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'rating_color',
           [
               'label' => esc_html__( 'Rating Text Color', 'clotya-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .comment-text-block .entry-rating > span' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'rating_hvrcolor',
           [
               'label' => esc_html__( 'Rating Text Hover Color', 'clotya-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .comment-text-block .entry-rating > span:hover' => 'color: {{VALUE}};']
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
               'selectors' => ['{{WRAPPER}} .enty-author' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'name_hvrcolor',
			[
               'label' => esc_html__( 'Name Hover Color', 'clotya-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}}  .enty-author:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .enty-author ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'name_text_shadow',
				'selector' => '{{WRAPPER}} .enty-author',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'name_typo',
                'label' => esc_html__( 'Typography', 'clotya-core' ),

                'selector' => '{{WRAPPER}} .enty-author',
				
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		
		echo '<div class="comment-text-block">';
		echo '<div class="entry-rating">';
		echo '<div class="stars">';
		echo '<i class="klbth-icon-star"></i>';
		echo '<i class="klbth-icon-star"></i>';
		echo '<i class="klbth-icon-star"></i>';
		echo '<i class="klbth-icon-star"></i>';
		echo '<i class="klbth-icon-star"></i>';
		echo '</div><!-- stars -->';
		echo '<span>'.esc_html($settings['title']).'</span>';
		echo '</div><!-- entry-rating -->';
		echo '<div class="entry-comment">';
		echo '<p>'.clotya_sanitize_data($settings['comment']).'</p>';
		echo '</div><!-- entry-comment -->';
		echo '<h4 class="enty-author">'.esc_html($settings['name']).'</h4>';
		echo '</div><!-- comment-text-block -->';

	}

}
