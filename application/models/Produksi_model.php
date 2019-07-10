<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produksi_model extends CI_Model {

	public function getProduksi()
	{
		$this->db->join('bahan', 'bahan.id_bahan = produksi.fk_bahan', 'join');
		return $this->db->get('produksi')->result();
	}

	public function getProduksiById($id_produksi)
	{
		$this->db->where('id_produksi', $id_produksi);
		$this->db->join('bahan', 'bahan.id_bahan = produksi.fk_bahan', 'join');
		return $this->db->get('produksi')->result();
	}

	public function create()
	{
		$object = array('fk_bahan' => $this->input->post('fk_bahan'),
		'tanggal_produksi' => date("Y-m-d"),
		'jumlah_produksi' => $this->input->post('jumlah') );
		$this->db->insert('produksi', $object);
	}

	public function update($id_produksi)
	{
		$object = array('fk_bahan' => $this->input->post('fk_bahan'),
		'tanggal_produksi' => $this->input->post('tanggal_produksi'),
		'jumlah_produksi' => $this->input->post('jumlah') );
		$this->db->where('id_produksi', $id_produksi);
		$this->db->update('produksi', $object);
	}

	public function delete($id_produksi)
	{
		$this->db->where('id_produksi', $id_produksi);
		$this->db->delete('produksi');
	}

}

/* End of file Produksi_model.php */
/* Location: ./application/models/Produksi_model.php */