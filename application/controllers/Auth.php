<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('login')) {
            redirect('/home');
        } else {
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

            if ($this->form_validation->run() == false) {
                $data['title'] = 'User Login';

                $this->load->view('layouts/guest/head', $data);
                $this->load->view('layouts/guest/navbar', $data);
                $this->load->view('auth/guest/login');
            } else {
                $this->_login();
            }
        }
    }

    public function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('pengunjung', ['email' => $email])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'login' => true,
                    'id_pengunjung' => $user['Id_pengunjung'],
                    'nama' => $user['nama'],
                    'email' => $user['email'],
                    'tipe_user' => 'Pengunjung'
                ];

                $this->session->set_userdata($data);

                redirect('/home');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Username / password salah<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Username / password salah<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('auth');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|regex_match[/^[a-zA-Z ]*$/]', [
            'regex_match' => "nama wajib huruf tidak boleh mengandung angka",
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('no_handphone', 'No Handphone', 'required|trim|numeric', [
            'numeric' => "no handphone wajib angka"
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pengunjung.email]', [
            'is_unique' => 'This email has already registered'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password is to short'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'User register';

            $this->load->view('layouts/guest/head', $data);
            $this->load->view('layouts/guest/navbar');
            $this->load->view('auth/guest/register');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'no_handphone' => $this->input->post('no_handphone'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            ];

            $this->db->insert('pengunjung', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Akun berhasil dibuat<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('auth');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('login');
        $this->session->unset_userdata('id_pengunjung');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('tipe_user');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Anda telah logout<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        redirect('auth');
    }
}
