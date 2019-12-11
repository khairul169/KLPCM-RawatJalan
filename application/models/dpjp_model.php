<?php

class DPJP_Model extends CI_Model
{
    // Nama tabel
    private $_table = 'dpjp';

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
}
