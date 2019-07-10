<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {

	public function getPelanggan()
	{
		return $this->db->get('pelanggan')->result();
	}

	public function getPelangganById($id_pelanggan)
	{
		$this->db->where('id_pelanggan', $id_pelanggan);
		return $this->db->get('pelanggan')->result();
	}

	public function getPelangganByNama($nama)
	{
		$this->db->where('nama_pelanggan', $nama);
		$query = $this->db->get('pelanggan');
		return $query->result();
	}

	public function create()
	{
		$object = array('nama_pelanggan' => $this->input->post('nama_pelanggan'),
		'alamat' => $this->input->post('alamat'),
		'no_hp' => $this->input->post('no_hp') );
		$this->db->insert('pelanggan', $object);
	}

	public function update($id_pelanggan)
	{
		$object = array('nama_pelanggan' => $this->input->post('nama_pelanggan'),
		'alamat' => $this->input->post('alamat'),
		'no_hp' => $this->input->post('no_hp') );
		$this->db->where('id_pelanggan', $id_pelanggan);
		$this->db->update('pelanggan', $object);
	}

	public function delete($id_pelanggan)
	{
		$this->db->where('id_pelanggan', $id_pelanggan);
		$this->db->delete('pelanggan');
	}

}

/* End of file Pelanggan_model.php */
/* Location: ./application/models/Pelanggan_model.php */