<?php global $mdlf_password_form_args; ?>

<?php // mdlf_show_error_messages( 'password' ); ?>

    <?php 
       if ( isset( $_REQUEST['errors']  ) == 'empty_username' ) {
            $emptyEmail = true; 
        }

        if ( isset( $_REQUEST['errors']  ) == 'invalid_email' ) {
            $noEmail = true;
        } 
    ?>


 <?php if( ! is_user_logged_in() ) : ?>
 
    <form id="lostpasswordform" action="<?php echo wp_lostpassword_url(); ?>" method="post">
        <fieldset class="mdlf_login_data mdl-card__supporting-text">

        <p>
            <?php echo apply_filters( 'mdlf_enter_email', __( "Enter your email address and we'll send you a link you can use to pick a new password.", 'mdlf' ) ); ?>     
        </p>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php if(isset($emptyEmail) || isset($noEmail)) { echo "mdlf-error"; }?>">
             
            <input class="mdl-textfield__input required" type="text" name="user_login" id="user_login" />
            <label class="mdl-textfield__label" for="user_login"><?php _e( 'Email', 'mdlf' ); ?></label>
             <?php if(isset($noEmail)) { ?>
                <span class="mdl-textfield__error">There are no users registered with this email address.</span>
            <?php } ?>
           
        </div>
  
        	<input type="hidden" name="mdlf_action" value="reset-password"/>
        	<input type="hidden" name="mdlf_password_nonce" value="<?php echo wp_create_nonce( 'mdlf-password-nonce' ); ?>"/>
            <input type="submit" name="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" value="<?php _e( 'Reset Password', 'mdlf' ); ?>"/>
        
        </fieldset>
    </form>

        <?php else :  ?>

        <div class="mdlf_logged_in mdl-card__supporting-text">
         <p class="login-info">
            <?php echo apply_filters( 'mdlf_registration_password_logged_in', __( 'Go to your <a href="'.admin_url('profile.php').'">User Profile</a> to change your password.', 'mdlf' ) ); ?>
        </p>
        <a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" href="<?php echo wp_logout_url( home_url() ); ?>"><?php _e( 'Logout', 'mdlf' ); ?></a>
    </div>
<?php endif; ?>
