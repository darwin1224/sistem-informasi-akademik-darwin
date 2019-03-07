<?php

class M_guru extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'tbl_guru';
        $this->table_join = 'tbl_agama';
        $this->primary_key = 'id_guru';
        $this->order = array('id_guru' => 'asc');
        $this->column_order = array(null, 'id_guru', null, 'nama_guru', 'jenis_kelamin_guru',  'nama_agama', 'username', null);
        $this->column_search = array('id_guru', 'nama_guru', 'jenis_kelamin_guru', 'nama_agama', 'username');
    }
    private function _get_datatables_query()
    {
        $this->db->select('g.*,a.nama_agama');
        $this->db->from($this->table . ' g');
        $this->db->join($this->table_join . ' a', 'g.id_agama=a.id_agama', 'inner');
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
    public function get_all_guru()
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
    public function get_guru_by_id($id)
    {
        $query = $this->db->get_where($this->table, array($this->primary_key => $id));
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function tambah_guru($data_guru)
    {
        $query = $this->db->insert($this->table, $data_guru);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
    public function ubah_guru($data_guru)
    {
        $this->db->where(array($this->primary_key => $data_guru['id_guru']));
        $query = $this->db->update($this->table, $data_guru);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
    public function hapus_guru($id)
    {
        $this->db->where(array($this->primary_key => $id));
        $query = $this->db->delete($this->table);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
    public function select_guru()
    {
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function check_login($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $user = $this->db->get($this->table);
        return $user;
    }
}