<?php
  namespace App\Controllers;

  use App\Models\ArticlesManager;
  use App\Models\CommentsManager;
  use App\Models\Comments;
  use App\Models\Articles;
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
      // Récupère l'article
      $article = $this->article->getArticle($articleId);
      // Récupère les commentaires de l'article
      $comments = $this->comments->getComments($articleId);
      // Récupère la liste des titres des articles
      $articlesList = $this->article->getArticlesList();

      // Genère la vue viewArticle
      $view = new View("Article");
      $view->generateView(array('article' => $article, 'comments' => $comments, 'articlesList' => $articlesList));
    }


    // Ajoute un commentaire à un article
    public function commentArticle($articleId, $username, $comment)
    {
      $newComment = new Comments(['articleId' => $articleId, 'username' => $username, 'comment' => $comment]);
      $this->comments->addComment($newComment);

      // Raffraîchit l'affichage de l'article
      $this->article($articleId);
    }


    // Modifie le commentaire d'un article
    public function changeComment($articleId, $username, $comment, $report, $id)
    {
      $commentUpdate = new Comments(['articleId' => $articleId, 'username' => $username, 'comment' => $comment, 'report' => $report, 'id' => $id]);
      $this->comments->updateComment($commentUpdate);
    }
  }
?>
