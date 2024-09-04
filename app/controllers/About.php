<?php 

class About extends Controller {
    public function index($nama = 'khafidz', $pekerjaan ='frontend', $umur ='17')
    {
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['umur'] = $umur;
        $data['judul'] = 'about me';
        $this->view('template/header',$data);
        $this->view('about/index', $data);
        $this->view('template/footer');
    }
    public function page()
    {
        $data['judul'] = 'pages';
        $this->view('template/header', $data);
        $this->view('about/page');
        $this->view('template/footer');
    }

}