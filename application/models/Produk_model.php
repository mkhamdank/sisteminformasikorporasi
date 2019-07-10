<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

	public function getProduk()
	{
		$query = $this->db->get('produk');
		return $query->result();
	}

	public function getProdukById($id_produk)
	{
		$this->db->where('id_produk', $id_produk);
		$query = $this->db->get('produk');
		return $query->result();
	}

	public function create()
	{
		$object = array ('nama_produk' =>$this->input->post('nama_produk'),
		'jumlah' =>$this->input->post('jumlah'),
		'harga' =>$this->input->post('harga'),
		'Gambar'=>$this->upload->data('file_name'),);
		$this->db->insert('produk',$object);
	}

	public function delete($id_produk)
	{
		$this->db->where('id_produk', $id_produk);
		$this->db->delete('produk');
	}

	public function update($id_produk)
	{
		$object = array ('nama_produk' =>$this->input->post('nama_produk'),
		'jumlah' =>$this->input->post('jumlah'),
		'harga' =>$this->input->post('harga'),
		'Gambar'=>$this->upload->data('file_name'));
		$this->db->where('id_produk', $id_produk);
		$this->db->update('produk',$object);
	}

	public function update_stok($id_produk,$jumlah)
	{
		$object = array (
		'jumlah' =>$jumlah);
		$this->db->where('id_produk', $id_produk);
		$this->db->update('produk',$object);
	}

	public function updateTanpaGambar($id_produk)
	{
		$object = array ('nama_produk' =>$this->input->post('nama_produk'),
		'jumlah' =>$this->input->post('jumlah'),
		'harga' =>$this->input->post('harga'));
		$this->db->where('id_produk', $id_produk);
		$this->db->update('produk',$object);
	}

}

/* End of file Produk_model.php */
/* Location: ./application/models/Produk_model.php */