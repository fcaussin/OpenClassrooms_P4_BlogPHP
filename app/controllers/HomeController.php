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

    // Affiche aperçu des derniers articles
    public function home()
    {
      $articles = $this->article->getArticles();
      $view = new View("Home");
      $view->generateView(array('articles' => $articles));
    }
  }
?>
