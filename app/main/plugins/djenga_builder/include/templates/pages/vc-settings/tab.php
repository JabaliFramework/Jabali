<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}
$tab = preg_replace( '/^vc\-/', '', $page->getSlug() );
$use_custom = get_option( vc_settings()->getFieldPrefix() . 'use_custom' );
$css = ( ( 'color' === $tab ) && $use_custom ) ? ' color_enabled' : '';

$classes = 'vc_settings-tab-content vc_settings-tab-content-active ' . esc_attr( $css );

?>
<script type="text/javascript">
	var vcAdminNonce = '<?php echo vc_generate_nonce( 'vc-admin-nonce' ); ?>';
</script>

<form action="options.php"
	method="post"
	id="vc_settings-<?php echo $tab ?>"
	data-vc-ui-element="settings-tab-<?php echo $tab ?>"
	class="<?php echo $classes ?>"
	<?php echo apply_filters( 'vc_setting-tab-form-' . $tab, '' ) ?>
>

	<?php settings_fields( vc_settings()->getOptionGroup() . '_' . $tab ) ?>
	<?php do_settings_sections( vc_settings()->page() . '_' . $tab ) ?>
	<?php if ( 'general' === $tab && vc_pointers_is_dismissed() ) : ?>
		<table class="form-table">
			<tr>
				<th scope="row"><?php _e( 'Guide tours', 'js_composer' ) ?></th>
				<td>
					<a href="#" class="button vc_pointers-reset-button"
						id="vc_settings-vc-pointers-reset"
						data-vc-done-txt="<?php _e( 'Done', 'js_composer' ) ?>"><?php _e( 'Reset', 'js_composer' ) ?></a>

					<p
						class="description indicator-hint"><?php _e( 'Guide tours are shown in VC editors to help you to start working with editors. You can see them again by clicking button above.', 'js_composer' ) ?></p>
				</td>
			</tr>
		</table>
	<?php endif ?>

	<?php

	$submit_button_attributes = array();
	$submit_button_attributes = apply_filters( 'vc_settings-tab-submit-button-attributes', $submit_button_attributes, $tab );
	$submit_button_attributes = apply_filters( 'vc_settings-tab-submit-button-attributes-' . $tab, $submit_button_attributes, $tab );

	?>

	<?php if ( 'updater' !== $tab ) : ?>
		<?php submit_button( __( 'Save Changes', 'js_composer' ), 'primary', 'submit_btn', true, $submit_button_attributes ); ?>
	<?php endif ?>

	<input type="hidden" name="vc_action" value="vc_action-<?php echo $tab; ?>"
		id="vc_settings-<?php echo $tab; ?>-action"/>

	<?php if ( 'color' === $tab ) : ?>
		<a href="#" class="button vc_restore-button" id="vc_settings-color-restore-default">
			<?php echo __( 'Restore Default', 'js_composer' ) ?>
		</a>
	<?php endif ?>

	<?php if ( 'updater' === $tab ) : ?>

		<div class="vc_settings-activation-deactivation">
			<?php if ( vc_license()->isActivated() ) : ?>
				<p>
					<?php echo __( 'You have activated Djenga Builder version which allows you to access all the customer benefits. Thank you for choosing Djenga Builder as your page builder. If you do not wish to use Djenga Builder on this Jabali site you can deactivate your license below.', 'js_composer' ) ?>
				</p>

				<br/>

				<p>
					<button
						class="button button-primary button-hero button-updater"
						data-vc-action="deactivation"
						type="button"
						id="vc_settings-updater-button">
						<?php echo __( 'Deactivate Djenga Builder', 'js_composer' ) ?>
					</button>

					<img src="<?php echo get_admin_url() ?>/images/wpspin_light.gif" class="vc_updater-spinner"
						id="vc_updater-spinner" width="16" height="16" alt="spinner"/>
				</p>

			<?php else : ?>

				<p>
					<?php echo __( 'In order to receive all benefits of Djenga Builder, you need to activate your copy of the plugin. By activating Djenga Builder license you will unlock premium options - <strong>direct plugin updates</strong>, access to <strong>template library</strong> and <strong>official support.</strong>', 'js_composer' ) ?>
				</p>

				<br/>

				<p>
					<button
						class="button button-primary button-hero button-updater"
						data-vc-action="activation"
						type="button"
						id="vc_settings-updater-button">
						<?php echo __( 'Activate Djenga Builder', 'js_composer' ) ?>
					</button>

					<img src="<?php echo get_admin_url() ?>/images/wpspin_light.gif" class="vc_updater-spinner"
						id="vc_updater-spinner" width="16" height="16" alt="spinner"/>
				</p>

				<p class="description">
					<?php echo sprintf( __( 'Don\'t have direct license yet? <a href="%s" target="_blank">Purchase Djenga Builder license</a>.', 'js_composer' ), esc_url( 'http://bit.ly/vcomposer' ) ) ?>
				</p>

			<?php endif ?>
		</div>

	<?php endif ?>
</form>