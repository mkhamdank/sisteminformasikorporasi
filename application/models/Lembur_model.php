<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lembur_model extends CI_Model {

	public function getLembur()
	{
		$this->db->join('user', 'user.id_user = lembur.fk_user', 'join');
		$query = $this->db->get('lembur');
		return $query->result();
	}

	public function getLemburById($id_lembur)
	{
		$this->db->join('user', 'user.id_user = lembur.fk_user', 'join');
		$this->db->where('id_lembur', $id_lembur);
		$query = $this->db->get('lembur');
		return $query->result();
	}

	public function create($fk_user,$waktu,$gaji_lembur)
	{
		$object = array('fk_user' => $fk_user,
		'tanggal_lembur' => date("Y/m/d"),
		'waktu' => $waktu,
		'gaji_lembur' => $gaji_lembur );
		$this->db->insert('lembur', $object);
	}

	public function delete($id_lembur)
	{
		$this->db->where('id_lembur', $id_lembur);
		$this->db->delete('lembur');
	}

	public function update($id_lembur,$gaji_lembur)
	{
		$object = array('fk_user' => $this->input->post('fk_user'),
		 'tanggal_lembur' => $this->input->post('tanggal_lembur'),
		 'waktu' => $this->input->post('waktu'),
		 'gaji_lembur' => $gaji_lembur);
		$this->db->where('id_lembur', $id_lembur);
		$this->db->update('lembur', $object);
	}

}

/* End of file Lembur_model.php */
/* Location: ./application/models/Lembur_model.php */