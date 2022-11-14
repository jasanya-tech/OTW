<?php 
class Transaksi_model extends CI_Model {

    public $qty;
    public $Total;
    public $Tanggal_transaksi;
    public $Id_pengunjung;
    public $Id_MP;
    public $Id_admin;

    
    public function read_all()
    {
        return $query = $this->db->get('transaksi')->result();
            
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
        $this->db->update('transaksi', $this, ['Id_transaksi' = $data['Id_transaksi']]);
    }

    public function delete($transaksi)
    {
        $this->db->delete('transaksi', ['Id_transaksi' = $Id_transaksi]);
    }
    
}