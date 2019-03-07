<?php

class Jenis_pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_jenis_pembayaran'));
    }
    public function index()
    {
        $content = 'jenis_pembayaran/v_list_jenis_pembayaran';
        $this->template->load('template', $content);
    }
    public function data_jenis_pembayaran()
    {
        $list = $this->M_jenis_pembayaran->get_all_jenis_pembayaran();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->nama_jenis_pembayaran;
            $row[] = '<a class="btn btn-warning btn-sm item-ubah" style="margin-right:5px" data-toggle="modal" data-target="#Modalubah" data-id="' . $field->id_jenis_pembayaran . '"><span class="fa fa-edit"></span></a><a class="btn btn-danger btn-sm item-hapus" data-toggle="modal" data-target="#Modalhapus" data-id="' . $field->id_jenis_pembayaran . '"><span class="fa fa-trash"></span></a>';
            $data[] = $row;
        }
        $output = array(
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->M_jenis_pembayaran->count_all(),
            'recordsFiltered' => $this->M_jenis_pembayaran->count_filtered(),
            'data' => $data,
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
    public function get_jenis_pembayaran()
    {
        $id = $this->input->get('idjenispembayaran');
        if (!empty($id)) {
            $data = $this->M_jenis_pembayaran->get_jenis_pembayaran_by_id($id);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function tambah()
    {
        $data_jenis_pembayaran = array(
            'nama_jenis_pembayaran' => $this->input->post('namajenispembayaran', true)
        );
        $data = $this->M_jenis_pembayaran->tambah_jenis_pembayaran($data_jenis_pembayaran);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function ubah()
    {
        $data_jenis_pembayaran = array(
            'id_jenis_pembayaran' => $this->input->post('idjenispembayaran', true),
            'nama_jenis_pembayaran' => $this->input->post('namajenispembayaran', true)
        );
        $data = $this->M_jenis_pembayaran->ubah_jenis_pembayaran($data_jenis_pembayaran);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function hapus()
    {
        $id = $this->input->post('idjenispembayaran', true);
        if (!empty($id)) {
            $data = $this->M_jenis_pembayaran->hapus_jenis_pembayaran($id);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}