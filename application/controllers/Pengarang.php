<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengarang extends CI_Controller {


  function __construct()
  {
      parent::__construct();
      $this->load->model('Pengarang_model');
  }

	public function index()
	{
			// $query = "SELECT * FROM pengarang";
			// $data['data'] = $this->db->query($query)->result();
			$data['pengarangs'] = $this->Pengarang_model->all(); 
			$this->template->build('pengarang/index', $data);
	}

	public function create()
	{
			$this->template->build('pengarang/create');
	}

	public function store()
	{
	    $data['nama'] = $this->input->post('nama');

	    $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
	    if ($this->form_validation->run() == FALSE) {
	    	$this->template->build('pengarang/create');
	    } else {
	    	$this->Pengarang_model->create($data);
	    	return redirect('pengarang');
	    }
	}

	public function edit($id)
	{
			// echo $id;
			$data['pengarang'] = $this->Pengarang_model->find($id);
			// var_dump($data);
			$this->template->build('pengarang/edit', $data);
	}

	public function update($id)
	{
			$data['nama'] = $this->input->post('nama');

	    $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
	    if ($this->form_validation->run() == FALSE) {
				$data['pengarang'] = $this->Pengarang_model->find($id);
	    	$this->template->build('pengarang/edit', $data);
	    } else {
		    $this->Pengarang_model->update($data, $id);
		    return redirect('pengarang');
	    }				
	}

	public function delete($id)
	{
	    $this->Pengarang_model->delete($id);
	    return redirect('pengarang');
	}

}
