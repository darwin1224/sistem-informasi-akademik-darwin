<?php

class M_walikelas extends CI_Model
{
    protected $table = 'tbl_walikelas';

    protected $table_join = 'tbl_golongan';

    protected $table_join2 = 'tbl_jurusan';

    protected $table_join3 = 'tbl_ruangan';

    protected $table_join4 = 'tbl_guru';

    public function __construct()
    {
        parent::__construct();
    }
    public function get_all_walikelas()
    {
        $this->db->select('wk.*,go.nama_golongan,j.nama_jurusan,r.nama_ruangan,g.nama_guru');
        $this->db->from('' . $this->table . ' wk');
        $this->db->join('' . $this->table_join . ' go', 'wk.id_golongan=go.id_golongan');
        $this->db->join('' . $this->table_join2 . ' j', 'go.id_jurusan=j.id_jurusan');
        $this->db->join('' . $this->table_join3 . ' r', 'go.id_ruangan=r.id_ruangan');
        $this->db->join('' . $this->table_join4 . ' g', 'wk.id_guru=g.id_guru');
        $this->db->order_by('id_walikelas', 'asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function get_nama_walikelas()
    {
        $this->db->select('wk.id_walikelas,g.nama_guru');
        $this->db->from('' . $this->table . ' wk');
        $this->db->join('' . $this->table_join4 . ' g', 'wk.id_guru=g.id_guru');
        $this->db->order_by('id_walikelas', 'asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function get_walikelas_by_id($id)
    {
        $this->db->select('wk.*,go.nama_golongan,j.nama_jurusan,r.nama_ruangan,g.nama_guru');
        $this->db->from('' . $this->table . ' wk');
        $this->db->join('' . $this->table_join . ' go', 'wk.id_golongan=go.id_golongan');
        $this->db->join('' . $this->table_join2 . ' j', 'go.id_jurusan=j.id_jurusan');
        $this->db->join('' . $this->table_join3 . ' r', 'go.id_ruangan=r.id_ruangan');
        $this->db->join('' . $this->table_join4 . ' g', 'wk.id_guru=g.id_guru');
        $this->db->where(array('id_walikelas' => $id));
        $this->db->order_by('id_walikelas', 'asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function get_walikelas_by_id_guru($guru)
    {
        $query = $this->db->get_where($this->table, array('id_guru' => $guru));
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }
    public function tambah_walikelas($data_walikelas)
    {
        $query = $this->db->insert($this->table, $data_walikelas);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
    public function ubah_walikelas($data_walikelas)
    {
        $this->db->where(array('id_walikelas' => $data_walikelas['id_walikelas']));
        $query = $this->db->update($this->table, $data_walikelas);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
    public function hapus_walikelas($id)
    {
        $this->db->where(array('id_walikelas' => $id));
        $query = $this->db->delete($this->table);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
    public function check_login($username, $password)
    {
        $this->db->select('g.*');
        $this->db->from('' . $this->table . ' w');
        $this->db->join('' . $this->table_join4 . ' g', 'w.id_guru=g.id_guru', 'inner');
        $this->db->where(array('username' => $username, 'password' => $password));
        $user = $this->db->get();
        return $user;
    }
}