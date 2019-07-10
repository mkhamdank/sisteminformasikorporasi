<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahan_model extends CI_Model {

	public function getBahan()
	{
		return $this->db->get('bahan')->result();
	}

	public function getBahanById($id_bahan)
	{
		$this->db->where('id_bahan', $id_bahan);
		return $this->db->get('bahan')->result();
	}

	public function create()
	{
		$object = array('nama_bahan' => $this->input->post('nama_bahan'),
		 'jumlah' => $this->input->post('jumlah'),
		 'harga_satuan' => $this->input->post('harga_satuan'),
		 'expired' => $this->input->post('expired'));
		$this->db->insert('bahan', $object);
	}

	public function update($id_bahan)
	{
		$object = array('nama_bahan' => $this->input->post('nama_bahan'),
		 'jumlah' => $this->input->post('jumlah'),
		 'harga_satuan' => $this->input->post('harga_satuan'),
		 'expired' => $this->input->post('expired'));
		$this->db->where('id_bahan', $id_bahan);
		$this->db->update('bahan', $object);
	}

	public function updateStok($id_bahan,$stok)
	{
		$object = array(
		 'jumlah' => $stok);
		$this->db->where('id_bahan', $id_bahan);
		$this->db->update('bahan', $object);
	}

	public function delete($id_bahan)
	{
		$this->db->where('id_bahan', $id_bahan);
		$this->db->delete('bahan');
	}

}

/* End of file Bahan_model.php */
/* Location: ./application/models/Bahan_model.php */