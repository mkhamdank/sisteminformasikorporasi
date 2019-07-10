<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_model extends CI_Model {

	public function getPembayaran()
	{
		$this->db->join('pemasukan', 'pemasukan.id_pemasukan = pembayaran.fk_pembayaran', 'join');
		return $this->db->get('pembayaran')->result();
	}

	public function getPembayaranById($id_pembayaran)
	{
		$this->db->where('id_pembayaran', $id_pembayaran);
		$this->db->join('pembayaran', 'pemasukan.id_pemasukan = pembayaran.fk_pembayaran', 'join');
		return $this->db->get('pembayaran')->result();
	}

	public function create($fk_pemasukan)
	{
		$object = array('fk_pemasukan' => $fk_pemasukan,
		'pilihan_pembayaran' => $this->input->post('pilihan_pembayaran'),
		'status_bayar' => "Belum Dibayar" );
		$this->db->insert('pembayaran', $object);
	}

	public function update($id_pembayaran)
	{
		$object = array('fk_pemasukan' => $fk_pemasukan,
		'pilihan_pembayaran' => $this->input->post('pilihan_pembayaran'),
		'status_bayar' => "Belum Dibayar" );
		$this->db->where('id_pembayaran', $id_pembayaran);
		$this->db->update('pembayaran', $object);
	}

	public function delete($id_pembayaran)
	{
		$this->db->where('id_pembayaran', $id_pembayaran);
		$this->db->delete('pembayaran');
	}

	public function update_dibayar($id_pembayaran)
	{
		$object = array(
		'status_bayar' => "Sudah Dibayar" );
		$this->db->where('id_pembayaran', $id_pembayaran);
		$this->db->update('pembayaran', $object);
	}

}

/* End of file Pembayaran_model.php */
/* Location: ./application/models/Pembayaran_model.php */