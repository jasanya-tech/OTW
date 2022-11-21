<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function index()
	{
		$this->load->view('layouts/head');
		$this->load->view('admin/transaksi/index');
		$this->load->view('layouts/footer');
	}
    public function create()
    {
        $this->load->view('layouts/head');
        $this->load->view('admin/transaksi/create');
        $this->load->view('layouts/footer');
    }
    public function delete()
    {
        echo "Fitur delete transaksi";
    }
}
