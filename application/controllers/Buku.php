<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {


  function __construct()
  {
      parent::__construct();
      $this->load->model(['Buku_model', 'Pengarang_model']);
      if ( !$this->session->userdata('username') ) {
      	return redirect('auth');
      }
  }

	public function index()
	{
			$query = "
				SELECT buku.id, buku.nama, buku.gambar, pengarang.nama as nama_pengarang
				FROM buku
				INNER JOIN pengarang ON buku.pengarang_id = pengarang.id;
			";
			$data['bukus'] = $this->db->query($query)->result();
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
		    $data['gambar'] = $this->upload_image('gambar');
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
		    $data['gambar'] = $this->upload_image('gambar');
		    // var_dump($data);
	    	$this->Buku_model->update($data, $id);
	    	return redirect('buku');
	    }
	}

	public function delete($id)
	{
			$query = $this->db->where('id', $id)->get('buku');
			$row = $query->row();
			// echo $row->gambar;
			unlink("./uploads/$row->gambar");
	    $this->Buku_model->delete($id);
	    return redirect('buku');
	}

	private function upload_image($gambar)
	{
      // get foto
      $config['upload_path'] = './uploads';
      $config['allowed_types'] = 'jpg|png|jpeg|gif';
      $config['max_size'] = '2048';  //2MB max
      // $config['max_width'] = '4480'; // pixel
      // $config['max_height'] = '4480'; // pixel
			
			$this->load->library('upload', $config);

			if ( $this->upload->do_upload($gambar) ) {
				$foto = $this->upload->data();
				return $foto['file_name'];
			}
	}

}
