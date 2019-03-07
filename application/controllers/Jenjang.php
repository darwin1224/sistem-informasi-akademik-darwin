<?php

class Jenjang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_jenjang', 'M_hak_session'));
        $this->M_hak_session->get_hak_session();
        $this->M_hak_session->get_hak_session_admin();
    }
    public function index()
    {
        $content = 'jenjang/v_list_jenjang';
        $this->template->load('template', $content);
    }
    public function data_jenjang()
    {
        $data = $this->M_jenjang->get_all_jenjang();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function get_jenjang()
    {
        $id = $this->input->get('idjenjang');
        if (!empty($id)) {
            $data = $this->M_jenjang->get_jenjang_by_id($id);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function tambah()
    {
        $data_jenjang = array(
            'nama_jenjang' => $this->input->post('namajenjang')
        );
        $data = $this->M_jenjang->tambah_jenjang($data_jenjang);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function ubah()
    {
        $data_jenjang = array(
            'id_jenjang' => $this->input->post('idjenjang'),
            'nama_jenjang' => $this->input->post('namajenjang')
        );
        $data = $this->M_jenjang->ubah_jenjang($data_jenjang);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function hapus()
    {
        $id = $this->input->post('idjenjang');
        if (!empty($id)) {
            $data = $this->M_jenjang->hapus_jenjang($id);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}