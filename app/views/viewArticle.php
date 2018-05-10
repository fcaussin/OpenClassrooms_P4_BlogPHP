<?php
  $this->title = $article['title'];
?>

<article>
  <header>
    <h1 class="articleTitle"><?= $article['title'] ?></h1>
    <time><?= $article['dateArt_fr'] ?></time>
  </header>
  <p><?= $article['content'] ?></p>
</article>
<hr />
<div class="commentsList">
  <h1>Commentaires de l'article <?= $article['title'] ?></h1>
</div>

<?php foreach ($comments as $comment): ?>
  <p><?= $comment['username'] ?> dit :</p>
  <p><?= $comment['comment'] ?></p>
<?php endforeach; ?>
