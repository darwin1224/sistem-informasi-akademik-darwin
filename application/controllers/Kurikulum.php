<?php

class Kurikulum extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_kurikulum', 'M_mapel', 'M_jurusan', 'M_ruangan', 'M_hak_session'));
        $this->M_hak_session->get_hak_session();
        $this->M_hak_session->get_hak_session_admin();
    }
    public function index()
    {
        $content = 'kurikulum/v_list_kurikulum';
        $this->template->load('template', $content);
    }
    public function data_kurikulum()
    {
        $list = $this->M_kurikulum->get_all_kurikulum();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->nama_kurikulum;
            if ($field->status_kurikulum == 'Aktif')
            $row[] = '<small class="label label-warning">' . $field->status_kurikulum . '</small>';
            elseif ($field->status_kurikulum == 'Tidak Aktif')
            $row[] = '<small class="label label-danger">' . $field->status_kurikulum . '</small>';
            $row[] = '<a class="btn btn-warning btn-sm item-ubah" style="margin-right:5px" data-toggle="modal" data-target="#Modalubah" data-id="' . $field->id_kurikulum . '"><span class="fa fa-edit"></span></a><a class="btn btn-success btn-sm item-detail" style="margin-right:5px" href="' . base_url('kurikulum/detail/' . $field->id_kurikulum) . '"><span class="fa fa-eye"></span></a><a class="btn btn-danger btn-sm item-hapus" data-toggle="modal" data-target="#Modalhapus" data-id="' . $field->id_kurikulum . '"><span class="fa fa-trash"></span></a>';
            $data[] = $row;
        }
        $output = array(
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->M_kurikulum->count_all(),
            'recordsFiltered' => $this->M_kurikulum->count_filtered(),
            'data' => $data,
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
    public function get_kurikulum()
    {
        $id = $this->input->get('idkurikulum');
        if (!empty($id)) {
            $data = $this->M_kurikulum->get_kurikulum_by_id($id);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function tambah()
    {
        $data_kurikulum = array(
            'nama_kurikulum' => $this->input->post('namakurikulum', true),
            'status_kurikulum' => $this->input->post('statuskurikulum', true)
        );
        $data = $this->M_kurikulum->tambah_kurikulum($data_kurikulum);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function ubah()
    {
        $data_kurikulum = array(
            'id_kurikulum' => $this->input->post('idkurikulum', true),
            'nama_kurikulum' => $this->input->post('namakurikulum', true),
            'status_kurikulum' => $this->input->post('statuskurikulum', true)
        );
        $data = $this->M_kurikulum->ubah_kurikulum($data_kurikulum);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function hapus()
    {
        $id = $this->input->post('idkurikulum', true);
        if (!empty($id)) {
            $data = $this->M_kurikulum->hapus_kurikulum($id);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    // Kurikulum Detail

    public function detail($id)
    {
        $content = 'kurikulum/kurikulum_detail/v_list_kurikulum_detail';
        $this->template->load('template', $content);
        // return $id;
    }
    public function data_detail($id)
    {
        $list = $this->M_kurikulum->get_all_kurikulum_detail_by_id($id);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->id_mapel;
            $row[] = $field->nama_mapel;
            $row[] = $field->nama_jurusan;
            $row[] = $field->nama_ruangan;
            $row[] = '<a class="btn btn-warning btn-sm item-ubah" style="margin-right:5px" data-toggle="modal" data-target="#Modalubah" data-id="' . $field->id_kurikulum_detail . '"><span class="fa fa-edit"></span></a><a class="btn btn-danger btn-sm item-hapus" data-toggle="modal" data-target="#Modalhapus" data-id="' . $field->id_kurikulum_detail . '"><span class="fa fa-trash"></span></a>';
            $data[] = $row;
        }
        $output = array(
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->M_kurikulum->count_all_detail($id),
            'recordsFiltered' => $this->M_kurikulum->count_filtered_detail($id),
            'data' => $data,
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
    public function get_detail()
    {
        $id = $this->input->get('idkurikulumdetail');
        if (!empty($id)) {
            $data = $this->M_kurikulum->get_kurikulum_detail_by_id($id);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function data_select_detail()
    {
        $data = $this->M_kurikulum->select_kurikulum();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function data_jurusan()
    {
        $data = $this->M_jurusan->select_jurusan();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function data_mapel()
    {
        $data = $this->M_mapel->select_mapel();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function data_ruangan()
    {
        $data = $this->M_ruangan->select_ruangan();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function tambah_detail()
    {
        $data_kurikulum_detail = array(
            'id_kurikulum' => $this->input->post('idkurikulum', true),
            'id_mapel' => $this->input->post('idmapel', true),
            'id_jurusan' => $this->input->post('idjurusan', true),
            'id_ruangan' => $this->input->post('idruangan', true)
        );
        $data = $this->M_kurikulum->tambah_kurikulum_detail($data_kurikulum_detail);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function ubah_detail()
    {
        $data_kurikulum_detail = array(
            'id_kurikulum_detail' => $this->input->post('idkurikulumdetail', true),
            'id_kurikulum' => $this->input->post('idkurikulum', true),
            'id_mapel' => $this->input->post('idmapel', true),
            'id_jurusan' => $this->input->post('idjurusan', true),
            'id_ruangan' => $this->input->post('idruangan', true)
        );
        $data = $this->M_kurikulum->ubah_kurikulum_detail($data_kurikulum_detail);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function hapus_detail()
    {
        $id = $this->input->post('idkurikulumdetail', true);
        if (!empty($id)) {
            $data = $this->M_kurikulum->hapus_kurikulum_detail($id);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function filter_detail()
    {
        $id = 1;
        $jurusan = $this->input->post('idjurusan');
        $ruangan = $this->input->post('idruangan');
        if (empty($jurusan) || empty($ruangan)) {
            $data = $this->M_kurikulum->filter_kurikulum_detail_tanpa_jurusan_or_ruangan($id, $jurusan, $ruangan);
        } else {
            $data = $this->M_kurikulum->filter_kurikulum_detail($id, $jurusan, $ruangan);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}