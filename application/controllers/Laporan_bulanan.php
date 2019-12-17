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
		$jumlah = [
			'lengkap' => 0,
			'tidak_lengkap' => 0,
			'mutu' => 0.0,
			'mutu_tl' => 0.0
		];
		$mutu_total = 0.0;
		$mutu_num = 0;
		$mutuTl_total = 0.0;
		$mutuTl_num = 0;

		foreach ($items as $item) {
			$item->nomor = $nomor++;
			$item->tanggal = date('d-m-Y', $item->tanggal);
			$item->mutu = $item->jumlah > 0 ? ((float) $item->lengkap / $item->jumlah) * 100 : 0.0;
			$item->mutu_tl = $item->jumlah > 0 ? ((float) $item->tidak_lengkap / $item->jumlah) * 100 : 0.0;

			$jumlah['lengkap'] += $item->lengkap;
			$jumlah['tidak_lengkap'] += $item->tidak_lengkap;
			$mutu_total += $item->mutu;
			$mutu_num += 1;
			$mutuTl_total += $item->mutu_tl;
			$mutuTl_num += 1;
		}

		$jumlah['mutu'] = ($mutu_total) / $mutu_num;
		$jumlah['mutu_tl'] = ($mutuTl_total) / $mutuTl_num;

		$data = [
			'items' => $items,
			'jumlah' => $jumlah
		];

		$this->load->view('header');
		$this->load->view('laporan_bulanan', $data);
		$this->load->view('footer');
	}
}
