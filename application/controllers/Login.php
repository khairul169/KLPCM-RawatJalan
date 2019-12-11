<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function index()
	{
		if (isset($this->session->userdata['logged_in'])) {
			redirect('home');
			return;
		}

		$formSubmit = $this->input->post('login');
		$message = '';
		$username = 'puskesmas';

		if ($formSubmit) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$message = $this->tryLogin($username, $password);

			if (!$message) {
				$this->session->set_userdata('logged_in', md5(time()));
				redirect('home');
			}
		}


		$data = [
			'username' => $username,
			'password' => 'arjuna',
			'message' => $message
		];

		$this->load->view('login', $data);
	}

	private function tryLogin(string $username, string $password)
	{
		if ($username != 'puskesmas' || $password != 'arjuna') {
			return 'Username atau Password salah!';
		}

		return false;
	}
}
