<?php

class Jadwal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_jadwal', 'M_guru', 'M_ruangan', 'M_jurusan', 'M_golongan', 'M_mapel', 'M_tahunakademik', 'M_kurikulum', 'M_hak_session', 'M_sekolah'));
        $this->M_hak_session->get_hak_session();
    }
    public function index()
    {
        $level = $this->session->userdata('level');
        if ($level == 2 || $level == 3) {
            $content = 'jadwal/jadwal_guru/v_list_jadwal_guru';
            $this->template->load('template', $content);
        } else {
            $content = 'jadwal/v_list_jadwal';
            $this->template->load('template', $content);
        }
    }
    public function data_jadwal()
    {
        $data = $this->M_jadwal->get_all_jadwal();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function data_jadwal_guru()
    {
        $data = $this->M_jadwal->get_all_jadwal_guru();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function get_jadwal()
    {
        $id = $this->input->get('idjadwal');
        if (!empty($id)) {
            $data = $this->M_jadwal->get_jadwal_by_id($id);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function tambah()
    {
        $data_jadwal = array(
            'id_tahun_akademik' => $this->input->post('idtahunakademik', true),
            'id_jurusan' => $this->input->post('idjurusan', true),
            'id_mapel' => $this->input->post('idmapel', true),
            'id_guru' => $this->input->post('idguru', true),
            'id_ruangan' => $this->input->post('idruangan', true),
            'id_golongan' => $this->input->post('idgolongan', true),
            'hari_jadwal' => $this->input->post('harijadwal', true),
            'jaM_jadwal' => $this->input->post('jamjadwal', true)
        );
        $data = $this->M_jadwal->tambah_jadwal($data_jadwal);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function ubah()
    {
        $data_jadwal = array(
            'id_jadwal' => $this->input->post('idjadwal', true),
            'id_tahun_akademik' => $this->input->post('idtahunakademik', true),
            'id_jurusan' => $this->input->post('idjurusan', true),
            'id_mapel' => $this->input->post('idmapel', true),
            'id_guru' => $this->input->post('idguru', true),
            'id_ruangan' => $this->input->post('idruangan', true),
            'id_golongan' => $this->input->post('idgolongan', true),
            'hari_jadwal' => $this->input->post('harijadwal', true),
            'jaM_jadwal' => $this->input->post('jamjadwal', true)
        );
        $data = $this->M_jadwal->ubah_jadwal($data_jadwal);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function hapus()
    {
        $id = $this->input->post('idjadwal', true);
        if (!empty($id)) {
            $data = $this->M_jadwal->hapus_jadwal($id);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function filter_jadwal()
    {
        $jurusan = $this->input->post('idjurusan');
        $ruangan = $this->input->post('idruangan');
        $golongan = $this->input->post('idgolongan');
        if (!empty($jurusan) && empty($ruangan) && empty($golongan)) {
            $data = $this->M_jadwal->filter_tbl_jadwal_hanya_jurusan($jurusan);
        } elseif (empty($jurusan) && !empty($ruangan) && empty($golongan)) {
            $data = $this->M_jadwal->filter_tbl_jadwal_hanya_ruangan($ruangan);
        } elseif (empty($jurusan) && empty($ruangan) && !empty($golongan)) {
            $data = $this->M_jadwal->filter_tbl_jadwal_hanya_golongan($golongan);
        } elseif (!empty($ruangan) && !empty($golongan) && empty($jurusan)) {
            $data = $this->M_jadwal->filter_tbl_jadwal_tanpa_jurusan($ruangan, $golongan);
        } elseif (!empty($jurusan) && !empty($golongan) && empty($ruangan)) {
            $data = $this->M_jadwal->filter_tbl_jadwal_tanpa_ruangan($jurusan, $golongan);
        } elseif (!empty($jurusan) && !empty($ruangan) && empty($golongan)) {
            $data = $this->M_jadwal->filter_tbl_jadwal_tanpa_golongan($jurusan, $ruangan);
        } else {
            $data = $this->M_jadwal->filter_tbl_jadwal($jurusan, $ruangan, $golongan);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function data_tahun_akademik()
    {
        $data = $this->M_tahunakademik->select_tahun_akademik();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function data_guru()
    {
        $data = $this->M_guru->select_guru();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function data_ruangan()
    {
        $data = $this->M_ruangan->select_ruangan();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function data_jurusan()
    {
        $data = $this->M_jurusan->select_jurusan();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function data_golongan()
    {
        $data = $this->M_golongan->select_golongan();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function data_mapel()
    {
        $data = $this->M_mapel->select_mapel();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function cetak_jadwal()
    {
        $this->load->library('PDF');
        $days = $this->M_jadwal->data_hari_pelajaran();
        $profil = $this->M_sekolah->get_sekolah_by_id();

        $namasekolah = $profil['nama_sekolah'];
        $alamatsekolah = $profil['alamat_sekolah'];

        $jurusan = $this->input->post('idjurusan');
        $ruangan = $this->input->post('idruangan');
        $golongan = $this->input->post('idgolongan');
        $guru = $this->input->post('idguru');

        $nama_jurusan = $this->M_jadwal->get_nama_jurusan($jurusan);
        $nama_ruangan = $this->M_jadwal->get_nama_ruangan($ruangan);
        $nama_walikelas = $this->M_jadwal->get_nama_guru($guru);
        $nama_golongan = $this->M_jadwal->get_nama_golongan($golongan);

        $pdf = new FPDF('L', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(190, 8, $namasekolah, 1, 1, 'C');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(190, 6, $alamatsekolah, 1, 1, 'C');

        $pdf->Cell(30, 10, 'Jurusan', 0, 0, 'L');
        $pdf->Cell(128, 10, ': ' . $nama_jurusan, 0, 0, 'L');
        $pdf->Cell(50, 10, 'Dibuat pada tanggal ', 0, 0, 'L');
        $pdf->Cell(108, 10, ': ' . date('d M Y'), 0, 1, 'L');

        $pdf->Cell(30, 10, 'Ruangan', 0, 0, 'L');
        $pdf->Cell(128, 10, ': ' . $nama_ruangan, 0, 0, 'L');
        $pdf->Cell(50, 10, 'Wali Kelas', 0, 0, 'L');
        $pdf->Cell(108, 10, ': ' . $nama_walikelas, 0, 1, 'L');

        $pdf->Cell(30, 10, 'Golongan', 0, 0, 'L');
        $pdf->Cell(108, 10, ': ' . $nama_golongan, 0, 1, 'L');

        $pdf->Cell(30, 5, '', 0, 1, 'L');
        $pdf->Line(10, 53, 269, 53);
        $pdf->Cell(30, 5, '', 0, 1, 'L');
        $pdf->SetFillColor(230, 230, 230);
        $pdf->Cell(8, 10, 'NO', 1, 0, 'C', true);
        $pdf->Cell(29, 10, 'WAKTU', 1, 0, 'C', true);
        foreach ($days as $day) {
            $pdf->Cell(37, 10, $day, 1, 0, 'C', true);
        }
        $pdf->Cell(30, 10, '', 0, 1, 'L');
        $times = $this->M_jadwal->data_jam_pelajaran();
        $no = 1;
        foreach ($times as $time) {
            $pdf->Cell(8, 10, $no, 1, 0, 'C');
            $pdf->Cell(29, 10, $time, 1, 0, 'C');
            foreach ($days as $day) {
                $pdf->Cell(37, 10, $this->M_jadwal->get_jadwal_pelajaran($day, $time, $jurusan, $ruangan, $golongan), 1, 0, 'C');
            }
            $no++;
            $pdf->Cell(30, 10, '', 0, 1, 'L');
        }
        $pdf->Cell(30, 10, '', 0, 1, 'L');
        $pdf->Cell(250, 10, 'Ditangani Oleh :', 0, 1, 'R');
        $pdf->Cell(30, 15, '', 0, 1, 'L');
        $pdf->Cell(250, 10, '' . $nama_walikelas . '', 0, 0, 'R');
        $pdf->Output();
    }
}