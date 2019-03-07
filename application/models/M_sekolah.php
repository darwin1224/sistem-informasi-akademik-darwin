<?php

class M_sekolah extends CI_Model
{
    protected $table = 'tbl_sekolah';

    protected $table_join = 'tbl_jenjang_sekolah';

    public function __construct()
    {
        parent::__construct();
    }
    public function get_all_sekolah()
    {
        $this->db->select('s.*,j.nama_jenjang');
        $this->db->from('' . $this->table . ' s');
        $this->db->join('' . $this->table_join . ' j', 's.id_jenjang=j.id_jenjang', 'inner');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function get_sekolah_by_id()
    {
        $this->db->select('s.*,j.nama_jenjang');
        $this->db->from('' . $this->table . ' s');
        $this->db->join('' . $this->table_join . ' j', 's.id_jenjang=j.id_jenjang', 'inner');
        $this->db->where(array('id_sekolah' => 1));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }
    public function ubah_sekolah($data_sekolah)
    {
        $this->db->where(array('id_sekolah' => $data_sekolah['id_sekolah']));
        $query = $this->db->update($this->table, $data_sekolah);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
}