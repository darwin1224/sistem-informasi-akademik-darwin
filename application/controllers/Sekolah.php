<?php

class Sekolah extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_sekolah', 'M_jenjang', 'M_hak_session'));
        $this->M_hak_session->get_hak_session();
        $this->M_hak_session->get_hak_session_admin();
    }
    public function index()
    {
        $content = 'sekolah/v_list_sekolah';
        $this->template->load('template', $content);
    }
    public function data_sekolah()
    {
        $data = $this->M_sekolah->get_all_sekolah();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function data_jenjang()
    {
        $data = $this->M_jenjang->get_all_jenjang();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function ubah()
    {
        $data_sekolah = array(
            'id_sekolah' => $this->input->post('idsekolah'),
            'nama_sekolah' => $this->input->post('namasekolah'),
            'alamat_sekolah' => $this->input->post('alamatsekolah'),
            'email_sekolah' => $this->input->post('emailsekolah'),
            'telepon_sekolah' => $this->input->post('teleponsekolah'),
            'id_jenjang' => $this->input->post('idjenjang')
        );
        $data = $this->M_sekolah->ubah_sekolah($data_sekolah);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}