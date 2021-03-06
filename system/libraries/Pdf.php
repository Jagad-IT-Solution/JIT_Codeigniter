<?php 
/**
 * @package	CodeIgniter
 * @author	Jagad IT Solutions Dev Team
 * @since	Version 1.0.0
 * @filesource
 */
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
	protected $CI;

	public  $config = [],
			$filename = 'jit.pdf';

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
        log_message('info', 'PDF Class Initialized');
		$this->CI =& get_instance();
	}

	public function load_pdf($view, $data = [], $bool = TRUE){
        $html = $this->CI->load->view($view, $data, $bool);
        $this->load_html($html);
        $this->render();
        $this->stream($this->filename, ["Attachment" => false]);
    }

	public function getConfig($value='')
	{
		return $this->getOptions();
	}
}