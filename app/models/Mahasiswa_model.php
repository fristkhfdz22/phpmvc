<?php  

class Mahasiswa_model {
    private $table = 'mahasiswa';
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getALLMahasiswa() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->single();
    }

    public function tambahDataMahasiswa($data) {
        $query = "INSERT INTO mahasiswa (nama, email, jurusan, nis) VALUES (:nama, :email, :jurusan, :nis)";

        $this->db->query($query);

        // Debugging: Pastikan parameter didefinisikan dengan benar
        echo "Binding parameters...\n";
        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':jurusan', $data['jurusan']);
        $this->db->bind(':nis', $data['nis']);

        if ($this->db->execute()) {
            return $this->db->rowCount();
        } else {
            // Tampilkan error jika query gagal
            echo 'Execute Error: ' . implode(' | ', $this->db->errorInfo());
            return false;
        }
    }
}
