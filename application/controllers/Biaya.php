<?php

class Biaya extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_biaya', 'M_hak_session'));
        $this->M_hak_session->get_hak_session();
    }
    public function index()
    {
        $content = 'biaya/v_list_biaya';
        $this->template->load('template', $content);
    }
    public function data_biaya()
    {
        $list = $this->M_biaya->get_all_biaya();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->nama_jenis_pembayaran;
            $row[] = $field->jumlah_biaya_pembayaran;
            $row[] = '<a class="btn btn-warning btn-sm item-ubah" style="margin-right:5px" data-toggle="modal" data-target="#Modalubah" data-id="' . $field->id_biaya_pembayaran . '"><span class="fa fa-edit"></span></a>';
            $data[] = $row;
        }
        $output = array(
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->M_biaya->count_all(),
            'recordsFiltered' => $this->M_biaya->count_filtered(),
            'data' => $data,
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
    public function get_biaya()
    {
        $id = $this->input->get('idbiayapembayaran');
        if (!empty($id)) {
            $data = $this->M_biaya->get_biaya_by_id($id);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function ubah()
    {
        $data_biaya = array(
            'id_biaya_pembayaran_pembayaran' => $this->input->post('idbiayapembayaran', true),
            'jumlah_biaya_pembayaran' => $this->input->post('jumlahbiayapembayaran', true)
        );
        $data = $this->M_biaya->ubah_biaya($data_biaya);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}