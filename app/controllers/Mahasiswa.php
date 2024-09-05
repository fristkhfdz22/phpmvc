<?php  

class Mahasiswa extends Controller {
    public function index()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        // Corrected to call the method properly
        $data['mhs'] = $this->model('Mahasiswa_model')->getALLMahasiswa();
        $this->view('template/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('template/footer');
    }
    public function detail($id)
    {
        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaByid($id);
        $this->view('template/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('template/footer');
    }
    public function tambah()
    {
        if( $this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'ditambahkan', 'success');
            header('Location:' .BASEURL .'/mahasiswa');
            exit;
        } else{
            Flasher::setFlash('Gagal', 'ditambahkan', 'danger');
            header('Location:' .BASEURL .'/mahasiswa');
            exit;
        }
    }
    public function hapus($id)
    {
        if( $this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0) {
            Flasher::setFlash('Berhasil', 'dihapus', 'success');
            header('Location:' .BASEURL .'/mahasiswa');
            exit;
        } else{
            Flasher::setFlash('Gagal', 'dihapus', 'danger');
            header('Location:' .BASEURL .'/mahasiswa');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
    }
    public function ubah() {
        $data = [
            'id' => $_POST['id'],
            'nama' => $_POST['nama'],
            'nis' => $_POST['nis'],
            'email' => $_POST['email'],
            'jurusan' => $_POST['jurusan']
        ];
        
        if ($this->model('Mahasiswa_model')->ubahDataMahasiswa($data)) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }
    public function cari()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        // Corrected to call the method properly
        $data['mhs'] = $this->model('Mahasiswa_model')->cariDataMahasiswa();
        $this->view('template/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('template/footer');
    }

}
