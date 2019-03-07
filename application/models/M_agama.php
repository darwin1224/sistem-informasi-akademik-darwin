<?php

class M_agama extends CI_Model
{
    protected $table = 'tbl_agama';

    public function __construct()
    {
        parent::__construct();
    }
    public function get_all_agama()
    {
        $this->db->order_by('id_agama', 'asc');
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function get_agama_by_id($id)
    {
        $query = $this->db->get_where($this->table, array('id_agama' => $id));
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function tambah_agama($data_agama)
    {
        $query = $this->db->insert($this->table, $data_agama);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
    public function ubah_agama($data_agama)
    {
        $this->db->where(array('id_agama' => $data_agama['id_agama']));
        $query = $this->db->update($this->table, $data_agama);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
    public function hapus_agama($id)
    {
        $this->db->where(array('id_agama' => $id));
        $query = $this->db->delete($this->table);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
}