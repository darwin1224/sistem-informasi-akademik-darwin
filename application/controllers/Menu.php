<?php

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_menu', 'M_hak_session'));
        $this->M_hak_session->get_hak_session();
        $this->M_hak_session->get_hak_session_admin();
    }
    public function index()
    {
        $content = 'menu/v_list_menu';
        $this->template->load('template', $content);
    }
    public function data_menu()
    {
        $data = $this->M_menu->get_all_menu();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function get_menu()
    {
        $id = $this->input->get('idmenu');
        if (!empty($id)) {
            $data = $this->M_menu->get_menu_by_id($id);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function tambah()
    {
        $data_menu = array(
            'nama_menu' => $this->input->post('namamenu', true),
            'link_menu' => $this->input->post('linkmenu', true),
            'icon_menu' => $this->input->post('iconmenu', true)
        );
        $data = $this->M_menu->tambah_menu($data_menu);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function ubah()
    {
        $data_menu = array(
            'id_menu' => $this->input->post('idmenu', true),
            'nama_menu' => $this->input->post('namamenu', true),
            'link_menu' => $this->input->post('linkmenu', true),
            'icon_menu' => $this->input->post('iconmenu', true)
        );
        $data = $this->M_menu->ubah_menu($data_menu);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function hapus()
    {
        $id = $this->input->post('idmenu', true);
        if (!empty($id)) {
            $data = $this->M_menu->hapus_menu($id);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}