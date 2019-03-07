<?php

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_siswa', 'M_agama', 'M_golongan', 'M_walikelas', 'M_hak_session', 'M_tahunakademik', 'M_kurikulum'));
        $this->M_hak_session->get_hak_session();
    }
    public function index()
    {
        if ($this->session->userdata('level') == 3) {
            $content = 'siswa/siswa_guru/v_list_siswa_guru';
            $this->template->load('template', $content);
        } else {
            $content = 'siswa/v_list_siswa';
            $this->template->load('template', $content);
        }
    }
    public function data_siswa()
    {
        $list = $this->M_siswa->get_all_siswa();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->id_siswa;
            $row[] = '<img src="' . base_url("assets/images/" . $field->gambar_siswa) . '" class="img-circle" width="40" height="40">';
            $row[] = $field->nama_siswa;
            $row[] = $field->jenis_kelamin_siswa;
            $row[] = $field->tempat_lahir_siswa . ', ' . $field->tanggal_lahir_siswa;
            $row[] = $field->nama_agama;
            $row[] = $field->nama_golongan;
            $row[] = $field->nama_guru;
            $row[] = '<a class="btn btn-warning btn-sm item-ubah" style="margin-right:5px" data-toggle="modal" data-target="#Modalubah" data-id="' . $field->id_siswa . '"><span class="fa fa-edit"></span></a><a class="btn btn-danger btn-sm item-hapus" data-toggle="modal" data-target="#Modalhapus" data-id="' . $field->id_siswa . '"><span class="fa fa-trash"></span></a>';
            $data[] = $row;
        }
        $output = array(
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->M_siswa->count_all(),
            'recordsFiltered' => $this->M_siswa->count_filtered(),
            'data' => $data,
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
    public function data_siswa_guru()
    {
        $data = $this->M_siswa->get_all_siswa_by_golongan_dan_walikelas();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function get_siswa()
    {
        $id = $this->input->get('idsiswa');
        if (!empty($id)) {
            $data = $this->M_siswa->get_siswa_by_id($id);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function data_agama()
    {
        $data = $this->M_agama->get_all_agama();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function data_walikelas()
    {
        $data = $this->M_walikelas->get_nama_walikelas();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function data_golongan()
    {
        $data = $this->M_golongan->select_golongan();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function tambah()
    {
        $upload_path = './assets/images/';
        $gambar = 'gambarsiswa';
        $upload = $this->_upload_image($upload_path, $gambar);
        if ($upload) {
            $resize_path = $upload_path . $upload;
            $resize = $this->_resize_image($resize_path);
            $data_siswa = array(
                'id_siswa' => $this->input->post('idsiswa', true),
                'nama_siswa' => $this->input->post('namasiswa', true),
                'jenis_kelamin_siswa' => $this->input->post('jeniskelaminsiswa', true),
                'tanggal_lahir_siswa' => $this->input->post('tanggallahirsiswa', true),
                'tempat_lahir_siswa' => $this->input->post('tempatlahirsiswa', true),
                'id_agama' => $this->input->post('idagama', true),
                'gambar_siswa' => $upload,
                'id_golongan' => $this->input->post('idgolongan', true),
                'id_tahun_akademik' => $this->input->post('idtahunakademik', true),
                'id_kurikulum' => $this->input->post('idkurikulum', true),
                'id_walikelas' => $this->input->post('idwalikelas', true)
            );
            $data = $this->M_siswa->tambah_siswa($data_siswa);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function ubah()
    {
        $upload_path = './assets/images/';
        $gambar = 'gambarsiswa';
        $upload = $this->_upload_image($upload_path, $gambar);
        if ($upload) {
            $resize_path = $upload_path . $upload;
            $resize = $this->_resize_image($resize_path);
            $data_siswa = array(
                'id_siswa' => $this->input->post('idsiswa', true),
                'nama_siswa' => $this->input->post('namasiswa', true),
                'jenis_kelamin_siswa' => $this->input->post('jeniskelaminsiswa', true),
                'tanggal_lahir_siswa' => $this->input->post('tanggallahirsiswa', true),
                'tempat_lahir_siswa' => $this->input->post('tempatlahirsiswa', true),
                'id_agama' => $this->input->post('idagama', true),
                'gambar_siswa' => $upload,
                'id_golongan' => $this->input->post('idgolongan', true),
                'id_tahun_akademik' => $this->input->post('idtahunakademik', true),
                'id_kurikulum' => $this->input->post('idkurikulum', true),
                'id_walikelas' => $this->input->post('idwalikelas', true)
            );
            $data = $this->M_siswa->ubah_siswa($data_siswa);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function hapus()
    {
        $id = $this->input->post('idsiswa', true);
        if (!empty($id)) {
            $data = $this->M_siswa->hapus_siswa($id);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function get_id_siswa()
    {
        $sql = "SELECT MAX(RIGHT(id_siswa,3)) as kd_siswa from tbl_siswa";
        $query = $this->db->query($sql);
        $kd = '';
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $k) {
                $tmp = ((int)$k->kd_siswa) + 1;
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
        $config['width'] = 160;
        $config['height'] = 160;
        $config['maintain_ratio'] = false;
        $config['create_thumb'] = false;
        $config['new_image'] = $path;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }
}