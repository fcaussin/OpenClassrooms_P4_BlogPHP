<?php
  namespace App\Models;

  use App\Models\PDOManager;


  class CommentsManager extends PDOManager
  {
    // Récupère les commentaires d'un article
    public function getComments($articleId)
    {
      $sql = "SELECT id, articleId, username, comment, DATE_FORMAT(dateCom, '%d/%m/%Y à %Hh%imin%ss') AS dateCom_fr FROM comments WHERE articleId = ? ORDER BY dateCom DESC";

      $comments = $this->executeRequest($sql, array($articleId));

      return $comments;
    }

    // Ajoute un commentaire
    public function addComment($articleId, $username, $comment)
    {
      $sql = "INSERT INTO comments(articleId, username, comment, dateCom) VALUES(?,?,?,NOW())";
      $newComment = $this->executeRequest($sql, array($articleId, $username, $comment));

      return $newComment;
    }

    // Modifie un commentaire
    public function updateComment($id, $articleId, $username, $comment)
    {
      $sql = "UPDATE comments SET articleId = ?, username = ?, comment = ? WHERE id = ?";
      $newComment = $this->executeRequest($sql, array($id, $articleId, $username, $comment));

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
