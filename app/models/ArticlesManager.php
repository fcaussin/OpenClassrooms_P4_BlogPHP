<?php
  namespace App\Models;

  use App\Models\PDOManager;


  class ArticlesManager extends PDOManager
  {
    public function getArticles()
    {
      $db = $this->dbConnect();
      $req = $db->query("SELECT id, title, SUBSTRING(content, 1, 500) AS preview, DATE_FORMAT(dateArt, '%d/%m/%Y à %Hh%imin%ss') AS dateArt_fr FROM articles ORDER BY dateArt DESC LIMIT 0, 3");

      return $req;
    }

    public function getArticle($articleId)
    {
      $db = $this->dbConnect();
      $req = $db->prepare("SELECT id, title, content, DATE_FORMAT(dateArt, '%d/%m/%Y à %Hh%imin%ss') AS dateArt_fr FROM articles WHERE id = ?");

      $req->execute(array($articleId));
      $article = $req->fetch();

      return $article;
    }

    public function addArticle($title, $content)
    {
      $db = $this->dbConnect();
      $req = $db->prepare("INSERT INTO articles(title, content, dateArt) VALUES(?,?,NOW())");
      $newArticle = $req->execute(array($title, $content));

      return $newArticle;
    }

    public function updateArticle($id, $title, $content)
    {
      $db = $this->dbConnect();
      $req = $db->prepare("UPDATE articles SET title = ?, content = ? WHERE id = ?");
      $newArticle = $req->execute(array($id, $title, $content));

      return $newArticle;
    }

    public function deleteArticle($id)
    {
      $db = $this->dbConnect();
      $req = $db->prepare("DELETE FROM articles WHERE id = ?");
      $req->execute(array($id));
    }
  }
?>
