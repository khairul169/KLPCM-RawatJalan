<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Klpcm_poli extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('rm_model');
		$this->load->model('dpjp_model');
		$this->load->model('poli_model');
		$this->load->library('form_validation');
	}

	public function index($id = 0)
	{
		if (!isset($this->session->userdata['logged_in'])) {
			redirect('login');
			return;
		}

		$message = null;

		if ($this->input->post('insert')) {
			$this->form_validation->set_rules($this->rm_model->rules());

			if ($this->form_validation->run()) {
				$this->rm_model->insert();
				$message = 'Berhasil memasukkan data!';
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

		$dpjp_list = $this->dpjp_model->fetchAll();
		$poli_list = $this->poli_model->fetchAll();

		$data = [
			'id' => $id,
			'list_dokter' => $dpjp_list,
			'list_poli' => $poli_list,

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
			'paraf' => 0,

			'message' => $message
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
