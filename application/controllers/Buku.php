<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {


  function __construct()
  {
      parent::__construct();
      $this->load->model(['Buku_model', 'Pengarang_model']);
  }

	public function index()
	{
			$query = "
				SELECT buku.id, buku.nama, pengarang.nama as nama_pengarang
				FROM buku
				INNER JOIN pengarang ON buku.pengarang_id = pengarang.id;
			";
			$data['bukus'] = $this->db->query($query)->result();
			// var_dump($data['raw']);
			$this->template->build('buku/index', $data);
	}

	public function create()
	{
			$data['pengarangs'] = $this->Pengarang_model->all();
			$this->template->build('buku/create', $data);
	}

	public function store()
	{
	    $data['nama'] = $this->input->post('nama');
	    $data['pengarang_id'] = $this->input->post('pengarang_id');

	    $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
	    $this->form_validation->set_rules('pengarang_id', 'Pengarang', 'trim|required');

	    if ($this->form_validation->run() == FALSE) {
				$data['pengarangs'] = $this->Pengarang_model->all();
	    	$this->template->build('buku/create', $data);
	    } else {
	    	$this->Buku_model->create($data);
	    	return redirect('buku');
	    }
	}

	public function edit($id)
	{
			$data['buku'] = $this->Buku_model->find($id);
			$data['pengarangs'] = $this->Pengarang_model->all();
			$this->template->build('buku/edit', $data);
	}

	public function update($id)
	{
	    $data['nama'] = $this->input->post('nama');
	    $data['pengarang_id'] = $this->input->post('pengarang_id');

	    $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
	    $this->form_validation->set_rules('pengarang_id', 'Pengarang', 'trim|required');

	    if ($this->form_validation->run() == FALSE) {
				$data['buku'] = $this->Buku_model->find($id);
				$data['pengarangs'] = $this->Pengarang_model->all();
	    	$this->template->build('buku/edit', $data);
	    } else {
	    	$this->Buku_model->update($data, $id);
	    	return redirect('buku');
	    }
	}

	public function delete($id)
	{
	    $this->Buku_model->delete($id);
	    return redirect('buku');
	}

}
