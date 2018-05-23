<?php
  namespace App\Models;

  use App\Config\PDOManager;


  class CommentsManager extends PDOManager
  {
    // Récupère les commentaires d'un article
    public function getComments($articleId)
    {
      $sql = "SELECT id, articleId, username, comment, DATE_FORMAT(dateCom, '%d/%m/%Y à %Hh%imin%ss') AS dateCom_fr, report FROM comments WHERE articleId = ? ORDER BY dateCom DESC";

      $comments = $this->executeRequest($sql, array($articleId));

      return $comments;
    }

    // Récupère les commentaires signalés
    public function getReport()
    {
      $sql = "SELECT id, articleId, username, comment, DATE_FORMAT(dateCom, '%d/%m/%Y à %Hh%imin%ss') AS dateCom_fr, report FROM comments WHERE report = 1";

      $reportComments = $this->executeRequest($sql);

      return $reportComments;
    }

    // Ajoute un commentaire
    public function addComment(Comments $comments)
    {
      $sql = "INSERT INTO comments(articleId, username, comment, dateCom, report) VALUES(?,?,?,NOW(), NULL)";
      $newComment = $this->executeRequest($sql, array($comments->articleId(), $comments->username(), $comments->comment()));

      return $newComment;
    }

    // Modifie un commentaire
    public function updateComment(Comments $comments)
    {
      $sql = "UPDATE comments SET articleId = ?, username = ?, comment = ?, report = ? WHERE id = ?";
      $newComment = $this->executeRequest($sql, array($comments->articleId(), $comments->username(), $comments->comment(), $comments->report(), $comments->id()));

      return $newComment;
    }

    // Efface un commentaire
    public function deleteComment($id)
    {
      $sql = "DELETE FROM comments WHERE id = ?";
      $this->executeRequest($sql, array($id));
    }
  }
?>
