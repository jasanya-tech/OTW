<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tiket extends CI_Controller {

	public function index()
	{
		$this->load->view('layouts/head');
		$this->load->view('admin/tiket/index');
		$this->load->view('layouts/footer');
	}
    public function create()
    {
        $this->load->view('layouts/head');
        $this->load->view('admin/tiket/create');
        $this->load->view('layouts/footer');
    }
    public function update()
    {
        $this->load->view('layouts/head');
        $this->load->view('admin/tiket/update');
        $this->load->view('layouts/footer');
    }
    public function delete()
    {
        echo "Fitur delete tiket";
    }
}
