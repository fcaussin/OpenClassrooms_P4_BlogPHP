<!-- TITRE DE LA PAGE -->
<?php $this->title = "Ajouter un chapitre" ?>

<!-- MAIN -->

<aside class="aside">
  <div class="menuAside">
    <h2>Gérer les chapitres</h2>
    <ul>
      <li><a href="index.php?action=addArticleView"><i class="fas fa-plus"></i> Ajouter un chapitre</a></li>

      <!-- Liste des titres des articles -->
      <?php foreach ($articlesList as $articleList): ?>
        <li><a href="<?= "index.php?action=articleAdmin&id=" . $articleList['id'] ?>">
          <?= $articleList['title'] ?></a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</aside>


<div class="content">
  <div class="articles">
  <h2 class="articleTitle"><i class="far fa-edit"></i> Bonne écriture Mr. <?= $_SESSION['username'] ?></h2>

  <!-- FORMULAIRE AJOUT D4ARTICLE -->
  <form action="index.php?action=addArticle&statut=0" method="post">
    <p>
      <!-- Titre de l'article -->
      <label for="title">Entrez votre titre :</label>
      <input type="text" name="title" required>
    </p>
    <!-- Contenu de l'article -->
    <textarea name="txtContent" id="mytextarea"></textarea>
    <!-- Bouton d'envoie -->
    <button type="submit">Enregistrer</button>
    <button type="submit" formaction="index.php?action=addArticle&statut=1">Publier</button>
  </form>
  </div>
</div>
