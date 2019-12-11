<?php

class RM_Model extends CI_Model
{
    // Nama tabel
    private $_table = 'rekam_medis';

    // Field tabel
    public $tanggal;
    public $dpjp;
    public $no_rm;
    public $poli;
    public $jenis_rm;

    public $identitas;
    public $anamnesa;
    public $pemeriksaan;
    public $diagnosa;
    public $terapi;
    public $paraf;
    public $indikator;
    public $kelengkapan;

    // Ambil semua data
    public function fetchAll()
    {
        $this->db->select('rm.*, dpjp.nama_dokter, poli.nama as nama_poli');
        $this->db->from($this->_table . ' rm');
        $this->db->join('dpjp', 'rm.dpjp = dpjp.id', 'left');
        $this->db->join('poli', 'rm.poli = poli.id', 'left');
        $this->db->where("FROM_UNIXTIME(rm.tanggal,'%Y-%m')", date('Y-m'));
        $this->db->order_by('rm.tanggal desc, rm.id desc');
        $this->db->limit(100);
        $result = $this->db->get()->result();
        return $result;
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ['id' => $id])->row();
    }

    public function rules()
    {
        return [
            ['field' => 'dpjp', 'label' => 'DPJP', 'rules' => 'required'],
            ['field' => 'no_rm', 'label' => 'No. RM', 'rules' => 'required'],
            ['field' => 'poli', 'label' => 'Poli', 'rules' => 'required'],
            ['field' => 'jenis_rm', 'label' => 'Jenis RM', 'rules' => 'required']
        ];
    }

    private function processFormData($post)
    {
        $this->tanggal = strtotime($post['tanggal']);
        $this->dpjp = $post['dpjp'];
        $this->no_rm = $post['no_rm'];
        $this->poli = $post['poli'];
        $this->jenis_rm = $post['jenis_rm'];

        $this->identitas = !empty($post['identitas']) ? 1 : 0;
        $this->anamnesa = !empty($post['anamnesa']) ? 1 : 0;
        $this->pemeriksaan = !empty($post['pemeriksaan']) ? 1 : 0;
        $this->diagnosa = !empty($post['diagnosa']) ? 1 : 0;
        $this->terapi = !empty($post['terapi']) ? 1 : 0;
        $this->paraf = !empty($post['paraf']) ? 1 : 0;

        // indicator counter
        $indikator = 0;

        if ($this->identitas)
            $indikator += 1;
        if ($this->anamnesa)
            $indikator += 1;
        if ($this->pemeriksaan)
            $indikator += 1;
        if ($this->diagnosa)
            $indikator += 1;
        if ($this->terapi)
            $indikator += 1;
        if ($this->paraf)
            $indikator += 1;

        // nilai kelengkapan
        $this->indikator = $indikator;
        $this->kelengkapan = ($this->indikator >= 6 ? 1 : 0);
    }

    // Masukkan data
    public function insert()
    {
        $post = $this->input->post();
        $this->processFormData($post);

        $this->db->insert($this->_table, $this);
        return $this->db->insert_id();
    }

    // Ubah data
    public function update()
    {
        $post = $this->input->post();
        $this->processFormData($post);

        $id = $post['update'];
        $this->db->update($this->_table, $this, ['id' => $id]);
        return $id;
    }
}
