<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_dpjp extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('dpjp_model');
	}

	public function index()
	{
		$kelengkapanDRM = $this->dpjp_model->fetchUncompletedDRM();
		$nomor = 1;
		foreach ($kelengkapanDRM as $k) {
			$k->nomor = $nomor++;
		}

		$data = [
			'kelengkapan_drm' => $kelengkapanDRM
		];

		$this->load->view('header');
		$this->load->view('laporan_dpjp', $data);
		$this->load->view('footer');
	}
}
