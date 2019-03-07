<?php

class M_login extends CI_Model
{
    protected $table = 'tbl_pengguna';

    public function __construct()
    {
        parent::__construct();
    }
    public function check_login($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $user = $this->db->get($this->table);
        return $user;
    }
}