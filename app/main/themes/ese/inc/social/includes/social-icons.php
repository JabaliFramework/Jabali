<?php
/**
* Add the markup to the post content
*/
function material_social_icons($content) { 

	global $post;

	if ( is_single() ) {

		ob_start();

		$content .= social_html();

		$content = $content . ob_get_clean();
	}

    return $content;
   
} 

add_filter( 'the_content', 'material_social_icons' );

/**
* Get the featured image
*/
function social_post_img() {
	global $post;
	$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '', '' );
	  if ( has_post_thumbnail($post->ID) ) {
	    $social_image = $src[0];

	    return $social_image;
	}
}

/**
* Markup to display social icons
*/
function social_html() { ?>

	<div class="mdl-card__menu material-social">
	    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
	      <i class="material-icons">share</i>
	    </button>
	</div>

	<div class="social-btn rrssb-buttons">  	
		<a href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>" class="mdl-button mdl-js-button mdl-button--icon popup">
	 		<i class="material-icons mdi mdi-twitter"></i>
		</a>
		<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" class="mdl-button mdl-js-button mdl-button--icon popup">
			<i class="material-icons mdi mdi-facebook"></i>
		</a>
		<a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&amp;media=<?php echo social_post_img(); ?>" class="mdl-button mdl-js-button mdl-button--icon popup">
		 	<i class="material-icons mdi mdi-pinterest"></i>
		</a>
		<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" class="mdl-button mdl-js-button mdl-button--icon popup">
		  	<i class="material-icons mdi mdi-linkedin"></i>
		</a>
	</div>

<?php }