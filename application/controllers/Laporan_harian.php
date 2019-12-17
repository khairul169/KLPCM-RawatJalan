<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_harian extends CI_Controller
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

		$items = $this->rm_model->fetchDaily();
		$nomor = 1;

		foreach ($items as $item) {
			$item->nomor = $nomor++;
			$item->tanggal = date('d-m-Y', $item->tanggal);
			$item->jenis_rm = ($item->jenis_rm == 1 ? 'Baru' : 'Lama');
			$item->identitas = ($item->identitas == 1 ? 'Ada' : '-');
			$item->anamnesa = ($item->anamnesa == 1 ? 'Ada' : '-');
			$item->pemeriksaan = ($item->pemeriksaan == 1 ? 'Ada' : '-');
			$item->diagnosa = ($item->diagnosa == 1 ? 'Ada' : '-');
			$item->terapi = ($item->terapi == 1 ? 'Ada' : '-');
			$item->paraf = ($item->paraf == 1 ? 'Ada' : '-');
			$item->kelengkapan = ($item->kelengkapan > 0);
		}

		$data = [
			'items' => $items
		];

		$this->load->view('header');
		$this->load->view('laporan_harian', $data);
		$this->load->view('footer');
	}
}
