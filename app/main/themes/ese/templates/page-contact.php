<?php
/**
 *
 * Template Name: Contact Page
 *
 *
 * @package Ese
 */

if(isset($_POST['submitted'])) {
    if(trim($_POST['contactName']) === '') {
        $nameError = true;
        $hasError = true;
    } else {
        $name = trim($_POST['contactName']);
    }

    if(trim($_POST['email']) === '')  {
        $emailError = true;
        $hasError = true;
    } else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
        $emailError = true;
        $hasError = true;
    } else {
        $email = trim($_POST['email']);
    }

    if(trim($_POST['comments']) === '') {
        $commentError = true;
        $hasError = true;
    } else {
        if(function_exists('stripslashes')) {
            $comments = stripslashes(trim($_POST['comments']));
        } else {
            $comments = trim($_POST['comments']);
        }
    }


    if(!isset($hasError)) {
        $emailTo = get_option('admin_email');
        if (!isset($emailTo) || ($emailTo == '') ){
            $emailTo = get_option('admin_email');
        }
        $subject = __('From ','ese').$name;
        $body = __('Name: ','ese').$name."\n".__('Email: ','ese').$email."\n".__('Comments: ','ese').$comments;
        $headers = __('From: ','ese') .$name. ' <'.$emailTo.'>' . "\r\n" . __('Reply-To:','ese') .$name. '<'.$email.'>';

        wp_mail($emailTo, $subject, $body, $headers);
        $emailSent = true;
    }

}

get_header(); ?>

	
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php do_action( 'ese_before_content' ); ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				    // Gets the stored background color value 
				    $color_value = get_post_meta( get_the_ID(), 'ese-ribbon-bg-color', true ); 
				    // Checks and returns the color value
				  	$color = (!empty( $color_value ) ? 'background-color:' . $color_value . ';' : '');

				  	// Gets the stored height value 
				    $height_value = get_post_meta( get_the_ID(), 'ese-ribbon-height', true ); 
				    // Checks and returns the height value
				  	$height = (!empty( $height_value ) ? 'height:' . $height_value . ';' : '');

				  	 // Gets the uploaded featured image
				  	$featured_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
				  	// Checks and returns the featured image
				  	$bg = (!empty( $featured_img ) ? "background-image: url('". $featured_img[0] ."');" : '');
				?>

				<div class="ribbon" style="<?php echo $color . $bg . $height; ?> "></div>

				<div class="ese-page-ribbon">
					<div class="mdl-grid ese-1600">
						<div class="mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
						<div class="mdl-cell mdl-cell--8-col mdl-card mdl-shadow--2dp ribbon-content"> 
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								
								<header>
									<?php the_title( sprintf( '<h3>','</h3>' )); ?>
								</header><!-- .entry-header -->

								<div class="entry-content mdl-color-text--grey-600">
									<?php the_content(); ?>

									<?php if(isset($emailSent) && $emailSent == true) { ?>
								                <div class="alert alert-success" role="alert">
								                    <p><?php _e('Thanks, your email was sent successfully.', 'ese'); ?></p>
								                </div>
								            <?php } else { ?>

								                <?php if(isset($hasError) || isset($captchaError)) { ?>
								                    
													  <strong><?php _e('Error!', 'ese'); ?></strong> <?php _e('Please try again.', 'ese'); ?>
													
								                <?php } ?>

										        <form action="<?php the_permalink(); ?>" id="contactForm" method="post">

										            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php if(isset($nameError)) { echo "has-error has-feedback"; }?>">
										                    <label class="mdl-textfield__label" for="contactName"><?php _e('Name', 'ese'); ?></label>
										                    <input class="mdl-textfield__input" type="text" name="contactName" id="contactName" value="" />
										                    <?php if(isset($nameError)) { ?>
										                       <span class="mdl-textfield__error">Name Required</span>
										                    <?php } ?>
										              
										               </div>
										               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php if(isset($emailError)) { echo "has-error has-feedback"; }?>">
										                    <label class="mdl-textfield__label" for="email"><?php _e('Email', 'ese'); ?></label>
										                
										                    <input class="mdl-textfield__input" type="text" name="email" id="email" value="" />
										                    <?php if(isset($emailError)) { ?>
										                       <span class="mdl-textfield__error">Email Required</span>
										                    <?php } ?>
										               
										               </div>
										                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label <?php if(isset($commentError)) { echo "has-error has-feedback"; }?>">
										                    <label class="mdl-textfield__label" for="commentsText"><?php _e('Message', 'ese'); ?></label>
										               
										                    <textarea class="mdl-textfield__input" name="comments" id="commentsText" rows="10" cols="20"></textarea>
										                     <?php if(isset($commentError)) { ?>
										                        <span class="mdl-textfield__error">Message Required</span>
										                    <?php } ?>
										                
										               </div>
										               <div class="form-actions">
										                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"><?php _e('Send Email', 'ese'); ?></button>
										                    <input type="hidden" name="submitted" id="submitted" value="true" />
										               </div>
										        </form>

								        <?php } ?>

									      

									<?php
										wp_link_pages( array(
											'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ese' ),
											'after'  => '</div>',
										) );
									?>
								</div><!-- .entry-content -->
							</article><!-- #post-## -->
						</div> <!-- .mdl-cell -->
					</div>
				</div>



				<?php do_action( 'ese_before_comments' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

				<?php do_action( 'ese_after_comments' ); ?>

			<?php endwhile; // End of the loop. ?>

			<?php do_action( 'ese_after_content' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	

<?php get_footer(); ?>