<?php

class M_jenjang extends CI_Model
{
    protected $table = 'tbl_jenjang_sekolah';

    public function __construct()
    {
        parent::__construct();
    }
    public function get_all_jenjang()
    {
        $this->db->order_by('id_jenjang', 'asc');
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function get_jenjang_by_id($id)
    {
        $query = $this->db->get_where($this->table, array('id_jenjang' => $id));
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function tambah_jenjang($data_jenjang)
    {
        $query = $this->db->insert($this->table, $data_jenjang);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
    public function ubah_jenjang($data_jenjang)
    {
        $this->db->where(array('id_jenjang' => $data_jenjang['id_jenjang']));
        $query = $this->db->update($this->table, $data_jenjang);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
    public function hapus_jenjang($id)
    {
        $this->db->where(array('id_jenjang' => $id));
        $query = $this->db->delete($this->table);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
}