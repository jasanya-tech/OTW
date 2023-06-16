<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tiket extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tiket_model', 'tiket');
		is_login();
    }

    public function index()
    {
        if ($this->session->userdata('login')) {
            if ($this->session->userdata('tipe_user') == 'Admin') {
                $data['tikets'] = $this->tiket->read_all();
                $this->load->view('layouts/head', $data);
                $this->load->view('admin/tiket/index');
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
        $this->form_validation->set_rules('kategori_hari', 'kategori_hari', 'required', [
            'required' => 'Kategori hari wajib di isi'
        ]);
        $this->form_validation->set_rules('harga', 'harga', 'required', [
            'required' => 'Harga wajib di isi'
        ]);
        $this->form_validation->set_rules('jam_mulai_kunjungan', 'jam_mulai_kunjungan', 'required', [
            'required' => 'jam mulai kunjungan wajib di isi'
        ]);
        $this->form_validation->set_rules('jam_selesai_kunjungan', 'jam_selesai_kunjungan', 'required', [
            'required' => 'jam selesai kunjungan wajib di isi'
        ]);
        if ($this->form_validation->run() == FALSE) { // jika validasi gagal
            $this->load->view('layouts/head');
            $this->load->view('admin/tiket/create');
            $this->load->view('layouts/footer');
        } else {
            $insert_tiket = $this->tiket->create($_POST);
            if ($insert_tiket) {
                $this->session->set_flashdata('alert', alert('success', 'Tiket berhasil di buat'));
            } else {
                $this->session->set_flashdata('alert', alert('error', 'Tiket gagal di buat'));
            }
            redirect('tiket');
        }
    }
    public function update($Id_tiket = null)
    {
        if ($Id_tiket) {
            $this->form_validation->set_rules('kategori_hari', 'kategori_hari', 'required', [
                'required' => 'Kategori hari wajib di isi'
            ]);
            $this->form_validation->set_rules('harga', 'harga', 'required', [
                'required' => 'Harga wajib di isi'
            ]);
            $this->form_validation->set_rules('jam_mulai_kunjungan', 'jam_mulai_kunjungan', 'required', [
                'required' => 'jam mulai kunjungan wajib di isi'
            ]);
            $this->form_validation->set_rules('jam_selesai_kunjungan', 'jam_selesai_kunjungan', 'required', [
                'required' => 'jam selesai kunjungan wajib di isi'
            ]);

            if ($this->form_validation->run() == FALSE) { // jika validasi gagal
                $data['tiket'] = $this->tiket->read_by_id($Id_tiket);

                $this->load->view('layouts/head', $data);
                $this->load->view('admin/tiket/update');
                $this->load->view('layouts/footer');
            } else {
                $_POST += ['Id_tiket' => $Id_tiket];
                $insert_tiket = $this->tiket->update($_POST);
                if ($insert_tiket) {
                    $this->session->set_flashdata('alert', alert('success', 'Tiket berhasil di update'));
                } else {
                    $this->session->set_flashdata('alert', alert('error', 'Tiket gagal di update'));
                }
                redirect('tiket');
            }
        } else {
            redirect('tiket');
        }
    }
    public function delete($tiketId)
    {
        $this->db->where("id_tiket", $tiketId);
        $this->db->delete("tiket");

        $this->session->set_flashdata('alert', alert('success', 'Tiket berhasil di hapus'));
        redirect("tiket");
    }
}
