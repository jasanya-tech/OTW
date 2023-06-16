<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tiket_model', 'tiket');
        $this->load->model('jenis_pembayaran', 'metode');
        $this->load->model('Transaksi_model', 'transaksi');
    }

    public function index()
    {
        if ($this->session->userdata('login')) {
            if ($this->session->userdata('tipe_user') == 'Admin') {
                $data['transaksi'] = $this->transaksi->read_all();
                $data['title'] = 'Data Transaksi Tiket OTW';

                $this->load->view('layouts/head', $data);
                $this->load->view('admin/transaksi/index');
                $this->load->view('layouts/footer');
            } else {
                redirect('home');
            }
        } else {
            redirect('auth');
        }
    }

    public function uploadBukti()
    {
        $buktiBayar = $_FILES['bukti_bayar']['name'];

        if ($buktiBayar) {
            $config['upload_path'] = './assets/img/bukti';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size']     = '2048';
            $config['file_name']     = 'bukti_' . time();

            $this->load->library('upload', $config);

            if ($this->upload->do_upload("bukti_bayar")) {

                $this->db->set('bukti_bayar', $this->upload->data('file_name'));
                $this->db->where('id_transaksi', $this->input->post('id_transaksi'));
                $this->db->update('detail_transaksi');

                redirect('home/transaksi');
            } else {
                echo $this->upload->display_errors();
            }
        }
    }

    public function create()
    {
        if ($this->session->userdata('login')) {
            $this->form_validation->set_rules('qty', 'Qty', 'trim|required');
            $this->form_validation->set_rules('tanggal_kunjungan', 'Tanggal kunjungan', 'trim|required');
            $this->form_validation->set_rules('Id_MP', 'Metode pembayaran', 'trim|required');

            if ($this->form_validation->run() == false) {
                $data['title'] = 'Daftar tiket';
                $data['tikets'] = $this->tiket->read_all();
                $data['metode_pembayaran'] = $this->metode->read_all();

                $this->load->view('layouts/guest/head', $data);
                $this->load->view('layouts/guest/navbar');
                $this->load->view('tiket');
                $this->load->view('layouts/guest/footer');
            } else {
                $qty = $this->input->post('qty');
                $harga = $this->input->post('harga');
                $id_mp = $this->input->post('Id_MP');
                $id_tiket = $this->input->post('id_tiket');
                $tanggal_kunjungan = $this->input->post('tanggal_kunjungan');
                $total = $qty * $harga;

                $data_transaksi = [
                    'qty' => $qty,
                    'Total' => $total,
                    'Tanggal_transaksi' => date('d-m-Y'),
                    'Id_pengunjung' => $this->session->userdata('id_pengunjung'),
                    'Id_MP' => $id_mp,
                    'Id_admin' => 1,
                    'id_tiket' => $id_tiket,
                ];

                $this->db->insert('transaksi', $data_transaksi);
                $detail_transaksi = [
                    'id_transaksi' => $this->db->insert_id(),
                    'tanggal_kunjungan' => $tanggal_kunjungan,
                ];

                $this->db->insert('detail_transaksi', $detail_transaksi);

                redirect('home/transaksi');
            }
        } else {
            $this->session->set_flashdata("message", '<div class="alert alert-danger alert-dismissible fade show" role="alert">Login Dulu<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect("auth");
        }
    }

    public function konfirmasi()
    {
        $this->db->set('status', 'Terkonfirmasi');
        $this->db->set('Id_admin', $this->session->userdata('id_admin'));
        $this->db->where('Id_transaksi', $this->input->post('id_transaksi'));
        $this->db->update('transaksi');

        redirect('transaksi');
    }
}
