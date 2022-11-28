<?php
class Transaksi_model extends CI_Model
{

    public $qty;
    public $Total;
    public $Tanggal_transaksi;
    public $Id_pengunjung;
    public $Id_MP;
    public $Id_admin;


    public function read_all()
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('tiket', 'tiket.Id_tiket = transaksi.id_tiket');
        $this->db->join('detail_transaksi', 'detail_transaksi.id_transaksi = transaksi.Id_transaksi');

        return $this->db->get()->result();
    }

    public function read_by_id_pengunjung($pengunjungId)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('transaksi.Id_pengunjung', $pengunjungId);
        $this->db->join('tiket', 'tiket.Id_tiket = transaksi.id_tiket');
        $this->db->join('detail_transaksi', 'detail_transaksi.id_transaksi = transaksi.Id_transaksi');

        return $this->db->get()->result();
    }

    public function read_by_id($transaksiId)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->where('transaksi.Id_transaksi', $transaksiId);
        $this->db->join('tiket', 'tiket.Id_tiket = transaksi.id_tiket');
        $this->db->join('metode_pembayaran', 'metode_pembayaran.Id_MP = transaksi.Id_MP');
        $this->db->join('detail_transaksi', 'detail_transaksi.id_transaksi = transaksi.Id_transaksi');

        return $this->db->get()->row();
    }

    public function create($data)
    {
        $this->qty = $data['qty'];
        $this->Total = $data['Total'];
        $this->Tanggal_transaksi = $data['Tanggal_transaksi'];
        $this->Id_pengunjung = $data['Id_pengunjung'];
        $this->Id_MP = $data['Id_MP'];
        $this->Id_admin = $data['Id_admin'];
        $this->db->insert('transaksi', $this);
    }

    public function update($data)
    {
        $this->qty = $data['qty'];
        $this->Total = $data['Total'];
        $this->Tanggal_transaksi = $data['Tanggal_transaksi'];
        $this->Id_pengunjung = $data['Id_pengunjung'];
        $this->Id_MP = $data['Id_MP'];
        $this->Id_admin = $data['Id_admin'];
        $this->db->update('transaksi', $this, ['Id_transaksi' => $data['Id_transaksi']]);
    }

    public function delete($Id_transaksi)
    {
        $this->db->delete('transaksi', ['Id_transaksi' => $Id_transaksi]);
    }
}