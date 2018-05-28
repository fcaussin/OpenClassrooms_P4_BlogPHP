<?php
  namespace App\Models;

  use App\Config\PDOManager;


  class ArticlesManager extends PDOManager
  {
    // Récupère les 3 derniers articles avec un aperçu du contenu
    public function getArticles()
    {
      $sql = "SELECT id, title, SUBSTRING(content, 1, 500) AS preview, DATE_FORMAT(dateArt, '%d/%m/%Y à %Hh%imin%ss') AS dateArt_fr, statut FROM articles WHERE statut = 1 ORDER BY dateArt DESC LIMIT 0, 3";
      $articles = $this->executeRequest($sql);

      return $articles;
    }

    // Récupère la liste des titres des articles
    public function getArticlesList()
    {
      $sql = "SELECT id, title, statut FROM articles";
      $articlesList = $this->executeRequest($sql);

      return $articlesList;
    }

    // Récupère un article avec son id
    public function getArticle($articleId)
    {
      $sql = "SELECT id, title, content, DATE_FORMAT(dateArt, '%d/%m/%Y à %Hh%imin%ss') AS dateArt_fr, statut FROM articles WHERE id = ?";

      $req = $this->executeRequest($sql, array($articleId));
      $article = $req->fetch();

      return $article;
    }

    // Ajoute un article
    public function addArticle(Articles $articles)
    {
      $sql = "INSERT INTO articles(title, content, dateArt, statut) VALUES(?,?,NOW(),?)";
      $newArticle = $this->executeRequest($sql, array($articles->title(), $articles->content(), $articles->statut()));

      return $newArticle;
    }

    // Modifie un article
    public function updateArticle(Articles $articles)
    {
      $sql = "UPDATE articles SET title = ?, content = ?, statut = ? WHERE id = ?";
      $newArticle = $this->executeRequest($sql, array($articles->title(), $articles->content(), $articles->statut(), $articles->id()));

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
