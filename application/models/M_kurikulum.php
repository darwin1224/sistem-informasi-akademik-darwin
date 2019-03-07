<?php

class M_kurikulum extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'tbl_kurikulum';
        $this->table2 = 'tbl_kurikulum_detail';
        $this->table_join = 'tbl_mapel';
        $this->table_join2 = 'tbl_jurusan';
        $this->table_join3 = 'tbl_ruangan';
        $this->primary_key = 'id_kurikulum';
        $this->primary_key2 = 'id_kurikulum_detail';
        $this->order = array('id_kurikulum' => 'asc');
        $this->order2 = array('id_kurikulum_detail' => 'asc');
        $this->column_order = array(null, 'nama_kurikulum', 'status_kurikulum', null);
        $this->column_search = array('nama_kurikulum', 'status_kurikulum');
        $this->column_order2 = array(null, 'm.id_mapel', 'nama_mapel', 'nama_jurusan', 'nama_ruangan', null);
        $this->column_search2 = array('m.id_mapel', 'nama_mapel', 'nama_jurusan', 'nama_ruangan');
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
    public function get_all_kurikulum()
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
    public function select_kurikulum()
    {
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function get_kurikulum_by_id($id)
    {
        $query = $this->db->get_where($this->table, array($this->primary_key => $id));
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function tambah_kurikulum($data_kurikulum)
    {
        $query = $this->db->insert($this->table, $data_kurikulum);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
    public function ubah_kurikulum($data_kurikulum)
    {
        $this->db->where(array($this->primary_key => $data_kurikulum['id_kurikulum']));
        $query = $this->db->update($this->table, $data_kurikulum);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
    public function hapus_kurikulum($id)
    {
        $this->db->where(array($this->primary_key => $id));
        $query = $this->db->delete($this->table);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
    public function get_kurikulum_aktif($column)
    {
        $query = $this->db->get_where($this->table, array('status_kurikulum' => 'Aktif'));
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return $row[$column];
        } else {
            return false;
        }
    }

    // Kurikulum Detail

    private function _get_datatables_query_detail($id)
    {
        $this->db->select('kd.*,m.id_mapel,m.nama_mapel,j.nama_jurusan,r.nama_ruangan');
        $this->db->from('' . $this->table2 . ' kd');
        $this->db->join('' . $this->table_join . ' m', 'kd.id_mapel=m.id_mapel', 'inner');
        $this->db->join('' . $this->table_join2 . ' j', 'kd.id_jurusan=j.id_jurusan', 'inner');
        $this->db->join('' . $this->table_join3 . ' r', 'kd.id_ruangan=r.id_ruangan', 'inner');
        $this->db->where('id_kurikulum', $id);
        $i = 0;
        foreach ($this->column_search2 as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search2) - 1 == $i)
                $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order2[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order2)) {
            $order = $this->order2;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    public function get_all_kurikulum_detail_by_id($id)
    {
        $this->_get_datatables_query_detail($id);
        if ($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_detail($id)
    {
        $this->_get_datatables_query_detail($id);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all_detail($id)
    {
        $this->db->where('id_kurikulum', $id);
        $this->db->from($this->table2);
        return $this->db->count_all_results();
    }
    public function get_kurikulum_detail_by_id($id)
    {
        $query = $this->db->get_where($this->table2, array($this->primary_key2 => $id));
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function tambah_kurikulum_detail($data_kurikulum_detail)
    {
        $query = $this->db->insert($this->table2, $data_kurikulum_detail);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
    public function ubah_kurikulum_detail($data_kurikulum_detail)
    {
        $this->db->where(array($this->primary_key2 => $data_kurikulum_detail[$this->primary_key2]));
        $query = $this->db->update($this->table2, $data_kurikulum_detail);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
    public function hapus_kurikulum_detail($id)
    {
        $this->db->where(array($this->primary_key2 => $id));
        $query = $this->db->delete($this->table2);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
    public function filter_kurikulum_detail($id, $jurusan, $ruangan)
    {
        $sql = "SELECT m.id_mapel,m.nama_mapel,j.id_jurusan,j.nama_jurusan,r.id_ruangan,r.nama_ruangan          from tbl_kurikulum_detail as kd join tbl_mapel as m on kd.id_mapel=m.id_mapel join              tbl_jurusan as j on kd.id_jurusan=j.id_jurusan join tbl_ruangan as r on                         kd.id_ruangan=r.id_ruangan where id_kurikulum = '" . $id . "' and kd.id_jurusan = '" . $jurusan . "' and kd.id_ruangan = '" . $ruangan . "' order by $this->primary_key2 asc";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function filter_kurikulum_detail_tanpa_jurusan_or_ruangan($id, $jurusan, $ruangan)
    {
        $sql = "SELECT m.id_mapel,m.nama_mapel,j.id_jurusan,j.nama_jurusan,r.id_ruangan,r.nama_ruangan          from tbl_kurikulum_detail as kd join tbl_mapel as m on kd.id_mapel=m.id_mapel join              tbl_jurusan as j on kd.id_jurusan=j.id_jurusan join tbl_ruangan as r on                         kd.id_ruangan=r.id_ruangan where (id_kurikulum = '" . $id . "' and kd.id_jurusan = '" . $jurusan . "') or (id_kurikulum = '" . $id . "' and kd.id_ruangan = '" . $ruangan . "') order by $this->primary_key2 asc";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
}