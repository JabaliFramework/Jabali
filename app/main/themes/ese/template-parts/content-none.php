<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://jabali.github.io/Docs/Template_Hierarchy
 *
 * @package Ese
 */

?>

<div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--2dp"> 
	<section class="no-results not-found mdl-card__supporting-text">
		<header class="page-header">
			<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'ese' ); ?></h1>
		</header><!-- .page-header -->

		<div class="page-content">
			<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

				<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'ese' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

			<?php elseif ( is_search() ) : ?>

				<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ese' ); ?></p>

			<?php else : ?>

				<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'ese' ); ?></p>

			<?php endif; ?>
		</div><!-- .page-content -->
	</section><!-- .no-results -->
</div> <!-- .mdl-cell -->
