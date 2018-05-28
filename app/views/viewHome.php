<!-- TITRE DE LA PAGE -->
<?php $this->title = "Billet simple pour l'Alaska"; ?>

<!-- MAIN -->

<aside class="aside">
  <div class="menuAside">
    <h2>Liste des chapitres</h2>
    <ul>
      <!-- Liste des titres des articles -->
      <?php foreach ($articlesList as $articleList): ?>
        <li><a href="<?= "index.php?action=article&id=" . $articleList['id'] ?>">
          <?= $articleList['title'] ?></a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</aside>


<!-- AFFICHE LES 3 DERNIERS ARTICLES -->
<div class="content">
  <h2><i class="far fa-file-alt"></i> Apperçu des derniers chapitres :</h2>
  <?php foreach ($articles as $article): ?>
    <article class="articles">
      <header>
        <!-- Titre de l'article -->
        <a href="<?= "index.php?action=article&id=" . $article['id'] ?>">
          <h3 class="articleTitle"><?= $article['title'] ?></h3>
        </a>
        <!-- Date d'ajout de l'article -->
        <time>Ajouté le : <?= $article['dateArt_fr'] ?></time>
      </header>
      <!-- Aperçu de l'article -->
      <p><?= $article['preview'] ?></p>
      <a class="readMore" href="<?= "index.php?action=article&id=" . $article['id'] ?>">[Lire la suite...]</a>
    </article>
    <hr />
  <?php endforeach; ?>
</div>
