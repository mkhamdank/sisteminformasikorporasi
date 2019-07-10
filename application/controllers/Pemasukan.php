<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemasukan extends CI_Controller {

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
			$this->load->model('Pemesanan_model');
			$this->load->model('Pembayaran_model');
			$this->load->model('Pelanggan_model');
		}else{
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

			$data['pemasukan'] = $this->Pemesanan_model->getPemesanan();
			$this->load->view('pemasukan/pemasukan_view', $data);
		}else{
			redirect('login','refresh');
		}
	}

	public function delete($id_pemasukan,$id_pembayaran,$id_pelanggan)
	{		
		$this->Pembayaran_model->delete($id_pembayaran);
		$this->Pemesanan_model->delete($id_pemasukan);
		$this->Pelanggan_model->delete($id_pelanggan);
		redirect('Pemasukan','refresh');
	}

	public function dikirim($id_pemesanan)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$id_user = $session_data['id_user'];
			$username = $session_data['username'];
			$password = $session_data['password'];
			$nama = $session_data['nama'];
			$alamat = $session_data['alamat'];
			$no_hp = $session_data['no_hp'];

			$this->Pemesanan_model->update_pesanan_dikirim($id_pemesanan);
			redirect('Pemasukan','refresh');
		}else{
			redirect('login','refresh');
		}
	}

	public function selesai($id_pemesanan,$id_pembayaran)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$id_user = $session_data['id_user'];
			$username = $session_data['username'];
			$password = $session_data['password'];
			$nama = $session_data['nama'];
			$alamat = $session_data['alamat'];
			$no_hp = $session_data['no_hp'];

			$this->Pemesanan_model->update_pesanan_selesai($id_pemesanan);
			$this->Pembayaran_model->update_dibayar($id_pembayaran);
			redirect('Pemasukan','refresh');
		}else{
			redirect('login','refresh');
		}
	}

}

/* End of file Pemasukan.php */
/* Location: ./application/controllers/Pemasukan.php */