<?php

class FrmSigUpdate extends FrmAddon {

	public $plugin_file;
	public $plugin_name = 'Signature';
	public $download_id = 163248;
	public $version = '2.03';

	public function __construct() {
		$this->plugin_file = FrmSigAppHelper::plugin_path() . '/signature.php';
		parent::__construct();
	}

	public static function load_hooks() {
		add_filter( 'frm_include_addon_page', '__return_true' );
		new FrmSigUpdate();
	}

}
