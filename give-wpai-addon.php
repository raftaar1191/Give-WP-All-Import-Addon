<?php

/*
* Plugin Name: Give - WP All Import Addon
* Description: Bulk Importing data to Give database using WP All Import
* Version: 1.0
* Author: Ben Meredith
*/


include 'rapid-addon.php';

$give_wpai_addon = new RapidAddon('Give Add-On', 'give_wpai_addon');


$give_wpai_addon->add_field('_give_completed_date', 'Donation Date', 'text');
$give_wpai_addon->add_field('_give_payment_total', 'Total', 'text');

$give_wpai_addon->add_field('_give_payment_user_email', 'Donor Email', 'text' );
$give_wpai_addon->add_field('_give_payment_form_id', 'Donation Form ID', 'text' );
$give_wpai_addon->add_field('_give_payment_form_title', 'Donation Form Title', 'text' );

//The next line is causing grief for the addon activation. likely with how I am calling the give_get_payment_gateways function.
//$give_wpai_addon->add_field('_give_payment_gateway', 'Payment Gateway', 'radio', give_get_payment_gateways() );

$give_wpai_addon->set_import_function('give_wpai_addon_import');

// admin notice if WPAI and/or Give isn't installed
if (function_exists('is_plugin_active')) {
	// display this notice if neither the free or pro version of the WP ALL Import plugin is active.
	if ( !is_plugin_active('give/give.php' ) ) {
		// Specify a custom admin notice.
		$give_wpai_addon->admin_notice(
			'The Give WP All Import Add-On requires the <a href="https://wordpress.org/plugins/give">Give</a> plugin.'
		);
	}
	// only run this add-on if the Give plugin is active.
	if ( is_plugin_active( 'give/give.php' ) ) {

		$give_wpai_addon->run();

	}
}


function give_wpai_addon_import($post_id, $data, $import_options) {


}