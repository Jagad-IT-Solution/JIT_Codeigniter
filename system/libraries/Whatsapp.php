<?php
/**
 * @package	CodeIgniter
 * @author	Jagad IT Solutions Dev Team
 * @since	Version 1.0.0
 * @filesource
 */

defined('BASEPATH') OR exit('No direct script access allowed');
use GuzzleHttp\Client;

class CI_Whatsapp
{
	protected $ci;
	protected $client;
	protected $default_url = 'ruangwa.com/api/';

	public $token;
	public $base_url;
	public $https = 'https';

	public function __construct($config = [])
	{
        $this->ci =& get_instance();

        $this->token = array_key_exists('token', $config) ? $config['token'] : null;
        $this->base_url = array_key_exists('base_url', $config) ? $config['base_url'] : $this->default_url;

        $this->https = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on" ? "https" : "http";

		$this->base_url = $this->https."://".$this->base_url;

        $this->checkToken();
	}

	protected function checkToken()
	{
		if (!isset($this->token) || $this->token == '') {
			show_error('Token tidak ditemukan');
			die();
		}else{
			$this->guzzle_init();
		}
	}

	public function sendLocation($data = null)
	{
		$res = $this->client->request('POST', 'send-location.php',[
			'form_params' => [
				'token' => $this->token,
				'phone' => $data['no_hp'],
				'lat' 	=> $data['lat'],
				'lng' 	=> $data['lng'],
				'address' 	=> $data['address'],
			]
		]);
		return $this->result($res);
	}

	public function sendVideo($data = null)
	{
		$res = $this->client->request('POST', 'send-video.php',[
			'form_params' => [
				'token' => $this->token,
				'phone' => $data['no_hp'],
				'video' 	=> $data['video'],
				'filename' 	=> $data['filename'],
				'caption' 	=> $data['caption'],
			]
		]);
		return $this->result($res);
	}

	public function sendImage($data = null)
	{
		$res = $this->client->request('POST', 'send-image.php',[
			'form_params' => [
				'token' => $this->token,
				'phone' => $data['no_hp'],
				'image' 	=> $data['image'],
				'filename' 	=> $data['filename'],
				'caption' 	=> $data['caption'],
			]
		]);
		return $this->result($res);
	}

	public function sendDocument($data = null)
	{
		$res = $this->client->request('POST', 'send-document.php',[
			'form_params' => [
				'token' => $this->token,
				'phone' => $data['no_hp'],
				'document' 	=> $data['document'],
				'filename' 	=> $data['filename'],
				'caption' 	=> $data['caption'],
			]
		]);
		return $this->result($res);
	}

	public function profilePicture($data = null)
	{
		$res = $this->client->request('POST', 'get-profilepic.php',[
			'form_params' => [
				'token' => $this->token,
				'phone' => $data['no_hp'],
			]
		]);
		return $this->result($res);
	}

	public function sendLink($data = null)
	{
		$res = $this->client->request('POST', 'send-link.php',[
			'form_params' => [
				'token' => $this->token,
				'phone' => $data['no_hp'],
				'link' 	=> $data['link'],
				'text' 	=> $data['pesan'],
			]
		]);
		return $this->result($res);
	}

	public function sendMessage($data = null)
	{
		$res = $this->client->request('POST', 'send-message.php',[
			'form_params' => [
				'token' => $this->token,
				'phone' => $data['no_hp'],
				'message' => $data['pesan']
			]
		]);
		return $this->result($res);
	}

	public function showQr($format = 'images')
	{
		$url = ($format == 'images') ? 'qrcode-image.php' : 'qrcode.php' ;
		$res = $this->client->request('POST', $url,[
			'form_params' => [
				'token' => $this->token,
			]
		]);
		echo $res->getBody()->getContents();
	}

	public function takeOver()
	{
		$res = $this->client->request('POST', 'takeover.php',[
			'form_params' => [
				'token' => $this->token,
			]
		]);
		return $this->result($res);
	}

	public function deleteSession()
	{
		$res = $this->client->request('POST', 'del-session.php',[
			'form_params' => [
				'token' => $this->token,
			]
		]);
		return $this->result($res);
	}

	public function Restart()
	{
		$res = $this->client->request('POST', 'restart.php',[
			'form_params' => [
				'token' => $this->token,
			]
		]);
		return $this->result($res);
	}

	public function checkNumber($phone)
	{
		$res = $this->client->request('POST', 'check-number.php',[
			'form_params' => [
				'token' => $this->token,
				'phone' => $phone,
			]
		]);
		return $this->result($res);
	}

	public function batteryLevel()
	{
		$res = $this->client->request('POST', 'battery-level.php',[
			'form_params' => [
				'token' => $this->token,
			]
		]);
		return $this->result($res);
	}

	public function info($username)
	{
		$res = $this->client->request('POST', 'info.php',[
			'form_params' => [
				'token' => $this->token,
				'username' => $username,
			]
		]);
		return $this->result($res);
	}

	protected function guzzle_init()
	{
		$this->client = new Client([ 
		    'base_uri' => $this->base_url, 
		]);
	}

	protected function result($response)
	{
		return json_decode($response->getBody()->getContents());
	}
}

/* End of file Whatsapp.php */
/* Location: .//D/Github/JIT_Codeigniter/system/libraries/Whatsapp.php */
