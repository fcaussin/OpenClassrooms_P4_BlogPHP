<?php
  $this->title = $article['title'];
?>

<!-- Affichage de la liste des articles -->
<aside class="aside">
  <h2>Liste des chapitres</h2>
  <?php foreach ($articlesList as $articleList): ?>
    <a href="<?= "index.php?action=article&id=" . $articleList['id'] ?>">
      <h3 class="articleTitle"><?= $articleList['id'] . " - " . $articleList['title'] ?></h3>
    </a>
  <?php endforeach; ?>
</aside>

<!-- Affichage de l'article -->
<div class="content">
  <article>
    <header>
      <h2 class="articleTitle"><?= $article['title'] ?></h2>
      <time><?= $article['dateArt_fr'] ?></time>
    </header>
    <p><?= $article['content'] ?></p>
    <hr />
  </article>

  <!-- Formulaire d'ajout de commentaire -->
  <form class="formComment" action="index.php?action=addComment" method="post">
    <fieldset class="addComment">
      <legend>Ajouter un commentaire</legend>
      <input type="text" name="username" id="username" placeholder="Votre pseudo" required /><br />
      <textarea name="txtComment" id="txtComment" rows="8" cols="80" placeholder="Votre commentaire" required></textarea><br />
      <input type="submit" value="Commenter" />
      <input type="hidden" name="idArticle" value="<?= $article['id'] ?>" />
    </fieldset>
  </form>

  <!-- Affichage des commentaires -->
  <div class="commentsList">
    <hr />
    <h3><u>Commentaires du chapitre : <?= $article['id'] . " - " . $article['title'] ?></u></h3>

    <?php foreach ($comments as $comment): ?>
      <form class="formReport" action="index.php?action=reportComment" method="post">
        <fieldset class="reportComment">
          <legend><b><?= $comment['username'] ?></b> a commenté :</legend>
          <time>le <?= $comment['dateCom_fr'] ?></time>
          <p><?= $comment['comment'] ?></p>
          <input type="submit" value="Signaler" />
          <input type="hidden" name="idArticle" value="<?= $comment['articleId'] ?>" />
          <input type="hidden" name="username" value="<?= $comment['username'] ?>" />
          <input type="hidden" name="txtComment" value="<?= $comment['comment'] ?>" />
          <input type="hidden" name="idComment" value="<?= $comment['id'] ?>" />
        </fieldset>
      </form>
    <?php endforeach; ?>
  </div>
</div>
