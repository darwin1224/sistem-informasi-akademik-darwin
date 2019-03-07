<?php

class Nilai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_nilai', 'M_log_siswa', 'M_hak_session', 'M_tahunakademik', 'M_kurikulum'));
        $this->M_hak_session->get_hak_session();
    }
    public function index()
    {
        $content = 'nilai/v_list_nilai';
        $this->template->load('template', $content);
    }
    public function data_nilai()
    {
        $list = $this->M_nilai->get_all_nilai();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->nama_mapel;
            $row[] = $field->nama_jurusan;
            $row[] = $field->nama_ruangan;
            $row[] = $field->nama_golongan;
            $row[] = '<a class="btn btn-success btn-sm item-detail" style="margin-right:5px" href="' . base_url('nilai/nilai_siswa/' . $field->id_jadwal) . '"><span class="fa fa-eye"></span></a>';
            $data[] = $row;
        }
        $output = array(
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->M_nilai->count_all(),
            'recordsFiltered' => $this->M_nilai->count_filtered(),
            'data' => $data,
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    // Data Nilai Siswa

    public function nilai_siswa($id)
    {
        $datanilai = $this->M_nilai->get_nilai_by_id($id);
        $idgolongan = $datanilai->id_golongan;
        $data['siswa'] = $this->M_log_siswa->get_all_log_siswa_by_golongan($idgolongan);
        $content = 'nilai/nilai_siswa/v_list_nilai_siswa';
        $this->template->load('template', $content, $data);
    }
    public function input_nilai()
    {
        $data_nilai = array(
            'id_siswa' => $this->input->get('idsiswa'),
            'id_jadwal' => $this->input->get('idjadwal'),
            'nilai' => $this->input->get('nilaisiswa')
        );
        $where = array('id_siswa' => $data_nilai['id_siswa'], 'id_jadwal' => $data_nilai['id_jadwal']);
        $check = $this->M_nilai->check_id_siswa_dan_id_jadwal($where);
        if ($check->num_rows() > 0) {
            $data = $this->M_nilai->ubah_nilai($data_nilai, $where);
        } else {
            $data = $this->M_nilai->tambah_nilai($data_nilai);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}