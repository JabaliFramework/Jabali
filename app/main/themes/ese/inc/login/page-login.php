<?php
/**
 *
 * Template Name: Login
 *
 *
 * @package Ese
 */

get_header(); ?>

<?php
    

  	// Gets the stored title color value 
    $title_color_value = get_post_meta( get_the_ID(), 'mdlf-login-title-color', true ); 
    // Checks and returns the color value
  	$title_color = (!empty( $title_color_value ) ? 'color:' . $title_color_value . ';' : '');

  	// Gets the stored card background color value 
    $card_bg_value = get_post_meta( get_the_ID(), 'mdlf-login-card-bg-color', true ); 
    // Checks and returns the color value
  	$card_bg = (!empty( $card_bg_value ) ? 'background-color:' . $card_bg_value . ';' : '');

  	 // Gets the stored title background color value 
    $color_value = get_post_meta( get_the_ID(), 'mdlf-login-bg-color', true ); 
    // Checks and returns the color value
  	$color = (!empty( $color_value ) ? 'background-color:' . $color_value . ';' : '');

  	// Gets the stored height value 
    $height_value = get_post_meta( get_the_ID(), 'mdlf-login-height', true ); 
    // Checks and returns the height value
  	$height = (!empty( $height_value ) ? 'height:' . $height_value . ';' : '');

  	// Gets the stored text value 
    $title_text = get_post_meta( get_the_ID(), 'mdlf-login-title', true );

  	 // Gets the uploaded featured image
  	$featured_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
  	// Checks and returns the featured image
  	$bg = (!empty( $featured_img ) ? "background-image: url('". $featured_img[0] ."');" : '');

?>


	<div class="login-card">

			<?php do_action( 'ese_before_content' ); ?>

			<?php while ( have_posts() ) : the_post(); ?>
						
						<div class="mdl-card mdl-shadow--2dp mdlf-login-card"> 

							<div class="mdl-card__title" style="<?php echo $height . $card_bg . $bg; ?> ">

								<?php if ($title_text != '') { ?>

							    	<h2 class="mdl-card__title-text" style="<?php echo $title_color; ?> "><?php echo $title_text; ?></h2>

							    <?php } ?>
							   
							  </div>
							
								<div class="content">
									<?php the_content(); ?>
									
								</div><!-- .content -->
						
						</div> <!-- .mdl-cell -->
					

			<?php endwhile; // End of the loop. ?>

	</div><!-- .login -->

	

<?php get_footer(); ?>