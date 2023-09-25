<?php
/*
* Plugin Name: WordPress Custom Shortcode
* Plugin URI: https://wordpress.org/
* Description: A simple custom shortcode to show the number of posts on front-end
* Author: Edward
* Version: 1.0.0
* Author URI: https://profiles.wordpress.org/
* Text Domain: wordpress-custom-shortcode
*/

if ( ! defined( 'ABSPATH' ) ) exit;

if ( !class_exists( 'Wordpress_Custom_shortcode' ) ) {
	class Wordpress_Custom_shortcode{

		/**
		 * Constructor.
		 * Fire all required wp actions
		 * @since  1.0.0
		 */
		function __construct(){

			add_action( 'init', [
				$this,
				'load_plugin'
			] );

		}

		/**
		 * Define plugin constants
		 * Include plugin files
		 * @since  1.0.0
		 */

		public function load_plugin(){

			//Plugin current version
			if ( !defined( 'NT_VERSION' ) ) {
				define( 'NT_VERSION', "1.1.0" );
			}

			

			//To get the servers filesystem directory path pointing to the current file
			if ( !defined( 'NT_DIR' ) ) {
				define( 'NT_DIR', plugin_dir_path( __FILE__ ) );
			}

			//To include the assets and it also returns the webaddress
			if ( !defined( 'NT_URL' ) ) {
				define( 'NT_URL', plugin_dir_url( __FILE__ ) );
			}

			//Class for admin purposes
			if ( ! class_exists( 'Wordpress_Custom_Shortcode_Admin' ) ) {
			    include ('admin/class-wordpress-custom-shortcode.php');
			}
		}

	}

}

new Wordpress_Custom_shortcode();
