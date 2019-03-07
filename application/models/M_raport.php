<?php

class M_raport extends CI_Model
{
    protected $table = 'tbl_nilai';

    protected $table_join = 'tbl_siswa';

    protected $table_join2 = 'tbl_walikelas';

    protected $table_join3 = 'tbl_guru';

    protected $table_join4 = 'tbl_golongan';

    public function __construct()
    {
        parent::__construct();
    }
    public function get_all_raport()
    {
        $namaguru = $this->session->userdata('nama');
        $this->db->select('n.*,s.nama_siswa,go.nama_golongan');
        $this->db->from('' . $this->table . ' n');
        $this->db->join('' . $this->table_join . '  s', 'n.id_siswa=s.id_siswa', 'inner');
        $this->db->join('' . $this->table_join2 . '  w', 's.id_walikelas=w.id_walikelas', 'inner');
        $this->db->join('' . $this->table_join3 . '  g', 'w.id_guru=g.id_guru', 'inner');
        $this->db->join('' . $this->table_join4 . '  go', 'w.id_golongan=go.id_golongan', 'inner');
        $this->db->where(array('g.nama_guru' => $namaguru));
        $this->db->order_by('id_nilai', 'asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function get_raport_by_id($id)
    {
        $this->db->select('n.*,s.nama_siswa,go.*');
        $this->db->from('' . $this->table . ' n');
        $this->db->join('' . $this->table_join . '  s', 'n.id_siswa=s.id_siswa', 'inner');
        $this->db->join('' . $this->table_join2 . '  w', 's.id_walikelas=w.id_walikelas', 'inner');
        $this->db->join('' . $this->table_join3 . '  g', 'w.id_guru=g.id_guru', 'inner');
        $this->db->join('' . $this->table_join4 . '  go', 'w.id_golongan=go.id_golongan', 'inner');
        $this->db->where(array('s.id_siswa' => $id));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }
}