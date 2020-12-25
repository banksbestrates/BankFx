<?php

if (!defined('ABSPATH')) exit;
if (!class_exists('BVAccountCallback')) :
class BVAccountCallback extends BVCallbackBase {
	public $account;
	public $settings;

	public function __construct($callback_handler) {
		$this->account = $callback_handler->account;
		$this->settings = $callback_handler->settings;
	}

	function process($request) {
		$params = $request->params;
		$account = $this->account;
		$settings = $this->settings;
		switch ($request->method) {
		case "addacc":
			MGAccount::addAccount($this->settings, $params['public'], $params['secret']);
			$resp = array("status" => MGAccount::exists($this->settings, $params['public']));
			break;
		case "rmacc":
			$resp = array("status" => MGAccount::remove($this->settings, $params['public']));
			break;
		case "updt":
			$info = array();
			$info['email'] = $params['email'];
			$info['url'] = $params['url'];
			$info['pubkey'] = $params['pubkey'];
			$account->updateInfo($info);
			$resp = array("status" => MGAccount::exists($this->settings, $params['pubkey']));
			break;
		case "updtapikey":
			MGAccount::updateApiPublicKey($this->settings, $params['pubkey']);
			$resp = array("status" => $this->settings->getOption(MGAccount::$api_public_key));
			break;
		case "rmdefsec":
			$resp = array("status" => $settings->deleteOption('bvDefaultSecret'));
			break;
		case "rmbvkeys":
			$resp = array("status" => $settings->deleteOption('bvKeys'));
			break;
		case "rmdefpub":
			$resp = array("status" => $settings->deleteOption('bvDefaultPublic'));
			break;
		case "rmoldbvacc":
			$resp = array("status" => $settings->deleteOption('bvAccounts'));
			break;
		case "fetch":
			$resp = array("status" => MGAccount::allAccounts($this->settings));
			break;
		default:
			$resp = false;
		}
		return $resp;
	}
}
endif;