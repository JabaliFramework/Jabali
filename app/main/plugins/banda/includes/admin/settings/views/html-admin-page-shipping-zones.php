<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<h2>
	<?php _e( 'Shipping Zones', 'banda' ); ?>
	<?php echo wc_help_tip( __( 'A shipping zone is a geographic region where a certain set of delivery methods and rates apply.', 'banda' ) . ' ' . __( 'Banda will automatically choose the correct shipping zone based on your customer&lsquo;s shipping address and present the delivery methods within that zone to them.', 'banda' ) ); ?>
</h2>

<table class="wc-shipping-zones widefat">
	<thead>
		<tr>
			<th class="wc-shipping-zone-sort"><?php echo wc_help_tip( __( 'Drag and drop to re-order your custom zones. This is the order in which they will be matched against the customer address.', 'banda' ) ); ?></th>
			<th class="wc-shipping-zone-name"><?php esc_html_e( 'Zone Name', 'banda' ); ?></th>
			<th class="wc-shipping-zone-region"><?php esc_html_e( 'Region(s)', 'banda' ); ?></th>
			<th class="wc-shipping-zone-methods"><?php esc_html_e( 'Shipping Method(s)', 'banda' ); ?></th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="4">
				<input type="submit" name="save" class="button button-primary wc-shipping-zone-save" value="<?php esc_attr_e( 'Save changes', 'banda' ); ?>" disabled />
				<a class="button button-secondary wc-shipping-zone-add" href="#"><?php esc_html_e( 'Add shipping zone', 'banda' ); ?></a>
			</td>
		</tr>
	</tfoot>
	<tbody class="wc-shipping-zone-rows"></tbody>
	<tbody>
		<tr data-id="0">
			<td width="1%" class="wc-shipping-zone-worldwide"></td>
			<td class="wc-shipping-zone-name">
				<a href="<?php echo esc_url( admin_url( 'admin.php?page=wc-settings&tab=shipping&zone_id=0' ) ); ?>"><?php esc_html_e( 'Rest of the World', 'banda' ); ?></a>
				<div class="row-actions">
					<a href="admin.php?page=wc-settings&amp;tab=shipping&amp;zone_id={{ data.zone_id }}"><?php _e( 'View', 'banda' ); ?></a>
				</div>
			</td>
			<td class="wc-shipping-zone-region"><?php esc_html_e( 'This zone is used for shipping addresses that aren&lsquo;t included in any other shipping zone. Adding delivery methods to this zone is optional.', 'banda' ); ?></td>
			<td class="wc-shipping-zone-methods">
				<ul>
					<?php
						$worldwide = new WC_Shipping_Zone( 0 );
						$methods   = $worldwide->get_shipping_methods();

						if ( ! empty( $methods ) ) {
							foreach ( $methods as $method ) {
								$class_name = 'yes' === $method->enabled ? 'method_enabled' : 'method_disabled';
								echo '<li class="wc-shipping-zone-method"><a href="admin.php?page=wc-settings&amp;tab=shipping&amp;instance_id=' . absint( $method->instance_id ) . '" class="' . esc_attr( $class_name ) . '">' . esc_html( $method->get_title() ) . '</a></li>';
							}
						} else {
							echo '<li class="wc-shipping-zone-method">' . __( 'No delivery methods offered to this zone.', 'banda' ) . '</li>';
						}
					?>
					<li class="wc-shipping-zone-methods-add-row"><a href="#" class="add_shipping_method tips" data-tip="<?php esc_attr_e( 'Add shipping method', 'banda' ); ?>" data-disabled-tip="<?php esc_attr_e( 'Save changes to continue adding delivery methods to this zone', 'banda' ); ?>"><?php _e( 'Add shipping method', 'banda' ); ?></a></li>
				</ul>
			</td>
		</tr>
	</tbody>
</table>

<script type="text/html" id="tmpl-wc-shipping-zone-row-blank">
	<?php if ( 0 === $method_count ) : ?>
		<tr>
			<td class="wc-shipping-zones-blank-state" colspan="4">
				<p class="main"><?php _e( 'A shipping zone is a geographic region where a certain set of delivery methods and rates apply.', 'banda' ); ?></p>
				<p><?php _e( 'For example:', 'banda' ); ?></p>
				<ul>
					<li><?php _e( 'Local Zone = California ZIP 90210 = Local pickup', 'banda' ); ?>
					<li><?php _e( 'US Domestic Zone = All US states = Flat rate shipping', 'banda' ); ?>
					<li><?php _e( 'Europe Zone = Any country in Europe = Flat rate shipping', 'banda' ); ?>
				</ul>
				<p><?php _e( 'Add as many zones as you need &ndash; customers will only see the methods available for their address.', 'banda' ); ?></p>
				<a class="button button-primary wc-shipping-zone-add"><?php _e( 'Add shipping zone', 'banda' ); ?></a>
			</td>
		</tr>
	<?php endif; ?>
</script>

