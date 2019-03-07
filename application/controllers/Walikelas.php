<?php

class Walikelas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_walikelas', 'M_guru', 'M_golongan', 'M_tahunakademik', 'M_kurikulum', 'M_hak_session'));
        $this->M_hak_session->get_hak_session();
        $this->M_hak_session->get_hak_session_admin();
    }
    public function index()
    {
        $content = 'walikelas/v_list_walikelas';
        $this->template->load('template', $content);
    }
    public function data_walikelas()
    {
        $data = $this->M_walikelas->get_all_walikelas();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function get_walikelas()
    {
        $id = $this->input->get('idwalikelas');
        if (!empty($id)) {
            $data = $this->M_walikelas->get_walikelas_by_id($id);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function tambah()
    {
        $data_walikelas = array(
            'id_tahun_akademik' => $this->input->post('idtahunakademik', true),
            'id_golongan' => $this->input->post('idgolongan', true),
            'id_guru' => $this->input->post('idguru', true)
        );
        $data = $this->M_walikelas->tambah_walikelas($data_walikelas);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function ubah()
    {
        $data_walikelas = array(
            'id_walikelas' => $this->input->post('idwalikelas', true),
            'id_tahun_akademik' => $this->input->post('idtahunakademik', true),
            'id_golongan' => $this->input->post('idgolongan', true),
            'id_guru' => $this->input->post('idguru', true)
        );
        $data = $this->M_walikelas->ubah_walikelas($data_walikelas);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function hapus()
    {
        $id = $this->input->post('idwalikelas', true);
        if (!empty($id)) {
            $data = $this->M_walikelas->hapus_walikelas($id);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function data_tahun_akademik()
    {
        $data = $this->M_tahunakademik->get_all_tahun_akademik();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function data_golongan()
    {
        $data = $this->M_golongan->get_all_golongan();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function data_guru()
    {
        $data = $this->M_guru->get_all_guru();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function get_golongan()
    {
        $id = $this->input->get('idgolongan');
        if (!empty($id)) {
            $data = $this->M_golongan->get_golongan_by_id($id);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function get_tahun_akademik()
    {
        $data = $this->M_tahunakademik->get_tahun_akademik_aktif('tahun_akademik');
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function get_semester_tahun_akademik()
    {
        $data = $this->M_tahunakademik->get_tahun_akademik_aktif('semester_tahun_akademik');
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}