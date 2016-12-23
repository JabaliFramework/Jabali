<?php

// Add page-login.php to the $exclude_pages array
function mdlf_remove_login($exclude_pages) {

	$exclude_login = array(
		'templates/page-login.php',
	);
 
	// combine the two arrays
	$exclude_pages = array_merge($exclude_login, $exclude_pages);
 
	return $exclude_pages;
}
add_filter('ese_exclude_metabox_post_types', 'mdlf_remove_login');

/**
 * Adds a meta box to the post editing screen
 */
function mdlf_custom_meta() {

	global $post;

	$file = get_post_meta($post->ID, '_wp_page_template', true);

	/**
	 * Create meta box just for Ribbon page template
	 */
	if ($file == 'templates/page-login.php' ) {

		add_meta_box( 'mdlf_meta', __( 'Login Customization', 'mdlf' ), 'mdlf_login_callback', 'page' );
	}
}
add_action( 'add_meta_boxes', 'mdlf_custom_meta' );


/**
 * Ribbon Page Template - Outputs the content of the meta box
 */
function mdlf_login_callback( $post ) {
	wp_nonce_field( plugin_basename( MDLF_PLUGIN_FILE ), 'mdlf_nonce' );
	$mdlf_stored_meta = get_post_meta( $post->ID );
	?>

	<table class="form-table">
		<tbody>

			<tr>
			    <th scope="row">
			        <label for="mdlf-login-card-bg-color" class="mdlf-row-title"><?php _e( 'Card Background Color', 'mdlf' )?></label>
			    </th>
			    <td>
			        <input name="mdlf-login-card-bg-color" type="text" value="<?php if ( isset ( $mdlf_stored_meta['mdlf-login-card-bg-color'] ) ) echo $mdlf_stored_meta['mdlf-login-card-bg-color'][0]; ?>" class="meta-color" /> 
			        <br>
        			<span class="description">This is the color that will be displayed if a featured image is NOT uploaded.</span>  
			    </td>
			</tr>

			<tr>
			    <th scope="row">
			        <label for="mdlf-login-title" class="mdlf-row-title"><?php _e( 'Card Title', 'mdlf' )?></label>
			    </th>
			    <td>
			        <input type="text" name="mdlf-login-title" id="mdlf-login-title" class="regular-text" value="<?php if ( isset ( $mdlf_stored_meta['mdlf-login-title'] ) ) echo $mdlf_stored_meta['mdlf-login-title'][0]; ?>" />
			        <br>
	        		<span class="description">This will be the title text</span>   
			    </td>
			</tr>

			<tr>
			    <th scope="row">
			        <label for="mdlf-login-title-color" class="mdlf-row-title"><?php _e( 'Card Title Color', 'mdlf' )?></label>
			    </th>
			    <td>
			        <input name="mdlf-login-title-color" type="text" value="<?php if ( isset ( $mdlf_stored_meta['mdlf-login-title-color'] ) ) echo $mdlf_stored_meta['mdlf-login-title-color'][0]; ?>" class="meta-color" /> 
			        <br>
        			<span class="description">This is the color of the title.</span>  
			    </td>
			</tr>

			<tr>
			    <th scope="row">
			        <label for="mdlf-login-height" class="mdlf-row-title"><?php _e( 'Card Title Height', 'mdlf' )?></label>
			    </th>
			    <td>
			        <input type="text" name="mdlf-login-height" id="mdlf-login-height" class="medium-text" value="<?php if ( isset ( $mdlf_stored_meta['mdlf-login-height'] ) ) echo $mdlf_stored_meta['mdlf-login-height'][0]; ?>" />
			        <br>
	        		<span class="description">This will be the height of the featured image login section.</span>   
			    </td>
			</tr>
			
		</tbody>
	</table>

	<?php
}



/**
 * Saves the custom meta input
 */
function mdlf_meta_save( $post_id ) {
 
	// Checks save status
	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce = ( isset( $_POST[ 'mdlf_nonce' ] ) && wp_verify_nonce( $_POST[ 'mdlf_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
	// Exits script depending on save status
	if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
		return;
	}

	// Checks for input and sanitizes/saves if needed
	if( isset( $_POST[ 'mdlf-login-height' ] ) ) {
		update_post_meta( $post_id, 'mdlf-login-height', sanitize_text_field( $_POST[ 'mdlf-login-height' ] ) );
	}

	// Checks for input and sanitizes/saves if needed
	if( isset( $_POST[ 'mdlf-login-title' ] ) ) {
		update_post_meta( $post_id, 'mdlf-login-title', sanitize_text_field( $_POST[ 'mdlf-login-title' ] ) );
	}

	// Checks for input and saves if needed
	if( isset( $_POST[ 'mdlf-login-bg-color' ] ) ) {
		update_post_meta( $post_id, 'mdlf-login-bg-color', $_POST[ 'mdlf-login-bg-color' ] );
	}

	// Checks for input and saves if needed
	if( isset( $_POST[ 'mdlf-login-card-bg-color' ] ) ) {
		update_post_meta( $post_id, 'mdlf-login-card-bg-color', $_POST[ 'mdlf-login-card-bg-color' ] );
	}

	// Checks for input and saves if needed
	if( isset( $_POST[ 'mdlf-login-title-color' ] ) ) {
		update_post_meta( $post_id, 'mdlf-login-title-color', $_POST[ 'mdlf-login-title-color' ] );
	}

	// Checks for input and saves if needed
	if( isset( $_POST[ 'mdlf-bg-image' ] ) ) {
		update_post_meta( $post_id, 'mdlf-bg-image', $_POST[ 'mdlf-bg-image' ] );
	}

}
add_action( 'save_post', 'mdlf_meta_save' );
