<?php 
class Mahasiswa_model {

    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswa(){
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaByid($id){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id'); 
        $this->db->bind(':id', $id);
        return $this->db->single(); 
    }


    public function tambahDataMahasiswa($data){
        $query = "INSERT INTO mahasiswa (nama, nrp, email, jurusan)
                  VALUES (:nama, :nrp, :email, :jurusan)";
    
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
    
        $this->db->execute();
    
        return $this->db->rowCount();
    }
    public function hapusDataMahasiswa($id){
        $query = "DELETE FROM mahasiswa WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();   
    }


    public function ubahDataMahasiswa($data){
        $query = "UPDATE mahasiswa SET 
                       nama = :nama,
                       nrp = :nrp,
                       email = :email,
                       jurusan = :jurusan
                       WHERE id = :id";
    
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('id', $data['id']);
    
        $this->db->execute();
    
        return $this->db->rowCount();
    }


    public function cariDataMahasiswa() {
        if (isset($_POST['keyword'])) {
            $keyword = $_POST['keyword'];
        } else {
            $keyword = ''; // atau Anda bisa mengembalikan nilai kosong atau error
        }
        
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%"); // Ganti "%keyword%" dengan "%$keyword%"
        return $this->db->resultSet();
    }
    




}
