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

    // Ambil semua data
    public function fetchAll()
    {
        return $this->db->get($this->_table)->result();
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

    // Masukkan data
    public function insert()
    {
        $post = $this->input->post();

        $this->tanggal = time();
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

        $this->db->insert($this->_table, $this);
        return $this->db->insert_id();
    }

    // Ubah data
    public function update()
    {
        $post = $this->input->post();
        $id = $post['update'];

        $this->tanggal = time();
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

        $this->db->update($this->_table, $this, ['id' => $id]);
        return $id;
    }
}
