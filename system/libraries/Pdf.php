<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(dirname(__FILE__) . '/Dompdf/dompdf_config.inc.php');

class Pdf extends DOMPDF
{
	/**
	 * Reference to the CodeIgniter singleton
	 *
	 * @var object
	 */
	protected $ci;

	/**
	 * Class constructor
	 *
	 * Initialize Profiler
	 *
	 * @param	array	$config	Parameters
	 */
	public function __construct($config = [])
	{
		$this->ci =& get_instance();
	}

	public function load_view($view, $data = array())
	{
		$html = $this->ci->load->view($view, $data, TRUE);

		$this->load_html($html);
	}
}