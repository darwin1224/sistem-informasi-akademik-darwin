<?php

class Agama extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_agama', 'M_hak_session'));
        $this->M_hak_session->get_hak_session();
    }
    public function index()
    {
        $content = 'agama/v_list_agama';
        $this->template->load('template', $content);
    }
    public function data_agama()
    {
        $data = $this->M_agama->get_all_agama();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function get_agama()
    {
        $id = $this->input->get('idagama');
        if (!empty($id)) {
            $data = $this->M_agama->get_agama_by_id($id);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function tambah()
    {
        $data_agama = array(
            'nama_agama' => $this->input->post('namaagama', true)
        );
        $data = $this->M_agama->tambah_agama($data_agama);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function ubah()
    {
        $data_agama = array(
            'id_agama' => $this->input->post('idagama', true),
            'nama_agama' => $this->input->post('namaagama', true)
        );
        $data = $this->M_agama->ubah_agama($data_agama);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function hapus()
    {
        $id = $this->input->post('idagama', true);
        if (!empty($id)) {
            $data = $this->M_agama->hapus_agama($id);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}