<?php 
class Pengunjung_model extends CI_Model {

    public $nama;
    public $email;
    public $password;
    public $no_handphone;
    public $foto;
    public $jenis_kelamin;

    
    public function read_all()
    {
        return $query = $this->db->get('pengunjung')->result();
            
    }
    public function create($data)
    {
        $this->nama = $data['nama'];
        $this->email = $data['email'];
        $this->password = $data['password'];
        $this->no_handphone = $data['no_handphone'];
        $this->foto = $data['foto'];
        $this->jenis_kelamin = $data['jenis_kelamin'];
        $this->db->insert('pengunjung', $this);
    }
    
    public function update($data)
    {
        $this->nama = $data['nama'];
        $this->email = $data['email'];
        $this->password = $data['password'];
        $this->no_handphone = $data['no_handphone'];
        $this->foto = $data['foto'];
        $this->jenis_kelamin = $data['jenis_kelamin'];
        $this->db->update('pengunjung', $this, ['Id_pengunjung' = $data['Id_pengunjung']]);
    }

    public function delete($Id_pengunjung)
    {
        $this->db->delete('pengunjung', ['Id_pengunjung' = $Id_pengunjung]);
    }
    
}