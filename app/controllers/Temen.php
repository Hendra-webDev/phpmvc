<?php

class Temen extends Controller
{
   public function index()
   {
      $data['judul'] = 'Daftar Teman';
      $data['tmn'] = $this->model('Temen_model')->getAllTemen();
      $this->view('templates/header', $data);
      $this->view('temen/index', $data);
      $this->view('templates/footer');
   }

   public function detail($id)
   {
      $data['judul'] = 'Detail Teman';
      $data['tmn'] = $this->model('Temen_model')->getTemenById($id);
      $this->view('templates/header', $data);
      $this->view('temen/detail', $data);
      $this->view('templates/footer');
   }

   public function tambah()
   {
      if ($this->model('Temen_model')->tambahDataTemen($_POST) > 0) {
         header('Location: ' . BASEURL . '/temen');
         exit;
      }
   }
}
