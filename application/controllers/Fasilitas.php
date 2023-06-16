<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fasilitas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Fasilitas_model', 'fasilitas');
		is_login();
    }

    public function index()
    {
        $data['fasilities'] = $this->fasilitas->read_all();

        $this->load->view('layouts/head');
        $this->load->view('admin/fasilitas/index', $data);
        $this->load->view('layouts/footer');
    }

    public function create()
    {
        $this->form_validation->set_rules('title', 'Title', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layouts/head');
            $this->load->view('admin/fasilitas/create');
            $this->load->view('layouts/footer');
        } else {
            $image = $_FILES['image']['name'];

            if ($image) {
                $config['upload_path'] = './assets/img/fasilitas';
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['file_name']     = 'fasilitas_' . time();
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload("image")) {
                    $data = [
                        'title' => htmlspecialchars($this->input->post('title', true)),
                        'image' =>  $this->upload->data('file_name'),
                    ];
                    $this->db->insert('fasilitas', $data);
                    $this->session->set_flashdata('alert', alert('success', 'Fasilitas berhasil di buat'));
                    redirect('fasilitas');
                } else {
                    echo $this->upload->display_errors();
                }
            }
        }
    }

    public function update($fasilitasId)
    {
        if ($fasilitasId) {
            $this->form_validation->set_rules('title', 'Title', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $data['fasility'] = $this->fasilitas->read_by_id($fasilitasId);
                $this->load->view('layouts/head', $data);
                $this->load->view('admin/fasilitas/update');
                $this->load->view('layouts/footer');
            } else {
                $image = $_FILES['image']['name'];
                if ($image) {
                    $config['upload_path'] = './assets/img/jenis pembayaran';
                    $config['allowed_types'] = 'jpeg|jpg|png';
                    $config['file_name']     = 'fasilitas_' . time();
                    $config['max_size']     = '2048';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('image')) {
                        $oldLogo = $this->input->post('old_image');
                        unlink(FCPATH . 'assets/img/jenis pembayaran/' . $oldLogo);
                        $newImage = $this->upload->data('file_name');
                        $this->db->set('image', $newImage);
                    } else {
                        echo $this->upload->display_errors();
                    }
                }
                $this->db->set('title', htmlspecialchars($this->input->post('title', true)));
                $this->db->where('fasilitas_id', $fasilitasId);
                $this->db->update('fasilitas');

                $this->session->set_flashdata('alert', alert('success', 'Fasilitas berhasil di update'));
                redirect('fasilitas');
            }
        } else {
            redirect('fasilitas');
        }
    }

    public function delete($faslitasId)
    {
        $fasilitas = $this->fasilitas->read_by_id($faslitasId);
        unlink(FCPATH . 'assets/img/fasilitas/' . $fasilitas->image);
        $this->db->where('fasilitas_id', $faslitasId);
        $this->db->delete('fasilitas');
        $this->session->set_flashdata('alert', alert('success', 'Fasilitas berhasil di hapus'));
        redirect('fasilitas');
    }
}
