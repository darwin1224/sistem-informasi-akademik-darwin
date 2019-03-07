<?php

class M_golongan extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'tbl_golongan';
        $this->table_join = 'tbl_ruangan';
        $this->table_join2 = 'tbl_jurusan';
        $this->primary_key = 'id_golongan';
        $this->order = array('id_golongan' => 'asc');
        $this->column_order = array(null, 'nama_golongan', 'nama_ruangan', 'nama_jurusan ', null);
        $this->column_search = array('nama_golongan', 'nama_ruangan', 'nama_jurusan ');
    }
    private function _get_datatables_query()
    {
        $this->db->select('go.*,r.nama_ruangan,j.nama_jurusan');
        $this->db->from($this->table . ' go');
        $this->db->join($this->table_join . ' r', 'go.id_ruangan=r.id_ruangan', 'inner');
        $this->db->join($this->table_join2 . ' j', 'go.id_jurusan=j.id_jurusan', 'inner');
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
    public function get_all_golongan()
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
    public function select_golongan()
    {
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function get_golongan_by_id($id)
    {
        $query = $this->db->get_where($this->table, array($this->primary_key => $id));
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function tambah_golongan($data_golongan)
    {
        $query = $this->db->insert($this->table, $data_golongan);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
    public function ubah_golongan($data_golongan)
    {
        $this->db->where(array($this->primary_key => $data_golongan['id_golongan']));
        $query = $this->db->update($this->table, $data_golongan);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
    public function hapus_golongan($id)
    {
        $this->db->where(array($this->primary_key => $id));
        $query = $this->db->delete($this->table);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
}