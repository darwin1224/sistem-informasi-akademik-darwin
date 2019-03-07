<?php

class Golongan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_golongan', 'M_ruangan', 'M_jurusan', 'M_hak_session'));
        $this->M_hak_session->get_hak_session();
        $this->M_hak_session->get_hak_session_admin();
    }
    public function index()
    {
        $content = 'golongan/v_list_golongan';
        $this->template->load('template', $content);
    }
    public function data_golongan()
    {
        $list = $this->M_golongan->get_all_golongan();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->nama_golongan;
            $row[] = $field->nama_ruangan;
            $row[] = $field->nama_jurusan;
            $row[] = '<a class="btn btn-warning btn-sm item-ubah" style="margin-right:5px" data-toggle="modal" data-target="#Modalubah" data-id="' . $field->id_golongan . '"><span class="fa fa-edit"></span></a><a class="btn btn-danger btn-sm item-hapus" data-toggle="modal" data-target="#Modalhapus" data-id="' . $field->id_golongan . '"><span class="fa fa-trash"></span></a>';
            $data[] = $row;
        }
        $output = array(
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->M_golongan->count_all(),
            'recordsFiltered' => $this->M_golongan->count_filtered(),
            'data' => $data,
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
    public function get_golongan()
    {
        $id = $this->input->get('idgolongan');
        if (!empty($id)) {
            $data = $this->M_golongan->get_golongan_by_id($id);
        }
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
    public function tambah()
    {
        $data_golongan = array(
            'nama_golongan' => $this->input->post('namagolongan', true),
            'id_ruangan' => $this->input->post('idruangan', true),
            'id_jurusan' => $this->input->post('idjurusan', true)
        );
        $data = $this->M_golongan->tambah_golongan($data_golongan);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function ubah()
    {
        $data_golongan = array(
            'id_golongan' => $this->input->post('idgolongan', true),
            'nama_golongan' => $this->input->post('namagolongan', true),
            'id_ruangan' => $this->input->post('idruangan', true),
            'id_jurusan' => $this->input->post('idjurusan', true)
        );
        $data = $this->M_golongan->ubah_golongan($data_golongan);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function hapus()
    {
        $id = $this->input->post('idgolongan', true);
        if (!empty($id)) {
            $data = $this->M_golongan->hapus_golongan($id);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}