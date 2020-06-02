<?php
// child class dari controller
class Home extends Controller
{
   public function index()
   {
      $data['judul'] = 'Home';
      //nama minta ke model nama modelnya Use_model dan panggil method dalamnya getUser
      $data['nama'] = $this->model('User_model')->getUser();
      $this->view('templates/header', $data);
      $this->view('home/index', $data);
      $this->view('templates/footer');
   }
}
