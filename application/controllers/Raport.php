<?php

class Raport extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_raport', 'M_walikelas', 'M_mapel', 'M_nilai', 'M_log_siswa', 'M_golongan', 'M_jadwal', 'M_hak_session', 'M_tahunakademik', 'M_kurikulum', 'M_sekolah'));
        $this->M_hak_session->get_hak_session();
    }
    public function index()
    {
        $content = 'raport/v_list_raport';
        $this->template->load('template', $content);
    }
    public function data_raport()
    {
        $guru = $this->session->userdata('id');

        $walikelas = $this->M_walikelas->get_walikelas_by_id_guru($guru);
        $data = $this->M_log_siswa->get_all_log_siswa_by_golongan_walikelas($walikelas);

        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function cetak_raport($id)
    {
        $this->load->library('PDF');
        $rowraport = $this->M_raport->get_raport_by_id($id);

        $nimsiswa = $rowraport['id_siswa'];
        $namasiswa = $rowraport['nama_siswa'];
        $idgolongan = $rowraport['id_golongan'];
        $golongansiswa = $rowraport['nama_golongan'];

        $tahunakademik = $this->M_tahunakademik->get_tahun_akademik_aktif('tahun_akademik');
        $semester = $this->M_tahunakademik->get_tahun_akademik_aktif('semester_tahun_akademik');
        $profil = $this->M_sekolah->get_sekolah_by_id();

        $namasekolah = $profil['nama_sekolah'];
        $alamatsekolah = $profil['alamat_sekolah'];

        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(190, 8, $namasekolah, 1, 1, 'C');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(190, 6, $alamatsekolah, 1, 1, 'C');

        $pdf->Cell(30, 5, '', 0, 1, 'L');

        $pdf->Cell(30, 7, 'NIM', 0, 0, 'L');
        $pdf->Cell(70, 7, ': ' . $nimsiswa, 0, 0, 'L');
        $pdf->Cell(50, 7, 'Dibuat pada tanggal ', 0, 0, 'L');
        $pdf->Cell(108, 7, ': ' . date('d M Y'), 0, 1, 'L');

        $pdf->Cell(30, 7, 'Nama', 0, 0, 'L');
        $pdf->Cell(70, 7, ': ' . $namasiswa, 0, 0, 'L');
        $pdf->Cell(50, 7, 'Semester', 0, 0, 'L');
        $pdf->Cell(108, 7, ': ' . $semester, 0, 1, 'L');

        $pdf->Cell(30, 7, 'Golongan', 0, 0, 'L');
        $pdf->Cell(70, 7, ': ' . $golongansiswa, 0, 0, 'L');
        $pdf->Cell(50, 7, 'Tahun Akademik', 0, 0, 'L');
        $pdf->Cell(108, 7, ': ' . $tahunakademik, 0, 1, 'L');

        $pdf->Cell(30, 10, '', 0, 1, 'L');

        $pdf->SetFillColor(230, 230, 230);

        $pdf->Cell(9, 10, 'No', 1, 0, 'C', true);
        $pdf->Cell(60, 10, 'Mata Pelajaran', 1, 0, 'L', true);
        $pdf->Cell(12, 10, 'KKM', 1, 0, 'C', true);
        $pdf->Cell(14, 10, 'Angka', 1, 0, 'C', true);
        $pdf->Cell(55, 10, 'Huruf', 1, 0, 'C', true);
        $pdf->Cell(40, 10, 'Ketercapaian', 1, 1, 'C', true);

        $mapel = $this->M_jadwal->get_mapel_by_golongan($idgolongan);

        $no = 1;

        $pdf->setFont('Arial', '', 10);
        foreach ($mapel as $row) {
            $nilai = $this->M_nilai->check_nilai($nimsiswa, $row['id_jadwal']);
            $hurufnilai = $this->M_nilai->huruf_nilai($nilai);
            $checkketercapaian = $this->M_nilai->check_ketercapaian($nilai);
            $pdf->Cell(9, 10, $no, 1, 0, 'C');
            $pdf->Cell(60, 10, $row['nama_mapel'], 1, 0, 'L');
            $kkmnilai = $this->M_mapel->get_kkm_nilai_by_nama_mapel($row['nama_mapel']);
            $pdf->Cell(12, 10, $kkmnilai, 1, 0, 'C');
            $pdf->Cell(14, 10, $nilai, 1, 0, 'C');
            $pdf->Cell(55, 10, $hurufnilai, 1, 0, 'C');
            $pdf->Cell(40, 10, $checkketercapaian, 1, 1, 'C');
            $no++;
        }

        $nama_walikelas = $this->session->userdata('nama');

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(190, 5, '', 0, 1);
        $pdf->Cell(180, 10, 'Ditangani Oleh :', 0, 1, 'R');
        $pdf->Cell(190, 15, '', 0, 1);
        $pdf->Cell(180, 10, '' . $nama_walikelas . '', 0, 0, 'R');
        // $pdf->Cell(190, 5, '', 0, 1);
        // $pdf->Cell(45, 15, 'Mengetahui,', 0, 0, 'C');
        // $pdf->Cell(87, 5, '', 0, 0, 'c');
        // $pdf->Cell(25, 5, 'Diberikan Di', 0, 0, 'c');
        // $pdf->Cell(33, 5, ': ', 0, 1, 'L');
        // $pdf->Cell(45, 15, 'Orang Tua', 0, 0, 'C');
        // $pdf->Cell(87, 5, '', 0, 0, 'c');
        // $pdf->Cell(25, 5, 'Pada', 0, 0, 'c');
        // $pdf->Cell(33, 5, ': ', 0, 1, 'L');
        // $pdf->Cell(132, 5, '', 0, 0, 'c');
        // $pdf->Cell(25, 5, 'Wali Kelas', 0, 0, 'c');
        // $pdf->Cell(33, 5, ': ', 0, 1, 'L');

        $pdf->Output();
    }
}