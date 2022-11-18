<?php 
class Admin_model extends CI_Model {

    public $Email;
    public $Nama;
    public $Foto;
    public $Password;
    public $Jenis_kelamin;

    
    public function read_all()
    {
        return $query = $this->db->get('admin')->result();
            
    }
    public function create($data)
    {
        $this->Email = $data['Email'];
        $this->Nama = $data['Nama'];
        $this->Foto = $data['Foto'];
        $this->Password = $data['Password'];
        $this->Jenis_kelamin = $data['Jenis_kelamin'];
        $this->db->insert('admin', $this);
    }
    
    public function update($data)
    {
        $this->Email = $data['Email'];
        $this->Nama = $data['Nama'];
        $this->Foto = $data['Foto'];
        $this->Password = $data['Password'];
        $this->Jenis_kelamin = $data['Jenis_kelamin'];
        $this->db->update('Admin', $this, ['Id_admin' = $data['Id_admin']]);
    }

    public function delete($Id_admin)
    {
        $this->db->delete('Admin', ['Id_admin' = $Id_admin]);
    }
    
}