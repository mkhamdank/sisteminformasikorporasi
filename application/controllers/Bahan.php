<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahan extends CI_Controller {

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

			$data['bahan'] = $this->Bahan_model->getBahan();

			$this->load->view('bahan/bahan_view', $data);
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

			$this->form_validation->set_rules('nama_bahan', 'Nama Bahan', 'trim|required');
			$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
			$this->form_validation->set_rules('harga_satuan', 'Harga Satuan', 'trim|required');
			$this->form_validation->set_rules('expired', 'Expired', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('bahan/create');
			} else {
				$this->Bahan_model->create();
				redirect('Bahan','refresh');
			}
		}
		else{
			redirect('login','refresh');
		}
	}

	public function edit($id_bahan)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$id_user = $session_data['id_user'];
			$username = $session_data['username'];
			$password = $session_data['password'];
			$nama = $session_data['nama'];
			$alamat = $session_data['alamat'];
			$no_hp = $session_data['no_hp'];

			$data['bahan'] = $this->Bahan_model->getBahanById($id_bahan);

			$this->form_validation->set_rules('nama_bahan', 'Nama Bahan', 'trim|required');
			$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
			$this->form_validation->set_rules('harga_satuan', 'Harga Satuan', 'trim|required');
			$this->form_validation->set_rules('expired', 'Expired', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('bahan/edit',$data);
			} else {
				$this->Bahan_model->update($id_bahan);
				redirect('Bahan','refresh');
			}
		}
		else{
			redirect('login','refresh');
		}
	}

	public function delete($id_bahan)
	{
		$this->Bahan_model->delete($id_bahan);
		redirect('Bahan','refresh');
	}

}

/* End of file Bahan.php */
/* Location: ./application/controllers/Bahan.php */