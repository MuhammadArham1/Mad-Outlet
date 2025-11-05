<?php

namespace Elementor;

class Clotya_Offered_Products_Widget extends Widget_Base {
    use Clotya_Helper;

    public function get_name() {
        return 'clotya-offered-products';
    }
    public function get_title() {
        return 'Offered Product (K)';
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
		
        // Posts Per Page
        $this->add_control( 'post_count',
            [
                'label' => esc_html__( 'Posts Per Page', 'clotya' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => count( get_posts( array('post_type' => 'product', 'post_status' => 'publish', 'fields' => 'ids', 'posts_per_page' => '-1') ) ),
                'default' => 2
            ]
        );
		
        $this->add_control( 'cat_filter',
            [
                'label' => esc_html__( 'Filter Category', 'clotya' ),
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
                'label' => esc_html__( 'Include Post', 'clotya' ),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->clotya_cpt_get_post_title('product'),
                'description' => 'Select Post(s) to Include',
                'label_block' => true,
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
                'default' => 'DESC'
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
                'default' => 'date',
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
	
		if($settings['cat_filter']){
			$args['tax_query'][] = array(
				'taxonomy' 	=> 'product_cat',
				'field' 	=> 'term_id',
				'terms' 	=> $settings['cat_filter']
			);
		}

		
		$output .= '<div class="site-module module-offed-products style-1">';
		$output .= '<div class="module-body products">';
				  
		$loop = new \WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
				global $product;
				global $post;
				global $woocommerce;
			
				$id = get_the_ID();
				$allproduct = wc_get_product( get_the_ID() );
				
				$att=get_post_thumbnail_id();
				$image_src = wp_get_attachment_image_src( $att, 'full' );
				$image_src = $image_src[0];
				$imageresize = clotya_resize( $image_src, 304, 173, true, true, true );

				$cart_url = wc_get_cart_url();
				$price = $allproduct->get_price_html();
				$weight = $product->get_weight();
				$stock_status = $product->get_stock_status();
				$managestock = $product->managing_stock();
				$stock_text = $product->get_availability();
				$short_desc = $product->get_short_description();
				$rating = wc_get_rating_html($product->get_average_rating());
				$ratingcount = $product->get_review_count();
				$wishlist = get_theme_mod( 'clotya_wishlist_button', '0' );
				$compare = get_theme_mod( 'clotya_compare_button', '0' );
				$quickview = get_theme_mod( 'clotya_quick_view_button', '0' );

				if( $product->is_type('variable') ) {
					$variation_ids = $product->get_visible_children();
					$variation = wc_get_product( $variation_ids[0] );
			
					$sale_price_dates_to = ( $date = get_post_meta( $variation_ids[0], '_sale_price_dates_to', true ) ) ? date_i18n( 'Y/m/d', $date ) : '';
				} else {
					$sale_price_dates_to = ( $date = get_post_meta( $id, '_sale_price_dates_to', true ) ) ? date_i18n( 'Y/m/d', $date ) : '';
				}

				$total_sales = $product->get_total_sales();
				$stock_quantity = $product->get_stock_quantity();

				if($managestock && $stock_quantity > 0) {
				$progress_percentage = floor($total_sales / (($total_sales + $stock_quantity) / 100)); // yuvarlama
				}
				
				
				$output .= '<div class="product">';
				$output .= '<div class="product-content">';
				$output .= '<div class="thumbnail-wrapper">';
				$output .= clotya_sale_percentage();

				$output .= '<div class="product-buttons style-1">';

				ob_start();
				do_action('clotya_wishlist_action');
				$output .= ob_get_clean();

				if($quickview == '1'){
				$output .= '<a href="'.$product->get_id().'" class="detail-bnt quick-view-button"><i class="klbth-icon-resize"></i></a>';
				}

				ob_start();
				$output .= do_action('clotya_compare_action');
				$output .= ob_get_clean();

				$output .= '</div><!-- product-buttons -->';
				$output .= '<a href="'.get_permalink().'"><img src="'.clotya_product_image().'" alt="'.the_title_attribute( 'echo=0' ).'"></a>';
				$output .= '</div><!-- thumbnail-wrapper -->';
				$output .= '<div class="content-wrapper">';
							  
				$output .= '<h3 class="product-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h3>';
				$output .= '<span class="price">';
				$output .= $price;
				$output .= '</span><!-- price -->';
				if($ratingcount){
					$output .= '<div class="product-rating">';
					$output .= $rating;
					$output .= '<div class="count-rating">'.sprintf(_n('%d review', '%d reviews', $ratingcount, 'clotya'), $ratingcount).'</div>';
					$output .= '</div><!-- product-rating -->';
				}
				
				if($short_desc){
					$output .= '<div class="entry-content">';
					$output .= '<p>'.$short_desc.'</p>';
					$output .= '</div><!-- entry-content -->';
				}
							  
				$output .= '<div class="offer-countdown">';
				if($sale_price_dates_to){
					$output .= '<p>'.esc_html__('Offer end in:','clotya-core').'</p>';
					$output .= '<div class="countdown" data-date="'.esc_attr($sale_price_dates_to).'" data-text="'.esc_attr__('Expired','clotya-core').'">';
					$output .= '<div class="count-item">';
					$output .= '<div class="days">00</div>';
					$output .= '<div class="count-label">'.esc_html('d','clotya-core').'</div>';
					$output .= '</div><!-- count-item -->';
					$output .= '<span>:</span>';
					$output .= '<div class="count-item">';
					$output .= '<div class="hours">00</div>';
					$output .= '<div class="count-label">'.esc_html('h','clotya-core').'</div>';
					$output .= '</div><!-- count-item -->';
					$output .= '<span>:</span>';
					$output .= '<div class="count-item">';
					$output .= '<div class="minutes">00</div>';
					$output .= '<div class="count-label">'.esc_html('m','clotya-core').'</div>';
					$output .= '</div><!-- count-item -->';
					$output .= '<span>:</span>';
					$output .= '<div class="count-item">';
					$output .= '<div class="second">00</div>';
					$output .= '<div class="count-label">'.esc_html('s','clotya-core').'</div>';
					$output .= '</div><!-- count-item -->';
					$output .= '</div><!-- countdown -->';
				}
				if($managestock && $stock_quantity > 0) {
					$output .= '<div class="sold-product">';
					$output .= '<p>'.esc_html__('Available: ','clotya-core') . esc_html($stock_quantity).' - '.esc_html__('Sold:','clotya-core').' <strong>'.esc_html($total_sales).'</strong></p>';
					$output .= '</div><!-- sold-product -->';
				}
								
				$output .= '</div><!-- offer-countdown -->';
							  
				$output .= '</div><!-- content-wrapper -->';
				$output .= '</div><!-- product-content -->';
				$output .= '</div><!-- product -->';

			endwhile;
		}
		wp_reset_postdata();
		
		
		$output .= '</div><!-- module-body -->';
		$output .= '</div><!-- site-module -->';
		
		echo $output;
	}

}
