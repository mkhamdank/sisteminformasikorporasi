<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Awal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			$this->load->helper('url','form');
			$this->load->library('form_validation');
			$this->load->model('Produk_model');
	}

	public function index()
	{
		$data['produk'] = $this->Produk_model->getProduk();
		$this->load->view('awal/home', $data);
	}

	public function kontak()
	{
		$this->load->view('awal/kontak');
	}

}

/* End of file Awal.php */
/* Location: ./application/controllers/Awal.php */