<?php

namespace Elementor;

class Clotya_Product_Categories_Widget extends Widget_Base {
    use Clotya_Helper;
	
    public function get_name() {
        return 'clotya-product-categories';
    }
    public function get_title() {
        return 'Product Categories (K)';
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
				'label' => esc_html__( 'Content', 'clotya' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		
		$this->add_control( 'category_style',
			[
				'label' => esc_html__( 'Style', 'clotya-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'square',
				'options' => [
					'0' => esc_html__( 'Select Style', 'clotya-core' ),
					'square' 	  => esc_html__( 'Style 1', 'clotya-core' ),
					'rounded'	  => esc_html__( 'Style 2', 'clotya-core' ),
				],
			]
		);
		
        $this->add_control( 'title',
            [
                'label' => esc_html__( 'Title', 'clotya-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => 'Best for your categories',
                'pleaceholder' => esc_html__( 'Add a title.', 'clotya-core' ),
            ]
        );
		
        $this->add_control( 'subtitle',
            [
                'label' => esc_html__( 'Subtitle', 'clotya-core' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => '<strong>23 categories</strong> belonging to a total of <strong>34,592 products</strong>',
                'pleaceholder' => esc_html__( 'Add a subtitle.', 'clotya-core' ),
            ]
        );
		
		$this->add_control( 'sub_categories',
			[
				'label' => esc_html__( 'Show Sub Categories', 'clotya-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'clotya-core' ),
				'label_off' => esc_html__( 'False', 'clotya-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
		$this->add_control( 'hide_empty',
			[
				'label' => esc_html__( 'Hide Empty', 'clotya-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'clotya-core' ),
				'label_off' => esc_html__( 'False', 'clotya-core' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);
		
		$this->start_controls_tabs('cat_exclude_include_tabs');
        $this->start_controls_tab('cat_include_tab',
            [ 'label' => esc_html__( 'Include Category', 'clotya-core' ) ]
        );
       
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
		
		$this->end_controls_tab(); // cat_include_tab 
		
        $this->start_controls_tab( 'cat_exclude_tab',
            [ 'label' => esc_html__( 'Exclude Category', 'clotya-core' ) ]
        );
		
        $this->add_control( 'exclude_category',
            [
                'label' => esc_html__( 'Exclude Category', 'clotya-core' ),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->clotya_cpt_taxonomies('product_cat'),
                'description' => 'Select Category(s)',
                'default' => '',
                'label_block' => true,
            ]
        );
       
		$this->end_controls_tab(); // cat_exclude_tab

		$this->end_controls_tabs(); // cat_exclude_include_tabs
		
		$this->add_control( 'column',
			[
				'label' => esc_html__( 'Column', 'clotya-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '6',
				'options' => [
					'0' => esc_html__( 'Select Column', 'clotya-core' ),
					'2' 	  => esc_html__( '2 Columns', 'clotya-core' ),
					'3'		  => esc_html__( '3 Columns', 'clotya-core' ),
					'4'		  => esc_html__( '4 Columns', 'clotya-core' ),
					'5'		  => esc_html__( '5 Columns', 'clotya-core' ),
					'6'		  => esc_html__( '6 Columns', 'clotya-core' ),
					'7'		  => esc_html__( '7 Columns', 'clotya-core' ),
					'8'		  => esc_html__( '8 Columns', 'clotya-core' ),
					'9'		  => esc_html__( '9 Columns', 'clotya-core' ),
				],
			]
		);

		$this->add_control( 'tablet_column',
			[
				'label' => esc_html__( 'Tablet Column', 'clotya-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '4',
				'options' => [
					'0' => esc_html__( 'Select Column', 'clotya-core' ),
					'2' 	  => esc_html__( '2 Columns', 'clotya-core' ),
					'3'		  => esc_html__( '3 Columns', 'clotya-core' ),
					'4'		  => esc_html__( '4 Columns', 'clotya-core' ),
					'5'		  => esc_html__( '5 Columns', 'clotya-core' ),
					'6'		  => esc_html__( '6 Columns', 'clotya-core' ),
					'7'		  => esc_html__( '7 Columns', 'clotya-core' ),
					'8'		  => esc_html__( '8 Columns', 'clotya-core' ),
					'9'		  => esc_html__( '9 Columns', 'clotya-core' ),
				],
			]
		);

		$this->add_control( 'mobile_column',
			[
				'label' => esc_html__( 'Mobile Column', 'clotya-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '3',
				'options' => [
					'0' => esc_html__( 'Select Column', 'clotya-core' ),
					'2' 	  => esc_html__( '2 Columns', 'clotya-core' ),
					'3'		  => esc_html__( '3 Columns', 'clotya-core' ),
					'4'		  => esc_html__( '4 Columns', 'clotya-core' ),
					'5'		  => esc_html__( '5 Columns', 'clotya-core' ),
					'6'		  => esc_html__( '6 Columns', 'clotya-core' ),
					'7'		  => esc_html__( '7 Columns', 'clotya-core' ),
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
				'default' => 'false',
			]
		);
		
		$this->add_control( 'arrows',
			[
				'label' => esc_html__( 'Arrows', 'clotya-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'clotya-core' ),
				'label_off' => esc_html__( 'False', 'clotya-core' ),
				'return_value' => 'true',
				'default' => 'false',
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
		
        $this->add_control( 'slide_gutter',
            [
                'label' => esc_html__( 'Slide Gutter', 'clotya-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '10',
                'pleaceholder' => esc_html__( 'Set slide gutter.', 'clotya-core' ),
            ]
        );
		
        $this->add_control( 'order',
            [
                'label' => esc_html__( 'Select Order', 'clotya' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'ASC' => esc_html__( 'Ascending', 'clotya' ),
                    'DESC' => esc_html__( 'Descending', 'clotya' )
                ],
                'default' => 'ASC'
            ]
        );
		
        $this->add_control( 'orderby',
            [
                'label' => esc_html__( 'Order By', 'clotya' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'id' => esc_html__( 'Post ID', 'clotya' ),
                    'menu_order' => esc_html__( 'Menu Order', 'clotya' ),
                    'rand' => esc_html__( 'Random', 'clotya' ),
                    'date' => esc_html__( 'Date', 'clotya' ),
                    'title' => esc_html__( 'Title', 'clotya' ),
                ],
                'default' => 'menu_order',
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
               'selectors' => ['{{WRAPPER}} .module-header .entry-title' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'title_hvr_color',
           [
               'label' => esc_html__( 'Title Hover Color', 'clotya-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .module-header .entry-title:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .module-header .entry-title ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'selector' => '{{WRAPPER}} .module-header .entry-title',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__( 'Typography', 'clotya-core' ),

                'selector' => '{{WRAPPER}} .module-header .entry-title',
				
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
               'selectors' => ['{{WRAPPER}} .module-category .module-header p , {{WRAPPER}} .module-category .module-header p strong' => 'color: {{VALUE}};']
           ]
        );
		
		$this->add_control( 'subtitle_hvr_color',
           [
               'label' => esc_html__( 'Subtitle Hover Color', 'clotya-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .module-category .module-header p:hover , {{WRAPPER}} .module-category .module-header p strong:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .module-category .module-header p ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_text_shadow',
				'selector' => '{{WRAPPER}} .module-category .module-header p',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typo',
                'label' => esc_html__( 'Typography', 'clotya-core' ),

                'selector' => '{{WRAPPER}} .module-category .module-header p',
				
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
				'selector' => '{{WRAPPER}} .module-category .category-thumbnail a img',
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
               'selectors' => ['{{WRAPPER}} .category-content a' => 'color: {{VALUE}};']
			]
        );
		
		$this->add_control( 'category_hvr_color',
           [
               'label' => esc_html__( 'Category Hover Color', 'clotya-core' ),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => ['{{WRAPPER}} .category-content a:hover' => 'color: {{VALUE}};']
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
                'selectors' => ['{{WRAPPER}} .category-content a ' => 'opacity: {{VALUE}} ;']
            ]
        );
		
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'category_text_shadow',
				'selector' => '{{WRAPPER}} .category-content a',
			]
		);
		
		$this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'category_typo',
                'label' => esc_html__( 'Typography', 'clotya-core' ),

                'selector' => '{{WRAPPER}} .category-content a',
				
            ]
        );
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		
		if($settings['cat_filter'] || $settings['exclude_category']){
			$terms = get_terms( array(
				'taxonomy' => 'product_cat',
				'hide_empty' => $settings['hide_empty'],
				'parent'    => 0,
				'include'   => $settings['cat_filter'],
				'exclude'   => $settings['exclude_category'],
				'order'          => $settings['order'],
				'orderby'        => $settings['orderby']
			) );
		} else {
			$terms = get_terms( array(
				'taxonomy' => 'product_cat',
				'hide_empty' => $settings['hide_empty'],
				'parent'    => 0,
				'order'          => $settings['order'],
				'orderby'        => $settings['orderby']
			) );
		}

		echo '<div class="site-module module-category style-1 '.esc_attr($settings['category_style']).'">';
		if($settings['title'] || $settings['subtitle']){
			echo '<div class="module-header">';
			echo '<h3 class="entry-title">'.esc_html($settings['title']).'</h3>';
			echo '<p>'.clotya_sanitize_data($settings['subtitle']).'</p>';
			echo '</div><!-- module-header -->';
		}
		echo '<div class="module-body">';
		echo '<div class="site-slider carousel owl-carousel products" data-desktop="'.esc_attr($settings['column']).'" data-tablet="'.esc_attr($settings['tablet_column']).'" data-mobile="'.esc_attr($settings['mobile_column']).'" data-speed="'.esc_attr($settings['slide_speed']).'" data-loop="true" data-gutter="'.esc_attr($settings['slide_gutter']).'" data-dots="'.esc_attr($settings['dots']).'" data-nav="'.esc_attr($settings['arrows']).'" data-autoplay="'.esc_attr($settings['auto_play']).'" data-autospeed="'.esc_attr($settings['auto_speed']).'" data-autostop="true">';

		foreach ( $terms as $term ) {
			$term_data = get_option('taxonomy_'.$term->term_id);
			$thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
			$image = wp_get_attachment_url( $thumbnail_id );
			$term_children = get_terms( array(
				'taxonomy' => 'product_cat',
				'hide_empty' => $settings['hide_empty'],
				'parent' => $term->term_id,
				'include'   => $settings['cat_filter'],
				'exclude'   => $settings['exclude_category'],
			) );
			
			echo '<div class="category">';
			echo '<div class="category-thumbnail">';
			echo '<div class="total-product">'.esc_html($term->count).'</div>';
			if($image){
			echo '<a href="'.esc_url(get_term_link( $term )).'"><img src="'.esc_url($image).'" alt="'.esc_attr($term->name).'"></a>';
			}
			echo '</div><!-- category-thumbnail -->';
			echo '<div class="category-content">';
			echo '<h3 class="entry-title"><a href="'.esc_url(get_term_link( $term )).'">'.esc_html($term->name).'</a></h3>';
			echo '</div><!-- category-content -->';
			echo '</div><!-- category -->';
			
			if($settings['sub_categories'] == 'true' && $term_children){
				foreach($term_children as $child){
					$childterm = get_term_by( 'id', $child->term_id, 'product_cat' );
					$child_thumbnail_id = get_term_meta( $childterm->term_id, 'thumbnail_id', true );
					$child_image = wp_get_attachment_url( $child_thumbnail_id );
					$term_third_children = get_terms( array(
						'taxonomy' => 'product_cat',
						'hide_empty' => $settings['hide_empty'],
						'parent' => $childterm->term_id,
						'include'   => $settings['cat_filter'],
						'exclude'   => $settings['exclude_category'],
					) );

					echo '<div class="category">';
					echo '<div class="category-thumbnail">';
					echo '<div class="total-product">'.esc_html($childterm->count).'</div>';
					if($child_image){
					echo '<a href="'.esc_url(get_term_link( $childterm )).'"><img src="'.esc_url($child_image).'" alt="'.esc_attr($childterm->name).'"></a>';
					}
					echo '</div><!-- category-thumbnail -->';
					echo '<div class="category-content">';
					echo '<h3 class="entry-title"><a href="'.esc_url(get_term_link( $childterm )).'">'.esc_html($childterm->name).'</a></h3>';
					echo '</div><!-- category-content -->';
					echo '</div><!-- category -->';
					
					if($term_third_children){
						
						foreach($term_third_children as $thirdchild){
							$thirdchildterm = get_term_by( 'id', $thirdchild->term_id, 'product_cat' );
							$thirdchild_thumbnail_id = get_term_meta( $thirdchildterm->term_id, 'thumbnail_id', true );
							$thirdchild_image = wp_get_attachment_url( $thirdchild_thumbnail_id );

							echo '<div class="category">';
							echo '<div class="category-thumbnail">';
							echo '<div class="total-product">'.esc_html($thirdchildterm->count).'</div>';
							if($thirdchild_image){
							echo '<a href="'.esc_url(get_term_link( $thirdchildterm )).'"><img src="'.esc_url($thirdchild_image).'" alt="'.esc_attr($thirdchildterm->name).'"></a>';
							}
							echo '</div><!-- category-thumbnail -->';
							echo '<div class="category-content">';
							echo '<h3 class="entry-title"><a href="'.esc_url(get_term_link( $thirdchildterm )).'">'.esc_html($thirdchildterm->name).'</a></h3>';
							echo '</div><!-- category-content -->';
							echo '</div><!-- category -->';
						}
					}
				}
			}
			
		}

		echo '</div><!-- site-slider -->';
		echo '</div>';
		echo '</div><!-- module -->';

		
	}

}
