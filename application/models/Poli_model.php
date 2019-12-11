<?php

class Poli_model extends CI_Model
{
    // Nama tabel
    private $_table = 'poli';

    // Ambil semua data
    public function fetchAll()
    {
        return $this->db->get($this->_table)->result();
    }
}
