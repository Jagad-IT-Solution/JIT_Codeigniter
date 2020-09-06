<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->allowed_http_methods = ['GET','POST'];
	}

	public function index()
	{
		$this->response([
			'hello' => ':)'
		]);
	}
}
