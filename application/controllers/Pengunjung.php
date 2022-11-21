<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengunjung extends CI_Controller {

	public function index()
	{
        $this->load->view('layouts/head');
		$this->load->view('admin/pengunjung/index');
        $this->load->view('layouts/footer');
	}
    public function update()
    {
        $this->load->view('admin/pengunjung/update');
    }
    public function delete()
    {
        echo "Fitur delete pengunjung";
    }
}
