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
      $this->db->bind('nama', htmlspecialchars($data['nama']));
      $this->db->bind('nim', htmlspecialchars($data['nim']));
      $this->db->bind('jurusan', htmlspecialchars($data['jurusan']));

      $this->db->execute();
      return $this->db->rowCount();
   }

   public function hapusDataTemen($id)
   {
      $query = "DELETE FROM temen WHERE id = :id";
      $this->db->query($query);
      $this->db->bind('id', $id);

      $this->db->execute();
      return $this->db->rowCount();
   }
}
