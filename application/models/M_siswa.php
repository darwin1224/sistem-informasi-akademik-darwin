<?php

class M_siswa extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'tbl_siswa';
        $this->table_join = 'tbl_agama';
        $this->table_join2 = 'tbl_walikelas';
        $this->table_join3 = 'tbl_guru';
        $this->table_join4 = 'tbl_golongan';
        $this->primary_key = 'id_siswa';
        $this->order = array('id_siswa' => 'asc');
        $this->column_order = array(null, 'id_siswa', null, 'nama_siswa', 'jenis_kelamin_siswa', 'tanggal_lahir_siswa', 'nama_agama', 'nama_golongan', 'nama_guru', null);
        $this->column_search = array('id_siswa', 'nama_siswa', 'jenis_kelamin_siswa', 'tanggal_lahir_siswa', 'nama_agama', 'nama_golongan', 'nama_guru');
    }
    private function _get_datatables_query()
    {
        $this->db->select('s.*,a.nama_agama,g.nama_guru,go.nama_golongan');
        $this->db->from($this->table . ' s');
        $this->db->join($this->table_join . ' a', 's.id_agama=a.id_agama', 'inner');
        $this->db->join($this->table_join2 . ' w', 's.id_walikelas=w.id_walikelas', 'inner');
        $this->db->join($this->table_join3 . ' g', 'w.id_guru=g.id_guru', 'inner');
        $this->db->join($this->table_join4 . ' go', 's.id_golongan=go.id_golongan', 'inner');
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
    public function get_all_siswa()
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
    public function get_all_siswa_by_golongan_dan_walikelas()
    {
        $namaguru = $this->session->userdata('nama');
        $this->db->select('s.*,a.nama_agama');
        $this->db->from($this->table . ' s');
        $this->db->join($this->table_join . ' a', 's.id_agama=a.id_agama', 'inner');
        $this->db->join($this->table_join2 . ' w', 's.id_walikelas=w.id_walikelas', 'inner');
        $this->db->join($this->table_join3 . ' g', 'w.id_guru=g.id_guru', 'inner');
        $this->db->where('g.nama_guru', $namaguru);
        $this->db->order_by('id_siswa', 'asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function get_siswa_by_id($id)
    {
        $query = $this->db->get_where($this->table, array($this->primary_key => $id));
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function tambah_siswa($data_siswa)
    {
        $query = $this->db->insert($this->table, $data_siswa);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
    public function ubah_siswa($data_siswa)
    {
        $this->db->where(array($this->primary_key => $data_siswa['id_siswa']));
        $query = $this->db->update($this->table, $data_siswa);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
    public function hapus_siswa($id)
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