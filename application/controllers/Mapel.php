<?php

class Mapel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_mapel', 'M_hak_session'));
        $this->M_hak_session->get_hak_session();
        $this->M_hak_session->get_hak_session_admin();
    }
    public function index()
    {
        $content = 'mapel/v_list_mapel';
        $this->template->load('template', $content);
    }
    public function data_mapel()
    {
        $list = $this->M_mapel->get_all_mapel();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->nama_mapel;
            $row[] = $field->kkm_mapel;
            $row[] = '<a class="btn btn-warning btn-sm item-ubah" style="margin-right:5px" data-toggle="modal" data-target="#Modalubah" data-id="' . $field->id_mapel . '"><span class="fa fa-edit"></span></a><a class="btn btn-danger btn-sm item-hapus" data-toggle="modal" data-target="#Modalhapus" data-id="' . $field->id_mapel . '"><span class="fa fa-trash"></span></a>';
            $data[] = $row;
        }
        $output = array(
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->M_mapel->count_all(),
            'recordsFiltered' => $this->M_mapel->count_filtered(),
            'data' => $data,
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
    public function get_mapel()
    {
        $id = $this->input->get('idmapel');
        if (!empty($id)) {
            $data = $this->M_mapel->get_mapel_by_id($id);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function tambah()
    {
        $data_mapel = array(
            'id_mapel' => $this->input->post('idmapel', true),
            'nama_mapel' => $this->input->post('namamapel', true),
            'kkm_mapel' => $this->input->post('kkmmapel', true)
        );
        $data = $this->M_mapel->tambah_mapel($data_mapel);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function ubah()
    {
        $data_mapel = array(
            'id_mapel' => $this->input->post('idmapel', true),
            'nama_mapel' => $this->input->post('namamapel', true),
            'kkm_mapel' => $this->input->post('kkmmapel', true)
        );
        $data = $this->M_mapel->ubah_mapel($data_mapel);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function hapus()
    {
        $id = $this->input->post('idmapel', true);
        if (!empty($id)) {
            $data = $this->M_mapel->hapus_mapel($id);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}