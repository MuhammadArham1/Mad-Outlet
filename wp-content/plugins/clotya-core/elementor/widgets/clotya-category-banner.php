<?php

namespace Elementor;

class Clotya_Category_Banner_Widget extends Widget_Base {
    use Clotya_Helper;
	
    public function get_name() {
        return 'clotya-category-banner';
    }
    public function get_title() {
        return 'Category Banner (K)';
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


		$defaultimage = plugins_url( 'images/category-banner.jpg', __DIR__ );
		
        $this->add_control( 'cat_filter',
            [
                'label' => esc_html__( 'Include Category', 'clotya-core' ),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->clotya_cpt_taxonomies('product_cat'),
                'description' => 'Select Category(s)',
                'default' => '',
                'label_block' => true,
            ]
        );
		
        $this->add_control( 'image',
            [
                'label' => esc_html__( 'Image', 'clotya' ),
                'type' => Controls_Manager::MEDIA,
                'default' => ['url' => $defaultimage],
            ]
        );
		
        $this->add_control( 'desc',
            [
                'label' => esc_html__( 'Description', 'clotya' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.',
                'description'=> 'Add a description.',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'child_count',
            [
                'label' => esc_html__( 'Child Item Count', 'clotya' ),
                'type' => Controls_Manager::TEXT,
                'default' => '',
                'description'=> 'How many sub-categories?.',
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
		
		$this->add_control( 'category_heading',
            [
                'label' => esc_html__( 'CATEGORY', 'clotya-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'category_color',
			[
               'label' => esc_html__( 'Category Color', 'clotya-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-category' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'category_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'clotya-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .entry-category ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'category_text_shadow',
				'selector' => '{{WRAPPER}} .entry-category',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'category_typo',
                'label' => esc_html__( 'Typography', 'clotya-core' ),

                'selector' => '{{WRAPPER}} .entry-category',
				
            ]
        );
		
		$this->add_control( 'desc_heading',
            [
                'label' => esc_html__( 'DESCRIPTION', 'clotya-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'desc_color',
			[
               'label' => esc_html__( 'Description Color', 'clotya-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .entry-description p' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'desc_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'clotya-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .entry-description p ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'desc_text_shadow',
				'selector' => '{{WRAPPER}} .entry-description p',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typo',
                'label' => esc_html__( 'Typography', 'clotya-core' ),

                'selector' => '{{WRAPPER}} .entry-description p',
				
            ]
        );
		
		$this->add_control( 'child_item_heading',
            [
                'label' => esc_html__( 'CHILD ITEM', 'clotya-core' ),
                'type' => Controls_Manager::HEADING,
				'separator' => 'before'
            ]
        );
		
		$this->add_control( 'child_item_color',
			[
               'label' => esc_html__( 'Child Item Color', 'clotya-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .sub-categories ul li a' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'child_item_opacity_important_style',
            [
                'label' => esc_html__( 'Opacity', 'clotya-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1,
                'step' => 0.1,
                'default' => '',
                'selectors' => ['{{WRAPPER}} .sub-categories ul li a ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'child_item_text_shadow',
				'selector' => '{{WRAPPER}} .sub-categories ul li a',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'child_item_typo',
                'label' => esc_html__( 'Typography', 'clotya-core' ),

                'selector' => '{{WRAPPER}} .sub-categories ul li a',
				
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$output = '';		

		$terms = get_terms( array(
			'taxonomy' => 'product_cat',
			'hide_empty' => 1,
			'parent'    => 0,
			'number' => 1,
			'include'   => $settings['cat_filter'],
		) );



		foreach ( $terms as $term ) {
			$term_data = get_option('taxonomy_'.$term->term_id);
			$thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
			$term_children = get_term_children( $term->term_id, 'product_cat' );
			
			echo '<div class="module-category-grid">';
			echo '<div class="banner dark content-top content-left">';
			echo '<div class="banner-content">';
			echo '<div class="banner-inner">';
			echo '<div class="total-product">'.sprintf(_n('%d product', '%d products', $term->count, 'clotya-core'), $term->count).'</div>';
			echo '<h2 class="entry-category">'.esc_html($term->name).'</h2>';
			echo '<div class="entry-description">';
			echo '<p>'.esc_html($settings['desc']).'</p>';
			echo '</div><!-- entry-description -->';
			
			$count = 1;
			
			if($term_children){
				echo '<div class="sub-categories">';
				echo '<ul>';
				foreach($term_children as $child){
					$childterm = get_term_by( 'id', $child, 'product_cat' );
					if($settings['child_count']){
						if($count <= $settings['child_count']){
						echo '<li><a href="'.esc_url(get_term_link( $childterm )).'">'.esc_html($childterm->name).'</a></li>';
						}
					} else {
						echo '<li><a href="'.esc_url(get_term_link( $childterm )).'">'.esc_html($childterm->name).'</a></li>';
					}
					$count++;
				}
				echo '</ul>';
				echo '</div><!-- sub-categories -->';
				
				
			}
			echo '</div><!-- banner-inner -->';
			echo '</div><!-- banner-content -->';
			echo '<div class="banner-image"><img src="'.esc_url($settings['image']['url']).'"></div>';
			echo '<a href="'.esc_url(get_term_link( $term )).'" class="overlay-link"></a>';
			echo '</div><!-- banner -->';
			echo '</div><!-- module-category-grid -->';
		}



	}

}
