<?php 
/*************************************************
* Catalog Ordering
*************************************************/
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 ); 
add_action( 'klb_catalog_ordering', 'woocommerce_catalog_ordering', 30 ); 

add_action( 'woocommerce_before_shop_loop', 'clotya_catalog_ordering_start', 30 );
function clotya_catalog_ordering_start(){
?>

	<div class="before-shop-loop">
		<div class="filter-button hide-desktop">
			<a href="#">
				<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M10 18h4v-2h-4v2zM3 6v2h18V6H3zm3 7h12v-2H6v2z"/></svg> 
				<?php esc_html_e('Filter', 'clotya-core'); ?>
			</a>
		</div><!-- filter-button -->
		
		<?php if(get_theme_mod('clotya_grid_list_view','0') == '1'){ ?>
			<div class="product-views-buttons hide-mobile">
				<?php if(clotya_shop_view() == 'list_view') { ?>
					  <a href="<?php echo esc_url(add_query_arg('shop_view','grid_view')); ?>" class="grid-view" data-bs-toggle="tooltip" data-bs-placement="top" title="Grid Products">
						<svg width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						  <path d="M14 20.4V14.6C14 14.2686 14.2686 14 14.6 14H20.4C20.7314 14 21 14.2686 21 14.6V20.4C21 20.7314 20.7314 21 20.4 21H14.6C14.2686 21 14 20.7314 14 20.4Z" stroke="currentColor" stroke-width="1.5"/>
						  <path d="M3 20.4V14.6C3 14.2686 3.26863 14 3.6 14H9.4C9.73137 14 10 14.2686 10 14.6V20.4C10 20.7314 9.73137 21 9.4 21H3.6C3.26863 21 3 20.7314 3 20.4Z" stroke="currentColor" stroke-width="1.5"/>
						  <path d="M14 9.4V3.6C14 3.26863 14.2686 3 14.6 3H20.4C20.7314 3 21 3.26863 21 3.6V9.4C21 9.73137 20.7314 10 20.4 10H14.6C14.2686 10 14 9.73137 14 9.4Z" stroke="currentColor" stroke-width="1.5"/>
						  <path d="M3 9.4V3.6C3 3.26863 3.26863 3 3.6 3H9.4C9.73137 3 10 3.26863 10 3.6V9.4C10 9.73137 9.73137 10 9.4 10H3.6C3.26863 10 3 9.73137 3 9.4Z" stroke="currentColor" stroke-width="1.5"/>
						</svg>                      
					  </a>
				
					<a href="<?php echo esc_url(add_query_arg('shop_view','list_view')); ?>" class="list-view active" data-bs-toggle="tooltip" data-bs-placement="top" title="List Products">
						<svg width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M8 6L20 6" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M4 6.01L4.01 5.99889" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M4 12.01L4.01 11.9989" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M4 18.01L4.01 17.9989" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M8 12L20 12" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M8 18L20 18" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>                      
					</a>

				<?php } else { ?>
					  <a href="<?php echo esc_url(add_query_arg('shop_view','grid_view')); ?>" class="grid-view active" data-bs-toggle="tooltip" data-bs-placement="top" title="Grid Products">
						<svg width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						  <path d="M14 20.4V14.6C14 14.2686 14.2686 14 14.6 14H20.4C20.7314 14 21 14.2686 21 14.6V20.4C21 20.7314 20.7314 21 20.4 21H14.6C14.2686 21 14 20.7314 14 20.4Z" stroke="currentColor" stroke-width="1.5"/>
						  <path d="M3 20.4V14.6C3 14.2686 3.26863 14 3.6 14H9.4C9.73137 14 10 14.2686 10 14.6V20.4C10 20.7314 9.73137 21 9.4 21H3.6C3.26863 21 3 20.7314 3 20.4Z" stroke="currentColor" stroke-width="1.5"/>
						  <path d="M14 9.4V3.6C14 3.26863 14.2686 3 14.6 3H20.4C20.7314 3 21 3.26863 21 3.6V9.4C21 9.73137 20.7314 10 20.4 10H14.6C14.2686 10 14 9.73137 14 9.4Z" stroke="currentColor" stroke-width="1.5"/>
						  <path d="M3 9.4V3.6C3 3.26863 3.26863 3 3.6 3H9.4C9.73137 3 10 3.26863 10 3.6V9.4C10 9.73137 9.73137 10 9.4 10H3.6C3.26863 10 3 9.73137 3 9.4Z" stroke="currentColor" stroke-width="1.5"/>
						</svg>                      
					  </a>
				
					<a href="<?php echo esc_url(add_query_arg('shop_view','list_view')); ?>" class="list-view" data-bs-toggle="tooltip" data-bs-placement="top" title="List Products">
						<svg width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M8 6L20 6" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M4 6.01L4.01 5.99889" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M4 12.01L4.01 11.9989" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M4 18.01L4.01 17.9989" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M8 12L20 12" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M8 18L20 18" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>                      
					</a>

				<?php } ?>
			</div>
		<?php } ?>
		
		<?php add_action( 'clotya_result_count', 'woocommerce_result_count', 20 ); ?>
		<?php do_action('clotya_result_count'); ?>
				
		<!-- For perpage option-->
		<?php if(get_theme_mod('clotya_perpage_view','0') == '1'){ ?>
			<?php $perpage = isset($_GET['perpage']) ? $_GET['perpage'] : ''; ?>
			<?php $defaultperpage = wc_get_default_products_per_row() * wc_get_default_product_rows_per_page(); ?>
			<?php $options = array($defaultperpage,$defaultperpage*2,$defaultperpage*3,$defaultperpage*4); ?>
			<div class="per-page-products hide-mobile">
				<span><?php esc_html_e('Show:','clotya-core'); ?></span>
				<form class="woocommerce-ordering product-filter products-per-page" method="get">
					<?php if (clotya_get_body_class('clotya-ajax-shop-on')) { ?>
						<select name="perpage" class="perpage orderby filterSelect select2-hidden-accessible" data-class="select-filter-perpage">
					<?php } else { ?>
						<select name="perpage" class="perpage orderby filterSelect select2-hidden-accessible" data-class="select-filter-perpage" onchange="this.form.submit()">
					<?php } ?>
						<?php for( $i=0; $i<count($options); $i++ ) { ?>
						<option value="<?php echo esc_attr($options[$i]); ?>" <?php echo esc_attr($perpage == $options[$i] ? 'selected="selected"' : ''); ?>><?php echo esc_html($options[$i]); ?> <?php esc_html_e('Items','clotya-core'); ?></option>
						<?php } ?>
					</select>
					<?php wc_query_string_form_fields( null, array( 'perpage', 'submit', 'paged', 'product-page' ) ); ?>
				</form>
			</div>

		<?php } ?>
				
		<!-- For get orderby from loop -->
		<?php do_action('klb_catalog_ordering'); ?>
	
	
		<?php if( get_theme_mod( 'clotya_shop_layout' ) == 'full-width' || clotya_get_option() == 'full-width') { ?>
              <div class="filter-wide-button dropdown hide-mobile">
                <a href="#" class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="false">
                  
                 <?php esc_html_e('Filter Products','clotya-core'); ?>
                </a>
                <div class="filter-holder dropdown-menu">
                  <div class="filter-holder-wrapper">
					<?php if ( is_active_sidebar( 'shop-sidebar' ) ) { ?>
						<?php dynamic_sidebar( 'shop-sidebar' ); ?>
					<?php } ?>
                  </div><!-- filter-holder-wrapper -->
                </div><!-- filter-holder -->
              </div><!-- filter-wide-button -->
		<?php } ?>
	
	</div>


	<?php echo clotya_remove_klb_filter(); ?>
	<?php wp_enqueue_style( 'klb-remove-filter'); ?>
<?php

}