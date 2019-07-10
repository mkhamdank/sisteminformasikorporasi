<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lembur extends CI_Controller {

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
			$this->load->model('Lembur_model');
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

			$data['lembur'] = $this->Lembur_model->getLembur();

			$this->load->view('lembur/lembur_view', $data);
		}
		else{
			redirect('login','refresh');
		}
	}

	public function delete($id_lembur)
	{
		$this->Lembur_model->delete($id_lembur);
		redirect('Lembur','refresh');
	}

	public function edit($id_lembur)
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
			$data['lembur'] = $this->Lembur_model->getLemburById($id_lembur);

			$this->form_validation->set_rules('waktu', 'Waktu', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('lembur/edit', $data);
			} else {
				$waktu = $this->input->post('waktu');
				$gaji_lembur = $waktu * 20000;
				$this->Lembur_model->update($id_lembur,$gaji_lembur);
				redirect('lembur','refresh');
			}
		}
		else{
			redirect('login','refresh');
		}
	}

}

/* End of file Lembur.php */
/* Location: ./application/controllers/Lembur.php */