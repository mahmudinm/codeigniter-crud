<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengarang_model extends CI_Model {
    
	public function all()
	{
	    return $this->db->get('pengarang')->result();
	}	

	public function create($data)
	{
	    return $this->db->insert('pengarang', $data);
	}
	
	public function find($id)
	{
	    return $this->db->select('*')->where('id', $id)->get('pengarang')->row_array();
	}

	public function update($data, $id)
	{
	    return $this->db->where('id', $id)->update('pengarang', $data);
	}

	public function delete($id)
	{
	    return $this->db->where('id', $id)->delete('pengarang');
	}

}
