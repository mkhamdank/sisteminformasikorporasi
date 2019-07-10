<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

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
			$this->load->model('Pelanggan_model');
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

			$data['pelanggan'] = $this->Pelanggan_model->getPelanggan();

			$this->load->view('pelanggan/pelanggan_view', $data);
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

			$this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'trim|required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
			$this->form_validation->set_rules('no_hp', 'Nomor HP', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('pelanggan/create');
			} else {
				$this->Pelanggan_model->create();
				redirect('Pelanggan','refresh');
			}
		}
		else{
			redirect('login','refresh');
		}
	}

	public function edit($id_pelanggan)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$id_user = $session_data['id_user'];
			$username = $session_data['username'];
			$password = $session_data['password'];
			$nama = $session_data['nama'];
			$alamat = $session_data['alamat'];
			$no_hp = $session_data['no_hp'];

			$data['pelanggan'] = $this->Pelanggan_model->getPelangganById($id_pelanggan);

			$this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'trim|required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
			$this->form_validation->set_rules('no_hp', 'Nomor HP', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('pelanggan/edit',$data);
			} else {
				$this->Pelanggan_model->update($id_pelanggan);
				redirect('Pelanggan','refresh');
			}
		}
		else{
			redirect('login','refresh');
		}
	}

	public function delete($id_pelanggan)
	{
		$this->Pelanggan_model->delete($id_pelanggan);
		redirect('Pelanggan','refresh');
	}
}

/* End of file Pelanggan.php */
/* Location: ./application/controllers/Pelanggan.php */