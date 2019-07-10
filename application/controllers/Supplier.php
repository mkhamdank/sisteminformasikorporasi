<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

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
			$this->load->model('Supplier_model');
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

			$data['supplier'] = $this->Supplier_model->getSupplier();

			$this->load->view('supplier/supplier_view', $data);
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

			$this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'trim|required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
			$this->form_validation->set_rules('no_hp', 'No HP', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('supplier/create');
			} else {
				$this->Supplier_model->create();
				redirect('Supplier','refresh');
			}
		}
		else{
			redirect('login','refresh');
		}
	}

	public function edit($id_supplier)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$id_user = $session_data['id_user'];
			$username = $session_data['username'];
			$password = $session_data['password'];
			$nama = $session_data['nama'];
			$alamat = $session_data['alamat'];
			$no_hp = $session_data['no_hp'];

			$data['supplier'] = $this->Supplier_model->getSupplierById($id_supplier);

			$this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'trim|required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
			$this->form_validation->set_rules('no_hp', 'No HP', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('supplier/edit',$data);
			} else {
				$this->Supplier_model->update($id_supplier);
				redirect('Supplier','refresh');
			}
		}
		else{
			redirect('login','refresh');
		}
	}

	public function delete($id_supplier)
	{
		$this->Supplier_model->delete($id_supplier);
		redirect('Supplier','refresh');
	}

}

/* End of file Supplier.php */
/* Location: ./application/controllers/Supplier.php */