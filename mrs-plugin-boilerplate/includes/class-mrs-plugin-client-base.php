<?php


if ( !class_exists( 'MRS_Plugin_Client_Base' ) ) {

	class MRS_Plugin_Client_Base {

		protected static $instance = null;

		protected function __construct() {
		}

		public static function get_instance() {
			if ( null == self::$instance ) {
				self::$instance = new static;
			}
			return self::$instance;
		}

		public static function activate( $network_wide ) {

			if ( function_exists( 'is_multisite' ) && is_multisite() ) {

				if ( $network_wide  ) {

					// Get all blog ids
					$blog_ids = self::get_blog_ids();

					foreach ( $blog_ids as $blog_id ) {

						switch_to_blog( $blog_id );
						self::single_activate();

						restore_current_blog();
					}

				} else {
					self::single_activate();
				}

			} else {
				self::single_activate();
			}

		}

		public static function deactivate( $network_wide ) {

			if ( function_exists( 'is_multisite' ) && is_multisite() ) {

				if ( $network_wide ) {

					// Get all blog ids
					$blog_ids = self::get_blog_ids();

					foreach ( $blog_ids as $blog_id ) {

						switch_to_blog( $blog_id );
						self::single_deactivate();

						restore_current_blog();
					}

				} else {
					self::single_deactivate();
				}

			} else {
				self::single_deactivate();
			}

		}

		private static function get_blog_ids() {

			global $wpdb;

			// get an array of blog ids
			$sql = "SELECT blog_id FROM $wpdb->blogs
			WHERE archived = '0' AND spam = '0'
			AND deleted = '0'";

			return $wpdb->get_col( $sql );

		}

		protected static function single_activate() {
			//TODO implement in child classes
		}

		protected static function single_deactivate() {
			//TODO implement in child classes
		}
	}
}

?>