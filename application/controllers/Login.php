<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_login', 'M_guru', 'M_walikelas'));
    }
    public function index()
    {
        $this->load->view('v_login');
    }
    public function auth()
    {
        $output = array('error' => false);

        $username = $this->input->post('username', true);
        $password = md5($this->input->post('password', true));

        $checklogin = $this->M_login->check_login($username, $password);
        $checkloginguru = $this->M_guru->check_login($username, $password);
        $checkloginwalikelas = $this->M_walikelas->check_login($username, $password);

        if ($checklogin->num_rows() > 0) {
            $row = $checklogin->row_array();
            if ($row['id_level_pengguna'] == '1') {
                $sess = array(
                    'id' => $row['id_pengguna'],
                    'nama' => $row['nama_pengguna'],
                    'email' => $row['email_pengguna'],
                    'username' => $row['username'],
                    'password' => $row['password'],
                    'gambar' => $row['gambar_pengguna'],
                    'level' => $row['id_level_pengguna'],
                    'status' => true
                );
                $output['level'] = 1;
                $this->session->set_userdata($sess);
            } else {
                $sess = array(
                    'id' => $row['id_pengguna'],
                    'nama' => $row['nama_pengguna'],
                    'email' => $row['email_pengguna'],
                    'username' => $row['username'],
                    'password' => $row['password'],
                    'gambar' => $row['gambar_pengguna'],
                    'level' => $row['id_level_pengguna'],
                    'status' => true
                );
                $output['level'] = 4;
                $this->session->set_userdata($sess);
            }
            $output['message'] = 'Logging In. Harap Tunggu...';
        } elseif ($checkloginwalikelas->num_rows() > 0) {
            $row = $checkloginwalikelas->row_array();
            $sess = array(
                'id' => $row['id_guru'],
                'nama' => $row['nama_guru'],
                'gender' => $row['jenis_kelamin_guru'],
                'agama' => $row['id_agama'],
                'gambar' => $row['gambar_guru'],
                'username' => $row['username'],
                'password' => $row['password'],
                'level' => 3,
                'status' => true
            );
            $output['level'] = 3;
            $this->session->set_userdata($sess);

            $output['message'] = 'Logging In. Harap Tunggu...';
        } elseif ($checkloginguru->num_rows() > 0) {
            $row = $checkloginguru->row_array();
            $sess = array(
                'id' => $row['id_guru'],
                'nama' => $row['nama_guru'],
                'gender' => $row['jenis_kelamin_guru'],
                'agama' => $row['id_agama'],
                'gambar' => $row['gambar_guru'],
                'username' => $row['username'],
                'password' => $row['password'],
                'level' => 2,
                'status' => true
            );
            $output['level'] = 2;
            $this->session->set_userdata($sess);

            $output['message'] = 'Logging In. Harap Tunggu...';
        } else {
            $output['error'] = true;
            $output['message'] = 'Username atau Password salah!';
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
    public function logout()
    {
        $this->session->sess_destroy();
        $url = base_url();
        redirect($url);
    }
}