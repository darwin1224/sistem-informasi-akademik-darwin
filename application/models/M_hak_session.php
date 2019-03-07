<?php

class M_hak_session extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_hak_session()
    {
        if ($this->session->userdata('status') != true) {
            $url = base_url();
            redirect($url);
        }
    }
    public function get_hak_session_admin()
    {
        if ($this->session->userdata('level') != 1) {
            $url = base_url();
            redirect($url);
        }
    }
    public function get_hak_session_guru()
    {
        if ($this->session->userdata('level') != 2) {
            $url = base_url();
            redirect($url);
        }
    }
}