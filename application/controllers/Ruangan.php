<?php

class Ruangan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_ruangan', 'M_hak_session'));
        $this->M_hak_session->get_hak_session();
        $this->M_hak_session->get_hak_session_admin();
    }
    public function index()
    {
        $content = 'ruangan/v_list_ruangan';
        $this->template->load('template', $content);
    }
    public function data_ruangan()
    {
        $list = $this->M_ruangan->get_all_ruangan();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->nama_ruangan;
            $row[] = '<a class="btn btn-warning btn-sm item-ubah" style="margin-right:5px" data-toggle="modal" data-target="#Modalubah" data-id="' . $field->id_ruangan . '"><span class="fa fa-edit"></span></a><a class="btn btn-danger btn-sm item-hapus" data-toggle="modal" data-target="#Modalhapus" data-id="' . $field->id_ruangan . '"><span class="fa fa-trash"></span></a>';
            $data[] = $row;
        }
        $output = array(
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->M_ruangan->count_all(),
            'recordsFiltered' => $this->M_ruangan->count_filtered(),
            'data' => $data,
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
    public function get_ruangan()
    {
        $id = $this->input->get('idruangan');
        if (!empty($id)) {
            $data = $this->M_ruangan->get_ruangan_by_id($id);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function tambah()
    {
        $data_ruangan = array(
            'id_ruangan' => $this->input->post('idruangan', true),
            'nama_ruangan' => $this->input->post('namaruangan', true)
        );
        $data = $this->M_ruangan->tambah_ruangan($data_ruangan);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function ubah()
    {
        $data_ruangan = array(
            'id_ruangan' => $this->input->post('idruangan', true),
            'nama_ruangan' => $this->input->post('namaruangan', true)
        );
        $data = $this->M_ruangan->ubah_ruangan($data_ruangan);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function hapus()
    {
        $id = $this->input->post('idruangan', true);
        if (!empty($id)) {
            $data = $this->M_ruangan->hapus_ruangan($id);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}