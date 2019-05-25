<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('alamat');
	}

	public function index()
	{
		echo 'woop';
	}

	public function json()
	{
		echo $this->alamat->alamat_url();
	}

}

/* End of file Api.php */
/* Location: ./application/controllers/Api.php */