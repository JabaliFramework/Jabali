<?php global $mdlf_login_form_args; ?>
<?php if( ! is_user_logged_in() ) : ?>

	<?php //mdlf_show_error_messages( 'login' ); ?>

	<?php 
		if(isset($_POST['mdlf_action'])) {
	        $user = get_user_by( 'login', $_POST['mdlf_user_login'] );

			if( !$user ) {
				$userError = true;
			}

			if( !isset( $_POST['mdlf_user_pass'] ) || $_POST['mdlf_user_pass'] == '') {
				$passemptyError = true;
			}

			if( $user ) {
				// check the user's login with their password
				if( !wp_check_password( $_POST['mdlf_user_pass'], $user->user_pass, $user->ID ) ) {
					$passError = true;
				}
			}
		} 
	?>


	

	<form id="mdlf_login_form"  class="mdlf_form" method="POST" action="<?php echo esc_url( mdlf_get_current_url() ); ?>">
		<fieldset class="mdlf_login_data mdl-card__supporting-text">

			<?php if ( $mdlf_login_form_args['lost_password_sent'] ) : ?>
			    <p class="login-info">
			    	<?php echo apply_filters( 'mdlf_check_email', __( 'Check your email for a link to reset your password.', 'mdlf' ) ); ?>   
			    </p>
			<?php endif; ?>

			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php if(isset($userError) || isset($passError)) { echo "mdlf-error"; }?>">
			    <input name="mdlf_user_login" id="mdlf_user_login" class="mdl-textfield__input required" type="text" />
			    <label class="mdl-textfield__label" for="mdlf_user_Login"><?php _e( 'Username', 'mdlf' ); ?></label>
			    <?php if(isset($userError) || isset($passError)) { ?>
                    <span class="mdl-textfield__error">Invalid Username</span>
                <?php } ?>
			  </div>

			  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php if(isset($passError) || isset($passemptyError)) { echo "mdlf-error"; }?>">
			    <input name="mdlf_user_pass" id="mdlf_user_pass" class="mdl-textfield__input required" type="password" />
			    <label class="mdl-textfield__label" for="mdlf_user_pass"><?php _e( 'Password', 'mdlf' ); ?></label>
			    <?php if(isset($passError) || isset($passemptyError) ) { ?>
                    <span class="mdl-textfield__error">Invalid password</span>
                <?php } ?>
			  </div>

			  <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="mdlf_user_remember">
				  <input type="checkbox" name="mdlf_user_remember" id="mdlf_user_remember" value="1" class="mdl-checkbox__input" />
				  <span class="mdl-checkbox__label"><?php _e( 'Remember Me', 'mdlf' ); ?></span>
				</label>

				
				<input type="hidden" name="mdlf_action" value="login"/>
				<input type="hidden" name="mdlf_redirect" value="<?php echo esc_url( $mdlf_login_form_args['redirect'] ); ?>"/>
				<input type="hidden" name="mdlf_login_nonce" value="<?php echo wp_create_nonce( 'mdlf-login-nonce' ); ?>"/>
				<input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" id="mdlf_login_submit" type="submit" value="Login"/>	

		</fieldset>

			<div class="mdl-card__actions mdl-card--border">
				<div class="mdlf_lost_password">
			  		<a href="<?php echo esc_url( wp_lostpassword_url( mdlf_get_current_url() ) ); ?>"><?php _e( 'Lost your password?', 'mdlf' ); ?></a>
			  	</div>
			  	<?php if ( get_option( 'users_can_register' ) ) { ?>
			  	<div class="mdlf_new_register">
			  		<a href="<?php echo wp_registration_url(); ?>">Register</a>
			  	</div>
			  	<?php } ?>
			</div>
								
	</form>
<?php else : ?>

	<div class="mdlf_logged_in mdl-card__supporting-text">
		 <p class="login-info">
		 	<?php echo apply_filters( 'mdlf_registration_logged_in', __( 'You are already logged in! Go to the <a href="'.admin_url().'">Dashboard</a>.', 'mdlf' ) ); ?>
	    </p>
		<a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" href="<?php echo wp_logout_url( home_url() ); ?>"><?php _e( 'Logout', 'mdlf' ); ?></a>
	</div>
<?php endif; ?>