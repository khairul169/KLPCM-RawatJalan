<?php

class Dpjp_model extends CI_Model
{
    // Nama tabel
    private $_table = 'dpjp';

    // Field tabel
    public $nama_dokter;

    // Ambil semua data
    public function fetchAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function fetchUncompletedDRM()
    {
        $this->db->select('dpjp.*, rm.kelengkapan, COUNT(rm.id) as drm');
        $this->db->from($this->_table . ' dpjp');
        $this->db->join('rekam_medis rm', 'rm.dpjp = dpjp.id', 'left');
        $this->db->group_by('dpjp.id');
        $this->db->where('rm.kelengkapan = 0');
        $this->db->having('drm > 0');
        return $this->db->get()->result();
    }

    public function rules()
    {
        return [
            ['field' => 'nama_dokter', 'label' => 'Nama Dokter', 'rules' => 'required']
        ];
    }

    public function insert()
    {
        $post = $this->input->post();
        $this->nama_dokter = $post['nama_dokter'];
        $this->db->insert($this->_table, $this);
        return $this->db->insert_id();
    }

    public function remove($id)
    {
        $this->db->delete($this->_table, 'id=' . $id);
    }
}
