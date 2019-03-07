<?php

class Pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_pembayaran', 'M_siswa', 'M_jenis_pembayaran', 'M_hak_session'));
        $this->M_hak_session->get_hak_session();
    }
    public function index()
    {
        $content = 'pembayaran/v_list_pembayaran';
        $this->template->load('template', $content);
    }
    public function laporan()
    {
        $content = 'pembayaran/laporan_pembayaran/v_laporan_pembayaran';
        $this->template->load('template', $content);
    }
    public function data_pembayaran()
    {
        $data = $this->M_pembayaran->get_all_pembayaran();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function data_laporan_pembayaran()
    {
        $data = $this->M_pembayaran->get_all_laporan_pembayaran();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function get_pembayaran()
    {
        $id = $this->input->get('idpembayaran');
        if (!empty($id)) {
            $data = $this->M_pembayaran->get_pembayaran_by_id($id);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function tambah()
    {
        if ($this->input->post('inputsubmit')) {
            $data_pembayaran = array(
                'tanggal_pembayaran' => $this->input->post('tanggalpembayaran', true),
                'id_siswa' => $this->input->post('idsiswa', true),
                'id_jenis_pembayaran' => $this->input->post('idjenispembayaran', true),
                'jumlah_pembayaran' => $this->input->post('jumlahpembayaran', true),
                'status_pembayaran' => $this->input->post('statuspembayaran', true),
                'deskripsi_pembayaran' => $this->input->post('deskripsipembayaran', true)
            );
            $data = $this->M_pembayaran->tambah_pembayaran($data_pembayaran);
            redirect('pembayaran');
        }

        $content = 'pembayaran/form_tambah/v_tambah_pembayaran';
        $this->template->load('template', $content);
    }
    public function ubah()
    {
        $data_pembayaran = array(
            'id_pembayaran' => $this->input->post('idpembayaran', true),
            'tanggal_pembayaran' => $this->input->post('tanggalpembayaran', true),
            'id_siswa' => $this->input->post('idsiswa', true),
            'id_jenis_pembayaran' => $this->input->post('idjenispembayaran', true),
            'jumlah_pembayaran' => $this->input->post('jumlahpembayaran', true),
            'status_pembayaran' => $this->input->post('statuspembayaran', true),
            'deskripsi_pembayaran' => $this->input->post('deskripsipembayaran', true)
        );
        $data = $this->M_pembayaran->ubah_pembayaran($data_pembayaran);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function hapus()
    {
        $id = $this->input->post('idpembayaran', true);
        if (!empty($id)) {
            $data = $this->M_pembayaran->hapus_pembayaran($id);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function data_siswa()
    {
        $data = $this->M_siswa->get_all_siswa();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function data_jenis_pembayaran()
    {
        $data = $this->M_jenis_pembayaran->get_all_jenis_pembayaran();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function filter_laporan()
    {
        $tanggalawal = $this->input->post('tanggalpembayaranawal');
        $tanggalakhir = $this->input->post('tanggalpembayaranakhir');
        $data = $this->M_pembayaran->filter_laporan_berdasarkan_tanggal($tanggalawal, $tanggalakhir);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function cetak_laporan()
    {
        $this->load->library('PDF');

        $pdf = new FPDF('L', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(259, 10, 'SISTEM INFORMASI AKADEMIK', 1, 1, 'C');

        $pdf->Cell(30, 5, '', 0, 1, 'L');
        $pdf->Cell(30, 5, '', 0, 1, 'L');
        $pdf->SetFillColor(230, 230, 230);
        $pdf->Cell(10, 10, 'NO', 1, 0, 'C', true);
        $pdf->Cell(40, 10, 'TANGGAL', 1, 0, 'C', true);
        $pdf->Cell(40, 10, 'NIS', 1, 0, 'C', true);
        $pdf->Cell(60, 10, 'NAMA', 1, 0, 'C', true);
        $pdf->Cell(59, 10, 'JENIS PEMBAYARAN', 1, 0, 'C', true);
        $pdf->Cell(50, 10, 'JUMLAH', 1, 1, 'C', true);

        $data = $this->M_pembayaran->get_all_pembayaran();
        $no = 1;

        foreach ($data as $row) {
            $pdf->Cell(10, 10, $no, 1, 0, 'C');
            $pdf->Cell(40, 10, $row->tanggal_pembayaran, 1, 0, 'C');
            $pdf->Cell(40, 10, $row->id_siswa, 1, 0, 'C');
            $pdf->Cell(60, 10, $row->nama_siswa, 1, 0, 'C');
            $pdf->Cell(59, 10, $row->nama_jenis_pembayaran, 1, 0, 'C');
            $pdf->Cell(50, 10, 'Rp. ' . $row->jumlah_pembayaran, 1, 1, 'C');
            $no++;
        }

        $pdf->Output();
    }
}