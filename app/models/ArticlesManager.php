<?php
  namespace App\Models;

  use App\Config\PDOManager;


  class ArticlesManager extends PDOManager
  {
    // Récupère les 3 derniers articles avec un aperçu du contenu
    public function getArticles()
    {
      $sql = "SELECT id, title, SUBSTRING(content, 1, 500) AS preview, DATE_FORMAT(dateArt, '%d/%m/%Y à %Hh%imin%ss') AS dateArt_fr FROM articles ORDER BY dateArt DESC LIMIT 0, 3";
      $articles = $this->executeRequest($sql);

      return $articles;
    }

    // Récupère la liste des titres des articles
    public function getArticlesList()
    {
      $sql = "SELECT id, title FROM articles";
      $articlesList = $this->executeRequest($sql);

      return $articlesList;
    }

    // Récupère un article avec son id
    public function getArticle($articleId)
    {
      $sql = "SELECT id, title, content, DATE_FORMAT(dateArt, '%d/%m/%Y à %Hh%imin%ss') AS dateArt_fr FROM articles WHERE id = ?";

      $req = $this->executeRequest($sql, array($articleId));
      $article = $req->fetch();

      return $article;
    }

    // Ajoute un article
    public function addArticle(Articles $articles)
    {
      $sql = "INSERT INTO articles(title, content, dateArt) VALUES(?,?,NOW())";
      $newArticle = $this->executeRequest($sql, array($articles->title(), $articles->content()));

      return $newArticle;
    }

    // Modifie un article
    public function updateArticle(Articles $articles)
    {
      $sql = "UPDATE articles SET title = ?, content = ? WHERE id = ?";
      $newArticle = $this->executeRequest($sql, array($articles->id(), $articles->title(), $articles->content()));

      return $newArticle;
    }

    // Efface un article
    public function deleteArticle($id)
    {
      $sql = "DELETE FROM articles WHERE id = ?";
      $this->executeRequest($sql, array($id));
    }
  }
?>
