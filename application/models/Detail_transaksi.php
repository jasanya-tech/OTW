<?php
class Detail_transaksi extends CI_Model
{

    public $tanggal_kunjungan;
    public $Id_transaksi;
    public $Id_tiket;

    public function read_all()
    {
        return $query = $this->db->get('admin')->result();
    }
    public function create($data)
    {
        $this->tanggal_kunjungan = $data['tanggal_kunjungan'];
        $this->Id_transaksi = $data['Id_transaksi'];
        $this->Id_tiket = $data['Id_tiket'];
        $this->db->insert('Detail', $this);
    }

    public function update($data)
    {
        $this->tanggal_kunjungan = $data['tanggal_kunjungan'];
        $this->Id_transaksi = $data['Id_transaksi'];
        $this->Id_tiket = $data['Id_tiket'];
        $this->db->update('Detail', $this, ['Detail' => $data['Detail']]);
    }
}
