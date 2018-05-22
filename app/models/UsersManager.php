<?php
  namespace App\Models;

  use App\Config\PDOManager;


  class UsersManager extends PDOManager
  {

    public function getUser($username)
    {
      $sql = "SELECT id, username, password FROM users WHERE username = ?";
      $req = $this->executeRequest($sql, array($username));
      $user = $req->fetch();

      return $user;
    }
  }
?>
