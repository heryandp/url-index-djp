<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alamat extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function alamat_url()
	{
		$this->datatables->select('id,nama_url,domain_url,alt_url');
		$this->datatables->from('url');
		return $this->datatables->generate();
	}
}

/* End of file List.php */
/* Location: ./application/models/List.php */