<script type="text/html" id="tmpl-wc-shipping-zone-row">
	<tr data-id="{{ data.zone_id }}">
		<td width="1%" class="wc-shipping-zone-sort"></td>
		<td class="wc-shipping-zone-name">
			<div class="view">
				<a href="admin.php?page=wc-settings&amp;tab=shipping&amp;zone_id={{ data.zone_id }}">{{ data.zone_name }}</a>
				<div class="row-actions">
					<a href="admin.php?page=wc-settings&amp;tab=shipping&amp;zone_id={{ data.zone_id }}"><?php _e( 'View', 'banda' ); ?></a> | <a class="wc-shipping-zone-edit" href="#"><?php _e( 'Edit', 'banda' ); ?></a> | <a href="#" class="wc-shipping-zone-delete"><?php _e( 'Remove', 'banda' ); ?></a>
				</div>
			</div>
			<div class="edit">
				<input type="text" name="zone_name[{{ data.zone_id }}]" data-attribute="zone_name" value="{{ data.zone_name }}" placeholder="<?php esc_attr_e( 'Zone Name', 'banda' ); ?>" />
				<div class="row-actions">
					<a class="wc-shipping-zone-cancel-edit" href="#"><?php _e( 'Cancel changes', 'banda' ); ?></a>
				</div>
			</div>
		</td>
		<td class="wc-shipping-zone-region">
			<div class="view">{{ data.formatted_zone_location }}</div>
			<div class="edit">
				<select multiple="multiple" name="zone_locations[{{ data.zone_id }}]" data-attribute="zone_locations" data-placeholder="<?php _e( 'Select regions within this zone', 'banda' ); ?>" class="wc-shipping-zone-region-select">
					<?php
						foreach ( $continents as $continent_code => $continent ) {
							echo '<option value="continent:' . esc_attr( $continent_code ) . '" alt="">' . esc_html( $continent['name'] ) . '</option>';

							$countries = array_intersect( array_keys( $allowed_countries ), $continent['countries'] );

							foreach ( $countries as $country_code ) {
								echo '<option value="country:' . esc_attr( $country_code ) . '" alt="' . esc_attr( $continent['name'] ) . '">' . esc_html( '&nbsp;&nbsp; ' . $allowed_countries[ $country_code ] ) . '</option>';

								if ( $states = WC()->countries->get_states( $country_code ) ) {
									foreach ( $states as $state_code => $state_name ) {
										echo '<option value="state:' . esc_attr( $country_code . ':' . $state_code ) . '" alt="' . esc_attr( $continent['name'] . ' ' . $allowed_countries[ $country_code ] ) . '">' . esc_html( '&nbsp;&nbsp;&nbsp;&nbsp; ' . $state_name ) . '</option>';
									}
								}
							}
						}
					?>
				</select>
				<a class="wc-shipping-zone-postcodes-toggle" href="#"><?php _e( 'Limit to specific ZIP/postcodes', 'banda' ); ?></a>
				<div class="wc-shipping-zone-postcodes">
					<textarea name="zone_postcodes[{{ data.zone_id }}]" data-attribute="zone_postcodes" placeholder="<?php esc_attr_e( 'List 1 postcode per line', 'banda' ); ?>" class="input-text large-text" cols="25" rows="5"></textarea>
					<span class="description"><?php _e( 'Postcodes containing wildcards (e.g. CB23*) and fully numeric ranges (e.g. <code>90210...99000</code>) are also supported.', 'banda' ) ?></span>
				</div>
			</div>
		</td>
		<td class="wc-shipping-zone-methods">
			<div>
				<ul>
					<li class="wc-shipping-zone-methods-add-row"><a href="#" class="add_shipping_method tips" data-tip="<?php esc_attr_e( 'Add shipping method', 'banda' ); ?>" data-disabled-tip="<?php esc_attr_e( 'Save changes to continue adding delivery methods to this zone', 'banda' ); ?>"><?php _e( 'Add shipping method', 'banda' ); ?></a></li>
				</ul>
			</div>
		</td>
	</tr>
</script>

<script type="text/template" id="tmpl-wc-modal-add-shipping-method">
	<div class="wc-backbone-modal">
		<div class="wc-backbone-modal-content">
			<section class="wc-backbone-modal-main" role="main">
				<header class="wc-backbone-modal-header">
					<h1><?php _e( 'Add shipping method', 'banda' ); ?></h1>
					<button class="modal-close modal-close-link dashicons dashicons-no-alt">
						<span class="screen-reader-text"><?php _e( 'Close modal panel', 'banda' ); ?></span>
					</button>
				</header>
				<article>
					<form action="" method="post">
						<div class="wc-shipping-zone-method-selector">
							<p><?php esc_html_e( 'Choose the shipping method you wish to add. Only delivery methods which support zones are listed.', 'banda' ); ?></p>

							<select name="add_method_id">
								<?php
									foreach ( WC()->shipping->load_shipping_methods() as $method ) {
										if ( ! $method->supports( 'shipping-zones' ) ) {
											continue;
										}
										echo '<option data-description="' . esc_attr( $method->method_description ) . '" value="' . esc_attr( $method->id ) . '">' . esc_attr( $method->method_title ) . '</li>';
									}
								?>
							</select>
							<input type="hidden" name="zone_id" value="{{{ data.zone_id }}}" />
						</div>
					</form>
				</article>
				<footer>
					<div class="inner">
						<button id="btn-ok" class="button button-primary button-large"><?php _e( 'Add shipping method', 'banda' ); ?></button>
					</div>
				</footer>
			</section>
		</div>
	</div>
	<div class="wc-backbone-modal-backdrop modal-close"></div>
</script>
