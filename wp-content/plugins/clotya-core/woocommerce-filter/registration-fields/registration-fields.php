<?php

/*************************************************
## More Fields Woocommerce Registration form
*************************************************/ 
function clotya_woocommerce_registration_form_fields() {
    return apply_filters( 'woocommerce_forms_field', array(
		'first_name' => array(
			'type'        => 'text',
			'label'       => esc_html__( 'First Name', 'clotya-core' ),
			'required'    => true,
			'default' => ( ! empty( $_POST['first_name'] ) ) ? esc_attr( wp_unslash( $_POST['first_name'] ) ) : '',
		),
		
		'last_name' => array(
			'type'        => 'text',
			'label'       => esc_html__( 'Last Name', 'clotya-core' ),
			'required'    => true,
			'default' => ( ! empty( $_POST['last_name'] ) ) ? esc_attr( wp_unslash( $_POST['last_name'] ) ) : '',
		),
		
		'billing_company' => array(
			'type'        => 'text',
			'label'       => esc_html__( 'Company Name', 'clotya-core' ),
			'required'    => true,
			'default' => ( ! empty( $_POST['billing_company'] ) ) ? esc_attr( wp_unslash( $_POST['billing_company'] ) ) : '',
		),
		'billing_phone' => array(
			'type'        => 'tel',
			'label'       => esc_html__( 'Phone', 'clotya-core' ),
			'required'    => true,
			'default' => ( ! empty( $_POST['billing_phone'] ) ) ? esc_attr( wp_unslash( $_POST['billing_phone'] ) ) : '',
		),
		
    ) );
}

function clotya_woocommerce_edit_registration_form() {
    $fields = clotya_woocommerce_registration_form_fields();
    foreach ( $fields as $key => $field_args ) {
		if(get_theme_mod('clotya_registration_'.$key) == 'visible'){
            woocommerce_form_field( $key, $field_args );
		}
    }
}
add_action( 'woocommerce_register_form', 'clotya_woocommerce_edit_registration_form', 15 );


/*************************************************
## Woocommerce Registration form Validate
*************************************************/ 
add_action( 'woocommerce_register_post', 'clotya_registration_form_validate_fields', 10, 3 );
function clotya_registration_form_validate_fields( $username, $email, $errors ) {
	if ( isset($_POST['first_name']) && empty( $_POST['first_name'] ) ) {
		$errors->add( 'billing_first_name_error', esc_html__("Please enter a valid first name.", "clotya-core") );
	}
	
	if ( isset($_POST['last_name']) && empty( $_POST['last_name'] ) ) {
		$errors->add( 'billing_last_name_error', esc_html__("Please enter a valid last name.", "clotya-core") );
	}
	if ( isset($_POST['billing_company']) && empty( $_POST['billing_company'] ) ) {
		$errors->add( 'billing_company_error', esc_html__("Please enter a valid company name.", "clotya-core") );
	}
	
	if ( isset($_POST['billing_phone']) && empty( $_POST['billing_phone'] ) ) {
		$errors->add( 'billing_phone_error', esc_html__("Please enter a valid phone number.", "clotya-core") );
	}
}

/*************************************************
## Save WooCommerce registration form custom fields
*************************************************/ 
function clotya_save_woocommerce_registration_fields( $customer_id ) {
    if( wp_verify_nonce( sanitize_text_field( $_REQUEST['woocommerce-register-nonce'] ), 'woocommerce-register' ) ) {
        if ( isset( $_POST['first_name'] ) ) {
            update_user_meta( $customer_id, 'first_name', sanitize_text_field( $_POST['first_name'] ) );
        }
		
        if ( isset( $_POST['last_name'] ) ) {
            update_user_meta( $customer_id, 'last_name', sanitize_text_field( $_POST['last_name'] ) );
        }
		
        if ( isset( $_POST['billing_company'] ) ) {
            update_user_meta( $customer_id, 'billing_company', sanitize_text_field( $_POST['billing_company'] ) );
        }
		
        if ( isset( $_POST['billing_phone'] ) ) {
            update_user_meta( $customer_id, 'billing_phone', sanitize_text_field( $_POST['billing_phone'] ) );
        }

    }
}
add_action( 'woocommerce_created_customer', 'clotya_save_woocommerce_registration_fields' ); 
 
/*************************************************
## More Fields Account Details - My Account form
*************************************************/ 
function clotya_woocommerce_account_details_form_fields() {
	$user = wp_get_current_user();
    return apply_filters( 'woocommerce_forms_field', array(
		'billing_company' => array(
			'type'        => 'text',
			'label'       => esc_html__( 'Company Name', ' clotya' ),
			'required'    => true,
			'default' => $user->billing_company,
		),
		'billing_phone' => array(
			'type'        => 'tel',
			'label'       => esc_html__( 'Phone', ' clotya' ),
			'required'    => true,
			'default' => $user->billing_phone,
		)
    ) );
}

function clotya_woocommerce_edit_account_details_form() {
    $fields = clotya_woocommerce_account_details_form_fields();
    foreach ( $fields as $key => $field_args ) {
		if(get_theme_mod('clotya_registration_'.$key) == 'visible'){
            woocommerce_form_field( $key, $field_args );
		}
    }
}
add_action( 'woocommerce_edit_account_form_start', 'clotya_woocommerce_edit_account_details_form', 15 );

/*************************************************
## Save Account Details - My Account Form
*************************************************/
add_action( 'woocommerce_save_account_details', 'save_extra_fields_account_details', 12, 1 );
function save_extra_fields_account_details( $user_id ) {
    if( isset( $_POST['billing_company'] ) ){
        update_user_meta( $user_id, 'billing_company', sanitize_text_field( $_POST['billing_company'] ) );
	}

    if( isset( $_POST['billing_phone'] ) ){
        update_user_meta( $user_id, 'billing_phone', sanitize_text_field( $_POST['billing_phone'] ) );
	}
}

/*************************************************
## Woocommerce Account Details - My Account Validate
*************************************************/
add_action( 'woocommerce_save_account_details_errors','wooc_validate_custom_field', 10, 1 );
function wooc_validate_custom_field( $errors ){
	if ( isset($_POST['billing_company']) && empty( $_POST['billing_company'] ) ) {
		$errors->add( 'billing_company_error', esc_html__("Please enter a valid company name.", "clotya-core") );
	}
	
	if ( isset($_POST['billing_phone']) && empty( $_POST['billing_phone'] ) ) {
		$errors->add( 'billing_phone_error', esc_html__("Please enter a valid phone number.", "clotya-core") );
	}
}