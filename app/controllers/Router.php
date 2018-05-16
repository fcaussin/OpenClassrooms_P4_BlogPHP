<?php
  namespace App\Controllers;

  use App\Controllers\ArticlesController;
  use App\Controllers\HomeController;
  use App\Views\View;

  class Router
  {
    private $ctrlHome;
    private $ctrlArticles;

    public function __construct()
    {
      $this->ctrlHome = new HomeController;
      $this->ctrlArticles = new ArticlesController;
    }

    // Traite une requête entrante
    public function routerRequest()
    {
      try {
        if (isset($_GET['action'])) {
          if ($_GET['action'] == 'article') {
            $articleId = intval($this->getParameter($_GET, 'id'));
            if ($articleId != 0) {
              $this->ctrlArticles->article($articleId);
            }
            else {
              throw new \Exception("Identifiant de l'article non valide");
            }
          }
          elseif ($_GET['action'] == 'addComment') {
            $articleId = $this->getParameter($_POST, 'idArticle');
            $username = $this->getParameter($_POST, 'username');
            $comment = $this->getParameter($_POST, 'txtComment');
            $this->ctrlArticles->commentArticle($articleId, $username, $comment);
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
        return $table[$name];
      } else {
        throw new \Exception("Paramètre " . $name . " absent");
      }
    }
  }
?>
