<?php
  namespace App\Controllers;

  use App\Models\ArticlesManager;
  use App\Views\View;


  class HomeController
  {
    private $article;


    public function __construct()
    {
      $this->article = new ArticlesManager;
    }

    // Affiche un aperçu des 3 derniers articles
    public function home()
    {
      // Récupère les les 3 derniers articles avec un apreçu
      $articles = $this->article->getArticles();
      // Récupère la liste des titres des articles
      $articlesList = $this->article->getArticlesList();
      // Génère la vue home
      $view = new View("Home");
      $view->generateView(array('articles' => $articles, 'articlesList' => $articlesList));
    }

  }
?>
