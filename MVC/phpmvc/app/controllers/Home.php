<?php 

class Home extends Controller{
    public function Index(){
        $data['judul'] = 'Home';
        $data['nama'] = $this->model('user_model')->getuser();
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}