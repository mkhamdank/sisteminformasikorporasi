<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SDM_model extends CI_Model {

	public function getUser()
	{
		$query = $this->db->get('user');
		return $query->result();
	}

	public function getUserById($id_user)
	{
		$this->db->where('id_user', $id_user);
		$query = $this->db->get('user');
		return $query->result();
	}

	public function delete($id_user)
	{
		$this->db->where('id_user', $id_user);
		$this->db->delete('user');
	}

	public function create()
	{
		$object = array('username' => $this->input->post('username'),
		'password' => MD5($this->input->post('password')),
		'nama' => $this->input->post('nama'),
		'alamat' => $this->input->post('alamat'),
		'no_hp' => $this->input->post('no_hp') );
		$this->db->insert('user', $object);
	}

	public function update($id_user)
	{
		$object = array('username' => $this->input->post('username'),
		'password' => MD5($this->input->post('password')),
		'nama' => $this->input->post('nama'),
		'alamat' => $this->input->post('alamat'),
		'no_hp' => $this->input->post('no_hp') );
		$this->db->where('id_user', $id_user);
		$this->db->update('user', $object);
	}

}

/* End of file SDM_model.php */
/* Location: ./application/models/SDM_model.php */