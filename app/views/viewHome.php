<?php $this->title = "Billet simple pour l'Alaska"; ?>

<h2>Les derniers articles:</h2>

<?php foreach ($articles as $article): ?>
  <article class="articlesPreview">
    <p>
      <a href="<?= "index.php?action=article&id=" . $article['id'] ?>">
        <h3 class="articleTitle"><?= $article['title'] ?></h3>
      </a>
      <time>Ajouté le : <?= $article['dateArt_fr'] ?></time>
    </p>
    <p><?= $article['preview'] ?><br /><a class="readMore" href="<?= "index.php?action=article&id=" . $article['id'] ?>">[Lire la suite...]</a>
    </p>
  </article>
  <hr />
<?php endforeach; ?>
