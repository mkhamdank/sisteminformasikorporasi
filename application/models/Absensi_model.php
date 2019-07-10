<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi_model extends CI_Model {

	public function getAbsensi()
	{
		$this->db->join('user', 'user.id_user = absensi.fk_user', 'join');
		$query = $this->db->get('absensi');
		return $query->result();
	}

	public function getAbsensiById($id_absensi)
	{
		$this->db->join('user', 'user.id_user = absensi.fk_user', 'join');
		$this->db->where('id_absensi', $id_absensi);
		$query = $this->db->get('absensi');
		return $query->result();
	}

	public function delete($id_absensi)
	{
		$this->db->where('id_absensi', $id_absensi);
		$this->db->delete('absensi');
	}

	public function create_datang($fk_user, $tanggal, $waktu)
	{
		$object = array('fk_user' => $fk_user,
		'tanggal' => $tanggal,
		'jam_datang' => $waktu,
		'keterangan' => "-" );
		$this->db->insert('absensi', $object);
	}

	public function tidak_masuk($tanggal)
	{
		$object = array('fk_user' => $this->input->post('fk_user'),
		'tanggal' => $tanggal,
		'keterangan' => $this->input->post('keterangan') );
		$this->db->insert('absensi', $object);
	}

	public function create_pulang($id_absensi,$waktu)
	{
		$object = array('jam_pulang' => $waktu );
		$this->db->where('id_absensi', $id_absensi);
		$this->db->update('absensi', $object);
	}

	public function update($id_absensi)
	{
		$object = array('fk_user' => $this->input->post('fk_user'),
		'tanggal' => $this->input->post('tanggal'),
		'jam_datang' => $this->input->post('jam_datang'),
		'jam_pulang' => $this->input->post('jam_pulang'),
		'keterangan' => $this->input->post('keterangan') );
		$this->db->where('id_absensi', $id_absensi);
		$this->db->update('absensi', $object);
	}

}

/* End of file Absensi_model.php */
/* Location: ./application/models/Absensi_model.php */