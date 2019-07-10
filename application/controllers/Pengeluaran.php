<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran extends CI_Controller {

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
			$this->load->model('Pengeluaran_model');
			$this->load->model('Supplier_model');
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

			$data['pengeluaran'] = $this->Pengeluaran_model->getPengeluaran();

			$this->load->view('pengeluaran/pengeluaran_view', $data);
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

			$this->form_validation->set_rules('jumlah_beli', 'Jumlah Beli', 'trim|required');
			$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');

			$data['supplier'] = $this->Supplier_model->getSupplier();
			$data['bahan'] = $this->Bahan_model->getBahan();

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('pengeluaran/create',$data);
			} else {
				$jumlah_beli = $this->input->post('jumlah_beli');
				$fk_bahan = $this->input->post('fk_bahan');
				$tanggal_beli = $this->input->post('tanggal');
				$bahan = $this->Bahan_model->getBahanById($fk_bahan);
				foreach ($bahan as $key) {
					$harga_satuan = $key->harga_satuan;
					$jumlah = $key->jumlah;
					$expired = $key->expired;
				}
				$total_harga = $jumlah_beli * $harga_satuan;
				$jml_baru = $jumlah + $jumlah_beli;
				$tanggal_expired = date('Y-m-d', strtotime($tanggal_beli. ' + '.$expired.' days'));
				$this->Bahan_model->updateStok($fk_bahan,$jml_baru);
				$this->Pengeluaran_model->create($total_harga,$id_user,$tanggal_expired);
				redirect('Pengeluaran','refresh');
			}
		}
		else{
			redirect('login','refresh');
		}
	}

	public function edit($id_pengeluaran)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$id_user = $session_data['id_user'];
			$username = $session_data['username'];
			$password = $session_data['password'];
			$nama = $session_data['nama'];
			$alamat = $session_data['alamat'];
			$no_hp = $session_data['no_hp'];

			$data['pengeluaran'] = $this->Pengeluaran_model->getPengeluaranById($id_pengeluaran);
			$data['supplier'] = $this->Supplier_model->getSupplier();
			$data['bahan'] = $this->Bahan_model->getBahan();

			$this->form_validation->set_rules('jumlah_beli', 'Jumlah Beli', 'trim|required');
			$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
			

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('pengeluaran/edit',$data);
			} else {
				$jumlah_beli = $this->input->post('jumlah_beli');
				$fk_bahan = $this->input->post('fk_bahan');
				$tanggal_beli = $this->input->post('tanggal');
				$bahan = $this->Bahan_model->getBahanById($fk_bahan);
				foreach ($bahan as $key) {
					$harga_satuan = $key->harga_satuan;
					$expired = $key->expired;
				}
				$total_harga = $jumlah_beli * $harga_satuan;
				$tanggal_expired = date('Y-m-d', strtotime($tanggal_beli. ' + '.$expired.' days'));
				$this->Pengeluaran_model->update($id_pengeluaran,$total_harga,$id_user,$tanggal_expired);
				redirect('Pengeluaran','refresh');
			}
		}
		else{
			redirect('login','refresh');
		}
	}

	public function delete($id_pengeluaran)
	{
		$this->Pengeluaran_model->delete($id_pengeluaran);
		redirect('Pengeluaran','refresh');
	}

}

/* End of file Pengeluaran.php */
/* Location: ./application/controllers/Pengeluaran.php */