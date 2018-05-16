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

    public function article($articleId)
    {
      $article = $this->article->getArticle($articleId);
      $comments = $this->comments->getComments($articleId);
      $view = new View("Article");
      $view->generateView(array('article' => $article, 'comments' => $comments));
    }

    public function commentArticle($articleId, $username, $comment)
    {
      $this->comments->addComment($articleId, $username, $comment);

      $this->article($articleId);
    }
  }
?>
