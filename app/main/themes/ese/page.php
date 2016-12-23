<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the Jabali construct of pages
 * and that other 'pages' on your Jabali site will use a
 * different template.
 *
 * @package Ese
 */

get_header(); ?>

		
	<div id="primary" class="content-area">
		<main id="main" class="site-main mdl-grid ese-900" role="main">

			<?php do_action( 'ese_before_content' ); ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

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
