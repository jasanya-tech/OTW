<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_transaksi extends CI_Controller {

	public function index()
	{
		$this->load->view('layouts/head');
		$this->load->view('admin/detail transaksi/index');
		$this->load->view('layouts/footer');
	}
   
}
