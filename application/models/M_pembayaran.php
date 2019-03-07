<?php

class M_pembayaran extends CI_Model
{
    protected $table = 'tbl_pembayaran';

    protected $table_join = 'tbl_siswa';

    protected $table_join2 = 'tbl_jenis_pembayaran';

    public function __construct()
    {
        parent::__construct();
    }
    public function get_all_pembayaran()
    {
        $this->db->select('p.*,s.id_siswa,s.nama_siswa,jp.nama_jenis_pembayaran');
        $this->db->from($this->table . ' p');
        $this->db->join($this->table_join . ' s', 'p.id_siswa=s.id_siswa', 'inner');
        $this->db->join($this->table_join2 . ' jp', 'p.id_jenis_pembayaran=jp.id_jenis_pembayaran', 'inner');
        $this->db->order_by('p.id_pembayaran', 'asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function get_all_laporan_pembayaran()
    {
        $this->db->select('p.*,s.id_siswa,s.nama_siswa,jp.nama_jenis_pembayaran');
        $this->db->from($this->table . ' p');
        $this->db->join($this->table_join . ' s', 'p.id_siswa=s.id_siswa', 'inner');
        $this->db->join($this->table_join2 . ' jp', 'p.id_jenis_pembayaran=jp.id_jenis_pembayaran', 'inner');
        $this->db->order_by('p.id_pembayaran', 'asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function get_pembayaran_by_id($id)
    {
        $this->db->select('p.*,s.id_siswa,s.nama_siswa,jp.nama_jenis_pembayaran');
        $this->db->from($this->table . ' p');
        $this->db->join($this->table_join . ' s', 'p.id_siswa=s.id_siswa', 'inner');
        $this->db->join($this->table_join2 . ' jp', 'p.id_jenis_pembayaran=jp.id_jenis_pembayaran', 'inner');
        $this->db->where(array('id_pembayaran' => $id));
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function tambah_pembayaran($data_pembayaran)
    {
        $query = $this->db->insert($this->table, $data_pembayaran);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
    public function ubah_pembayaran($data_pembayaran)
    {
        $this->db->where(array('id_pembayaran' => $data_pembayaran['id_pembayaran']));
        $query = $this->db->update($this->table, $data_pembayaran);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
    public function hapus_pembayaran($id)
    {
        $this->db->where(array('id_pembayaran' => $id));
        $query = $this->db->delete($this->table);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
    public function filter_laporan_berdasarkan_tanggal($tanggalawal, $tanggalakhir)
    {
        $sql = "SELECT p.*,s.id_siswa,s.nama_siswa,jp.nama_jenis_pembayaran from tbl_pembayaran as p join tbl_siswa as s on p.id_siswa=s.id_siswa join tbl_jenis_pembayaran as jp on p.id_jenis_pembayaran=jp.id_jenis_pembayaran where p.tanggal_pembayaran BETWEEN
        '" . $tanggalawal . "' and '" . $tanggalakhir . "' order by p.id_pembayaran asc";
        $query = $this->db->query($sql);
        // $this->db->select('p.*,s.id_siswa,s.nama_siswa,jp.nama_jenis_pembayaran');
        // $this->db->from($this->table . ' p');
        // $this->db->join($this->table_join . ' s', 'p.id_siswa=s.id_siswa', 'inner');
        // $this->db->join($this->table_join2 . ' jp', 'p.id_jenis_pembayaran=jp.id_jenis_pembayaran', 'inner');
        // $this->db->where('p.tanggal_pembayaran BETWEEN ' . $tanggalawal . ' AND ' . $tanggalakhir . '');
        // $this->db->order_by('p.id_pembayaran', 'asc');
        // $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
}