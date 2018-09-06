<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {


  function __construct()
  {
      parent::__construct();
      $this->load->model(['Buku_model', 'Pengarang_model']);
  }
	
	public function index()
	{
	    $this->template->build('upload');
	}

	public function store()
	{
			// var_dump($_POST);
      $config['upload_path']          = './uploads/';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['max_size']             = 1024;
      $config['max_width']            = 1024;
      $config['max_height']           = 768;

      $this->load->library('upload', $config);

      if ( ! $this->upload->do_upload('gambar'))
      {
              $error = array('error' => $this->upload->display_errors());

      				var_dump($error);
      }
      else
      {
              $data = array('upload_data' => $this->upload->data());

              $this->template->build('upload', $data);
      }	    
	}

}
