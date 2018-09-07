<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('User_model');
	    // if ( $this->session->userdata('username') ) {
	    // 	return redirect('buku');
	    // }
	}

	public function index()
	{
	    if ( $this->session->userdata('username') ) {
	    	return redirect('buku');
	    }		

			if (count($_POST)) {
		    $username = $this->input->post('username');
		    $password = $this->input->post('password');

		    $check_login = $this->User_model->check_login($username, $password);

		    if (!$check_login) {
		    	return redirect('auth');	
		    } else {
		    	$this->session->set_userdata($check_login);
		    	return redirect('buku');
		    }

			} else {
		    $this->template->build('auth/login');
			}
	}

	public function register()
	{
	    if ( $this->session->userdata('username') ) {
	    	return redirect('buku');
	    }		

			if (count($_POST)) {
		    $data['username'] = $this->input->post('username');
		    $data['email'] = $this->input->post('email');
		    $data['password'] = md5($this->input->post('password'));
				
				// Set validation
				$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]');
				$this->form_validation->set_rules('password', 'Username', 'trim|required');
				$this->form_validation->set_rules('email', 'Username', 'trim|required|valid_email|is_unique[users.email]');

				if ( $this->form_validation->run() == FALSE ) {
		    	$this->template->build('auth/register');
				} else {
			    $this->User_model->register($data);
			    return redirect('auth');
				}

			} else {
		    $this->template->build('auth/register');
			}
	}

	public function logout()
	{
			$this->session->sess_destroy();
			redirect('auth');
	}

}
