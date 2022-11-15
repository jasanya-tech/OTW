<?php 
class Tiket_model extends CI_Model {

    public $kategori_hari;
    public $harga;
    public $jam_mulai_kunjungan;
    public $jam_selesai_kunjungan;

    
    public function read_all()
    {
        return $query = $this->db->get('tiket')->result();
            
    }
    public function create($data)
    {
        $this->kategori_hari = $data['Kategori_hari'];
        $this->harga = $data['harga'];
        $this->jam_mulai_kunjungan = $data['jam_mulai_kunjungan'];
        $this->jam_selesai_kunjungan= $data['jam_selesai_kunjungan'];
        $this->db->insert('tiket', $this);
    }
    
    public function update($data)
    {
        $this->kategori_hari= $data['kategori_hari'];
        $this->harga = $data['harga'];
        $this->jam_mulai_kunjungan = $data['jam_mulai_kunjungan'];
        $this->jam_selesai_kunjungan = $data['jam_selesai_kunjungan'];
        $this->db->update('tiket', $this, ['Id_tiket' = $data['Id_tiket']]);
    }

    public function delete($Id_tiket)
    {
        $this->db->delete('tiket', ['Id_tiket' = $Id_tiket]);
    }
    
}
