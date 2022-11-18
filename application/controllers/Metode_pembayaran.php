<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Metode_pembayaran extends CI_Controller {

	public function index()
	{
		$this->load->view('layouts/head');
		$this->load->view('admin/metode_pembayaran/index');
		$this->load->view('layouts/footer');
	}
    public function create()
    {
        $this->load->view('layouts/head');
        $this->load->view('admin/metode_pembayaran/create');
        $this->load->view('layouts/footer');
    }
    public function update()
    {
        $this->load->view('layouts/head');
        $this->load->view('admin/metode_pembayaran/update');
        $this->load->view('layouts/footer');
    }
    public function delete()
    {
        echo "Fitur delete metode_pembayaran";
    }
}
