<?php
/**
 * Created by PhpStorm.
 * User: Neo
 * Date: 14.11.2018
 * Time: 13:58
 */

/**
 * Template Name: Sign up Form
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
?>
	<form id="registerform" action="<?php site_url('wp-login.php?action=register'); ?>" method="post">
		<p>
			<label for="user_login">
				Имя пользователя<br>
				<input type="text" name="user_login" id="user_login" class="input" value="" size="20" style="" required>
			</label>
		</p>
		<p>
			<label for="user_email">
				E-mail<br>
				<input type="email" name="user_email" id="user_email" class="input" value="" size="25" required>
			</label>
		</p>
		
		<p id="reg_passmail">Подтверждение регистрации будет отправлено на ваш e-mail.</p>
		
		<br class="clear">
		<input type="hidden" name="redirect_to" value="">
		
		<p class="submit"><input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Регистрация"></p>
	</form>
<?php	get_footer();

