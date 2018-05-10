<?php
  namespace App\Models;

  use PDO;

  /**
   * Gère la connexion à la base de donnée
   */
  abstract class PDOManager
  {
    private $db;

    // Renvoie un objet de connexion à la BD en initialisant la connexion au besoin
    protected function dbConnect()
    {
      if ($this->db == null) {
        $this->db = new PDO("mysql:host=localhost;dbname=blog;charset=utf8", "root", "root");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
      }

      return $this->db;
    }

    // Execute une requête SQL éventuellement paramétrée
    protected function executeRequest($sql, $vars = null)
    {
      if ($vars == null) {
        // Si pas de paramètres, exécution directe
        $req = $this->dbConnect()->query($sql);
      }
      else {
        // Sinon exécution d'une requête préparée
        $req = $this->dbConnect()->prepare($sql);
        $req->execute($vars);
      }

      return $req;
    }
  }
?>
