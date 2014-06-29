<?php


if (!class_exists( 'MRS_Plugin_Extensions' ) ) {

	class MRS_Plugin_Extensions {
		public function render_view( $view ) {
			include_once( $view );
		}

		public function get_view( $view ) {
			ob_start();
			include_once( $view );
			$result = ob_get_clean();
			return $result;
		}
	}

}