<!-- TITRE DE LA PAGE -->
<?php $this->title = "Billet simple pour l'Alaska"; ?>

<!-- MAIN -->

<aside class="aside">
  <h2>Liste des chapitres</h2>
  <ul>
    <!-- Liste des titres des articles -->
    <?php foreach ($articlesList as $articleList): ?>
      <li><a href="<?= "index.php?action=article&id=" . $articleList['id'] ?>">
        <?= $articleList['title'] ?></a>
      </li>
    <?php endforeach; ?>
  </ul>
</aside>


<!-- AFFICHE LES 3 DERNIERS ARTICLES -->
<div class="content">
  <h2>Les derniers articles:</h2>
  <?php foreach ($articles as $article): ?>
    <article class="articlesPreview">
      <p>
        <!-- Titre de l'article -->
        <a href="<?= "index.php?action=article&id=" . $article['id'] ?>">
          <h3 class="articleTitle"><?= $article['title'] ?></h3>
        </a>
        <!-- Date d'ajout de l'article -->
        <time>Ajouté le : <?= $article['dateArt_fr'] ?></time>
      </p>
      <!-- Aperçu de l'article -->
      <p><?= $article['preview'] ?><a class="readMore" href="<?= "index.php?action=article&id=" . $article['id'] ?>"> [Lire la suite...]</a>
      </p>
    </article>
    <hr />
  <?php endforeach; ?>
</div>
