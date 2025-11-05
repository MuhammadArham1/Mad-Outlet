<?php 
/*************************************************
## Clotya Nav Menu Endpoints
*************************************************/ 

function clotya_add_nav_menu_meta_boxes() {
	add_meta_box( 'clotya_endpoints_nav_link', esc_html__( 'Clotya endpoints', 'clotya-core' ), 'clotya_nav_menu_links' , 'nav-menus', 'side', 'low' );
}
add_action( 'admin_head-nav-menus.php', 'clotya_add_nav_menu_meta_boxes');

function clotya_nav_menu_links() {
	?>
	<div id="posttype-clotya-endpoints" class="posttypediv">
		<div id="tabs-panel-clotya-endpoints" class="tabs-panel tabs-panel-active">
			<ul id="clotya-endpoints-checklist" class="categorychecklist form-no-clear">

				<li>
					<label class="menu-item-title">
						<input type="checkbox" class="menu-item-checkbox" name="menu-item[-1][menu-item-object-id]" value="0" /> <?php esc_html_e('Elementor Template', 'clotya-core'); ?>
					</label>
					<input type="hidden" class="menu-item-type" name="menu-item[-1][menu-item-type]" value="custom" />
					<input type="hidden" class="menu-item-title" name="menu-item[-1][menu-item-title]" value="Elementor Template" />
					<input type="hidden" class="menu-item-url" name="menu-item[-1][menu-item-url]" value="#" />
					<input type="hidden" class="menu-item-classes" name="menu-item[-1][menu-item-classes]" value="klb-elementor-template" />
				</li>

			</ul>
		</div>
		<p class="button-controls">
			<span class="list-controls">
				<a href="<?php echo esc_url( admin_url( 'nav-menus.php?page-tab=all&selectall=1#posttype-clotya-endpoints' ) ); ?>" class="select-all"><?php esc_html_e( 'Select all', 'clotya-core' ); ?></a>
			</span>
			<span class="add-to-menu">
				<button type="submit" class="button-secondary submit-add-to-menu right" value="<?php esc_attr_e( 'Add to menu', 'clotya-core' ); ?>" name="add-post-type-menu-item" id="submit-posttype-clotya-endpoints"><?php esc_html_e( 'Add to menu', 'clotya-core' ); ?></button>
				<span class="spinner"></span>
			</span>
		</p>
	</div>
	<?php
}

/*************************************************
## Mega Menu
*************************************************/ 
require_once( __DIR__ . '/mega-menu/mega-menu.php' );