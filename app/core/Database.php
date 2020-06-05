<?php

class Database
{
   private $host = DB_HOST;
   private $user = DB_USER;
   private $pass = DB_PASS;
   private $db_name = DB_NAME;

   private $dbh; //database handler
   private $stmt;

   public function __construct()
   {
      $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name; //data source name

      $option = [
         PDO::ATTR_AUTOCOMMIT => true, // untuk membuat koneksi terjaga
         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION //mode errornya
      ];

      try { //menyambungkan databasenya
         $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
      } catch (PDOException $e) {
         die($e->getMessage());
      }
   }

   public function query($query)
   {
      $this->stmt = $this->dbh->prepare($query);
   }

   public function bind($param, $value, $type = null) //defaul null agar aplikasi yang menentukan
   {
      if (is_null($type)) {
         switch (true) {
            case is_int($value):
               $type = PDO::PARAM_INT;
               break;
            case is_bool($value):
               $type = PDO::PARAM_BOOL;
               break;
            case is_null($value):
               $type = PDO::PARAM_NULL;
               break;
            default:
               $type = PDO::PARAM_STR;
         }
      }
      $this->stmt->bindValue($param, $value, $type); //binding agar terhindar dari sql injection
   }

   public function execute()
   {
      $this->stmt->execute();
   }

   public function resulSet()
   {
      $this->execute();
      return $this->stmt->fetchAll(PDO::FETCH_ASSOC); //jika hasilnya ingin banyak
   }

   public function single()
   {
      $this->execute();
      return $this->stmt->fetch(PDO::FETCH_ASSOC); //jika hasilnya ingin satu
   }

   public function rowCount() //menghitung baris yang berubah dalam tabelnya
   {
      return $this->stmt->rowCount();
   }
}
