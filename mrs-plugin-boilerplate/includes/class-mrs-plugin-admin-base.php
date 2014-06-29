<?php


if ( !class_exists( 'MRS_Plugin_Admin_Base' ) ) {

	class MRS_Plugin_Admin_Base extends  MRS_Plugin_Client_Base {

		protected $plugin_screen_hook_suffix = null;

		protected  function __construct() {
		}

		protected function is_current_screen() {
			if ( ! isset( $this->plugin_screen_hook_suffix ) )
				return false;

		  return $this->plugin_screen_hook_suffix == get_current_screen()->id;
		}
	}
}

?>