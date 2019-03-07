<?php

class M_log_siswa extends CI_Model
{
    protected $table = 'tbl_log_siswa';

    protected $table_join = 'tbl_siswa';

    protected $table_join2 = 'tbl_golongan';

    public function __construct()
    {
        parent::__construct();
    }
    public function get_all_log_siswa_by_golongan($idgolongan)
    {
        $this->db->select('s.id_siswa,s.nama_siswa,go.nama_golongan');
        $this->db->from($this->table . ' ls');
        $this->db->join($this->table_join . ' s', 'ls.id_siswa=s.id_siswa', 'inner');
        $this->db->join($this->table_join2 . ' go', 'ls.id_golongan=go.id_golongan', 'inner');
        $this->db->where(array('go.id_golongan' => $idgolongan));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function get_all_log_siswa_by_golongan_walikelas($walikelas)
    {
        $this->db->select('s.id_siswa,s.nama_siswa,go.nama_golongan');
        $this->db->from($this->table . ' ls');
        $this->db->join($this->table_join . ' s', 'ls.id_siswa=s.id_siswa', 'inner');
        $this->db->join($this->table_join2 . ' go', 'ls.id_golongan=go.id_golongan', 'inner');
        $this->db->where(array('ls.id_golongan' => $walikelas['id_golongan']));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
}