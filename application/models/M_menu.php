<?php

class M_menu extends CI_Model
{
    protected $table = 'tbl_menu';

    public function __construct()
    {
        parent::__construct();
    }
    public function get_all_menu()
    {
        $this->db->order_by('id_menu', 'asc');
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function get_menu_by_id($id)
    {
        $query = $this->db->get_where($this->table, array('id_menu' => $id));
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function tambah_menu($data_menu)
    {
        $query = $this->db->insert($this->table, $data_menu);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
    public function ubah_menu($data_menu)
    {
        $this->db->where(array('id_menu' => $data_menu['id_menu']));
        $query = $this->db->update($this->table, $data_menu);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
    public function hapus_menu($id)
    {
        $this->db->where(array('id_menu' => $id));
        $query = $this->db->delete($this->table);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
}