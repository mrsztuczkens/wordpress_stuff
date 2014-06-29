<?php

class Plugin_Name extends MRS_Plugin_Client_Base {

	const VERSION = '1.0.0';

	protected function __construct() {
		parent::__construct();

		/* Load JS and CSS */
		//add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		//add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

		/* Actions and filters */
		//add_action( '@TODO', array( $this, 'action_method_name' ) );
		//add_filter( '@TODO', array( $this, 'filter_method_name' ) );

	}

	public static function single_activate( ) {
	}

	public static function single_deactivate( ) {
	}

	public function enqueue_styles() {
		wp_enqueue_style( '', plugins_url( 'assets/css/public.css' ), array(), self::VERSION );
	}

	public function enqueue_scripts() {
		wp_enqueue_script( '', plugins_url( 'assets/js/public.js' ), array( 'jquery' ), self::VERSION );
	}
}
