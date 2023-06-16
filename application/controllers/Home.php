<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tiket_model', 'tiket');
		$this->load->model('jenis_pembayaran', 'metode');
		$this->load->model('Transaksi_model', 'transaksi');
		$this->load->model('Fasilitas_model', 'fasilitas');
	}

	public function index()
	{
		$data['title'] = 'Home';
		$data['fasilities'] = $this->fasilitas->read_all();
		$this->load->view('layouts/guest/head', $data);
		$this->load->view('layouts/guest/navbar');
		$this->load->view('home');
		$this->load->view('layouts/guest/footer');
	}
	public function fasilitas()
	{
		$data['title'] = 'Home';
		$data['fasilities'] = $this->fasilitas->read_all();
		$this->load->view('layouts/guest/head', $data);
		$this->load->view('layouts/guest/navbar');
		$this->load->view('fasilitas');
		$this->load->view('layouts/guest/footer');
	}
	public function tentangKami()
	{
		$this->load->view('tentang-kami');
	}

	public function tiket()
	{
		$data['tikets'] = $this->tiket->read_all();
		$data['metode_pembayaran'] = $this->metode->read_all();
		$data['title'] = 'Daftar tiket';

		$this->load->view('layouts/guest/head', $data);
		$this->load->view('layouts/guest/navbar');
		$this->load->view('tiket');
		$this->load->view('layouts/guest/footer');
	}

	public function transaksi($transaksiId = null)
	{
		if ($transaksiId) {
			$data['transaksi'] = $this->transaksi->read_by_id($transaksiId);
			$data['title'] = 'Detail Transaksi';

			if (!$data['transaksi']) {
				return redirect('home/transaksi');
			}

			$this->load->view('layouts/guest/head', $data);
			$this->load->view('layouts/guest/navbar');
			$this->load->view('transaksi/detail');
			$this->load->view('layouts/guest/footer');
		} else {
			$data['transaksi'] = $this->transaksi->read_by_id_pengunjung($this->session->userdata('id_pengunjung'));
			$data['title'] = 'Daftar Transaksi';

			$this->load->view('layouts/guest/head', $data);
			$this->load->view('layouts/guest/navbar');
			$this->load->view('transaksi/index');
			$this->load->view('layouts/guest/footer');
		}
	}
}
