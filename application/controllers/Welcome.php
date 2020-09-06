<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$api_key_variable = $this->config->item('rest_key_name');
        $key_name = 'HTTP_'.strtoupper(str_replace('-', '_', $api_key_variable));

		if ($this->api_key == $this->input->server($key_name)) {
			echo "ok";
		}
		var_dump('asd');
	}

	public function test($sa)
	{
		echo $sa;
	}
}
