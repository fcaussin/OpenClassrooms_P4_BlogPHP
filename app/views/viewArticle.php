<?php
  $this->title = $article['title'];
?>

<article>
  <header>
    <h2 class="articleTitle"><?= $article['title'] ?></h2>
    <time><?= $article['dateArt_fr'] ?></time>
  </header>
  <p><?= $article['content'] ?></p>
  <hr />
</article>

<form class="formComment" action="index.php?action=addComment" method="post">
  <fieldset class="addComment">
    <legend>Ajouter un commentaire</legend>
    <input type="text" name="username" id="username" placeholder="Votre pseudo" required /><br />
    <textarea name="txtComment" id="txtComment" rows="8" cols="80" placeholder="Votre commentaire" required></textarea><br />
    <input type="submit" value="Commenter" />
    <input type="hidden" name="idArticle" value="<?= $article['id'] ?>" />
  </fieldset>
</form>

<div class="commentsList">
  <h3>Commentaires de l'article : <?= $article['id'] . " - " . $article['title'] ?></h3>

  <?php foreach ($comments as $comment): ?>
    <hr class="separateCom" />
    <p><b><?= $comment['username'] ?></b> a commenté :<br />
      <time>le <?= $comment['dateCom_fr'] ?></time>
    </p>
    <p><?= $comment['comment'] ?></p>
  <?php endforeach; ?>
</div>
