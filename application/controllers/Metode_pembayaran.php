<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Metode_pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('jenis_pembayaran', 'metode');
		is_login();
    }

    public function index()
    {
        $data['metode_pembayaran'] = $this->metode->read_all();

        $this->load->view('layouts/head');
        $this->load->view('admin/metode_pembayaran/index', $data);
        $this->load->view('layouts/footer');
    }

    public function create()
    {
        $this->form_validation->set_rules('jenis_pembayaran', 'Jenis Pembayaran', 'trim|required');
        $this->form_validation->set_rules('no_account', 'No Account', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layouts/head');
            $this->load->view('admin/metode_pembayaran/create');
            $this->load->view('layouts/footer');
        } else {
            $logo = $_FILES['logo']['name'];

            if ($logo) {
                $config['upload_path'] = './assets/img/jenis pembayaran';
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload("logo")) {
                    $data = [
                        'jenis_pembayaran' => htmlspecialchars($this->input->post('jenis_pembayaran', true)),
                        'no_account' => $this->input->post('no_account'),
                        'logo' => $logo,
                    ];

                    $this->db->insert('metode_pembayaran', $data);
                    $this->session->set_flashdata('alert', alert('success', 'Metode pembayaran berhasil di buat'));
                    redirect('metode_pembayaran');
                } else {
                    echo $this->upload->display_errors();
                }
            }
        }
    }

    public function update($metodeId)
    {
        if ($metodeId) {
            $this->form_validation->set_rules('jenis_pembayaran', 'Jenis Pembayaran', 'required|trim');
            $this->form_validation->set_rules('no_account', 'No account', 'required|trim');

            if ($this->form_validation->run() == FALSE) {
                $data['metode_pembayaran'] = $this->metode->read_by_id($metodeId);

                $this->load->view('layouts/head', $data);
                $this->load->view('admin/metode_pembayaran/update');
                $this->load->view('layouts/footer');
            } else {
                $logo = $_FILES['logo']['name'];

                if ($logo) {
                    $config['upload_path'] = './assets/img/jenis pembayaran';
                    $config['allowed_types'] = 'jpeg|jpg|png';
                    $config['max_size']     = '2048';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('logo')) {
                        $oldLogo = $this->input->post('oldLogo');
                        unlink(FCPATH . 'assets/img/jenis pembayaran/' . $oldLogo);

                        $newLogo = $this->upload->data('file_name');
                        $this->db->set('logo', $newLogo);
                    } else {
                        echo $this->upload->display_errors();
                    }
                }

                $this->db->set('jenis_pembayaran', htmlspecialchars($this->input->post('jenis_pembayaran', true)));
                $this->db->set('no_account', $this->input->post('no_account'));
                $this->db->where('id_MP', $metodeId);
                $this->db->update('metode_pembayaran');
                $this->session->set_flashdata('alert', alert('success', 'Metode pembayaran berhasil di update'));
                redirect('metode_pembayaran');
            }
        } else {
            redirect('metode_pembayaran');
        }
    }

    public function delete($metodeId)
    {
        $metode = $this->metode->read_by_id($metodeId);
        unlink(FCPATH . 'assets/img/jenis pembayaran/' . $metode->logo);

        $this->db->where('id_MP', $metodeId);
        $this->db->delete('metode_pembayaran');

        $this->session->set_flashdata('alert', alert('success', 'Metode pembayaran berhasil di hapus'));
        redirect('metode_pembayaran');
    }
}
