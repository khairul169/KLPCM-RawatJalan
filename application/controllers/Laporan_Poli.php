<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_Poli extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('rm_model');
	}

	public function index()
	{
		$items = $this->rm_model->fetchAll();

		foreach ($items as $item) {
			$indikator = 0;

			if ($item->identitas) $indikator += 1;
			if ($item->anamnesa) $indikator += 1;
			if ($item->pemeriksaan) $indikator += 1;
			if ($item->diagnosa) $indikator += 1;
			if ($item->terapi) $indikator += 1;
			if ($item->paraf) $indikator += 1;

			$item->indikator = $indikator;
			$item->kelengkapan = ($indikator >= 6);

			$item->tanggal = date('d-m-Y', $item->tanggal);
			$item->dpjp = $this->getDPJPById($item->dpjp);
			$item->poli = $this->getPoliById($item->poli);
			$item->jenis_rm = ($item->jenis_rm == 1 ? 'Baru' : 'Lama');

			$item->identitas = ($item->identitas == 1 ? 'Ada' : '-');
			$item->anamnesa = ($item->anamnesa == 1 ? 'Ada' : '-');
			$item->pemeriksaan = ($item->pemeriksaan == 1 ? 'Ada' : '-');
			$item->diagnosa = ($item->diagnosa == 1 ? 'Ada' : '-');
			$item->terapi = ($item->terapi == 1 ? 'Ada' : '-');
			$item->paraf = ($item->paraf == 1 ? 'Ada' : '-');
		}

		$data = [
			'items' => $items
		];

		$this->load->view('header');
		$this->load->view('laporan_poli', $data);
		$this->load->view('footer');
	}

	private function getDPJPById($id)
	{
		$lists = [
			1 => 'dr. Andi',
			2 => 'dr. Lili',
			3 => 'dr. Sophie',
			4 => 'dr. Budi'
		];

		return isset($lists[$id]) ? $lists[$id] : null;
	}

	private function getPoliById($id)
	{
		$lists = [
			1 => 'BP',
			2 => 'KIA',
			3 => 'Gigi'
		];

		return isset($lists[$id]) ? $lists[$id] : null;
	}
}
