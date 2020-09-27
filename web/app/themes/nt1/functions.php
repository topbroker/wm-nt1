<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (! file_exists($composer = __DIR__ . '/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Register Sage Theme Files
|--------------------------------------------------------------------------
|
| Out of the box, Sage ships with categorically named theme files
| containing common functionality and setup to be bootstrapped with your
| theme. Simply add (or remove) files from the array below to change what
| is registered alongside Sage.
|
*/

collect(['helpers', 'setup', 'filters', 'admin'])
    ->each(function ($file) {
        $file = "app/{$file}.php";

        if (! locate_template($file, true, true)) {
            wp_die(
                sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
            );
        }
    });

/*
|--------------------------------------------------------------------------
| Enable Sage Theme Support
|--------------------------------------------------------------------------
|
| Once our theme files are registered and available for use, we are almost
| ready to boot our application. But first, we need to signal to Acorn
| that we will need to initialize the necessary service providers built in
| for Sage when booting.
|
*/

add_theme_support('sage');

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We are ready to bootstrap the Acorn framework and get it ready for use.
| Acorn will provide us support for Blade templating as well as the ability
| to utilize the Laravel framework and its beautifully written packages.
|
*/

new Roots\Acorn\Bootloader();

if (function_exists('acf_add_options_page')) {
	acf_add_options_page();
}

add_action('init', function () {

	add_rewrite_rule(
		'komanda/([A-Za-z0-9-]+)/?$',
		'index.php?pagename=komanda&member=$matches[1]',
		'top'
	);

	add_rewrite_rule(
		'nt/([A-Za-z0-9-]+)/?$',
		'index.php?pagename=nt-objektai&retype=$matches[1]',
		'top'
	);

	add_rewrite_rule(
		'nt/([A-Za-z0-9-]+)/([A-Za-z0-9-]+)/?$',
		'index.php?pagename=nt-objektai&retype=$matches[1]&reobject=$matches[2]',
		'top'
	);
});

//$topbroker = new \TopBroker\TopBrokerApi('3f67c759bf4fc791b', 'a5e79e85-9624-49c5-a9cc-261e270ff307');
//
//dd($topbroker->estates->getList([]));