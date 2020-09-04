<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		// $this->set_response(400);
		// var_dump($this->code);
		// $this->load_config();
		var_dump($this->pdf->config);
	}
}
