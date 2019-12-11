<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function index()
	{
		if (!isset($this->session->userdata['logged_in'])) {
			redirect('login');
			return;
		}

		$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
	}
}
