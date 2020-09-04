<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(dirname(__FILE__) . '/Dompdf/autoload.inc.php');
use Dompdf\Dompdf;

class CI_Pdf extends Dompdf
{
	/**
	 * Reference to the CodeIgniter singleton
	 *
	 * @var object
	 */
	protected $ci;

	public $config = [];

	/**
	 * Class constructor
	 *
	 * Initialize Profiler
	 *
	 * @param	array	$config	Parameters
	 */
	public function __construct($config = [])
	{ 
		parent::__construct($config);
		$this->default_config();
		$this->config = $this->getConfig();
        log_message('info', 'Dompdf Class Initialized');
		$this->ci =& get_instance();
	}

	public function load_view($view, $data = [])
	{
		// $html = $this->ci->load->view($view, $data, TRUE);
		// return $this->load_html($html);
		// $this->render();
		// instantiate and use the dompdf class=
		$this->loadHtml('hello world');
		// (Optional) Setup the paper size and orientation
		$this->setPaper('A4', 'landscape');
		// Render the HTML as PDF
		return $this->render();
		// Output the generated PDF to Browser
		// $this->stream();
	}

	public function getConfig($value='')
	{
		return $this->getOptions();
	}

	public function set_config($options = [])
	{
		$this->setOptions($options);
	}

	public function default_config($options = [])
	{
		$config = $this->getConfig();
		$config->setIsHtml5ParserEnabled(TRUE);
		$this->set_config($config);
	}
}