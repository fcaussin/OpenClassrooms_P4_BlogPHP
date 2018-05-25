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
            $articleId = intval($this->getParameter($_POST, 'idArticle'));
            $username = $this->getParameter($_POST, 'username');
            $comment = $this->getParameter($_POST, 'txtComment');
            // Ajoute le commentaire
            $this->ctrlArticles->commentArticle($articleId, $username, $comment);
          }
          // Requête signaler un commentaire
          elseif ($_GET['action'] == 'reportComment') {
            // Récupère les paramètres
            $id = intval($this->getParameter($_POST, 'idComment'));
            $articleId = intval($this->getParameter($_POST, 'idArticle'));
            $username = $this->getParameter($_POST, 'username');
            $comment = $this->getParameter($_POST, 'txtComment');
            $report = 1;
            // Signale un commentaire
            $this->ctrlArticles->changeComment($articleId, $username, $comment, $report, $id);
            $this->ctrlArticles->article($articleId);
          }
          // Requête affiche le formulaire de connexion si session vide
          elseif ($_GET['action'] == 'login') {
            if (empty($_SESSION)) {
              $errorLogin = null;
              require('../app/views/viewLogin.php');
            }
            // Sinon affiche la page accueil d'administration
            else {
              $this->ctrlUsers->homeAdmin();
            }
          }
          // Requête connexion à la partie administration
          elseif ($_GET['action'] == 'adminLogin') {
            // Récupère les paramètres
            $username = $this->getParameter($_POST, 'username');
            $password = $this->getParameter($_POST, 'password');
            // Vérification des données de connexion
            $this->ctrlUsers->login($username, $password);
          }
          // Requête de deconnexion
          elseif ($_GET['action'] == 'disconnect') {
            $this->ctrlUsers->disconnect();
            // Retour à l'accueil après déconnexion
            $this->ctrlHome->home();
          }
          // Vérifie qu'une seesion existe
          elseif (isset($_SESSION['id'])) {
            // Requête de modification de commentaire
            if ($_GET['action'] == 'updateComment') {
              // Récupère les paramètres
              $id = intval($this->getParameter($_POST, 'idComment'));
              $articleId = intval($this->getParameter($_POST, 'idArticle'));
              $username = $this->getParameter($_POST, 'username');
              $comment = $this->getParameter($_POST, 'txtReportCom');
              $report = null;
              // Modifie un commentaire
              $this->ctrlArticles->changeComment($articleId, $username, $comment, $report, $id);
              // Affiche le commentaire modifié
              $this->ctrlUsers->articleAdmin($articleId);
            }
            // Requête de suppression d'un commentaire
            elseif ($_GET['action'] == 'deleteComment') {
              // Récupère les paramètres
              $id_Get= intval($this->getParameter($_GET, 'id'));
              $id = intval($this->getParameter($_POST,'idComment'));
              // Si id du commentaire valide on le supprime
              if ($id_Get == $id) {
                $this->ctrlUsers->eraseComment($id);
              }
            }
            // Requête affichage de l'éditeur de texte
            elseif ($_GET['action'] == 'addArticleView') {
              // Affiche l'éditeur de texte
              $this->ctrlUsers->addArticleView();
            }
            // Requête d'ajout de l'article
            elseif ($_GET['action'] == 'addArticle') {
              // Récupère les paramètres
              $title = $this->getParameter($_POST, 'title');
              $content = $_POST['txtContent'];
              // Ajoute l'article
              $this->ctrlUsers->newArticle($title, $content);
              // Retour à l'accueil de l'administration
              $this->ctrlUsers->homeAdmin();
            }
            // Requête affichage de l'article à modifier
            elseif ($_GET['action'] == 'articleAdmin') {
              $articleId = intval($this->getParameter($_GET, 'id'));
              if ($articleId != 0) {
                $this->ctrlUsers->articleAdmin($articleId);
              }
              else {
                throw new \Exception("Identifiant de l'article non valide");
              }
            }
            // Requête de modification de l'article
            elseif ($_GET['action'] == 'updateArticle') {
              // Récupère les paramètres
              $id = intval($this->getParameter($_POST, 'idArticle'));
              $title = $this->getParameter($_POST, 'title');
              $content = $_POST['txtContent'];
              // Modifie l'article
              $this->ctrlUsers->changeArticle($title, $content, $id);
            }
            // Requête de suppression d'un article
            elseif ($_GET['action'] == 'deleteArticle') {
              // Récupère les paramètres
              $id_Get= intval($this->getParameter($_GET, 'id'));
              $id = intval($this->getParameter($_POST,'idArticle'));
              // Si id de l'article est valide on le supprime
              if ($id_Get == $id) {
                $this->ctrlUsers->eraseArticle($id);
              }
            }
          }
          // Sinon envoie un message d'erreur
          else {
            throw new \Exception("Action non valide");
          }
        }
        // Si ucune action définie: affichage de l'accueil
        else {
          $this->ctrlHome->home();
        }
      }
      // Affichage du message d'erreur
      catch (\Exception $e) {
        $this->error($e->getMessage());
      }
    }

    // Génère la vue du message d'erreur
    private function error($msgError)
    {
      $view = new View("Error");
      $view->generateView(array('msgError' => $msgError));
    }


    // Recherche un paramètre dans un tableau
    private function getParameter($table, $name)
    {
      // Si le parmètre existe
      if (isset($table[$name])) {
        // Nettoie la valeur entrée par l'utilisateur
        return htmlspecialchars($table[$name]);
      }
      else {
        throw new \Exception("Paramètre " . $name . " absent");
      }
    }
  }
?>
