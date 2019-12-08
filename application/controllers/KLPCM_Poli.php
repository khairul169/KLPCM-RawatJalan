<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KLPCM_Poli extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('rm_model');
		$this->load->library('form_validation');
	}

	public function index($id = 0)
	{
		if ($this->input->post('insert')) {
			$this->form_validation->set_rules($this->rm_model->rules());

			if ($this->form_validation->run()) {
				$resultId = $this->rm_model->insert();
				redirect('klpcm_poli/index/' . $resultId);
				return;
			}
		}

		if ($this->input->post('update')) {
			$this->form_validation->set_rules($this->rm_model->rules());

			if ($this->form_validation->run()) {
				$resultId = $this->rm_model->update();
				redirect('klpcm_poli/index/' . $resultId);
				return;
			}
		}

		$data = [
			'id' => $id,
			'list_dokter' => [
				1 => 'dr. Andi',
				2 => 'dr. Lili',
				3 => 'dr. Sophie',
				4 => 'dr. Budi'
			],
			'list_poli' => [
				1 => 'BP',
				2 => 'KIA',
				3 => 'Gigi'
			],

			'tanggal' => date('d-m-Y'),
			'dpjp' => '',
			'no_rm' => '',
			'poli' => '',
			'jenis_rm' => 1,

			'identitas' => 0,
			'anamnesa' => 0,
			'pemeriksaan' => 0,
			'diagnosa' => 0,
			'terapi' => 0,
			'paraf' => 0
		];

		if ($id) {
			// fetch data
			$rmData = $this->rm_model->getById($id);

			if ($rmData) {
				$data['tanggal'] = date('d-m-Y', $rmData->tanggal);
				$data['dpjp'] = $rmData->dpjp;
				$data['no_rm'] = $rmData->no_rm;
				$data['poli'] = $rmData->poli;
				$data['jenis_rm'] = $rmData->jenis_rm;

				$data['identitas'] = $rmData->identitas;
				$data['anamnesa'] = $rmData->anamnesa;
				$data['pemeriksaan'] = $rmData->pemeriksaan;
				$data['diagnosa'] = $rmData->diagnosa;
				$data['terapi'] = $rmData->terapi;
				$data['paraf'] = $rmData->paraf;
			}
		}

		$this->load->view('header');
		$this->load->view('klpcm_poli', $data);
		$this->load->view('footer');
	}
}
