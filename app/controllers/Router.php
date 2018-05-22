<?php
  namespace App\Controllers;

  use App\Controllers\ArticlesController;
  use App\Controllers\HomeController;
  use App\Controllers\UsersController;
  use App\Views\View;

  class Router
  {
    private $ctrlHome;
    private $ctrlArticles;

    public function __construct()
    {
      $this->ctrlHome = new HomeController;
      $this->ctrlArticles = new ArticlesController;
      $this->ctrlUsers = new UsersController;
    }

    // Traite une requête entrante
    public function routerRequest()
    {
      try {
        // Vérifie que la variable est définie
        if (isset($_GET['action'])) {
          // Requête affichage d'un article en fonction de son id
          if ($_GET['action'] == 'article') {
            $articleId = intval($this->getParameter($_GET, 'id'));
            if ($articleId != 0) {
              $this->ctrlArticles->article($articleId);
            }
            else {
              throw new \Exception("Identifiant de l'article non valide");
            }
          }
          // Requête ajout d'un commentaire
          elseif ($_GET['action'] == 'addComment') {
            // Récupère les paramètres
            $articleId = $this->getParameter($_POST, 'idArticle');
            $username = $this->getParameter($_POST, 'username');
            $comment = $this->getParameter($_POST, 'txtComment');
            // Ajoute le commentaire
            $this->ctrlArticles->commentArticle($articleId, $username, $comment);
          }
          // Requête signaler un commentaire
          elseif ($_GET['action'] == 'reportComment') {
            // Récupère les paramètres
            $id = $this->getParameter($_POST, 'idComment');
            $articleId = $this->getParameter($_POST, 'idArticle');
            $username = $this->getParameter($_POST, 'username');
            $comment = $this->getParameter($_POST, 'txtComment');
            $report = 1;
            // Signale un commentaire
            $this->ctrlArticles->changeComment($articleId, $username, $comment, $report, $id);
          }
          // Requête affiche le formulaire de connexion si session vide
          elseif ($_GET['action'] == 'login') {
            if (empty($_SESSION)) {
              require('../app/views/viewLogin.php');
            }
            // Sinon affiche la page accueil d'administration  
            else {
              $this->ctrlUsers->generateAdmin();
            }
          }
          // Requête connexion à la partie administration
          elseif ($_GET['action'] == 'adminLogin') {
            $username = $this->getParameter($_POST, 'username');
            $password = $this->getParameter($_POST, 'password');
            $this->ctrlUsers->login($username, $password);
          }
          else {
            throw new \Exception("Action non valide");
          }
        }
        else {
          // Aucune action définie: affichage de l'accueil
          $this->ctrlHome->home();
        }
      } catch (\Exception $e) {
        $this->error($e->getMessage());
      }
    }

    private function error($msgError)
    {
      $view = new View("Error");
      $view->generateView(array('msgError' => $msgError));
    }

    // Recherche un paramètre dans un tableau
    private function getParameter($table, $name)
    {
      if (isset($table[$name])) {
        return htmlspecialchars($table[$name]);
      } else {
        throw new \Exception("Paramètre " . $name . " absent");
      }
    }
  }
?>
