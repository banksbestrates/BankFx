<?php

class FrmLogUpdate extends FrmAddon {

	public $plugin_file;
	public $plugin_name = 'Logs';
	public $download_id = 11927748;
	public $version = '1.0b1';

	public function __construct() {
		$this->plugin_file = dirname( dirname( __FILE__ ) ) . '/formidable-logs.php';
		parent::__construct();
	}

	public static function load_hooks() {
		add_filter( 'frm_include_addon_page', '__return_true' );
		new FrmLogUpdate();
	}

}
