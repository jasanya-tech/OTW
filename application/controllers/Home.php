<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function index()
	{
		$this->load->view('home');
	}
	public function fasilitas()
	{
		$this->load->view('fasilitas');
	}
	public function tentangKami()
	{
		$this->load->view('tentang-kami');
	}
}
