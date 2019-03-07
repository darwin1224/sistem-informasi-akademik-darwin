<?php

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_guru', 'M_agama', 'M_hak_session', 'M_tahunakademik', 'M_kurikulum'));
        $this->M_hak_session->get_hak_session();
        $this->M_hak_session->get_hak_session_admin();
    }
    public function index()
    {
        $content = 'guru/v_list_guru';
        $this->template->load('template', $content);
    }
    public function data_guru()
    {
        $list = $this->M_guru->get_all_guru();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->id_guru;
            $row[] = '<img src="' . base_url("assets/images/" . $field->gambar_guru) . '" class="img-circle" width="40" height="40">';
            $row[] = $field->nama_guru;
            $row[] = $field->jenis_kelamin_guru;
            $row[] = $field->nama_agama;
            $row[] = $field->username;
            $row[] = '<a class="btn btn-warning btn-sm item-ubah" style="margin-right:5px" data-toggle="modal" data-target="#Modalubah" data-id="' . $field->id_guru . '"><span class="fa fa-edit"></span></a><a class="btn btn-danger btn-sm item-hapus" data-toggle="modal" data-target="#Modalhapus" data-id="' . $field->id_guru . '"><span class="fa fa-trash"></span></a>';
            $data[] = $row;
        }
        $output = array(
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->M_guru->count_all(),
            'recordsFiltered' => $this->M_guru->count_filtered(),
            'data' => $data,
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
    public function get_guru()
    {
        $id = $this->input->get('idguru');
        if (!empty($id)) {
            $data = $this->M_guru->get_guru_by_id($id);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function data_agama()
    {
        $data = $this->M_agama->get_all_agama();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function tambah()
    {
        $upload_path = './assets/images/';
        $gambar = 'gambarguru';
        $upload = $this->_upload_image($upload_path, $gambar);
        if ($upload) {
            $resize_path = $upload_path . $upload;
            $resize = $this->_resize_image($resize_path);
            $data_guru = array(
                'id_guru' => $this->input->post('idguru', true),
                'nama_guru' => $this->input->post('namaguru', true),
                'jenis_kelamin_guru' => $this->input->post('jeniskelaminguru', true),
                'id_agama' => $this->input->post('idagama', true),
                'gambar_guru' => $upload,
                'username' => $this->input->post('username', true),
                'password' => md5($this->input->post('password', true))
            );
            $data = $this->M_guru->tambah_guru($data_guru);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function ubah()
    {
        $upload_path = './assets/images/';
        $gambar = 'gambarguru';
        $upload = $this->_upload_image($upload_path, $gambar);
        if ($upload) {
            $resize_path = $upload_path . $upload;
            $resize = $this->_resize_image($resize_path);
            $data_guru = array(
                'id_guru' => $this->input->post('idguru', true),
                'nama_guru' => $this->input->post('namaguru', true),
                'jenis_kelamin_guru' => $this->input->post('jeniskelaminguru', true),
                'id_agama' => $this->input->post('idagama', true),
                'gambar_guru' => $upload,
            );
            $data = $this->M_guru->ubah_guru($data_guru);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function hapus()
    {
        $id = $this->input->post('idguru');
        if (!empty($id)) {
            $data['hapus'] = $this->M_guru->hapus_guru($id);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function get_id_guru()
    {
        $sql = "SELECT MAX(RIGHT(id_guru,3)) as kd_guru from tbl_guru";
        $query = $this->db->query($sql);
        $kd = '';
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $k) {
                $tmp = ((int)$k->kd_guru) + 1;
                $kd = sprintf('%03s', $tmp);
            }
        } else {
            $kd = '001';
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($kd));
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
}