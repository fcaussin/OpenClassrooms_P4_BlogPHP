<?php
  namespace App\Models;

  use App\Models\PDOManager;


  class CommentsManager extends PDOManager
  {
    public function getComments()
    {
      $db = $this->dbConnect();
      $req = $db->query("SELECT id, articleId, author, comment, DATE_FORMAT(dateCom, '%d/%m/%Y à %Hh%imin%ss') AS dateCom_fr FROM comments ORDER BY dateCom DESC");

      return $req;
    }

    public function addComment($articleId, $author, $comment)
    {
      $db = $this->dbConnect();
      $req = $db->prepare("INSERT INTO comments(articleId, author, comment, dateCom) VALUES(?,?,?,NOW())");
      $newComment = $req->execute(array($articleId, $author, $comment));

      return $newComment;
    }

    public function updateComment($id, $articleId, $author, $comment)
    {
      $db = $this->dbConnect();
      $req = $db->prepare("UPDATE comments SET articleId = ?, author = ?, comment = ? WHERE id = ?");
      $newComment = $req->execute(array($id, $articleId, $author, $comment));

      return $newComment;
    }

    public function deleteComment($id)
    {
      $db = $this->dbConnect();
      $req = $db->prepare("DELETE FROM comments WHERE id = ?");
      $req->execute(array($id));
    }
  }
?>
