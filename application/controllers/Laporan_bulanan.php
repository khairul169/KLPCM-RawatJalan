<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_bulanan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('rm_model');
	}

	public function index()
	{
		if (!isset($this->session->userdata['logged_in'])) {
			redirect('login');
			return;
		}

		$items = $this->rm_model->fetchMonthly();
		$nomor = 1;

		foreach ($items as $item) {
			$item->nomor = $nomor++;
			$item->tanggal = date('d-m-Y', $item->tanggal);
			$item->mutu = $item->jumlah > 0 ? ((float) $item->lengkap / $item->jumlah) * 100 : 0.0;
			$item->mutu_tl = $item->jumlah > 0 ? ((float) $item->tidak_lengkap / $item->jumlah) * 100 : 0.0;
		}

		$data = [
			'items' => $items
		];

		$this->load->view('header');
		$this->load->view('laporan_bulanan', $data);
		$this->load->view('footer');
	}
}
