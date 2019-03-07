<?php

class Tahunakademik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_tahunakademik', 'M_hak_session'));
        $this->M_hak_session->get_hak_session();
        $this->M_hak_session->get_hak_session_admin();
    }
    public function index()
    {
        $content = 'tahunakademik/v_list_tahunakademik';
        $this->template->load('template', $content);
    }
    public function data_tahun_akademik()
    {
        $list = $this->M_tahunakademik->get_all_tahun_akademik();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->tahun_akademik;
            if ($field->status_tahun_akademik == 'Aktif')
            $row[] = '<small class="label label-warning">' . $field->status_tahun_akademik . '</small>';
            elseif ($field->status_tahun_akademik == 'Tidak Aktif')
            $row[] = '<small class="label label-danger">' . $field->status_tahun_akademik . '</small>';
            $row[] = '<a class="btn btn-warning btn-sm item-ubah" style="margin-right:5px" data-toggle="modal" data-target="#Modalubah" data-id="' . $field->id_tahun_akademik . '"><span class="fa fa-edit"></span></a><a class="btn btn-danger btn-sm item-hapus" data-toggle="modal" data-target="#Modalhapus" data-id="' . $field->id_tahun_akademik . '"><span class="fa fa-trash"></span></a>';
            $data[] = $row;
        }
        $output = array(
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->M_tahunakademik->count_all(),
            'recordsFiltered' => $this->M_tahunakademik->count_filtered(),
            'data' => $data,
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
    public function get_tahun_akademik()
    {
        $id = $this->input->get('idtahunakademik');
        if (!empty($id)) {
            $data = $this->M_tahunakademik->get_tahun_akademik_by_id($id);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function tambah()
    {
        $data_tahun_akademik = array(
            'tahun_akademik' => $this->input->post('tahunakademik', true),
            'status_tahun_akademik' => $this->input->post('statustahunakademik', true)
        );
        $data = $this->M_tahunakademik->tambah_tahun_akademik($data_tahun_akademik);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function ubah()
    {
        $data_tahun_akademik = array(
            'id_tahun_akademik' => $this->input->post('idtahunakademik', true),
            'tahun_akademik' => $this->input->post('tahunakademik', true),
            'status_tahun_akademik' => $this->input->post('statustahunakademik', true)
        );
        $data = $this->M_tahunakademik->ubah_tahun_akademik($data_tahun_akademik);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function hapus()
    {
        $id = $this->input->post('idtahunakademik', true);
        if (!empty($id)) {
            $data = $this->M_tahunakademik->hapus_tahun_akademik($id);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}