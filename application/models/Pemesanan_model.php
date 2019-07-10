<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan_model extends CI_Model {

	public function create($fk_produk,$fk_pelanggan,$ongkos_kirim,$total_bayar,$tanggal_pesan)
	{
		$object = array('fk_produk' => $fk_produk,
		'fk_pelanggan' => $fk_pelanggan,
		'fk_user' => "1",
		'jumlah_pesanan' => $this->input->post('jumlah_pesanan'),
		'ongkos_kirim' => $ongkos_kirim,
		'total_bayar' => $total_bayar,
		'tanggal_pesan' => $tanggal_pesan,
		'tanggal_kirim' => $this->input->post('tanggal_kirim'),
		'status_pesanan' => "Diproses" );
		$this->db->insert('pemasukan', $object);
	}

	public function getPemesanan()
	{
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = pemasukan.fk_pelanggan', 'join');
		$this->db->join('produk', 'produk.id_produk = pemasukan.fk_produk', 'join');
		$this->db->join('pembayaran', 'pembayaran.fk_pemasukan = pemasukan.id_pemasukan', 'join');
		return $this->db->get('pemasukan')->result();
	}

	public function getPemesananById($id_pemesanan)
	{
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = pemasukan.fk_pelanggan', 'join');
		$this->db->join('produk', 'produk.id_produk = pemasukan.fk_produk', 'join');
		$this->db->join('pembayaran', 'pembayaran.fk_pemasukan = pemasukan.id_pemasukan', 'join');
		$this->db->where('id_pemasukan', $id_pemesanan);
		return $this->db->get('pemasukan')->result();
	}

	public function getPemesananByProduk($id_produk)
	{
		// $this->db->join('pelanggan', 'pelanggan.id_pelanggan = pemasukan.fk_pelanggan', 'join');
		// $this->db->join('produk', 'produk.id_produk = pemasukan.fk_produk', 'join');
		// $this->db->join('pembayaran', 'pembayaran.fk_pemasukan = pemasukan.id_pemasukan', 'join');
		$this->db->where('fk_produk', $id_produk);
		return $this->db->get('pemasukan')->result();
	}

	public function update($id_pemasukan)
	{
		$object = array('fk_produk' => $fk_produk,
		'fk_pelanggan' => $fk_pelanggan,
		'fk_user' => "1",
		'jumlah_pesanan' => $this->input->post('jumlah_pesanan'),
		'ongkos_kirim' => $ongkos_kirim,
		'total_bayar' => $total_bayar,
		'tanggal_pesan' => $tanggal_pesan,
		'tanggal_kirim' => $this->input->post('tanggal_kirim'),
		'status_pesanan' => "Diproses" );
		$this->db->where('id_pemasukan', $id_pemasukan);
		$this->db->update('pemasukan', $object);
	}

	public function delete($id_pemasukan)
	{
		$this->db->where('id_pemasukan', $id_pemasukan);
		$this->db->delete('pemasukan');
	}

	public function update_pesanan_dikirim($id_pemasukan)
	{
		$object = array(
		'status_pesanan' => "Dikirim" );
		$this->db->where('id_pemasukan', $id_pemasukan);
		$this->db->update('pemasukan', $object);
	}

	public function update_pesanan_selesai($id_pemasukan)
	{
		$object = array(
		'status_pesanan' => "Selesai" );
		$this->db->where('id_pemasukan', $id_pemasukan);
		$this->db->update('pemasukan', $object);
	}

}

/* End of file Pemesanan_model.php */
/* Location: ./application/models/Pemesanan_model.php */