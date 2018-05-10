<?php $this->title = "Billet simple pour l'Alaska"; ?>

<?php foreach ($articles as $article): ?>
  <article class="articlesPreview">
    <header>
      <a href="<?= "index.php?action=article&id=" . $article['id'] ?>">
        <h1 class="articleTitle"><?= $article['title'] ?></h1>
      </a>
      <time><?= $article['dateArt_fr'] ?></time>
    </header>
    <p><?= $article['preview'] ?></p>
  </article>
  <hr />
<?php endforeach; ?>
