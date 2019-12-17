<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelola_ppa extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('dpjp_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		if (!isset($this->session->userdata['logged_in'])) {
			redirect('login');
			return;
		}

		$items = $this->dpjp_model->fetchAll();
		$nomor = 1;

		foreach ($items as $item) {
			$item->nomor = $nomor++;
		}

		$data = [
			'items' => $items
		];

		$this->load->view('header');
		$this->load->view('kelola_ppa', $data);
		$this->load->view('footer');
	}

	public function insert()
	{
		$this->form_validation->set_rules($this->dpjp_model->rules());

		if ($this->form_validation->run()) {
			$this->dpjp_model->insert();
		}

		redirect('kelola_ppa');
	}

	public function remove($id)
	{
		$this->dpjp_model->remove($id);
		redirect('kelola_ppa');
	}
}
