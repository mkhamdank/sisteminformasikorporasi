<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penggajian extends CI_Controller {

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
			$this->load->model('Penggajian_model');
			$this->load->model('SDM_model');
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

			$data['penggajian'] = $this->Penggajian_model->getPenggajian();

			$this->load->view('penggajian/penggajian_view', $data);
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

			$data['sdm'] = $this->SDM_model->getUser();

			$this->form_validation->set_rules('gaji', 'Gaji', 'trim|required');
			$this->form_validation->set_rules('tunjangan', 'Tunjangan', 'trim|required');
			$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
			$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('penggajian/create',$data);
			} else {
				$gaji = $this->input->post('gaji');
				$tunjangan = $this->input->post('tunjangan');
				$total = $gaji + $tunjangan;
				$this->Penggajian_model->create($total);
				redirect('Penggajian','refresh');
			}
		}
		else{
			redirect('login','refresh');
		}
	}

	public function edit($id_gaji)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$id_user = $session_data['id_user'];
			$username = $session_data['username'];
			$password = $session_data['password'];
			$nama = $session_data['nama'];
			$alamat = $session_data['alamat'];
			$no_hp = $session_data['no_hp'];

			$data['penggajian'] = $this->Penggajian_model->getPenggajianById($id_gaji);
			$data['sdm'] = $this->SDM_model->getUser();

			$this->form_validation->set_rules('gaji', 'Gaji', 'trim|required');
			$this->form_validation->set_rules('tunjangan', 'Tunjangan', 'trim|required');
			$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
			$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('penggajian/edit',$data);
			} else {
				$gaji = $this->input->post('gaji');
				$tunjangan = $this->input->post('tunjangan');
				$total = $gaji + $tunjangan;
				$this->Penggajian_model->update($id_gaji,$total);
				redirect('Penggajian','refresh');
			}
		}
		else{
			redirect('login','refresh');
		}
	}

	public function delete($id_gaji)
	{
		$this->Penggajian_model->delete($id_gaji);
		redirect('Penggajian','refresh');
	}

}

/* End of file Penggajian.php */
/* Location: ./application/controllers/Penggajian.php */