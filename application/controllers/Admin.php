<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('login')) {
            if ($this->session->userdata('tipe_user') == 'Admin') {
                $tiket = $this->db->query("SELECT * FROM tiket");
                $transaksi = $this->db->query("SELECT * FROM transaksi");
                $customer = $this->db->query("SELECT * FROM pengunjung");

                $data["jumlah_tiket"] = $tiket->num_rows();
                $data["jumlah_transaksi"] = $transaksi->num_rows();
                $data["jumlah_customer"] = $customer->num_rows();

                $this->load->view('layouts/head', $data);
                $this->load->view('admin/dashboard');
                $this->load->view('layouts/footer');
            } else {
                redirect('home');
            }
        } else {
            redirect('auth');
        }
    }
    public function create()
    {
        $this->load->view('layouts/head');
        $this->load->view('admin/admin/create');
        $this->load->view('layouts/footer');
    }
    public function update()
    {
        $this->load->view('layouts/head');
        $this->load->view('admin/admin/update');
        $this->load->view('layouts/footer');
    }
    public function delete()
    {
        echo 'Fitur delete admin';
    }

    public function login()
    {
        if ($this->session->userdata('login')) {
            redirect('/home');
        } else {
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

            if ($this->form_validation->run() == false) {
                $data['title'] = 'Admin Login';

                $this->load->view('layouts/guest/head', $data);
                $this->load->view('layouts/guest/navbar', $data);
                $this->load->view('auth/admin/login');
            } else {
                $this->_login();
            }
        }
    }

    public function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('admin', ['email' => $email])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'login' => true,
                    'id_admin' => $user['Id_admin'],
                    'nama' => $user['nama'],
                    'email' => $user['email'],
                    'tipe_user' => 'Admin'
                ];

                $this->session->set_userdata($data);

                redirect('/admin');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Username / password salah<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                redirect('admin/login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Username / password salah<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('admin/login');
        }
    }

    public function register()
    {
        if ($this->session->userdata('login')) {
            if ($this->session->userdata('tipe_user') == 'Admin') {
                $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
                $this->form_validation->set_rules('jenis_kelamin', 'Jenis kelamin', 'required|trim');
                $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[admin.email]', [
                    'is_unique' => 'This email has already registered'
                ]);
                $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
                    'matches' => 'Password dont match!',
                    'min_length' => 'Password is to short'
                ]);
                $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

                if ($this->form_validation->run() == false) {
                    $data['title'] = 'Admin register';

                    $this->load->view('layouts/guest/head', $data);
                    $this->load->view('layouts/guest/navbar');
                    $this->load->view('auth/admin/register');
                    $this->load->view('layouts/footer');
                } else {
                    $data = [
                        'nama' => htmlspecialchars($this->input->post('nama', true)),
                        'email' => htmlspecialchars($this->input->post('email', true)),
                        'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    ];

                    $this->db->insert('admin', $data);
                    $this->session->set_flashdata("message", '<div class="alert alert-success alert-dismissible fade show" role="alert">Akun admin berhasil dibuat <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                    redirect('admin');
                }
            } else {
                redirect('home');
            }
        } else {
            redirect('auth');
        }
    }
}
