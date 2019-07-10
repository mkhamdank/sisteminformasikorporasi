<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$id_user = $session_data['id_user'];
			$username = $session_data['username'];
			$password = $session_data['password'];
			$nama = $session_data['nama'];
			$alamat = $session_data['alamat'];
			$no_hp = $session_data['no_hp'];

			$this->load->helper('url','form');
			$this->load->library('form_validation');
			$this->load->model('Bahan_model');
			$this->load->model('Produksi_model');
		}
		else{
			redirect('login','refresh');
		}
	}

	public function index()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$id_user = $session_data['id_user'];
			$username = $session_data['username'];
			$password = $session_data['password'];
			$nama = $session_data['nama'];
			$alamat = $session_data['alamat'];
			$no_hp = $session_data['no_hp'];

			$data['produksi'] = $this->Produksi_model->getProduksi();

			$this->load->view('produksi/produksi_view', $data);
		}
		else{
			redirect('login','refresh');
		}
	}

	public function create()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$id_user = $session_data['id_user'];
			$username = $session_data['username'];
			$password = $session_data['password'];
			$nama = $session_data['nama'];
			$alamat = $session_data['alamat'];
			$no_hp = $session_data['no_hp'];

			$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');

			$data['bahan'] = $this->Bahan_model->getBahan();

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('produksi/create',$data);
			} else {
				$jml = $this->input->post('jumlah');
				$fk_bahan = $this->input->post('fk_bahan');
				$bahan = $this->Bahan_model->getBahanById($fk_bahan);
				foreach ($bahan as $key) {
					$jumlah = $key->jumlah;
				}
				$jml_baru = $jumlah - $jml;
				$this->Bahan_model->updateStok($fk_bahan,$jml_baru);
				$this->Produksi_model->create();
				redirect('Produksi','refresh');
			}
		}
		else{
			redirect('login','refresh');
		}
	}

	public function edit($id_produksi)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$id_user = $session_data['id_user'];
			$username = $session_data['username'];
			$password = $session_data['password'];
			$nama = $session_data['nama'];
			$alamat = $session_data['alamat'];
			$no_hp = $session_data['no_hp'];

			$data['produksi'] = $this->Produksi_model->getProduksiById($id_produksi);
			$data['bahan'] = $this->Bahan_model->getBahan();

			$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('produksi/edit',$data);
			} else {
				$this->Produksi_model->update($id_produksi);
				redirect('Produksi','refresh');
			}
		}
		else{
			redirect('login','refresh');
		}
	}

	public function delete($id_produksi)
	{
		$this->Produksi_model->delete($id_produksi);
		redirect('Produksi','refresh');
	}

}

/* End of file Produksi.php */
/* Location: ./application/controllers/Produksi.php */