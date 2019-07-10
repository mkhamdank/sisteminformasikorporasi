<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

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

			// $this->load->model('pemesanan_model');
			// $this->load->model('supplier_model');
			// $this->load->model('bahan_model');
			$this->load->helper('url','form','file');
			$this->load->library('form_validation');
			$this->load->model('Produk_model');
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

			$data['produk'] = $this->Produk_model->getProduk();

			$this->load->view('produk/produk_view', $data);
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

			$this->form_validation->set_rules('nama_produk','nama_produk','trim|required');
			$this->form_validation->set_rules('jumlah','jumlah','trim|required');
			$this->form_validation->set_rules('harga','harga','trim|required');

			if($this->form_validation->run()==FALSE)
			{
				$this->load->view('Produk/create');
			}
			else
			{
				$config['upload_path'] = './assets/uploads/';
				$config['allowed_types'] = 'jpg|png';
				$config['max_size']  = 100000;
				$config['max_width']  = 200000;
				$config['max_height']  = 100000;
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('userfile')){
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('produk/create', $error);
				}
				else{
					$image_data = $this->upload->data();

					$configer = array (
						'image_library' => 'gd2',
						'source_image' => $image_data['full_path'],
						'maintain_ratio' => TRUE,
						'width' => 500,
						'height' => 768,
						);

					$this->load->library('image_lib', $config);
					$this->image_lib->clear();
					$this->image_lib->initialize($configer);
					$this->image_lib->resize();

					$this->Produk_model->create();
					redirect('Produk','refresh');
				}
			}
		}
		else{
			redirect('login','refresh');
		}
	}

	public function delete($id_produk,$gambar)
	{
		if (ISSET($gambar)) {
			$path_to_file = './assets/uploads/'.$gambar;
			unlink($path_to_file);
		}
		$this->Produk_model->delete($id_produk);
		redirect('Produk','refresh');
	}

	public function edit($id_produk,$gambar)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$id_user = $session_data['id_user'];
			$username = $session_data['username'];
			$password = $session_data['password'];
			$nama = $session_data['nama'];
			$alamat = $session_data['alamat'];
			$no_hp = $session_data['no_hp'];

			$this->form_validation->set_rules('nama_produk','nama_produk','trim|required');
			$this->form_validation->set_rules('jumlah','jumlah','trim|required');
			$this->form_validation->set_rules('harga','harga','trim|required');

			$data['produk'] = $this->Produk_model->getProdukById($id_produk);

			if($this->form_validation->run()==FALSE)
			{
				$this->load->view('Produk/edit',$data);
			}
			else
			{
				$config['upload_path'] = './assets/uploads/';
				$config['allowed_types'] = 'jpg|png';
				$config['max_size']  = 100000;
				$config['max_width']  = 200000;
				$config['max_height']  = 100000;
				
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('userfile')){
					$data['error'] = $this->upload->display_errors();
					$this->load->view('produk/edit', $data);
				}
				else{
					$image_data = $this->upload->data();

					$configer = array (
						'image_library' => 'gd2',
						'source_image' => $image_data['full_path'],
						'maintain_ratio' => TRUE,
						'width' => 500,
						'height' => 768,
						);

					$this->load->library('image_lib', $config);
					$this->image_lib->clear();
					$this->image_lib->initialize($configer);
					$this->image_lib->resize();

					$path_to_file = './assets/uploads/'.$gambar;
					unlink($path_to_file);

					$this->Produk_model->update($id_produk);
					redirect('Produk','refresh');
				}
			}
		}
		else{
			redirect('login','refresh');
		}
	}

}

/* End of file Produk.php */
/* Location: ./application/controllers/Produk.php */