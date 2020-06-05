<?php

class Temen_model
{
   private $table = 'temen';
   private $db;

   public function __construct()
   {
      $this->db = new Database;
   }
   //method buat mengambil semua data mahasiswa
   public function getAllTemen()
   {
      $this->db->query('SELECT * FROM ' . $this->table);
      return $this->db->resulSet();
   }

   public function getTemenById($id)
   {
      $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id '); //untuk menyimpan data yg di bind
      $this->db->bind('id', $id);
      return $this->db->single();
   }

   public function tambahDataTemen($data)
   {
      $query = "INSERT INTO temen 
               VALUES
               ('null', :nama, :nim, :jurusan)";

      $this->db->query($query); //menjalankan querynya
      $this->db->bind('nama', $data['nama']);
      $this->db->bind('nim', $data['nim']);
      $this->db->bind('jurusan', $data['jurusan']);

      $this->db->execute();
      return $this->db->rowCount();
   }
}
