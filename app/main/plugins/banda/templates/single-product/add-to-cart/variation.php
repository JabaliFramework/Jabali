<?php
/**
 * Single variation display
 *
 * This is a javascript-based template for single variations (see https://jabali.github.io/Docs/Javascript_Reference/wp.template).
 * The values will be dynamically replaced after selecting attributes.
 *
 * @see 	https://mtaandao.co.ke/docs/banda/document/template-structure/
 * @author  Jabali
 * @package Banda/Templates
 * @version 2.5.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<script type="text/template" id="tmpl-variation-template">
	<div class="banda-variation-description">
		{{{ data.variation.variation_description }}}
	</div>

	<div class="banda-variation-price">
		{{{ data.variation.price_html }}}
	</div>

	<div class="banda-variation-availability">
		{{{ data.variation.availability_html }}}
	</div>
</script>
<script type="text/template" id="tmpl-unavailable-variation-template">
	<p><?php _e( 'Sorry, this product is unavailable. Please choose a different combination.', 'banda' ); ?></p>
</script>
