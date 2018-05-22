<?php
  namespace App\Controllers;

  use App\Models\UsersManager;
  use App\Views\View;

  class UsersController
  {
    private $users;

    public function __construct()
    {
      $this->users = new UsersManager;
    }

    public function generateAdmin()
    {
      $view = new View("Admin");
      $view->generateView(array('user' => $_SESSION));
    }

    public function login($username, $password)
    {
      $user = $this->users->getUser($username);

      $checkPassword = password_verify($password, $user['password']);
      if ($checkPassword) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        $this->generateAdmin();  
      }
      else {
        throw new \Exception("Identifiant ou mot de passe non valide !!");
      }
    }
  }
?>
