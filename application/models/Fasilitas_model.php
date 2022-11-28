<?php
class Fasilitas_model extends CI_Model
{

    public $image;
    public $title;

    public function read_all()
    {
        return $this->db->get('fasilitas')->result();
    }
    public function create($fasilitas)
    {
        $this->image = $fasilitas['image'];
        $this->title = $fasilitas['title'];
        $this->db->insert('fasilitas', $this);
    }

    public function read_by_id($fasilitasId)
    {
        return $this->db->get_where('fasilitas', ['fasilitas_id' => $fasilitasId])->row();
    }

    public function update($fasilitas)
    {

        $this->Jenis_pembayaran = $fasilitas['Jenis_pembayaran'];
        $this->No_account = $fasilitas['No_account'];
        $this->Logo = $fasilitas['Logo'];
        // $this->db->update('Metode_pembayaran', $this, ['Metode_pembayaran' = $data['Metode_pembayaran']]);
    }

    public function delete($Metode_pembayaran)
    {
        // $this->db->delete('Metode_pembayaran', ['Metode_pembayaran' = $Metode_pembayaran]);
    }
}
