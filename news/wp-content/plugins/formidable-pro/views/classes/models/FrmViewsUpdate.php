<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}

class FrmViewsUpdate extends FrmAddon {

	public $plugin_file;
	public $plugin_name = 'Views';
	public $download_id = 28027505;

	public $version = '4.0.03';

	public function __construct() {
		$this->plugin_file = dirname( dirname( __FILE__ ) ) . '/formidable-views.php';
		parent::__construct();
	}

	public static function load_hooks() {
		add_filter( 'frm_include_addon_page', '__return_true' );
		new FrmViewsUpdate();
	}
}
