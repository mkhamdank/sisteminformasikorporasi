<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penggajian_model extends CI_Model {

	public function getPenggajian()
	{
		$this->db->join('user', 'user.id_user = gaji.fk_user', 'join');
		$query = $this->db->get('gaji');
		return $query->result();
	}

	public function getPenggajianById($id_gaji)
	{
		$this->db->join('user', 'user.id_user = gaji.fk_user', 'join');
		$this->db->where('id_gaji', $id_gaji);
		$query = $this->db->get('gaji');
		return $query->result();
	}

	public function delete($id_gaji)
	{
		$this->db->where('id_gaji', $id_gaji);
		$this->db->delete('gaji');
	}

	public function create($total)
	{
		$object = array('fk_user' => $this->input->post('fk_user'),
		'gaji' => $this->input->post('gaji'),
		'tunjangan' => $this->input->post('tunjangan'),
		'total' => $total,
		'tanggal' => $this->input->post('tanggal'),
		'keterangan' => $this->input->post('keterangan') );
		$this->db->insert('gaji', $object);
	}

	public function update($id_gaji,$total)
	{
		$object = array('fk_user' => $this->input->post('fk_user'),
		'gaji' => $this->input->post('gaji'),
		'tunjangan' => $this->input->post('tunjangan'),
		'total' => $total,
		'tanggal' => $this->input->post('tanggal'),
		'keterangan' => $this->input->post('keterangan') );
		$this->db->where('id_gaji', $id_gaji);
		$this->db->update('gaji', $object);
	}

}

/* End of file Penggajian_model.php */
/* Location: ./application/models/Penggajian_model.php */