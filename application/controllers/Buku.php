<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

	public function index()
	{
		// $this->load->view('welcome_message');
		$this->template->build('buku/list');
	}
}
