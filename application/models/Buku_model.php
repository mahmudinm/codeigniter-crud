<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends CI_Model {
    
	public function all()
	{
	    return $this->db->get('buku')->result();
	}	

	public function create($data)
	{
	    return $this->db->insert('buku', $data);
	}
	
	public function find($id)
	{
	    return $this->db->select('*')->where('id', $id)->get('buku')->row_array();
	}

	public function update($data, $id)
	{
	    return $this->db->where('id', $id)->update('buku', $data);
	}

	public function delete($id)
	{
	    return $this->db->where('id', $id)->delete('buku');
	}
    
}
