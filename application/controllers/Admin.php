<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function index()
    {
        $this->load->view('layouts/head');
        $this->load->view('admin/dashboard');
        $this->load->view('layouts/footer');
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
        echo "Fitur delete admin";
    }
}
