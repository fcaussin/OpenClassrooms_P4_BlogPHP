<?php
  namespace App\Controllers;

  use App\Models\ArticlesManager;
  use App\Models\CommentsManager;
  use App\Views\View;

  class ArticlesController
  {
    private $article;
    private $comments;


    public function __construct()
    {
      $this->article = new ArticlesManager;
      $this->comments = new CommentsManager;
    }

    // Affiche un article et ses commentaires
    public function article($articleId)
    {
      $article = $this->article->getArticle($articleId);
      $comments = $this->comments->getComments($articleId);
      $articlesList = $this->article->getArticlesList();
      $view = new View("Article");
      $view->generateView(array('article' => $article, 'comments' => $comments, 'articlesList' => $articlesList));
    }

    // Ajoute un commentaire à un article
    public function commentArticle($articleId, $username, $comment)
    {
      $this->comments->addComment($articleId, $username, $comment);

      // Affiche l'article avec son nouveau commentaire
      $this->article($articleId);
    }

    // Modifie un commentaire d'un article
    public function changeComment($articleId, $username, $comment, $report, $id)
    {
      $this->comments->updateComment($articleId, $username, $comment, $report, $id);

      $this->article($articleId);
    }
  }
?>
