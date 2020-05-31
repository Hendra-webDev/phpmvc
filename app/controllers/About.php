<?php
class About extends Controller
{
   //$nama dan $pekerjaan fungsinya menangkap data pada url
   public function index($nama = 'jack', $pekerjaan = 'gigolo')
   {
      //mengirimkan data
      $data['nama'] = $nama;
      $data['pekerjaan'] = $pekerjaan;
      $data['judul'] = 'About';

      $this->view('templates/header', $data);
      $this->view('about/index', $data);
      $this->view('templates/footer');
   }

   public function page()
   {
      $data['judul'] = 'Page';
      $this->view('templates/header', $data);
      $this->view('about/page');
      $this->view('templates/footer');
   }
}
