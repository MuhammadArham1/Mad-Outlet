<?php

namespace Elementor;

class Clotya_Latest_Blog_Widget extends Widget_Base {
    use Clotya_Helper;

    public function get_name() {
        return 'clotya-latest-blog';
    }
    public function get_title() {
        return 'Lateste Posts (K)';
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
				
		$this->add_control( 'column',
			[
				'label' => esc_html__( 'Column', 'clotya-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'col-lg-4',
				'options' => [
					'select-column' => esc_html__( 'Select Column', 'clotya-core' ),
					'col-lg-6'	  => esc_html__( '2 Columns', 'clotya-core' ),
					'col-lg-4' 	  => esc_html__( '3 Columns', 'clotya-core' ),
					'col-lg-3'	  => esc_html__( '4 Columns', 'clotya-core' ),
				],
			]
		);
		
        $this->add_control( 'post_count',
            [
                'label' => esc_html__( 'Posts Per Page', 'clotya-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => count( get_posts( array('post_type' => 'post', 'post_status' => 'publish', 'fields' => 'ids', 'posts_per_page' => '-1') ) ),
                'default' => 3
            ]
        );
		
       $this->add_control( 'excerpt_size',
            [
                'label' => esc_html__( 'Excerpt Size', 'clotya-core' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'default' => 15
            ]
        );
		
        $this->add_control( 'category_filter',
            [
                'label' => esc_html__( 'Category', 'naturally' ),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->clotya_get_categories(),
                'description' => 'Select Category(s)',
				'label_block' => true,
            ]
        );
		
        $this->add_control( 'post_filter',
            [
                'label' => esc_html__( 'Specific Post(s)', 'naturally' ),
                'type' => Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => $this->clotya_get_posts(),
                'description' => 'Select Specific Post(s)',
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
		
		$this->add_control(
			'disable_pagination',
			[
				'label' => esc_html__('Disable Pagination', 'clotya-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'clotya-core' ),
				'label_off' => esc_html__( 'No', 'clotya-core' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
		
        $this->add_control( 'image_width',
            [
                'label' => esc_html__( 'Image Width', 'clotya-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '370',
                'pleaceholder' => esc_html__( 'Set the product image width.', 'clotya-core' )
            ]
        );
		
        $this->add_control( 'image_height',
            [
                'label' => esc_html__( 'Image Height', 'clotya-core' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => '260',
                'pleaceholder' => esc_html__( 'Set the product image height.', 'clotya-core' )
            ]
        );

		$this->end_controls_section();

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
			'post_type' => 'post',
			'posts_per_page' => $settings['post_count'],
			'order'          => 'DESC',
			'post_status'    => 'publish',
			'paged' 			=> $paged,
            'post__in'       => $settings['post_filter'],
            'order'          => $settings['order'],
			'orderby'        => $settings['orderby'],
            'category__in'     => $settings['category_filter'],
		);
		
		$output .= '<div class="site-module module-blog">';
		$output .= '<div class="module-body">';
		$output .= '<div class="row">';

		
		$count = 1;
		$loop = new \WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post();
				global $product;
				global $post;
				global $woocommerce;
			
				$id = get_the_ID();
				
				$att=get_post_thumbnail_id();
				$image_src = wp_get_attachment_image_src( $att, 'full' );
				if($image_src){
				$image_src = $image_src[0];
				}
				if($settings['image_width'] && $settings['image_height']){
					$imageresize = clotya_resize( $image_src, $settings['image_width'], $settings['image_height'], true, true, true );  
				} else {
					$imageresize = $image_src;
				}

				$taxonomy = strip_tags( get_the_term_list($post->ID, 'category', '', ', ', '') );

				$output .= '<div class="col col-12 '.esc_attr($settings['column']).'">';
				$output .= '<article class="post">';
				if($image_src){
				$output .= '<figure class="entry-media">';
				$output .= '<a href="'.get_permalink().'"><img src="'.esc_url($imageresize).'" alt="'.the_title_attribute( 'echo=0' ).'"></a>';
				$output .= '</figure>';
				}
				$output .= '<div class="entry-wrapper">';
				$output .= '<div class="entry-meta top">';
				$output .= '<div class="entry-category">';
				$output .= '<a href="'.get_permalink().'">'.esc_html($taxonomy).'</a>';
				$output .= '</div><!-- entry-category -->';
				$output .= '<div class="entry-date">';
				$output .= '<a href="'.get_permalink().'">'.get_the_date('j M Y').'</a>';
				$output .= '</div>';
				$output .= '</div><!-- entry-meta -->';
				$output .= '<h2 class="entry-title"><a href="'.get_permalink().'">'.get_the_title().'</a></h2>';
				$output .= '<div class="entry-content">';
				$output .= '<p>'.clotya_limit_words(get_the_excerpt(), $settings['excerpt_size']).' </p>';
				$output .= '</div><!-- entry-content -->';
				$output .= '</div><!-- entry-wrapper -->';
				$output .= '</article><!-- post -->';
				$output .= '</div><!-- col -->';
				
			endwhile;
		
			if($settings['disable_pagination'] != 'yes'){
				ob_start();
				get_template_part( 'post-format/pagination' );
				$output .= '<div class="col-12">'. ob_get_clean().'</div>';
			}
		
		}
		wp_reset_postdata();
		

		$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';

		
		echo $output;
	}

}
