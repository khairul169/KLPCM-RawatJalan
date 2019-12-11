<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends CI_Controller
{
	public function index()
	{
		if (isset($this->session->userdata['logged_in'])) {
			$this->session->unset_userdata('logged_in');
		}

		redirect('login');
	}
}
