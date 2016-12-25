<?php
/**
 * Admin View: Notice - No delivery methods.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div id="message" class="updated banda-message banda-no-shipping-methods-notice">
	<a class="banda-message-close notice-dismiss" href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'wc-hide-notice', 'no_shipping_methods' ), 'banda_hide_notices_nonce', '_wc_notice_nonce' ) ); ?>"><?php _e( 'Dismiss', 'banda' ); ?></a>

	<p class="main"><strong><?php _e( 'Add Delivery Methods &amp; Zones', 'banda' ); ?></strong></p>
	<p><?php _e( 'Shipping is currently enabled, but you haven\'t added any delivery methods to your delivery zones.', 'banda' ); ?></p>
	<p><?php _e( 'Customers will not be able to purchase physical goods from your store until a delivery method is available.', 'banda' ); ?></p>

	<p class="submit">
		<a class="button-primary" href="<?php echo esc_url( admin_url( 'admin.php?page=wc-settings&tab=shipping' ) ); ?>"><?php _e( 'Setup delivery zones', 'banda' ); ?></a>
		<a class="button-secondary" href="https://mtaandao.co.ke/docs/banda/document/setting-up-shipping-zones/"><?php _e( 'Learn more about delivery zones', 'banda' ); ?></a>
	</p>
</div>
