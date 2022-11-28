<?php
class Jenis_pembayaran extends CI_Model
{

    public $Jenis_pembayaran;
    public $No_account;
    public $Logo;

    public function read_all()
    {
        return $query = $this->db->get('Metode_pembayaran')->result();
    }
    public function create($data)
    {
        $this->Jenis_pembayaran = $data['Jenis_pembayaran'];
        $this->No_account = $data['No_account'];
        $this->Logo = $data['Logo'];
        $this->db->insert('Metode_pembayaran', $this);
    }

    public function read_by_id($metodeId)
    {
        return $this->db->get_where('metode_pembayaran', ['id_MP' => $metodeId])->row();
    }

    public function update($data)
    {
        $this->Jenis_pembayaran = $data['Jenis_pembayaran'];
        $this->No_account = $data['No_account'];
        $this->Logo = $data['Logo'];
        $this->db->update('Metode_pembayaran', $this, ['Metode_pembayaran' => $data['id_MP']]);
    }

    public function delete($Metode_pembayaran)
    {
        // $this->db->delete('Metode_pembayaran', ['Metode_pembayaran' = $Metode_pembayaran]);
    }
}
