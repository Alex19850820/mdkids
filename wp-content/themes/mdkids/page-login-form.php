<?php
/**
 * Created by PhpStorm.
 * User: Neo
 * Date: 14.11.2018
 * Time: 13:58
 */

/**
 * Template Name: Login Form
 *
 * Allow users to update their profiles from Frontend.
 *
 */
if($current_user->ID) {
	if($current_user->roles[0] == 'administrator' ) {
		wp_safe_redirect( '/wp-admin' );
	} else {
		wp_safe_redirect( '/cabinet' );
	}
}
get_header();
	$args = [
		'echo'           => true,
		'redirect'       => site_url( $_SERVER['REQUEST_URI'] )."/cabinet-profile",
		'form_id'        => 'loginform',
		'label_email' => __( 'Email' ),
		'label_password' => __( 'Password' ),
		'label_remember' => __( 'Remember Me' ),
		'label_log_in'   => __( 'Log In' ),
		'id_email'    => 'user_email',
		'id_password'    => 'user_pass',
		'id_remember'    => 'rememberme',
		'id_submit'      => 'wp-submit',
		'remember'       => true,
		'value_username' => NULL,
		'value_remember' => false
	];
	wp_login_form( $args );
	get_footer();