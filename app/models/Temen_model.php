<?php

class Temen_model
{
   private $dbh; //database handler
   private $stmt; //buat simpan query

   public function __construct()
   {
      $dsn = 'mysql:host=localhost;dbname=phpmvc'; //data source name

      try { //menyambungkan databasenya
         $this->dbh = new PDO($dsn, 'root', '');
      } catch (PDOException $e) {
         die($e->getMessage());
      }
   }

   //method buat mengambil semua data mahasiswa
   public function getAllTemen()
   {
      $this->stmt = $this->dbh->prepare('SELECT * FROM temen'); //prepare dulu querynya
      $this->stmt->execute(); //setelah itu execute
      return $this->stmt->fetchAll(PDO::FETCH_ASSOC); //mengambil data
   }
}
