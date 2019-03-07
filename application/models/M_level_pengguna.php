<?php

class M_level_pengguna extends CI_Model
{
    protected $table = 'tbl_level_pengguna';

    public function __construct()
    {
        parent::__construct();
    }
    public function get_all_level_pengguna()
    {
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
}