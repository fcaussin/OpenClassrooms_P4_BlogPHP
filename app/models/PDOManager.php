<?php
  namespace App\Models;

  use PDO;

  /**
   * Gère la connexion à la base de donnée
   */
  class PDOManager
  {

    protected function dbConnect()
    {
      $db = new PDO("mysql:host=localhost;dbname=blog;charset=utf8", "root", "root");
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
      return $db;
    }
  }
?>
