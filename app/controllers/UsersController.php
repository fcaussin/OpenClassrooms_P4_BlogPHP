<?php
  namespace App\Controllers;

  use App\Models\UsersManager;
  use App\Models\ArticlesManager;
  use App\Models\CommentsManager;
  use App\Models\Articles;
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


    // Affiche l'accueil de la partie administration
    public function homeAdmin()
    {
      // Récupère la liste des titres des articles
      $articles = $this->article->getArticlesList();
      // Récupère les commentaires signalés
      $reportComments = $this->comments->getReport();

      // Génère la vue viewAdminHome
      $view = new View("AdminHome");
      $view->generateView(array('articlesList' => $articles, 'comments' => $reportComments));
    }


    // Affiche l'ajout d'article
    public function addArticleView()
    {
      // Récupère la liste des titres des articles
      $articles = $this->article->getArticlesList();

      // Génère la vue viewAddArticle
      $view = new View("AddArticle");
      $view->generateView(array('articlesList' => $articles));
    }


    // Vérification de l'utilisateur et du mot de passe
    public function login($username, $password)
    {
      // Récupère un utilisateur
      $user = $this->users->getUser($username);

      // Vérifie que le mot de passe correspond
      $checkPassword = password_verify($password, $user['password']);
      // Si le mot de passe est bon
      if ($checkPassword) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        // Affiche la vue accueil administration
        $this->homeAdmin();
      }
      // Sinon affiche un message d'erreur
      else {
        $errorLogin = "Votre identifiant ou votre mot de passe est incorrect";
        require('../App/Views/viewLogin.php');
      }
    }


    // Modification du mot de passe
    public function updatePassword($username, $password1, $password2)
    {
      $id = $_SESSION['id'];
      // Si les mots de passe correspondent
      if ($password1 == $password2) {
        // crypte le mot de passe
        $newPassword = password_hash($password1, PASSWORD_DEFAULT);

        // Modifie le mot de passe
        $this->users->updateUser($newPassword, $username, $id);

        // Affiche un message
        $errorLogin = "Votre mot de passe est changé";
        require('../App/Views/viewUpdateLogin.php');
      }
      // Sinon affiche un message d'erreur
      else {
        $errorLogin = "Votre mot de passe est incorrect";
        require('../App/Views/viewUpdateLogin.php');
      }
    }

    // Destruction de la session a la deconnexion
    public function disconnect()
    {
      $_SESSION = array();
      session_destroy();

      // Suppression des cookies de connexion automatique
      setcookie('login', '');
      setcookie('pass_hache', '');
    }


    // Efface un commentaire
    public function eraseComment($id)
    {
      $this->comments->deleteComment($id);
      // Affiche la vue accueil administration
      $this->homeAdmin();
    }


    // Affiche l'article à modifier
    public function articleAdmin($articleId)
    {
      // Récupère l'article
      $article = $this->article->getArticle($articleId);
      // Récupère les commentaires de l'article
      $comments = $this->comments->getComments($articleId);
      // Récupère la liste des titres des chapitres
      $articlesList = $this->article->getArticlesList();

      // Génère la vue viewArticleAdmin
      $view = new View("ArticleAdmin");
      $view->generateView(array('article' => $article, 'comments' => $comments, 'articlesList' => $articlesList));
    }


    // Ajoute un nouvel article
    public function newArticle($title, $content, $statut)
    {
      $newArticle = new Articles(['title' => $title, 'content' => $content, 'statut' => $statut]);
      $this->article->addArticle($newArticle);
    }


    // Modifie un article
    public function changeArticle($title, $content, $statut, $id)
    {
      $articleUpdate = new Articles(['title' => $title, 'content' => $content, 'statut' => $statut, 'id' => $id]);
      $this->article->updateArticle($articleUpdate);

      // Raffraîchit la vue viewArticleAdmin
      $this->articleAdmin($id);
    }


    // Efface un article
    public function eraseArticle($id)
    {
      $this->article->deleteArticle($id);
      // Retour à l'accueil de l'administration
      $this->homeAdmin();
    }
  }
?>
