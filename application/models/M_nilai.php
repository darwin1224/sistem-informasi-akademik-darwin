<?php

class M_nilai extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'tbl_nilai';
        $this->table2 = 'tbl_jadwal';
        $this->table_join = 'tbl_mapel';
        $this->table_join2 = 'tbl_jurusan';
        $this->table_join3 = 'tbl_ruangan';
        $this->table_join4 = 'tbl_guru';
        $this->table_join5 = 'tbl_golongan';
        $this->table_join6 = 'tbl_siswa';
        $this->primary_key = 'id_jurusan';
        $this->order = array('id_jadwal' => 'asc');
        $this->column_order = array(null, 'nama_mapel', 'nama_jurusan', 'nama_ruangan', 'nama_golongan', null);
        $this->column_search = array('nama_mapel', 'nama_jurusan', 'nama_ruangan', 'nama_golongan');
    }
    private function _get_datatables_query()
    {
        $namaguru = $this->session->userdata('nama');
        $this->db->distinct();
        $this->db->select('jw.id_jadwal,m.nama_mapel,j.*,r.*,g.nama_guru,go.*');
        $this->db->from('' . $this->table2 . ' jw');
        $this->db->join('' . $this->table_join . '  m', 'jw.id_mapel=m.id_mapel', 'inner');
        $this->db->join('' . $this->table_join2 . '  j', 'jw.id_jurusan=j.id_jurusan', 'inner');
        $this->db->join('' . $this->table_join3 . '  r', 'jw.id_ruangan=r.id_ruangan', 'inner');
        $this->db->join('' . $this->table_join4 . '  g', 'jw.id_guru=g.id_guru', 'inner');
        $this->db->join('' . $this->table_join5 . '  go', 'jw.id_golongan=go.id_golongan', 'inner');
        $this->db->where('g.nama_guru', $namaguru);
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
    public function get_all_nilai()
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
        $namaguru = $this->session->userdata('nama');
        $this->db->from($this->table2 . ' jw');
        $this->db->join('' . $this->table_join4 . '  g', 'jw.id_guru=g.id_guru', 'inner');
        $this->db->where('g.nama_guru', $namaguru);
        return $this->db->count_all_results();
    }

    // Model Nilai_siswa

    public function get_nilai_by_id($id)
    {
        $query = $this->db->get_where($this->table2, array('id_jadwal' => $id));
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function check_id_siswa_dan_id_jadwal($where)
    {
        $query = $this->db->get_where($this->table, $where);
        return $query;
    }
    public function get_all_siswa_by_golongan($idgolongan)
    {
        $this->db->select('n.*,go.*,s.id_siswa,s.nama_siswa');
        $this->db->from('' . $this->table . ' n');
        $this->db->join('' . $this->table_join6 . ' s', 'n.id_siswa=s.id_siswa', 'inner');
        $this->db->join('' . $this->table_join5 . ' go', 's.id_golongan=go.id_golongan', 'inner');
        $this->db->where(array('go.id_golongan' => $idgolongan));
        $this->db->order_by('id_nilai', 'asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function tambah_nilai($data_nilai)
    {
        $query = $this->db->insert($this->table, $data_nilai);
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
    public function ubah_nilai($data_nilai, $where)
    {
        $this->db->where($where);
        $query = $this->db->update($this->table, array('nilai' => $data_nilai['nilai']));
        if (!$query) {
            return false;
        } else {
            return true;
        }
    }
    public function check_nilai($idsiswa, $idjadwal)
    {
        $query = $this->db->get_where($this->table, array('id_siswa' => $idsiswa, 'id_jadwal' => $idjadwal));
        if ($query->num_rows() > 0) {
            $row = $query->row_array();
            return $row['nilai'];
        } else {
            return 0;
        }
    }
    public function huruf_nilai($nilai)
    {
        $arr = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
        if ($nilai < 12)
        return " " . $arr[$nilai];
        elseif ($nilai < 20)
        return $this->huruf_nilai($nilai - 10) . "Belas";
        elseif ($nilai < 100)
        return $this->huruf_nilai($nilai / 10) . " Puluh" . $this->huruf_nilai($nilai % 10);
        elseif ($nilai < 200)
        return " seratus" . huruf_nilai($nilai - 100);
        elseif ($nilai < 1000)
        return $this->huruf_nilai($nilai / 100) . " Ratus" . $this->huruf_nilai($nilai % 100);
        elseif ($nilai < 2000)
        return " seribu" . huruf_nilai($nilai - 1000);
        elseif ($nilai < 1000000)
        return $this->huruf_nilai($nilai / 1000) . " Ribu" . $this->huruf_nilai($nilai % 1000);
        elseif ($nilai < 1000000000)
        return $this->huruf_nilai($nilai / 1000000) . " Juta" . $this->huruf_nilai($nilai % 1000000);
        elseif ($nilai == 0)
        return "-";
    }
    public function check_ketercapaian($nilai)
    {
        if ($nilai < 75 && $nilai > 0) {
            return "Tidak Tercapai";
        } elseif ($nilai >= 75) {
            return "Tercapai";
        } else {
            return "-";
        }
    }
}