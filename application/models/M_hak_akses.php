<?php

class M_hak_akses extends CI_Model
{
    protected $table = 'tbl_hak_akses_pengguna';

    public function __construct()
    {
        parent::__construct();
    }
    public function get_hak_akses_pengguna($data)
    {
        $query = $this->db->get_where($this->table, $data);
        return $query;
    }
    public function tambah_hak_akses_pengguna($data)
    {
        $this->db->insert($this->table, $data);
        return true;
    }
    public function hapus_hak_akses_pengguna($data)
    {
        $this->db->where($data);
        $this->db->delete($this->table);
    }
}