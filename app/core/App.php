<?php

class App
{
   public function __construct()
   {
      $url = $this->parseURL();
      var_dump($url);
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
