<?php

/*************************************************
## Scripts
*************************************************/
function clotya_newsletter_scripts() {
	wp_register_style( 'klb-newsletter',   plugins_url( 'css/newsletter.css', __FILE__ ), false, '1.0');
	wp_register_script( 'klb-newsletter',  plugins_url( 'js/newsletter.js', __FILE__ ), true );

}
add_action( 'wp_enqueue_scripts', 'clotya_newsletter_scripts' );

add_action('wp_footer', 'clotya_newsletter_filter'); 
function clotya_newsletter_filter() { 

	if(get_theme_mod('clotya_newsletter_popup_toggle',0) == 1){
		wp_enqueue_script('jquery-cookie');
		wp_enqueue_script('klb-newsletter');
		wp_enqueue_style('klb-newsletter');

		$newsletter  = isset( $_COOKIE['newsletter-popup-visible'] ) ? $_COOKIE['newsletter-popup-visible'] : 'hide';
		
		if($newsletter == 'disable'){
			return;
		}

		?>
		
		  <div id="newsletter-popup" class="site-newsletter" data-expires="<?php echo esc_attr(get_theme_mod('clotya_newsletter_popup_expire_date')); ?>">
			<div class="newsletter-wrapper">
			  <div class="newsletter-inner">

				<div class="newsletter-close">
				  <i class="klbth-icon-cancel"></i>
				</div><!-- newsletter-close -->

				<h5 class="entry-title"><?php echo esc_html(get_theme_mod('clotya_newsletter_popup_title')); ?></h5>

				<div class="entry-desc">
				  <p><?php echo clotya_sanitize_data(get_theme_mod('clotya_newsletter_popup_subtitle')); ?></p>
				</div><!-- entry-desc -->

				<div class="site-newsletter-form">
					<?php clotya_subscribe_form(get_theme_mod('clotya_newsletter_popup_formid')); ?>
				</div>
				
				<p>
					<label class="form-checkbox privacy_policy">
						<input type="checkbox" name="dontshow" class="dontshow" value="1">
						<span><?php esc_html_e('Don\'t show this popup again.','clotya-core'); ?></span>
					</label>
				</p>


			  </div><!-- newsletter-inner -->
			  <div class="newsletter-popup-overlay"></div>
			</div><!-- newsletter-wrapper -->
			
		  </div><!-- site-newsletter -->

		<?php
	}
}