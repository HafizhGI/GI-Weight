<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->sess_id = $this->session->userdata('name');
    }

    public function index()
    {
        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('template/auth_footer');
        } else {
            $this->_login(); //panggil method login dibawah
        }
    }


    function login()
    {

        $name = $this->input->post('name');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['name' => $name])->row_array();

        // var_dump($user);
        // die;
        if ($user !== 'NULL') {
            //user ditemukan
            if (password_verify($password, $user['password'])) {
                //password benar, simpan ke session
                $data = [
                    'name' => $user['name'],
                    'password' => $user['password'] ?? null
                ];
                $this->session->set_userdata($data);
                redirect('Dashboard/index_dashboard'); //arahkan ke halaman setelah login 
            } else {
                //password salah
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
                redirect('Auth/index');
            }
        } else {
            //user tidak ditemukan
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User not Found!</div>');
            redirect('Auth/index', 'refresh');
        }
    }

    public function registration()
    {
        $this->form_validation->set_rules('name', 'name', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]', [
            'min_lenght' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'confirm password', 'required|trim|matches[password1]', [
            'matches' => 'Password don\'t match!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'User Registration';
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('template/auth_footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT)
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please Login!</div>');
            redirect('auth');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('password');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been Logged Out!</div>');
        redirect('auth');
    }
}
