<?php
  namespace App\Models;

  use App\Config\PDOManager;


  class UsersManager extends PDOManager
  {
    // Récupère les données d'un utilisateur
    public function getUser($username)
    {
      $sql = "SELECT id, username, password FROM users WHERE username = ?";
      $req = $this->executeRequest($sql, array($username));
      $user = $req->fetch();

      return $user;
    }

    // Modifie l'utilisateur
    public function updateUser($password, $username, $id)
    {
      $sql = "UPDATE users SET password = ?, username = ? WHERE id = ?";
      $newPassword = $this->executeRequest($sql, array($password, $username, $id));

      return $newPassword;
    }
  }
?>
