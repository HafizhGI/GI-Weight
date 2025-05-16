<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['password' => $this->session->userdata('password')])->row_array();

        $this->load->view('user/index', $data);
    }
}
