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
}
