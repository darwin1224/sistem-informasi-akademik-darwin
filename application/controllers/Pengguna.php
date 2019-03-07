<?php

class pengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_pengguna', 'M_level_pengguna', 'M_menu', 'M_hak_akses', 'M_hak_session'));
        $this->M_hak_session->get_hak_session();
        $this->M_hak_session->get_hak_session_admin();
    }
    public function index()
    {
        $content = 'pengguna/v_list_pengguna';
        $this->template->load('template', $content);
    }
    public function data_pengguna()
    {
        $list = $this->M_pengguna->get_all_pengguna();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = '<img src="' . base_url("assets/images/" . $field->gambar_pengguna) . '" class="img-circle" width="40" height="40">';
            $row[] = $field->nama_pengguna;
            $row[] = $field->email_pengguna;
            $row[] = $field->level_pengguna;
            $row[] = '<a class="btn btn-warning btn-sm item-ubah" style="margin-right:5px" data-toggle="modal" data-target="#Modalubah" data-id="' . $field->id_pengguna . '"><span class="fa fa-edit"></span></a><a class="btn btn-danger btn-sm item-hapus" data-toggle="modal" data-target="#Modalhapus" data-id="' . $field->id_pengguna . '"><span class="fa fa-trash"></span></a>';
            $data[] = $row;
        }
        $output = array(
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->M_pengguna->count_all(),
            'recordsFiltered' => $this->M_pengguna->count_filtered(),
            'data' => $data,
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
    public function get_pengguna()
    {
        $id = $this->input->get('idpengguna');
        if (!empty($id)) {
            $data = $this->M_pengguna->get_pengguna_by_id($id);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function data_level_pengguna()
    {
        $data = $this->M_level_pengguna->get_all_level_pengguna();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function tambah()
    {
        $upload_path = './assets/images/';
        $gambar = 'gambarpengguna';
        $upload = $this->_upload_image($upload_path, $gambar);
        if ($upload) {
            $resize_path = $upload_path . $upload;
            $resize = $this->_resize_image($resize_path);
            $data_pengguna = array(
                'nama_pengguna' => $this->input->post('namapengguna', true),
                'email_pengguna' => $this->input->post('emailpengguna', true),
                'username' => $this->input->post('username', true),
                'password' => md5($this->input->post('password', true)),
                'id_level_pengguna' => $this->input->post('idlevelpengguna', true),
                'gambar_pengguna' => $upload
            );
            $data = $this->M_pengguna->tambah_pengguna($data_pengguna);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function ubah()
    {
        $upload_path = './assets/images/';
        $gambar = 'gambarpengguna';
        $upload = $this->_upload_image($upload_path, $gambar);
        if ($upload) {
            $resize_path = $upload_path . $upload;
            $resize = $this->_resize_image($resize_path);
            $data_pengguna = array(
                'id_pengguna' => $this->input->post('idpengguna', true),
                'nama_pengguna' => $this->input->post('namapengguna', true),
                'email_pengguna' => $this->input->post('emailpengguna', true),
                'username' => $this->input->post('username', true),
                'password' => $this->input->post('password', true),
                'id_level_pengguna' => $this->input->post('idlevelpengguna', true),
                'gambar_pengguna' => $upload
            );
            $data = $this->M_pengguna->ubah_pengguna($data_pengguna);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function hapus()
    {
        $id = $this->input->post('idpengguna', true);
        if (!empty($id)) {
            $data = $this->M_pengguna->hapus_pengguna($id);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    protected function _upload_image($path = '', $name = '')
    {
        $config['upload_path'] = $path;
        $config['allowed_types'] = '*';
        $config['encrypt_name'] = true;
        $config['max_size'] = 5000;
        $this->load->library('upload', $config);
        $this->upload->do_upload($name);
        $gbr = $this->upload->data();
        return $gbr['file_name'];
    }
    protected function _resize_image($path)
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $path;
        $config['quality'] = '60%';
        $config['width'] = 300;
        $config['height'] = 300;
        $config['maintain_ratio'] = false;
        $config['create_thumb'] = false;
        $config['new_image'] = $path;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }

    /* Menu Pengaturan Hak Akses Pengguna */

    public function hak_akses()
    {
        $content = 'pengguna/hak_akses_pengguna/v_list_hak_akses_pengguna';
        $this->template->load('template', $content);
    }
    public function data_hak_akses()
    {
        $levelpengguna = $this->input->get('idlevelpengguna');
        $data = $this->M_menu->get_all_menu();
        $no = 1;
        foreach ($data as $menu) {
            echo "<tr>
                <td>" . $no . "</td>
                <td>" . $menu->nama_menu . "</td>
                <td>" . $menu->link_menu . "</td>
                <td align='center'><input type='checkbox' class='item-menu' data-menu='" . $menu->id_menu . "' " . $this->check_hak_akses($levelpengguna, $menu->id_menu) . "></td>
                </tr>";
            $no++;
        }
    }
    public function tambah_hak_akses()
    {
        $levelpengguna = $this->input->get('idlevelpengguna');
        $idmenu = $this->input->get('idmenu');
        $data = array(
            'id_level_pengguna' => $levelpengguna,
            'id_menu' => $idmenu
        );
        $hakAkses = $this->M_hak_akses->get_hak_akses_pengguna($data);
        if ($hakAkses->num_rows() < 1) {
            $insert = $this->M_hak_akses->tambah_hak_akses_pengguna($data);
        } else {
            $delete = $this->M_hak_akses->hapus_hak_akses_pengguna($data);
        }
    }
    public function check_hak_akses($levelpengguna, $idmenu)
    {
        $data = array('id_level_pengguna' => $levelpengguna, 'id_menu' => $idmenu);
        $query = $this->M_hak_akses->get_hak_akses_pengguna($data);
        if ($query->num_rows() > 0) {
            return "checked";
        }
    }
}