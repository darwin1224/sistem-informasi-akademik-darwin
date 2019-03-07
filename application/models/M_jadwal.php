<?php

class M_jadwal extends CI_Model
{
    protected $table = 'tbl_jadwal';

    protected $table_join = 'tbl_mapel';

    protected $table_join2 = 'tbl_jurusan';

    protected $table_join3 = 'tbl_ruangan';

    protected $table_join4 = 'tbl_guru';

    protected $table_join5 = 'tbl_golongan';

    public function __construct()
    {
        parent::__construct();
    }
    public function get_all_jadwal()
    {
        $this->db->select('jw.*,m.nama_mapel,j.*,r.*,g.nama_guru,go.*');
        $this->db->from('' . $this->table . ' jw');
        $this->db->join('' . $this->table_join . '  m', 'jw.id_mapel=m.id_mapel', 'inner');
        $this->db->join('' . $this->table_join2 . '  j', 'jw.id_jurusan=j.id_jurusan', 'inner');
        $this->db->join('' . $this->table_join3 . '  r', 'jw.id_ruangan=r.id_ruangan', 'inner');
        $this->db->join('' . $this->table_join4 . '  g', 'jw.id_guru=g.id_guru', 'inner');
        $this->db->join('' . $this->table_join5 . '  go', 'jw.id_golongan=go.id_golongan', 'inner');
        $this->db->order_by('id_jadwal', 'asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function get_all_jadwal_guru()
    {
        $namaguru = $this->session->userdata('nama');
        $this->db->select('jw.*,m.nama_mapel,j.*,r.*,g.nama_guru,go.*');
        $this->db->from('' . $this->table . ' jw');
        $this->db->join('' . $this->table_join . '  m', 'jw.id_mapel=m.id_mapel', 'inner');
        $this->db->join('' . $this->table_join2 . '  j', 'jw.id_jurusan=j.id_jurusan', 'inner');
        $this->db->join('' . $this->table_join3 . '  r', 'jw.id_ruangan=r.id_ruangan', 'inner');
        $this->db->join('' . $this->table_join4 . '  g', 'jw.id_guru=g.id_guru', 'inner');
        $this->db->join('' . $this->table_join5 . '  go', 'jw.id_golongan=go.id_golongan', 'inner');
        $this->db->where('g.nama_guru', $namaguru);
        $this->db->order_by('id_jadwal', 'asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function get_jadwal_by_id($id)
    {
        $query = $this->db->get_where($this->table, array('id_jadwal' => $id));
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function get_mapel_by_golongan($idgolongan)
    {
        $this->db->distinct();
        $this->db->select('jw.id_jadwal,m.nama_mapel');
        $this->db->from('' . $this->table . ' jw');
        $this->db->join('' . $this->table_join . ' m', 'jw.id_mapel=m.id_mapel', 'inner');
        $this->db->where(array('id_golongan' => $idgolongan));
        $this->db->group_by('m.nama_mapel');
        $this->db->order_by('m.nama_mapel', 'asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    public function tambah_jadwal($data_jadwal)
    {
        $query = $this->db->insert($this->table, $data_jadwal);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
    public function ubah_jadwal($data_jadwal)
    {
        $this->db->where(array('id_jadwal' => $data_jadwal['id_jadwal']));
        $query = $this->db->update($this->table, $data_jadwal);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
    public function hapus_jadwal($id)
    {
        $this->db->where(array('id_jadwal' => $id));
        $query = $this->db->delete($this->table);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
    public function data_jam_pelajaran()
    {
        $jam_pelajaran = array(
            '07.30 - 08.15' => '07.30 - 08.15',
            '08.15 - 09.00' => '08.15 - 09.00',
            '09.15 - 10.00' => '09.15 - 10.00',
            '10.00 - 10.45' => '10.00 - 10.45',
            '10.45 - 11.30' => '10.45 - 11.30',
            '11.30 - 12.15' => '11.30 - 12.15',
            '12.15 - 13.00' => '12.15 - 13.00'
        );
        return $jam_pelajaran;
    }
    public function data_hari_pelajaran()
    {
        $hari_pelajaran = array(
            'SENIN' => 'SENIN',
            'SELASA' => 'SELASA',
            'RABU' => 'RABU',
            'KAMIS' => 'KAMIS',
            'JUMAT' => 'JUMAT',
            'SABTU' => 'SABTU'
        );
        return $hari_pelajaran;
    }
    public function get_jadwal_pelajaran($hari, $jam, $jurusan, $ruangan, $golongan)
    {
        $sql = "SELECT jw.*,m.nama_mapel,j.*,r.*,go.* from tbl_jadwal as jw join tbl_mapel as m on jw.id_mapel=m.id_mapel join tbl_jurusan as j on jw.id_jurusan=j.id_jurusan join tbl_ruangan as r on jw.id_ruangan=r.id_ruangan join tbl_golongan as go on jw.id_golongan=go.id_golongan where hari_jadwal='" . $hari . "' and jam_jadwal='" . $jam . "' and jw.id_jurusan='" . $jurusan . "' and jw.id_ruangan='" . $ruangan . "' and jw.id_golongan='" . $golongan . "'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return $row['nama_mapel'];
        } else {
            return '-';
        }
    }
    public function get_nama_jurusan($jurusan)
    {
        $query = $this->db->get_where('' . $this->table_join2 . '', array('id_jurusan' => $jurusan));
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return $row['nama_jurusan'];
        } else {
            return false;
        }
    }
    public function get_nama_ruangan($ruangan)
    {
        $query = $this->db->get_where('' . $this->table_join3 . '', array('id_ruangan' => $ruangan));
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return $row['nama_ruangan'];
        } else {
            return false;
        }
    }
    public function get_nama_guru($guru)
    {
        $query = $this->db->get_where('' . $this->table_join4 . '', array('id_guru' => $guru));
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return $row['nama_guru'];
        } else {
            return false;
        }
    }
    public function get_nama_golongan($golongan)
    {
        $query = $this->db->get_where('' . $this->table_join5 . '', array('id_golongan' => $golongan));
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return $row['nama_golongan'];
        } else {
            return false;
        }
    }
    public function filter_tbl_jadwal($jurusan, $ruangan, $golongan)
    {
        $sql = "SELECT jw.*,m.nama_mapel,j.*,r.*,g.nama_guru,go.* from tbl_jadwal as jw join tbl_mapel as m on jw.id_mapel=m.id_mapel join tbl_jurusan as j on jw.id_jurusan=j.id_jurusan join tbl_ruangan as r on jw.id_ruangan=r.id_ruangan join tbl_guru as g on jw.id_guru=g.id_guru join tbl_golongan as go on jw.id_golongan=go.id_golongan where jw.id_jurusan = '" . $jurusan . "' and jw.id_ruangan = '" . $ruangan . "' and jw.id_golongan = '" . $golongan . "' order by id_jadwal asc";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function filter_tbl_jadwal_hanya_jurusan($jurusan)
    {
        $sql = "SELECT jw.*,m.nama_mapel,j.*,r.*,g.nama_guru,go.* from tbl_jadwal as jw join tbl_mapel as m on jw.id_mapel=m.id_mapel join tbl_jurusan as j on jw.id_jurusan=j.id_jurusan join tbl_ruangan as r on jw.id_ruangan=r.id_ruangan join tbl_guru as g on jw.id_guru=g.id_guru join tbl_golongan as go on jw.id_golongan=go.id_golongan where jw.id_jurusan = '" . $jurusan . "' order by id_jadwal asc";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function filter_tbl_jadwal_hanya_ruangan($ruangan)
    {
        $sql = "SELECT jw.*,m.nama_mapel,j.*,r.*,g.nama_guru,go.* from tbl_jadwal as jw join tbl_mapel as m on jw.id_mapel=m.id_mapel join tbl_jurusan as j on jw.id_jurusan=j.id_jurusan join tbl_ruangan as r on jw.id_ruangan=r.id_ruangan join tbl_guru as g on jw.id_guru=g.id_guru join tbl_golongan as go on jw.id_golongan=go.id_golongan where jw.id_ruangan = '" . $ruangan . "' order by id_jadwal asc";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function filter_tbl_jadwal_hanya_golongan($golongan)
    {
        $sql = "SELECT jw.*,m.nama_mapel,j.*,r.*,g.nama_guru,go.* from tbl_jadwal as jw join tbl_mapel as m on jw.id_mapel=m.id_mapel join tbl_jurusan as j on jw.id_jurusan=j.id_jurusan join tbl_ruangan as r on jw.id_ruangan=r.id_ruangan join tbl_guru as g on jw.id_guru=g.id_guru join tbl_golongan as go on jw.id_golongan=go.id_golongan where jw.id_golongan = '" . $golongan . "' order by id_jadwal asc";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function filter_tbl_jadwal_tanpa_jurusan($ruangan, $golongan)
    {
        $sql = "SELECT jw.*,m.nama_mapel,j.*,r.*,g.nama_guru,go.* from tbl_jadwal as jw join tbl_mapel as m on jw.id_mapel=m.id_mapel join tbl_jurusan as j on jw.id_jurusan=j.id_jurusan join tbl_ruangan as r on jw.id_ruangan=r.id_ruangan join tbl_guru as g on jw.id_guru=g.id_guru join tbl_golongan as go on jw.id_golongan=go.id_golongan where jw.id_ruangan = '" . $ruangan . "' and jw.id_golongan = '" . $golongan . "' order by id_jadwal asc";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function filter_tbl_jadwal_tanpa_ruangan($jurusan, $golongan)
    {
        $sql = "SELECT jw.*,m.nama_mapel,j.*,r.*,g.nama_guru,go.* from tbl_jadwal as jw join tbl_mapel as m on jw.id_mapel=m.id_mapel join tbl_jurusan as j on jw.id_jurusan=j.id_jurusan join tbl_ruangan as r on jw.id_ruangan=r.id_ruangan join tbl_guru as g on jw.id_guru=g.id_guru join tbl_golongan as go on jw.id_golongan=go.id_golongan where jw.id_jurusan = '" . $jurusan . "' and jw.id_golongan = '" . $golongan . "' order by id_jadwal asc";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function filter_tbl_jadwal_tanpa_golongan($jurusan, $ruangan)
    {
        $sql = "SELECT jw.*,m.nama_mapel,j.*,r.*,g.nama_guru,go.* from tbl_jadwal as jw join tbl_mapel as m on jw.id_mapel=m.id_mapel join tbl_jurusan as j on jw.id_jurusan=j.id_jurusan join tbl_ruangan as r on jw.id_ruangan=r.id_ruangan join tbl_guru as g on jw.id_guru=g.id_guru join tbl_golongan as go on jw.id_golongan=go.id_golongan where jw.id_jurusan = '" . $jurusan . "' and jw.id_ruangan = '" . $ruangan . "' order by id_jadwal asc";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
}