<?php

class Jurusan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_jurusan', 'M_hak_session'));
        $this->M_hak_session->get_hak_session();
        $this->M_hak_session->get_hak_session_admin();
    }
    public function index()
    {
        $content = 'jurusan/v_list_jurusan';
        $this->template->load('template', $content);
    }
    public function data_jurusan()
    {
        $list = $this->M_jurusan->get_all_jurusan();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->nama_jurusan;
            $row[] = '<a class="btn btn-warning btn-sm item-ubah" style="margin-right:5px" data-toggle="modal" data-target="#Modalubah" data-id="' . $field->id_jurusan . '"><span class="fa fa-edit"></span></a><a class="btn btn-danger btn-sm item-hapus" data-toggle="modal" data-target="#Modalhapus" data-id="' . $field->id_jurusan . '"><span class="fa fa-trash"></span></a>';
            $data[] = $row;
        }
        $output = array(
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->M_jurusan->count_all(),
            'recordsFiltered' => $this->M_jurusan->count_filtered(),
            'data' => $data,
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
    public function get_jurusan()
    {
        $id = $this->input->get('idjurusan');
        if (!empty($id)) {
            $data = $this->M_jurusan->get_jurusan_by_id($id);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function tambah()
    {
        $data_jurusan = array(
            'id_jurusan' => $this->input->post('idjurusan', true),
            'nama_jurusan' => $this->input->post('namajurusan', true)
        );
        $data = $this->M_jurusan->tambah_jurusan($data_jurusan);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function ubah()
    {
        $data_jurusan = array(
            'id_jurusan' => $this->input->post('idjurusan', true),
            'nama_jurusan' => $this->input->post('namajurusan', true)
        );
        $data = $this->M_jurusan->ubah_jurusan($data_jurusan);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function hapus()
    {
        $id = $this->input->post('idjurusan', true);
        if (!empty($id)) {
            $data = $this->M_jurusan->hapus_jurusan($id);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}