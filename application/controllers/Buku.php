<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {


  function __construct()
  {
      parent::__construct();
      $this->load->model('Buku_model');
  }

	public function index()
	{
			$data['bukus'] = Buku_model::all();
			// print_r($data);
			$this->template->build('buku/list', $data);
	}
}
