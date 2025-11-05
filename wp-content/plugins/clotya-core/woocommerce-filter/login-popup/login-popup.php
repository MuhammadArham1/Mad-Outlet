<?php
/*************************************************
## Scripts
*************************************************/
function clotya_login_popup_scripts() {
	wp_register_script( 'klb-login-popup',   plugins_url( 'js/login-popup.js', __FILE__ ), false, '1.0');
	wp_register_style( 'klb-login-popup',   plugins_url( 'css/login-popup.css', __FILE__ ), false, '1.0');
}
add_action( 'wp_enqueue_scripts', 'clotya_login_popup_scripts' );

/*************************************************
## Login Popup
*************************************************/
if ( ! function_exists( 'clotya_login_popup' ) ) {
	function clotya_login_popup(){
		
	if(get_theme_mod('clotya_header_popup_login') != 1 || is_user_logged_in()){
		return;
	}
	
	wp_enqueue_style( 'klb-login-popup');
	wp_enqueue_script( 'klb-login-popup');

	?>
	
	<div class="klb-modal-root authentication-modal">
		<div class="klb-modal-inner">
			<?php if(get_theme_mod( 'clotya_header_popup_login_image' )){ ?>
				<div class="authentication-modal-banner min-1024 ">
					<a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>">
						<img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'clotya_header_popup_login_image' )) ); ?>" alt="<?php bloginfo("name"); ?>">
					</a>
				</div><!-- authentication-modal-banner -->
			<?php } ?>
			<div class="klb-authentication-modal">
				<div class="klb-modal-header">
					<h4 class="entry-title"><?php esc_html_e('Log in', 'clotya'); ?></h4>
					<div class="site-close">
						<i class="klbth-icon-cancel"></i>
					</div><!-- site-close -->        
				</div><!-- klb-modal-header -->
				<div class="klb-authentication-form tab-style">
					<div id="klb-authentication" class="klb-authentication-inner">
						<div class="klb-login-form">
							<?php do_action( 'woocommerce_before_customer_login_form' ); ?>
							<form class="woocommerce-form woocommerce-form-login login" method="post">

								<?php do_action( 'woocommerce_login_form_start' ); ?>

								<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<label for="username"><?php esc_html_e( 'Username or email address', 'clotya' ); ?>&nbsp;<span class="required">*</span></label>
									<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
								</p>
								<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<label for="password"><?php esc_html_e( 'Password', 'clotya' ); ?>&nbsp;<span class="required">*</span></label>
									<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
								</p>

								<?php do_action( 'woocommerce_login_form' ); ?>
								
								<p class="form-row">
									<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
										<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'clotya' ); ?></span>
									</label>
									
									<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
									<button type="submit" class="woocommerce-button button primary woocommerce-form-login__submit<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="login" value="<?php esc_attr_e( 'Log in', 'clotya' ); ?>"><?php esc_html_e( 'Log in', 'clotya' ); ?></button>
								</p>

								<div class="lost-password">
									<p class="woocommerce-LostPassword lost_password">
										<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'clotya' ); ?></a>
									</p>
								</div>

								<?php do_action( 'woocommerce_login_form_end' ); ?>

							</form>

							<?php do_action( 'woocommerce_after_customer_login_form' ); ?>

							<p class="privacy-text"><?php esc_html_e('By continuing, you accept the Website Regulations , Regulations for the sale of alcoholic beverages and the', 'clotya'); ?> <?php echo get_the_privacy_policy_link(); ?></p>

						</div><!-- klb-login-form -->
					</div><!-- klb-authentication-inner -->
				</div><!-- klb-authentication-form -->
				<div class="klb-authentication-tab">
					<p><?php esc_html_e('You dont have an account yet?', 'clotya'); ?> <a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>#register"><?php esc_html_e('Register Now', 'clotya'); ?></a></p>
				</div><!-- klb-authentication-tab -->
			</div><!-- klb-authentication-modal -->
		</div><!-- klb-modal-inner -->
		<div class="login-drawer-overlay"></div>
	</div><!-- klb-theme-modal -->

	<?php
	}
}
add_action('wp_footer','clotya_login_popup');