<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran_model extends CI_Model {

	public function getPengeluaran()
	{
		$this->db->join('supplier', 'supplier.id_supplier = pengeluaran.fk_supplier', 'join');
		$this->db->join('bahan', 'bahan.id_bahan = pengeluaran.fk_bahan', 'join');
		$this->db->join('user', 'user.id_user = pengeluaran.fk_user', 'join');
		return $this->db->get('pengeluaran')->result();
	}

	public function getPengeluaranById($id_pengeluaran)
	{
		$this->db->join('supplier', 'supplier.id_supplier = pengeluaran.fk_supplier', 'join');
		$this->db->join('bahan', 'bahan.id_bahan = pengeluaran.fk_bahan', 'join');
		$this->db->join('user', 'user.id_user = pengeluaran.fk_user', 'join');
		$this->db->where('id_pengeluaran', $id_pengeluaran);
		return $this->db->get('pengeluaran')->result();
	}

	public function getPengeluaranByBahan($id_bahan)
	{
		$this->db->join('supplier', 'supplier.id_supplier = pengeluaran.fk_supplier', 'join');
		$this->db->join('bahan', 'bahan.id_bahan = pengeluaran.fk_bahan', 'join');
		$this->db->join('user', 'user.id_user = pengeluaran.fk_user', 'join');
		$this->db->where('fk_bahan', $id_bahan);
		return $this->db->get('pengeluaran')->result();
	}

	public function create($total_harga,$id_user,$tanggal_expired)
	{
		$object = array('fk_supplier' => $this->input->post('fk_supplier'),
		'fk_user' => $id_user,
		'fk_bahan' => $this->input->post('fk_bahan'),
		'jumlah_beli' => $this->input->post('jumlah_beli'),
		'tanggal' => $this->input->post('tanggal'),
		'tanggal_expired' => $tanggal_expired,
		'harga' => $total_harga );
		$this->db->insert('pengeluaran', $object);
	}

	public function update($id_pengeluaran,$total_harga,$id_user,$tanggal_expired)
	{
		$object = array('fk_supplier' => $this->input->post('fk_supplier'),
		'fk_user' => $id_user,
		'fk_bahan' => $this->input->post('fk_bahan'),
		'jumlah_beli' => $this->input->post('jumlah_beli'),
		'tanggal' => $this->input->post('tanggal'),
		'tanggal_expired' => $tanggal_expired,
		'harga' => $total_harga );
		$this->db->where('id_pengeluaran', $id_pengeluaran);
		$this->db->update('pengeluaran', $object);
	}

	public function delete($id_pengeluaran)
	{
		$this->db->where('id_pengeluaran', $id_pengeluaran);
		$this->db->delete('pengeluaran');
	}

}

/* End of file Pengeluaran_model.php */
/* Location: ./application/models/Pengeluaran_model.php */