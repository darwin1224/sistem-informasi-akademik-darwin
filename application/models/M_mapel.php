<?php

class M_mapel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'tbl_mapel';
        $this->primary_key = 'id_mapel';
        $this->order = array('id_mapel' => 'asc');
        $this->column_order = array(null, 'nama_mapel', 'kkm_mapel', null);
        $this->column_search = array('nama_mapel', 'kkm_mapel');
    }
    private function _get_datatables_query()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $i = 0;
        foreach ($this->column_search as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i)
                $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    public function get_all_mapel()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    public function select_mapel()
    {
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function get_mapel_by_id($id)
    {
        $query = $this->db->get_where($this->table, array($this->primary_key => $id));
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function tambah_mapel($data_mapel)
    {
        $query = $this->db->insert($this->table, $data_mapel);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
    public function ubah_mapel($data_mapel)
    {
        $this->db->where(array($this->primary_key => $data_mapel['id_mapel']));
        $query = $this->db->update($this->table, $data_mapel);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
    public function hapus_mapel($id)
    {
        $this->db->where(array($this->primary_key => $id));
        $query = $this->db->delete($this->table);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
    public function get_kkm_nilai_by_nama_mapel($namamapel)
    {
        $this->db->select('kkm_mapel');
        $this->db->from($this->table);
        $this->db->where(array('nama_mapel' => $namamapel));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return $row['kkm_mapel'];
        } else {
            return false;
        }
    }
}