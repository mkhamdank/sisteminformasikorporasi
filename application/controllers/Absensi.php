<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

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
			$this->load->model('Absensi_model');
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

			$data['absensi'] = $this->Absensi_model->getAbsensi();

			$this->load->view('absensi/absensi_view', $data);
		}
		else{
			redirect('login','refresh');
		}
	}

	public function create_datang()
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

			$this->form_validation->set_rules('hidden', 'Nama Pegawai', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('absensi/create_datang',$data);
			} else {
				$tanggal = date("Y/m/d");
				date_default_timezone_set("Asia/Bangkok");
				$jam_datang = date("h:i:sa");
				$fk_user = $this->input->post('fk_user');
				$user = count($fk_user);
				for ($i=0; $i < $user; $i++) { 
					$this->Absensi_model->create_datang($fk_user[$i],$tanggal,$jam_datang);
				}
				redirect('Absensi','refresh');
			}
		}
		else{
			redirect('login','refresh');
		}
	}

	public function create_pulang($id_absensi,$fk_user)
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

				// $tanggal = date("Y/m/d");
				date_default_timezone_set("Asia/Bangkok");
				$jam_pulang = date("h");
				$jam = date("h:i:sa");
				$wkt_pulang = date("a");
				$jm_plg = "4";
				if ($jam_pulang > $jm_plg && $wkt_pulang == "pm") {
					$gaji = 20000;
					// $diff  = date_diff($jm_plg, $jam_pulang);
					$selisih = $jam_pulang - $jm_plg;
					$gaji_lembur = $selisih * $gaji;
					$this->Lembur_model->create($fk_user,$selisih,$gaji_lembur);
				}
				$this->Absensi_model->create_pulang($id_absensi,$jam);
				redirect('Absensi','refresh');
		}
		else{
			redirect('login','refresh');
		}
	}

	public function tidak_masuk()
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

			$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('absensi/tidak_masuk',$data);
			} else {
				$tanggal = date("Y/m/d");
				$this->Absensi_model->tidak_masuk($tanggal);
				redirect('Absensi','refresh');
			}
		}
		else{
			redirect('login','refresh');
		}
	}

	public function edit($id_absensi)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$id_user = $session_data['id_user'];
			$username = $session_data['username'];
			$password = $session_data['password'];
			$nama = $session_data['nama'];
			$alamat = $session_data['alamat'];
			$no_hp = $session_data['no_hp'];

			$data['absensi'] = $this->Absensi_model->getAbsensiById($id_absensi);
			$data['sdm'] = $this->SDM_model->getUser();

			$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
			$this->form_validation->set_rules('jam_datang', 'Jam Datang', 'trim|required');
			$this->form_validation->set_rules('jam_pulang', 'Jam Pulang', 'trim|required');
			$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('absensi/edit',$data);
			} else {
				$this->Absensi_model->update($id_absensi);
				redirect('Absensi','refresh');
			}
		}
		else{
			redirect('login','refresh');
		}
	}

	public function delete($id_absensi)
	{
		$this->Absensi_model->delete($id_absensi);
		redirect('Absensi','refresh');
	}
}

/* End of file Absensi.php */
/* Location: ./application/controllers/Absensi.php */