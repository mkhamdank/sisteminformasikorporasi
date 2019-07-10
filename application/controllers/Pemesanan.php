<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('Pemesanan_model');
		$this->load->model('Pelanggan_model');
		$this->load->model('Produk_model');
		$this->load->model('Pembayaran_model');
	}

	public function index($id_produk)
	{
		$this->form_validation->set_rules('nama_pelanggan','nama_pelanggan','trim|required');
		$this->form_validation->set_rules('alamat','alamat','trim|required');
		$this->form_validation->set_rules('no_hp','no_hp','trim|required');

		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('pemesanan/create');
		}
		else
		{
			$produk = $this->Produk_model->getProdukById($id_produk);
				foreach ($produk as $val) {
					$harga = $val->harga;
					$stok = $val->jumlah;
				}
			$jml_pesanan = $this->input->post('jumlah_pesanan');
			if ($jml_pesanan > $stok) {
				print "<script type=\"text/javascript\">alert('Maaf, Jumlah Pesanan Anda melebihi stok yang tersedia.');</script>";
				redirect('Pemesanan/index/'.$id_produk,'refresh');
			}
			else{
				$pengiriman = $this->input->post('pengiriman');
				if ($pengiriman == "Diambil") {
					$ongkos_kirim = 0;
				}
				elseif ($pengiriman == "Dikirim") {
					$ongkos_kirim = $this->input->post('lokasi');
					if ($ongkos_kirim == "-") {
						print "<script type=\"text/javascript\">alert('Jika pesanan Dikirim, Masukkan lokasi Pengiriman.');</script>";
						redirect('Pemesanan/index/'.$id_produk,'refresh');
					}
				}
				$pembayaran = $this->input->post('pilihan_pembayaran');
				if ($pembayaran == "-") {
					print "<script type=\"text/javascript\">alert('Silahkan masukkan Pilihan Pembayaran.');</script>";
					redirect('Pemesanan/index/'.$id_produk,'refresh');
				}
				else if($pembayaran == "Transfer"){
					$this->Pelanggan_model->create();
					$nama_pelanggan = $this->input->post('nama_pelanggan');
					$pelanggan = $this->Pelanggan_model->getPelangganByNama($nama_pelanggan);
					foreach ($pelanggan as $key) {
						$fk_pelanggan = $key->id_pelanggan;
					}
					$jml_baru = $stok - $jml_pesanan;
					$total_bayar = ($harga*$jml_pesanan)+$ongkos_kirim;
					$tanggal_pesan = date("Y-m-d");
					$this->Produk_model->update_stok($id_produk,$jml_baru);
					$this->Pemesanan_model->create($id_produk,$fk_pelanggan,$ongkos_kirim,$total_bayar,$tanggal_pesan);
					$pemesanan = $this->Pemesanan_model->getPemesananByProduk($id_produk);
					foreach ($pemesanan as $pmsnn) {
						$id_pemesanan = $pmsnn->id_pemasukan;
					}
					$this->Pembayaran_model->create($id_pemesanan);
					print "<script type=\"text/javascript\">alert('Pesanan Anda telah kami terima dan segera di proses. Terima kasih :)');</script>";
					$this->load->view('pemesanan/pemesanan_sukses');
				}
				else if($pembayaran == "Ditempat"){
					$this->Pelanggan_model->create();
					$nama_pelanggan = $this->input->post('nama_pelanggan');
					$pelanggan = $this->Pelanggan_model->getPelangganByNama($nama_pelanggan);
					foreach ($pelanggan as $key) {
						$fk_pelanggan = $key->id_pelanggan;
					}
					$jml_baru = $stok - $jml_pesanan;
					$total_bayar = ($harga*$jml_pesanan)+$ongkos_kirim;
					$tanggal_pesan = date("Y-m-d");
					$this->Produk_model->update_stok($id_produk,$jml_baru);
					$this->Pemesanan_model->create($id_produk,$fk_pelanggan,$ongkos_kirim,$total_bayar,$tanggal_pesan);
					$pemesanan = $this->Pemesanan_model->getPemesananByProduk($id_produk);
					foreach ($pemesanan as $pmsnn) {
						$id_pemesanan = $pmsnn->id_pemasukan;
					}
					$this->Pembayaran_model->create($id_pemesanan);
					print "<script type=\"text/javascript\">alert('Pesanan Anda telah kami terima dan segera di proses. Terima kasih :)');</script>";
					redirect('Awal','refresh');
				}
			}
		}
	}
}

/* End of file Pemesanan.php */
/* Location: ./application/controllers/Pemesanan.php */