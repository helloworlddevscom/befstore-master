<?php

/**
 * Register Authorize.net as a Gateway with Easy Digital Downloads
 *
 * @since  1.1
 * @param  array $gateways The gateways which are registered in EDD.
 * @return array
 */
function edda_register_authorize_gateway( $gateways ) {
	// Format: ID => Name.
	$gateways['authorize'] = array(
		'admin_label'    => __( 'Authorize.net', 'edda' ),
		'checkout_label' => __( 'Credit Card', 'edda' ),
	);
	return $gateways;
}
add_filter( 'edd_payment_gateways', 'edda_register_authorize_gateway' );

/**
 * Register our settings section
 *
 * @since  1.1
 * @param  array $sections The sections that exist within the gateways settings for EDD.
 * @return array
 */
function edd_authorize_settings_section( $sections ) {

	$sections['authorize'] = __( 'Authorize.net', 'edda' );

	return $sections;
}
add_filter( 'edd_settings_sections_gateways', 'edd_authorize_settings_section' );

/**
 * Adds the settings to the Payment Gateways section
 *
 * @since  1.1
 * @param  array $settings The settings that exist for the EDD gateways.
 * @return array
 */
function edda_add_settings( $settings ) {

	$edda_settings = array(
		'authorize' => array(
			array(
				'id'   => 'edda_settings',
				'name' => '<strong>' . __( 'Authorize.net Gateway Settings', 'edda' ) . '</strong>',
				'desc' => __( 'Configure your authorize.net Gateway Settings', 'edda' ),
				'type' => 'header',
			),
			array(
				'id'   => 'edda_api_login',
				'name' => __( 'API Login ID', 'edda' ),
				'desc' => __( 'Enter your authorize.net API login ID', 'edda' ),
				'type' => 'text',
			),
			array(
				'id'   => 'edd_transaction_key',
				'name' => __( 'Transaction Key', 'edda' ),
				'desc' => __( 'Enter your authorize.net transaction key', 'edda' ),
				'type' => 'text',
			),
			array(
				'id'   => 'edda_live_signature_key',
				'name' => __( 'Signature Key', 'edda' ),
				'desc' => __( 'Enter your authorize.net signature key. To generate a Signature Key, follow this guide:', 'edda' ) . ' <a href="https://support.authorize.net/s/article/What-is-a-Signature-Key" target="_blank">' . __( 'How to create signature key for Authorize.net', 'edda' ) . '</a>',
				'type' => 'text',
			),
		),
	);

	return array_merge( $settings, $edda_settings );
}
add_filter( 'edd_settings_gateways', 'edda_add_settings' );

/**
 * Show a note that Authorize.net does not work with daily subscriptions
 *
 * @access      public
 * @since       2.0
 * @return      void
 */
function edd_authnet_show_settings_note_about_daily_subscriptions() {
	?>
	<div class="eddauthnet-daily-subs-warning" style="padding: 10px;">
		<span><?php echo esc_html( __( 'Note: Authorize.net does not allow daily subscriptions', 'edda' ) ); ?></span>
	</div>
	<?php
}
add_action( 'edd_after_price_field', 'edd_authnet_show_settings_note_about_daily_subscriptions' );


/**
 * Add a notice when any of the Authorize.net settings are missing.
 *
 * @since 2.0
 *
 * @return void
 */
function edd_authnet_missing_settings_notice() {
	$api_login_id    = edd_get_option( 'edda_api_login', '' );
	$transaction_key = edd_get_option( 'edd_transaction_key', '' );
	$signature_key   = edd_get_option( 'edda_live_signature_key', '' );

	if ( ! empty( $api_login_id ) && ! empty( $transaction_key ) && ! empty( $signature_key ) ) {
		return;
	}
	?>
	<div class="notice notice-error">
		<p>
			<?php printf( __( 'The Authorize.net Payment Gateway for Easy Digital Downloads has not been fully configured, please <a href="%s">complete the setup</a> by adding your settings.', 'edda '), admin_url( 'edit.php?post_type=download&page=edd-settings&tab=gateways&section=authorize' ) ); ?>
		</p>
	</div>
	<?php
}
add_action( 'admin_notices', 'edd_authnet_missing_settings_notice' );
