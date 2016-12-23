<?php
/**
 * Adds a meta box to the post editing screen
 */
function ese_custom_meta() {

	global $post;

	$pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);

	 $exclude_pages = array(
        'templates/page-ribbon.php',
    );
	

	/**
	 * Create meta box for all posts and pages except $exclude_pages
	 */
	if (! in_array($pageTemplate, apply_filters( 'ese_exclude_metabox_post_types' , $exclude_pages ))) {
		
		$screens = array( 'post', 'page' );

		if(has_filter('ese_include_metabox_post_types')) {
			$screens = apply_filters('ese_include_metabox_post_types', $screens);
		}

		foreach ( $screens as $screen ) {
			add_meta_box( 'ese_meta', __( 'Customize', 'ese' ), 'ese_meta_callback', $screen );
		}
	}

	/**
	 * Create meta box just for Ribbon page template
	 */
	if ($pageTemplate == 'templates/page-ribbon.php' ) {

		add_meta_box( 'ese_meta', __( 'Customize', 'ese' ), 'ese_ribbon_callback', 'page' );
	}
}
add_action( 'add_meta_boxes', 'ese_custom_meta' );

/**
 * Posts & Pages - Outputs the content of the meta box
 */
function ese_meta_callback( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'ese_nonce' );
	$ese_stored_meta = get_post_meta( $post->ID );
	?>

	<table class="form-table">
		<tbody>

			<tr>
			    <th scope="row">
			        <label for="ese-bg-color" class="ese-row-title"><?php _e( 'Background Color', 'ese' )?></label>
			    </th>
			    <td>
			        <input name="ese-bg-color" type="text" value="<?php if ( isset ( $ese_stored_meta['ese-bg-color'] ) ) echo $ese_stored_meta['ese-bg-color'][0]; ?>" class="meta-color" /> 
			        <br>
        			<span class="description">This is the color that will be displayed if a featured image is NOT uploaded.</span>  
			    </td>
			</tr>
			
			<tr>
			    <th scope="row">
			        <label for="ese-title-color" class="ese-row-title"><?php _e( 'Title Color', 'ese' )?></label>
			    </th>
			    <td>
			        <input name="ese-title-color" type="text" value="<?php if ( isset ( $ese_stored_meta['ese-title-color'] ) ) echo $ese_stored_meta['ese-title-color'][0]; ?>" class="meta-color" /> 
			        <br>
        			<span class="description">This is the color of the title.</span>  
			    </td>
			</tr>

			<tr>
			    <th scope="row">
			        <label for="ese-height" class="ese-row-title"><?php _e( 'Height', 'ese' )?></label>
			    </th>
			    <td>
			        <input type="text" name="ese-height" id="ese-height" class="medium-text" value="<?php if ( isset ( $ese_stored_meta['ese-height'] ) ) echo $ese_stored_meta['ese-height'][0]; ?>" />
			        <br>
	        		<span class="description">This will be the height of the featured image section. (Default = 280px)</span>   
			    </td>
			</tr>
			
		</tbody>
	</table>

	<?php
}

/**
 * Ribbon Page Template - Outputs the content of the meta box
 */
function ese_ribbon_callback( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'ese_nonce' );
	$ese_stored_meta = get_post_meta( $post->ID );
	?>

	<table class="form-table">
		<tbody>

			<tr>
			    <th scope="row">
			        <label for="ese-ribbon-bg-color" class="ese-row-title"><?php _e( 'Background Color', 'ese' )?></label>
			    </th>
			    <td>
			        <input name="ese-ribbon-bg-color" type="text" value="<?php if ( isset ( $ese_stored_meta['ese-ribbon-bg-color'] ) ) echo $ese_stored_meta['ese-ribbon-bg-color'][0]; ?>" class="meta-color" /> 
			        <br>
        			<span class="description">This is the color that will be displayed if a featured image is NOT uploaded.</span>  
			    </td>
			</tr>

			<tr>
			    <th scope="row">
			        <label for="ese-ribbon-height" class="ese-row-title"><?php _e( 'Height', 'ese' )?></label>
			    </th>
			    <td>
			        <input type="text" name="ese-ribbon-height" id="ese-ribbon-height" class="medium-text" value="<?php if ( isset ( $ese_stored_meta['ese-ribbon-height'] ) ) echo $ese_stored_meta['ese-ribbon-height'][0]; ?>" />
			        <br>
	        		<span class="description">This will be the height of the featured image ribbon section. (Default = 40vh)</span>   
			    </td>
			</tr>
			
		</tbody>
	</table>

	<?php
}



/**
 * Saves the custom meta input
 */
function ese_meta_save( $post_id ) {
 
	// Checks save status
	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce = ( isset( $_POST[ 'ese_nonce' ] ) && wp_verify_nonce( $_POST[ 'ese_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
	// Exits script depending on save status
	if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
		return;
	}
 
	// Checks for input and sanitizes/saves if needed
	if( isset( $_POST[ 'ese-height' ] ) ) {
		update_post_meta( $post_id, 'ese-height', sanitize_text_field( $_POST[ 'ese-height' ] ) );
	}

	// Checks for input and saves if needed
	if( isset( $_POST[ 'ese-bg-color' ] ) ) {
		update_post_meta( $post_id, 'ese-bg-color', $_POST[ 'ese-bg-color' ] );
	}

	// Checks for input and saves if needed
	if( isset( $_POST[ 'ese-title-color' ] ) ) {
		update_post_meta( $post_id, 'ese-title-color', $_POST[ 'ese-title-color' ] );
	}

	// Checks for input and sanitizes/saves if needed
	if( isset( $_POST[ 'ese-ribbon-height' ] ) ) {
		update_post_meta( $post_id, 'ese-ribbon-height', sanitize_text_field( $_POST[ 'ese-ribbon-height' ] ) );
	}

	// Checks for input and saves if needed
	if( isset( $_POST[ 'ese-ribbon-bg-color' ] ) ) {
		update_post_meta( $post_id, 'ese-ribbon-bg-color', $_POST[ 'ese-ribbon-bg-color' ] );
	}

}
add_action( 'save_post', 'ese_meta_save' );


/**
 * Loads the color picker javascript
 */
function ese_color_enqueue() {
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'meta-box-color-js', get_template_directory_uri() . '/js/color-picker.js', array( 'wp-color-picker' ) );
}
add_action( 'admin_enqueue_scripts', 'ese_color_enqueue' );

/**
 * Loads the image management javascript
 */
function ese_image_enqueue() {	
		wp_enqueue_media();
 
		// Registers and enqueues the required javascript.
		wp_register_script( 'meta-box-image', get_template_directory_uri() . '/js/meta-image-uploader.js', array( 'jquery' ) );
		wp_localize_script( 'meta-box-image', 'meta_image',
			array(
				'title' => __( 'Choose or Upload an Image', 'ese' ),
				'button' => __( 'Use this image', 'ese' ),
			)
		);
		wp_enqueue_script( 'meta-box-image' );	
}
add_action( 'admin_enqueue_scripts', 'ese_image_enqueue' );
