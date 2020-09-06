<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_pdf extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('pdf');
	}

	public function index()
	{
		$data['data'] = "Jagad IT Solutions";
		$this->pdf->setPaper('A4', 'potrait');
    	$this->pdf->filename = "Jagad-IT-Solutions.pdf";
    	$this->pdf->load_pdf('test_pdf', $data);
	}

}

/* End of file Test_pdf.php */
/* Location: ./application/controllers/Test_pdf.php */