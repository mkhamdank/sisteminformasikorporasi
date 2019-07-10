<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model {

	public function getSupplier()
	{
		return $this->db->get('supplier')->result();
	}

	public function getSupplierById($id_supplier)
	{
		$this->db->where('id_supplier', $id_supplier);
		return $this->db->get('supplier')->result();
	}

	public function create()
	{
		$object = array('nama_supplier' => $this->input->post('nama_supplier'),
		'alamat' => $this->input->post('alamat'),
		'no_hp' => $this->input->post('no_hp') );
		$this->db->insert('supplier', $object);
	}

	public function update($id_supplier)
	{
		$object = array('nama_supplier' => $this->input->post('nama_supplier'),
		'alamat' => $this->input->post('alamat'),
		'no_hp' => $this->input->post('no_hp') );
		$this->db->where('id_supplier', $id_supplier);
		$this->db->update('supplier', $object);
	}

	public function delete($id_supplier)
	{
		$this->db->where('id_supplier', $id_supplier);
		$this->db->delete('supplier');
	}

}

/* End of file Supplier_model.php */
/* Location: ./application/models/Supplier_model.php */