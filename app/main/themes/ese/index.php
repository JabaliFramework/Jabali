<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a Jabali theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.jabali.github.io/Template_Hierarchy
 *
 * @package Ese
 */

get_header(); ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main mdl-grid ese-900" role="main">

		<?php if ( have_posts() ) : ?>

			<?php do_action( 'ese_before_content' ); ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php do_action( 'ese_before_pagination' ); ?>

			<?php ese_posts_navigation(); ?>

			<?php do_action( 'ese_after_pagination' ); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		<?php do_action( 'ese_after_content' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>