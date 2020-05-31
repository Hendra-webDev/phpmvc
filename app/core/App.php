<?php

class App
{
   protected $controller = 'Home';
   protected $method = 'index';
   protected $params = [];

   public function __construct()
   {
      $url = $this->parseURL();
      //   mengecek file yang ada pada controller
      if (file_exists('../app/controllers/' . $url[0] . '.php')) {
         // kita timpa dengan controller yang baru
         $this->controller = $url[0];
         // hapus controller dari elemen array
         unset($url[0]);
      }
      //panggil controller
      require_once '../app/controllers/' . $this->controller . '.php';
      $this->controller = new $this->controller;

      //method
      if (isset($url[1])) {
         if (method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
         }
      }

      //kelola parameter
      if (!empty($url)) {
         $this->params = array_values($url);
      }

      //jalankan controller & method ,serta kirimkan params jika ada
      call_user_func_array([$this->controller, $this->method], $this->params);
   }

   // memecah url sesuai keinginan kita
   public function parseURL()
   {
      if (isset($_GET['url'])) {
         // menghilangkan tanda / pada url
         $url = rtrim($_GET['url'], '/');
         // membersihkan url dari karakter aneh
         $url = filter_var($url, FILTER_SANITIZE_URL);
         //memecah url menjadi array
         $url = explode('/', $url);
         return $url;
      }
   }
}
