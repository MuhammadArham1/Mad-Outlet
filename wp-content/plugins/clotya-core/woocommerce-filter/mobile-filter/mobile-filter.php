<?php
/*************************************************
* Mobile Filter
*************************************************/
add_action('wp_footer', 'clotya_mobile_filter'); 
function clotya_mobile_filter() { 

	$mobilebottommenu = get_theme_mod('clotya_mobile_bottom_menu','0');
	if($mobilebottommenu == '1'){

?>

	<?php $edittoggle = get_theme_mod('clotya_mobile_bottom_menu_edit_toggle','0'); ?>
	<?php if($edittoggle == '1'){ ?>
		<div class="mobile-bottom-menu hide-desktop">
			<nav class="mobile-menu">
				<ul>
					<?php $editrepeater = get_theme_mod('clotya_mobile_bottom_menu_edit'); ?>
					
					<?php foreach($editrepeater as $e){ ?>
						<?php if($e['mobile_menu_type'] == 'filter'){ ?>
							<?php if(is_shop()){ ?>
								<li class="menu-item">
									<a href="#" class="filter-button">
										<i class="klbth-icon-<?php echo esc_attr($e['mobile_menu_icon']); ?>"></i>
										<span><?php echo esc_html($e['mobile_menu_text']); ?></span>
									</a>
								</li>
							<?php } ?>
						<?php } elseif($e['mobile_menu_type'] == 'search'){ ?>
							<li class="menu-item">
								<a href="#" class="search-button">
									<i class="klbth-icon-<?php echo esc_attr($e['mobile_menu_icon']); ?>"></i>
									<span><?php echo esc_html($e['mobile_menu_text']); ?></span>
								</a>
							</li>
						<?php } elseif($e['mobile_menu_type'] == 'category'){ ?>
							<?php if(!is_shop()){ ?>
								<li class="menu-item">
									<a href="#" class="categories">
										<i class="klbth-icon-<?php echo esc_attr($e['mobile_menu_icon']); ?>"></i>
										<span><?php echo esc_html($e['mobile_menu_text']); ?></span>
									</a>
								</li>
							<?php } ?>
						<?php } else { ?>
							<li class="menu-item">
								<a href="<?php echo esc_url($e['mobile_menu_url']); ?>" class="user">
									<i class="klbth-icon-<?php echo esc_attr($e['mobile_menu_icon']); ?>"></i>
									<span><?php echo esc_html($e['mobile_menu_text']); ?></span>
								</a>
							</li>
						<?php } ?>
					<?php } ?>
				
				</ul>
			</nav>
		</div>
	<?php } else { ?>
		<div class="mobile-bottom-menu hide-desktop">
			<nav class="mobile-menu">
				<ul>
					<li class="menu-item">
						<?php if(!is_shop()){ ?>
							<a href="<?php echo wc_get_page_permalink( 'shop' ); ?>" class="store">
								<i class="klbth-icon-store"></i>
								<span><?php esc_html_e('Store','clotya-core'); ?></span>
							</a>
						<?php } else { ?>
							<a href="<?php echo esc_url( home_url( "/" ) ); ?>" class="store">
								<i class="klbth-icon-box"></i>
								<span><?php esc_html_e('Home','clotya-core'); ?></span>
							</a>
						<?php } ?>
					</li>

					<?php if(is_shop()){ ?>
						<li class="menu-item">
							<a href="#" class="filter-button">
								<svg xmlns="http://www.w3.org/2000/svg" height="33px" viewBox="0 0 24 24" width="24px" fill="currentColor"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M10 18h4v-2h-4v2zM3 6v2h18V6H3zm3 7h12v-2H6v2z"/></svg>  
								<span><?php esc_html_e('Filter','clotya-core'); ?></span>
							</a>
						</li>
					<?php } ?>

					<li class="menu-item">
						<a href="#" class="search-button">
							<i class="klbth-icon-search"></i>
							<span><?php esc_html_e('Search','clotya-core'); ?></span>
						</a>
					</li>
					
					<?php if ( function_exists( 'tinv_url_wishlist_default' ) ) { ?>
						<li class="menu-item">
							<a href="<?php echo tinv_url_wishlist_default(); ?>" class="wishlist">
								<i class="klbth-icon-heart-empty"></i>
								<span><?php esc_html_e('Wishlist','clotya-core'); ?></span>
							</a>
						</li>
					<?php } ?>
					
					<li class="menu-item">
						<a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>" class="user">
							<i class="klbth-icon-usert"></i>
							<span><?php esc_html_e('Account','clotya-core'); ?></span>
						</a>
					</li>

					<?php $sidebarmenu = get_theme_mod('clotya_header_sidebar','0'); ?>
					<?php if($sidebarmenu == '1'){ ?>
						<?php if(!is_shop()){ ?>
							<li class="menu-item">
								<a href="#" class="categories">
									<i class="klbth-icon-source_icons_menu"></i>
									<span><?php esc_html_e('Categories','clotya-core'); ?></span>
								</a>
							</li>
						<?php } ?>
					<?php } ?>

				</ul>
			</nav><!-- mobile-menu -->
		</div><!-- mobile-bottom-menu -->

	<?php } ?>
	
<?php }

    
}