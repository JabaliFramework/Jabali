<?php global $mdlf_options, $post; ?>

<?php 
// show any error messages after form submission
//mdlf_show_error_messages( 'register' ); 
?>

<?php 
	if ( isset( $_POST["mdlf_register_nonce"] ) && wp_verify_nonce( $_POST['mdlf_register_nonce'], 'mdlf-register-nonce' ) ) {

		if( ! is_user_logged_in() ) {
			$user['id']		          = 0;
			$user['login']		      = sanitize_text_field( $_POST['mdlf_user_login'] );
			$user['email']		      = sanitize_text_field( $_POST['mdlf_user_email'] );
			$user['password']		  = sanitize_text_field( $_POST['mdlf_user_pass'] );
			$user['password_confirm'] = sanitize_text_field( $_POST['mdlf_user_pass_confirm'] );
			$user['need_new']         = true;
		}


		if( $user['need_new'] ) {
			if( username_exists( $user['login'] ) ) {
				// Username already registered
				$userTaken = true;
			}
			if( ! validate_username( $user['login'] ) ) {
				// invalid username
				$userInvalid = true;
			}
			if( empty( $user['login'] ) ) {
				// empty username
				$userEmpty = true;
			}
			if( ! is_email( $user['email'] ) ) {
				//invalid email
				$emailInvalid = true;
			}
			if( email_exists( $user['email'] ) ) {
				//Email address already registered
				$emailTaken = true;
			}
			if( empty( $user['password'] ) ) {
				// passwords do not match
				$emptyPass = true;	
			}
			if( $user['password'] !== $user['password_confirm'] ) {
				// passwords do not match
				$matchPass = true;	
			}
		}
	}
?>

<form id="mdlf_registration_form" class="mdlf_form" method="POST" action="<?php echo esc_url( mdlf_get_current_url() ); ?>">

	<?php if( ! is_user_logged_in() ) : ?>

	<?php do_action( 'mdlf_before_register_form_fields' ); ?>

	<fieldset class="mdlf_login_data mdl-card__supporting-text">
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php if(isset($userTaken) || isset($userInvalid) || isset($userEmpty)) { echo "mdlf-error"; }?>">
			<input name="mdlf_user_login" id="mdlf_user_login" class="mdl-textfield__input required" type="text" <?php if( isset( $_POST['mdlf_user_login'] ) ) { echo 'value="' . esc_attr( $_POST['mdlf_user_login'] ) . '"'; } ?>/>
			<label class="mdl-textfield__label" for="mdlf_user_Login"><?php echo apply_filters ( 'mdlf_registration_username_label', __( 'Username', 'mdlf' ) ); ?></label>
			<?php if(isset($userTaken)) { ?>
                <span class="mdl-textfield__error">Username already taken</span>
            <?php } ?>
            <?php if(isset($userInvalid)) { ?>
                <span class="mdl-textfield__error">Invalid username</span>
            <?php } ?>
            <?php if(isset($userEmpty)) { ?>
                <span class="mdl-textfield__error">Please enter a username</span>
            <?php } ?>
		</div>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php if(isset($emailInvalid) || isset($emailTaken)) { echo "mdlf-error"; }?>">
			<input name="mdlf_user_email" id="mdlf_user_email" class="mdl-textfield__input required" type="text" <?php if( isset( $_POST['mdlf_user_email'] ) ) { echo 'value="' . esc_attr( $_POST['mdlf_user_email'] ) . '"'; } ?>/>
			<label class="mdl-textfield__label" for="mdlf_user_email"><?php echo apply_filters ( 'mdlf_registration_email_label', __( 'Email', 'mdlf' ) ); ?></label>	
			<?php if(isset($emailTaken)) { ?>
                <span class="mdl-textfield__error">Email already registered</span>
            <?php } ?>
            <?php if(isset($emailInvalid)) { ?>
                <span class="mdl-textfield__error">Invalid email</span>
            <?php } ?>
		</div>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php if(isset($emptyPass) || isset($matchPass)) { echo "mdlf-error"; }?>">
			<input name="mdlf_user_pass" id="mdlf_password" class="mdl-textfield__input required" type="password"/>
			<label class="mdl-textfield__label" for="password"><?php echo apply_filters ( 'mdlf_registration_password_label', __( 'Password', 'mdlf' ) ); ?></label>
			<?php if( isset($emptyPass)) { ?>
                <span class="mdl-textfield__error">Please enter a password</span>
            <?php } ?>
            <?php if(isset($matchPass)) { ?>
                <span class="mdl-textfield__error">Passwords do not match</span>
            <?php } ?>
		</div>
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php if(isset($matchPass)) { echo "mdlf-error"; }?>">
			<input name="mdlf_user_pass_confirm" id="mdlf_password_again" class="mdl-textfield__input required" type="password"/>
			<label class="mdl-textfield__label" for="password_again"><?php echo apply_filters ( 'mdlf_registration_password_again_label', __( 'Password Again', 'mdlf' ) ); ?></label>
			<?php if(isset($matchPass)) { ?>
                <span class="mdl-textfield__error">Passwords do not match</span>
            <?php } ?>
		</div>


		<?php do_action( 'mdlf_before_registration_submit_field' ); ?>

			<input type="hidden" name="mdlf_action" value="register"/>
			<input type="hidden" name="mdlf_register_nonce" value="<?php echo wp_create_nonce('mdlf-register-nonce' ); ?>"/>
			<input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" type="submit" name="mdlf_submit_registration" id="mdlf_submit" value="<?php echo apply_filters ( 'mdlf_registration_register_button', __( 'Register', 'mdlf' ) ); ?>"/>
		

	</fieldset>
</form>

	<?php else :  ?>

		<div class="mdlf_logged_in mdl-card__supporting-text">
		 <p class="login-info">
		 	<?php echo apply_filters( 'mdlf_registration_content_logged_in', __( 'You are already logged in! Go to the <a href="'.admin_url().'">Dashboard</a>.', 'mdlf' ) ); ?>
	    </p>
		<a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" href="<?php echo wp_logout_url( home_url() ); ?>"><?php _e( 'Logout', 'mdlf' ); ?></a>
	</div>
<?php endif; ?>






	
