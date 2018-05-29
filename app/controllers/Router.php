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
          switch ($_GET['action']) {
            // Requête affichage d'un article en fonction de son id
            case 'article':
              $articleId = intval($this->getParameter($_GET, 'id'));
              if ($articleId != 0) {
                $this->ctrlArticles->article($articleId);
              }
              else {
                throw new \Exception("Identifiant de l'article non valide");
              }
            break;

            // Requête ajout d'un commentaire
            case 'addComment':
              // Récupère les paramètres
              $articleId = intval($this->getParameter($_POST, 'idArticle'));
              $username = $this->getParameter($_POST, 'username');
              $comment = $this->getParameter($_POST, 'txtComment');
              // Ajoute le commentaire
              $this->ctrlArticles->commentArticle($articleId, $username, $comment);
            break;

            // Requête signaler un commentaire
            case 'reportComment':
              // Récupère les paramètres
              $id = intval($this->getParameter($_POST, 'idComment'));
              $articleId = intval($this->getParameter($_POST, 'idArticle'));
              $username = $this->getParameter($_POST, 'username');
              $comment = $this->getParameter($_POST, 'txtComment');
              $report = 1;
              // Signale un commentaire
              $this->ctrlArticles->changeComment($articleId, $username, $comment, $report, $id);
              $this->ctrlArticles->article($articleId);
            break;

            // Requête affiche le formulaire de connexion si session vide
            case 'login':
              if (empty($_SESSION)) {
                $errorLogin = null;
                require('../App/Views/viewLogin.php');
              }
              // Sinon affiche la page accueil d'administration
              else {
                $this->ctrlUsers->homeAdmin();
              }
            break;

            // Requête connexion à la partie administration
            case 'adminLogin':
              // Récupère les paramètres
              $username = $this->getParameter($_POST, 'username');
              $password = $this->getParameter($_POST, 'password');
              // Vérification des données de connexion
              $this->ctrlUsers->login($username, $password);
            break;

            // Requête de deconnexion
            case 'disconnect':
              $this->ctrlUsers->disconnect();
              // Retour à l'accueil après déconnexion
              $this->ctrlHome->home();
            break;

            // Requête d'affichage de la vue modifier mot de passe
            case 'password':
              if (isset($_SESSION['id'])) {
                $errorLogin = null;
                require('../App/Views/viewUpdateLogin.php');
              }
            break;

            // Requête de modification du mot de passe
            case 'adminPassword':
              if (isset($_SESSION['id'])) {
                // Récupère les paramètres
                $username = $this->getParameter($_POST, 'username');
                $password1 = $this->getParameter($_POST, 'password1');
                $password2 = $this->getParameter($_POST, 'password2');
                // Modifie le mot de passe
                $this->ctrlUsers->updatePassword($username, $password1, $password2);
              }
            break;

              // Requête de modification de commentaire
            case 'updateComment':
              if (isset($_SESSION['id'])) {
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
              else {
                throw new \Exception("Vous n'êtes pas connecté");
              }
            break;

              // Requête de suppression d'un commentaire
            case 'deleteComment':
              if (isset($_SESSION['id'])) {
                // Récupère les paramètres
                $id_Get= intval($this->getParameter($_GET, 'id'));
                $id = intval($this->getParameter($_POST,'idComment'));
                // Si id du commentaire valide on le supprime
                if ($id_Get == $id) {
                  $this->ctrlUsers->eraseComment($id);
                }
              }
              else {
                throw new \Exception("Vous n'êtes pas connecté");
              }
            break;

              // Requête affichage de l'éditeur de texte
            case 'addArticleView':
              if (isset($_SESSION['id'])) {
                // Affiche l'éditeur de texte
                $this->ctrlUsers->addArticleView();
              }
              else {
                throw new \Exception("Vous n'êtes pas connecté");
              }
            break;

              // Requête d'ajout de l'article
            case 'addArticle':
              if (isset($_SESSION['id'])) {
                // Enregistre ou publie l'article en fonction du statut
                if (isset($_GET['statut'])) {
                  // Récupère les paramètres
                  $title = $this->getParameter($_POST, 'title');
                  $content = $_POST['txtContent'];
                  $statut = $this->getParameter($_GET, 'statut');
                  // Ajoute l'article
                  $this->ctrlUsers->newArticle($title, $content, $statut);
                  // Retour à l'accueil de l'administration
                  $this->ctrlUsers->homeAdmin();
                }
                else {
                  throw new \Exception("Statut de l'article non valide");
                }
              }
              else {
                throw new \Exception("Vous n'êtes pas connecté");
              }
            break;

              // Requête affichage de l'article à modifier
            case 'articleAdmin':
              if (isset($_SESSION['id'])) {
                $articleId = intval($this->getParameter($_GET, 'id'));
                if ($articleId != 0) {
                  $this->ctrlUsers->articleAdmin($articleId);
                }
                else {
                  throw new \Exception("Identifiant de l'article non valide");
                }
              }
              else {
                throw new \Exception("Vous n'êtes pas connecté");
              }
            break;

              // Requête de modification de l'article
            case 'updateArticle':
              if (isset($_SESSION['id'])) {
                // Enregistre ou publie l'article en fonction du statut
                if (isset($_GET['statut'])) {
                // Récupère les paramètres
                $id = intval($this->getParameter($_POST, 'idArticle'));
                $title = $this->getParameter($_POST, 'title');
                $content = $_POST['txtContent'];
                $statut = $this->getParameter($_GET, 'statut');
                // Modifie l'article
                $this->ctrlUsers->changeArticle($title, $content, $statut, $id);
                }
                else {
                  throw new \Exeception("Statut de l'article non valide");
                }
              }
              else {
                throw new \Exception("Vous n'êtes pas connecté");
              }
            break;

              // Requête de suppression d'un article
            case 'deleteArticle':
              if (isset($_SESSION['id'])) {
                // Récupère les paramètres
                $id_Get= intval($this->getParameter($_GET, 'id'));
                $id = intval($this->getParameter($_POST,'idArticle'));
                // Si id de l'article est valide on le supprime
                if ($id_Get == $id) {
                  $this->ctrlUsers->eraseArticle($id);
                }
              }
              else {
                throw new \Exception("Vous n'êtes pas connecté");
              }
            break;

            // Sinon envoie un message d'erreur
            default:
              throw new \Exception("Action non valide");
            break;
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
