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
            if (isset($_GET['id'])) {
              $articleId = intval($_GET['id']);
              if ($articleId != 0) {
                $this->ctrlArticles->article($articleId);
              }
              else {
                throw new \Exception("Identifiant de billet non valide");

              }
            }
            else {
              throw new \Exception("Identifiant de billet non défini");
            }
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
  }
?>
