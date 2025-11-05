<?php

namespace Elementor;

class Clotya_Product_Carousel_Widget extends Widget_Base {
    use Clotya_Helper;

    public function get_name() {
        return 'clotya-product-carousel';
    }
    public function get_title() {
        return 'Product Carousel (K)';
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
		
		$this->add_control( 'product_type',
			[
				'label' => esc_html__( 'Product Type', 'clotya-core' ),
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

		$this->add_control( 'product_style',
			[
				'label' => esc_html__( 'Style', 'clotya-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'0' => esc_html__( 'Select Style', 'clotya-core' ),
					'style1' 	  => esc_html__( 'Style 1', 'clotya-core' ),
					'style2'	  => esc_html__( 'Style 2', 'clotya-core' ),
				],
				'condition' => ['product_type' => ['type1','select-type']]
			]
		);
		
		$this->add_control( 'column',
			[
				'label' => esc_html__( 'Column', 'clotya-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '4',
				'options' => [
					'0' => esc_html__( 'Select Column', 'clotya-core' ),
					'2' 	  => esc_html__( '2 Columns', 'clotya-core' ),
					'3'		  => esc_html__( '3 Columns', 'clotya-core' ),
					'4'		  => esc_html__( '4 Columns', 'clotya-core' ),
					'5'		  => esc_html__( '5 Columns', 'clotya-core' ),
					'6'		  => esc_html__( '6 Columns', 'clotya-core' ),
				],
			]
		);
		
		$this->add_control( 'mobile_column',
			[
				'label' => esc_html__( 'Mobile Column', 'clotya-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '2',
				'options' => [
					'0' => esc_html__( 'Select Column', 'clotya-core' ),
					'1' 	  => esc_html__( '1 Column', 'clotya-core' ),
					'2'		  => esc_html__( '2 Columns', 'clotya-core' ),
				],
			]
		);

		$this->add_control( 'tablet_column',
			[
				'label' => esc_html__( 'Tablet Column', 'clotya-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '3',
				'options' => [
					'0' => esc_html__( 'Select Column', 'clotya-core' ),
					'1' 	  => esc_html__( '1 Column', 'clotya-core' ),
					'2'		  => esc_html__( '2 Columns', 'clotya-core' ),
					'3'		  => esc_html__( '3 Columns', 'clotya-core' ),
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
                'label' => esc_html__( 'Auto Speed', 'clotya-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '1600',
                'pleaceholder' => esc_html__( 'Set auto speed.', 'clotya-core' ),
				'condition' => ['auto_play' => 'true']
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
		
        $this->add_control( 'slide_speed',
            [
                'label' => esc_html__( 'Slide Speed', 'clotya-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '600',
                'pleaceholder' => esc_html__( 'Set slide speed.', 'clotya-core' ),
            ]
        );

        // Posts Per Page
        $this->add_control( 'post_count',
            [
                'label' => esc_html__( 'Posts Per Page', 'clotya-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => count( get_posts( array('post_type' => 'product', 'post_status' => 'publish', 'fields' => 'ids', 'posts_per_page' => '-1') ) ),
                'default' => 8
            ]
        );
		
        $this->add_control( 'cat_filter',
            [
                'label' => esc_html__( 'Filter Category', 'clotya-core' ),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->clotya_cpt_taxonomies('product_cat'),
                'description' => 'Select Category(s)',
                'default' => '',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'post_include_filter',
            [
                'label' => esc_html__( 'Include Post', 'clotya-core' ),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->clotya_cpt_get_post_title('product'),
                'description' => 'Select Post(s) to Include',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'order',
            [
                'label' => esc_html__( 'Select Order', 'clotya-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'ASC' => esc_html__( 'Ascending', 'clotya-core' ),
                    'DESC' => esc_html__( 'Descending', 'clotya-core' )
                ],
                'default' => 'DESC'
            ]
        );
		
        $this->add_control( 'orderby',
            [
                'label' => esc_html__( 'Order By', 'clotya-core' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'id' => esc_html__( 'Post ID', 'clotya-core' ),
                    'menu_order' => esc_html__( 'Menu Order', 'clotya-core' ),
                    'rand' => esc_html__( 'Random', 'clotya-core' ),
                    'date' => esc_html__( 'Date', 'clotya-core' ),
                    'title' => esc_html__( 'Title', 'clotya-core' ),
                ],
                'default' => 'date',
            ]
        );

		$this->add_control( 'on_sale',
			[
				'label' => esc_html__( 'On Sale Products?', 'clotya-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'clotya-core' ),
				'label_off' => esc_html__( 'False', 'clotya-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);

		$this->add_control( 'hide_out_of_stock_items',
			[
				'label' => esc_html__( 'Hide Out of Stock?', 'clotya-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'clotya-core' ),
				'label_off' => esc_html__( 'False', 'clotya-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
		$this->add_control( 'featured',
			[
				'label' => esc_html__( 'Featured Products?', 'clotya-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'clotya-core' ),
				'label_off' => esc_html__( 'False', 'clotya-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
		$this->add_control( 'best_selling',
			[
				'label' => esc_html__( 'Best Selling Products?', 'clotya-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'True', 'clotya-core' ),
				'label_off' => esc_html__( 'False', 'clotya-core' ),
				'return_value' => 'true',
				'default' => 'false',
			]
		);
		
		$this->end_controls_section();
		/*****   END CONTROLS SECTION   ******/

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$output = '';

		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		} else {
			$paged = 1;
		}
	
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => $settings['post_count'],
			'order'          => 'DESC',
			'post_status'    => 'publish',
			'paged' 			=> $paged,
            'post__in'       => $settings['post_include_filter'],
            'order'          => $settings['order'],
			'orderby'        => $settings['orderby']
		);
	
		$args['klb_special_query'] = true;
	

		$product_visibility_term_ids = wc_get_product_visibility_term_ids();
	
		$args['tax_query'][] = array(
			'taxonomy' => 'product_visibility',
			'field'    => 'term_taxonomy_id',
			'terms'    => $product_visibility_term_ids['exclude-from-catalog'],
			'operator' => 'NOT IN',
		);


		if($settings['hide_out_of_stock_items']== 'true'){
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'product_visibility',
					'field'    => 'name',
					'terms'    => 'outofstock',
					'operator' => 'NOT IN',
				),
			); // WPCS: slow query ok.
		}

		if($settings['cat_filter']){
			$args['tax_query'][] = array(
				'taxonomy' 	=> 'product_cat',
				'field' 	=> 'term_id',
				'terms' 	=> $settings['cat_filter']
			);
		}

		if($settings['best_selling']== 'true'){
			$args['meta_key'] = 'total_sales';
			$args['orderby'] = 'meta_value_num';
		}

		if($settings['featured'] == 'true'){
			$args['tax_query'] = array( array(
				'taxonomy' => 'product_visibility',
				'field'    => 'name',
				'terms'    => array( 'featured' ),
					'operator' => 'IN',
			) );
		}
		
		if($settings['on_sale'] == 'true'){
			$args['meta_key'] = '_sale_price';
			$args['meta_value'] = array('');
			$args['meta_compare'] = 'NOT IN';
		}
	

		?>
		
		<?php
		
		$product_style = $settings['product_style'] == 'style2' ? 'module-products style-2' : '';


		$output .= '<div class="site-module module-products">';
		$output .= '<div class="module-body">';
		$output .= '<div class="site-slider carousel owl-carousel products '.esc_attr($product_style).'" data-desktop="'.esc_attr($settings['column']).'" data-tablet="'.esc_attr($settings['tablet_column']).'" data-mobile="'.esc_attr($settings['mobile_column']).'" data-speed="'.esc_attr($settings['slide_speed']).'" data-loop="true" data-gutter="30" data-dots="'.esc_attr($settings['dots']).'" data-nav="'.esc_attr($settings['arrows']).'" data-autoplay="'.esc_attr($settings['auto_play']).'" data-autospeed="'.esc_attr($settings['auto_speed']).'" data-autostop="true">';
					
		$loop = new \WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
				global $product;
				global $post;
				global $woocommerce;
			
				$output .= '<div class="'.esc_attr( implode( ' ', wc_get_product_class( '', $product->get_id()))).'">';
					if($settings['product_type'] == 'type4'){
						$output .= clotya_product_type4();
					}elseif($settings['product_type'] == 'type3'){
						$output .= clotya_product_type3();
					}elseif($settings['product_type'] == 'type2'){
						$output .= clotya_product_type2();
					} else {
						$output .= clotya_product_type1();
					}
				$output .= '</div>';
		
			endwhile;
		}
		wp_reset_postdata();

		$output .= '</div><!-- owl-carousel -->';
		$output .= '</div><!-- module-body -->';
		$output .= '</div><!-- site-module -->';


		echo $output;
	}

}
