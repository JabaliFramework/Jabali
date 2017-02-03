<?php

/**
 * Exit if accessed directly
 */
if ( !defined( 'ABSPATH' ) ) {
	exit; 
}

/**
 * Settings class
 */
if ( !class_exists( 'Otas_Print_Settings' ) ) {

	class Otas_Print_Settings {
			
		public $id;
		
		/**
		 * Constructor
		 */
		public function __construct() {	
			// Define default variables
			$this->id = 'wcdn-settings';			
		}
			
		/**
		 * Add the scripts
		 */
		public function add_assets() {	
			// Styles	
			<style src="css/admin.css' );"></script>
			
			// Scripts
			<script src="js/jquery.print-link.js"></script>
			<script src="js/admin.js"></script>

			// Localize the script strings
			$translation = array( 'resetCounter' => __( 'Do you really want to reset the counter to zero? This process can\'t be undone.', 'otas-print' ) );
			wp_localize_script( 'otas-print-admin', 'WCDNText', $translation );
		}
		
		/**
		 * Create a new settings tab
		 */
		public function add_settings_page( $settings_tabs ) {
			$settings_tabs[$this->id] = __( 'Print', 'otas-print' );
			return $settings_tabs;
		}
		
		/**
		 * Output the settings fields into the tab
		 */
		public function output() {
			global $current_section;
			$settings = $this->get_settings( $current_section );
		    woocommerce_admin_fields( $settings );
		}
		
		/**
		 * Save the settings
		 */
		function save() {
		    global $current_section;
			set_transient( 'wcdn_flush_rewrite_rules', true );
			$settings = $this->get_settings( $current_section );
		    woocommerce_update_options( $settings );
		}

		/**
		 * Get the settings fields
		 */
		public function get_settings( $section = '' ) {			
		    $settings = apply_filters( 'wcdn_get_settings_no_section', 
			    array(
			        array( 
				        'title' => __( 'Template', 'otas-print' ), 
				        'type'  => 'title', 
				        'desc'  => $this->get_template_description(), 
				        'id'    => 'general_options' 
			        ),
	
					array(
						'title'    => __( 'Style', 'otas-print' ),
						'desc'     => sprintf( __( 'The default print style. Read the <a href="%1$s">FAQ</a> to learn how to customize it or get more styles with <a href="%2$s">WooCommerce Print Invoice & Delivery Note Pro</a>.', 'otas-print' ), 'https://wordpress.org/plugins/otas-print/faq/', '#' ),
						'id'       => 'wcdn_template_style',
						'class'    => 'wc-enhanced-select',
						'default'  => '',
						'type'     => 'select',
						'options'  => $this->get_options_styles(),
						'desc_tip' =>  false,
					),
	
					array(
						'title'        => __( 'Shop Logo', 'otas-print' ),
						'desc'         => '',
						'id'           => 'wcdn_company_logo_image_id',
						'css'          => '',
						'default'      => '',
						'type'         => 'wcdn_image_select',
						'desc_tip'     =>  __( 'A shop logo representing your business. When the image is printed, its pixel density will automatically be eight times higher than the original. This means, 1 printed inch will correspond to about 288 pixels on the screen.', 'otas-print' )
					),
					
					array(
						'title'    => __( 'Shop Name', 'otas-print' ),
						'desc'     => '',
						'id'       => 'wcdn_custom_company_name',
						'css'      => 'min-width:100%;',
						'default'  => '',
						'type'     => 'text',
						'desc_tip'     => __( 'The shop name. Leave blank to use the default Website or Blog title defined in WordPress settings. The name will be ignored when a Logo is set.', 'otas-print' ),
					),
					
					array(
						'title'    => __( 'Shop Address', 'otas-print' ),
						'desc'     => __( 'The postal address of the shop or even e-mail or telephone.', 'otas-print' ),
						'id'       => 'wcdn_company_address',
						'css'      => 'min-width:100%;min-height:100px;',
						'default'  => '',
						'type'     => 'textarea',
						'desc_tip' =>  true,
					),
	
					array(
						'title'    => __( 'Complimentary Close', 'otas-print' ),
						'desc'     => __( 'Add a personal close, notes or season greetings.', 'otas-print' ),
						'id'       => 'wcdn_personal_notes',
						'css'      => 'min-width:100%;min-height:100px;',
						'default'  => '',
						'type'     => 'textarea',
						'desc_tip' =>  true,
					),
	
					array(
						'title'    => __( 'Policies', 'otas-print' ),
						'desc'     => __( 'Add the shop policies, conditions, etc.', 'otas-print' ),
						'id'       => 'wcdn_policies_conditions',
						'css'      => 'min-width:100%;min-height:100px;',
						'default'  => '',
						'type'     => 'textarea',
						'desc_tip' =>  true,
					),
	
					array(
						'title'    => __( 'Footer', 'otas-print' ),
						'desc'     => __( 'Add a footer imprint, instructions, copyright notes, e-mail, telephone, etc.', 'otas-print' ),
						'id'       => 'wcdn_footer_imprint',
						'css'      => 'min-width:100%;min-height:100px;',
						'default'  => '',
						'type'     => 'textarea',
						'desc_tip' =>  true,
					),
					
					array(
						'type' 	=> 'sectionend',
						'id' 	=> 'general_options'
					),
					
					array( 
				        'title' => __( 'Pages & Buttons', 'otas-print' ), 
				        'type'  => 'title', 
				        'desc'  => '', 
				        'id'    => 'display_options' 
			        ),
			        
			        array(
						'title'    => __( 'Print Page Endpoint', 'otas-print' ),
						'desc'     => '',
						'id'       => 'wcdn_print_order_page_endpoint',
						'css'      => '',
						'default'  => 'print-order',
						'type'     => 'text',
						'desc_tip' => __( 'The endpoint is appended to the accounts page URL to print the order. It should be unique.', 'otas-print' ),
					),
					
					array(
						'title'           => __( 'Email', 'otas-print' ),
						'desc'            => __( 'Show print link in customer emails', 'otas-print' ),
						'id'              => 'wcdn_email_print_link',
						'default'         => 'no',
						'type'            => 'checkbox',
						'desc_tip'        => __( 'This includes the emails for a new, processing and completed order. On top of that the customer invoice email also includes the link.', 'otas-print' )
					),
			        				
					array(
						'title'           => __( 'My Account', 'otas-print' ),
						'desc'            => __( 'Show print button on the "View Order" page', 'otas-print' ),
						'id'              => 'wcdn_print_button_on_view_order_page',
						'default'         => 'no',
						'type'            => 'checkbox',
						'checkboxgroup'   => 'start'
					),
	
					array(
						'desc'            => __( 'Show print buttons on the "My Account" page', 'otas-print' ),
						'id'              => 'wcdn_print_button_on_my_account_page',
						'default'         => 'no',
						'type'            => 'checkbox',
						'checkboxgroup'   => 'end'
					),
	
			        array(
						'type' 	=> 'sectionend',
						'id' 	=> 'display_options'
					),
					
					array( 
				        'title' => __( 'Invoice', 'otas-print' ), 
				        'type'  => 'title', 
				        'desc'  => '', 
				        'id'    => 'invoice_options' 
			        ),
			        
			        array(
						'title'           => __( 'Numbering', 'otas-print' ),
						'desc'            => __( 'Create invoice numbers', 'otas-print' ),
						'id'              => 'wcdn_create_invoice_number',
						'default'         => 'no',
						'type'            => 'checkbox',
						'desc_tip'        => ''
					),
			        
					array(
						'title'    => __( 'Next Number', 'otas-print' ),
						'desc'     => '',
						'id'       => 'wcdn_invoice_number_count',
						'class'    => 'create-invoice',
						'css'      => '',
						'default'  => 1,
						'type'     => 'number',
						'desc_tip' =>  __( 'The next invoice number.', 'otas-print' )
					),
					
					array(
						'title'    => __( 'Number Prefix', 'otas-print' ),
						'desc'     => '',
						'id'       => 'wcdn_invoice_number_prefix',
						'class'    => 'create-invoice',
						'css'      => '',
						'default'  => '',
						'type'     => 'text',
						'desc_tip' =>  __( 'This text will be prepended to the invoice number.', 'otas-print' )
					),
					
					array(
						'title'    => __( 'Number Suffix', 'otas-print' ),
						'desc'     => '',
						'id'       => 'wcdn_invoice_number_suffix',
						'class'    => 'create-invoice',
						'css'      => '',
						'default'  => '',
						'type'     => 'text',
						'desc_tip' =>  __( 'This text will be appended to the invoice number.', 'otas-print' )
					),
			        
			        array(
						'type' 	=> 'sectionend',
						'id' 	=> 'invoice_options'
					),
			    ) 
		    );
		    
		    return apply_filters( 'wcdn_get_settings', $settings, $section );
		}
		
		/**
		 * Get the position of a setting inside the array
		 */
		public function get_setting_position( $id, $settings, $type = null ) {			
			foreach( $settings as $key => $value ) {
				if( isset( $value['id'] ) && $value['id'] == $id ) {
					return $key;
				}
			}
			
			return false;
		}

		/**
		 * Generate the template type setting fields
		 */
		public function generate_template_type_fields( $settings, $section = '' ) {
			$position = $this->get_setting_position( 'wcdn_email_print_link', $settings );
			if( $position !== false ) {
				$new_settings = array();
				
				// Go through all registrations but remove the default 'order' type
				$template_registrations = Otas_Print_Print::$template_registrations;
				array_splice( $template_registrations, 0, 1 );
				$end = count( $template_registrations ) - 1;
				foreach( $template_registrations as $index => $template_registration ) {
					$title = '';
					$desc_tip = '';
					$checkboxgroup = '';
					
					// Define the group settings
					if( $index == 0 ) {
						$title = __( 'Admin', 'otas-print' );
						$checkboxgroup = 'start';
					} else if( $index == $end ) {
						$desc_tip = __( 'The print buttons are available on the order listing and on the order detail screen.', 'otas-print' );
						$checkboxgroup = 'end';
					}
					
					// Create the setting
					$new_settings[] = array(
						'title'           => $title,
						'desc'            => $template_registration['labels']['setting'],
						'id'              => 'wcdn_template_type_' . $template_registration['type'],
						'default'         => 'no',
						'type'            => 'checkbox',
						'checkboxgroup'   => $checkboxgroup,
						'desc_tip'        => $desc_tip
					);
				}
				
				// Add the settings
				$settings = $this->array_merge_at( $settings, $new_settings, $position );
			}

			return $settings;
		}
		
		/**
		 * Generate the description for the template settings
		 */
		public function get_template_description() {		
			$description = '';
			$args = array(
				'post_type' => 'shop_order',
				'post_status' => array( 'wc-pending', 'wc-processing', 'wc-on-hold', 'wc-completed', 'wc-cancelled', 'wc-refunded', 'wc-failed' ),
				'posts_per_page' => 1
			);
			$query = new WP_Query( $args );
			
			// show template preview links when an order is available	
			if( $query->have_posts() ) {
				$results = $query->get_posts();
				$test_id = $results[0]->ID;
				$invoice_url = wcdn_get_print_link( $test_id, 'invoice' );
				$delivery_note_url = wcdn_get_print_link( $test_id, 'delivery-note' );
				$receipt_url = wcdn_get_print_link( $test_id, 'receipt' );
				$description = sprintf( __( 'This section lets you customise the content. You can preview the <a href="%1$s" target="%4$s" class="%5$s">invoice</a>, <a href="%2$s" target="%4$s" class="%5$s">delivery note</a> or <a href="%3$s" target="%4$s" class="%5$s">receipt</a> template.', 'otas-print' ), $invoice_url, $delivery_note_url, $receipt_url, '_blank', '' ); 
			}
			
			return $description;
		}
		
		/**
		 * Generate the options for the template styles field
		 */
		public function get_options_styles() {
			$options = array();
			
			foreach( Otas_Print_Print::$template_styles as $template_style ) {
				if( is_array( $template_style ) && isset( $template_style['type'] ) && isset( $template_style['name'] ) ) {
					$options[$template_style['type']] = $template_style['name'];
				}
			}
			
			return $options;
		}
				
		/**
		 * Load image with ajax
		 */
		public function load_image_ajax() {
			// Verify the nonce
			if ( empty( $_REQUEST['nonce'] ) || ! wp_verify_nonce( $_REQUEST['nonce'], 'woocommerce-settings' ) ) {
				die();
			}

			// Verify the id			
			if( empty( $_POST['attachment_id'] ) ) {
				die();
			}
			
			// create the image
			$this->create_image( $_POST['attachment_id'] );
			
			exit;
		}
		
		/**
		 * Create image
		 */
		public function create_image( $attachment_id ) {
			$attachment_src = wp_get_attachment_image_src( $attachment_id, 'medium', false );
			$orientation = 'landscape';
			if( ( $attachment_src[1] / $attachment_src[2] ) < 1 ) {
				$orientation = 'portrait';
			}
			
			?>
			<img src="<?php echo $attachment_src[0]; ?>" class="<?php echo $orientation; ?>" alt="" />
			<?php
		}
		
		/**
		 * Output image select field
		 */
		public function output_image_select( $value ) {
			// Define the defaults
			if ( ! isset( $value['title_select'] ) ) {
				$value['title_select'] = __( 'Select', 'otas-print' );
			}
			
			if ( ! isset( $value['title_remove'] ) ) {
				$value['title_remove'] = __( 'Remove', 'otas-print' );
			}
			
			// Get additional data fields
			$field = WC_Admin_Settings::get_field_description( $value );
			$description = $field['description'];
			$tooltip_html = $field['tooltip_html'];
			$option_value = WC_Admin_Settings::get_option( $value['id'], $value['default'] );
			$class_name = 'wcdn-image-select';
		
			?><tr valign="top">
				<th scope="row" class="titledesc">
					<label for="<?php echo esc_attr( $value['id'] ); ?>"><?php echo esc_html( $value['title'] ); ?> <?php echo $tooltip_html; ?></label>
				</th>
				<td class="forminp image_width_settings">
					<input name="<?php echo esc_attr( $value['id'] ); ?>" id="<?php echo esc_attr( $value['id'] ); ?>" type="hidden" value="<?php echo esc_attr( $option_value ); ?>" class="<?php echo $class_name; ?>-image-id <?php echo esc_attr( $value['class'] ); ?>" />
					
					<div id="<?php echo esc_attr( $value['id'] ); ?>_field" class="<?php echo $class_name; ?>-field <?php echo esc_attr( $value['class'] ); ?>" style="<?php echo esc_attr( $value['css'] ); ?>">
						<span id="<?php echo esc_attr( $value['id'] ); ?>_spinner" class="<?php echo $class_name; ?>-spinner spinner"></span>
						<div id="<?php echo esc_attr( $value['id'] ); ?>_attachment" class="<?php echo $class_name; ?>-attachment <?php echo esc_attr( $value['class'] ); ?> ">
							<div class="thumbnail">
								<div class="centered">
								<?php if( !empty( $option_value ) ) : ?>
									<?php $this->create_image( $option_value ); ?>
								<?php endif; ?>
								</div>
							</div>
						</div>
						
						<div id="<?php echo esc_attr( $value['id'] ); ?>_buttons" class="<?php echo $class_name; ?>-buttons <?php echo esc_attr( $value['class'] ); ?>">
							<a href="#" id="<?php echo esc_attr( $value['id'] ); ?>_remove_button" class="<?php echo $class_name; ?>-remove-button <?php if( empty( $option_value ) ) : ?>hidden<?php endif; ?> button">
								<?php echo esc_html( $value['title_remove'] ); ?>
							</a>
							<a href="#" id="<?php echo esc_attr( $value['id'] ); ?>_add_button" class="<?php echo $class_name; ?>-add-button <?php if( !empty( $option_value ) ) : ?>hidden<?php endif; ?> button" data-uploader-title="<?php echo esc_attr( $value['title'] ); ?>" data-uploader-button-title="<?php echo esc_attr( $value['title_select'] ); ?>">
								<?php echo esc_html( $value['title_select'] ); ?>
							</a>
						</div>					
					</div>
					
					<?php echo $description; ?>
				</td>
			</tr><?php
		}
		
		/**
		 * Merge array at given position
		 */		
		public function array_merge_at( $array, $insert, $position ) {
			$new_array = array();
			// if pos is start, just merge them
			if( $position == 0 ) {
				$new_array = array_merge( $insert, $array );
			} else {
				// if pos is end just merge them
				if( $position >= ( count( $array ) - 1 ) ) {
					$new_array = array_merge($array, $insert);
				} else {
					// split into head and tail, then merge head+inserted bit+tail
					$head = array_slice( $array, 0, $position );
					$tail = array_slice( $array, $position );
					$new_array = array_merge( $head, $insert, $tail );
				}
			}
			return $new_array;
		}
	}
	
}

?>