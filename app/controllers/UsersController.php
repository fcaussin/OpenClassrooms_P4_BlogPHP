<?php
  namespace App\Controllers;

  use App\Models\UsersManager;
  use App\Models\ArticlesManager;
  use App\Models\CommentsManager;
  use App\Views\View;

  class UsersController
  {
    private $users;

    public function __construct()
    {
      $this->users = new UsersManager;
      $this->article = new ArticlesManager;
      $this->comments = new CommentsManager;
    }

    // Génère la vue d'accueil de la partie administration
    public function generateAdmin()
    {
      $articles = $this->article->getArticlesList();
      $reportComments = $this->comments->getReport();
      $view = new View("AdminHome");
      $view->generateView(array('articlesList' => $articles, 'comments' => $reportComments));
    }

    // Vérification de l'utilisateur et du mot de passe
    public function login($username, $password)
    {
      $user = $this->users->getUser($username);

      // Vérifie que le mot de passe correspond
      $checkPassword = password_verify($password, $user['password']);
      if ($checkPassword) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        $this->generateAdmin();
      }
      else {
        $errorLogin = "Votre identifiant ou votre mot de passe est incorrect";
        require('../app/views/viewLogin.php');
      }
    }

    public function disconnect()
    {
      $_SESSION = array();
      session_destroy();
    }

    public function eraseComment($id)
    {
      $this->comments->deleteComment($id);

      $this->generateAdmin();
    }
  }
?>
