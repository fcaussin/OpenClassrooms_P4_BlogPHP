<!-- TITTRE DE LA PAGE -->
<?php $this->title = "Modifier un chapitre" ?>

<!-- MAIN -->

<aside class="aside">
  <h2>Gérer les chapitres</h2>
  <ul>
    <!-- lien vers la vue d'ajout d'article -->
    <li><a href="index.php?action=addArticleView"><i class="fas fa-plus"></i> Ajouter un chapitre</a></li>
    <!-- Liste des titres des articles -->
    <?php foreach ($articlesList as $articleList): ?>
      <li><a href="<?= "index.php?action=articleAdmin&id=" . $articleList['id'] ?>">
        <?= $articleList['title'] ?></a>
      </li>
    <?php endforeach; ?>
  </ul>
</aside>


<!-- AFFICHAGE DE L'ARTICLE -->
<section class="content">
  <h2>Gestion du chapitre: <?= $article['title'] ?></h2>
  <!-- FORMULAIRE DE MODIFICATION DE L'ARTICLE -->
  <form action="index.php?action=updateArticle" method="post">

    <!-- Titre et date d'ajout de l'article -->
    <p>
      <label for="title">Entrez votre titre :</label>
      <input type="text" name="title" value= "<?= $article['title'] ?>" required>
    </p>

    <!-- contenu de l'article -->
    <textarea name="txtContent" id="mytextarea"><?= $article['content']?></textarea>

    <!-- bouton valider -->
    <button type="submit">Publier</button>
    <!-- bouton supprimer -->
    <button type="submit" formaction="index.php?action=deleteArticle&id=<?= $article['id'] ?>">Supprimer</button>

    <!-- Donnée supplémentaire envoyée -->
    <input type="hidden" name="idArticle" value="<?= $article['id'] ?>">
  </form>


  <!-- AFFICHAGE DES COMMENTAIRE DE L'ARTICLE -->
  <div class="commentsList">
    <hr />
    <h3><u>Gestion des commentaires du chapitre : <?= $article['title'] ?></u></h3>

    <?php foreach ($comments as $comment): ?>
      <!-- FORMULAIRE DE MODIFICATION DU COMMENTAIRE -->
      <form class="listComment" action="index.php?action=updateComment" method="post">
        <fieldset class="report">

          <!-- Nom de l'auteur et de la date d'ajout du commentaire -->
          <legend><b><?= $comment['username'] ?></b> a commenté :</legend>
          <time>le <?= $comment['dateCom_fr'] ?></time>

          <!-- Indique si le commentaire a été signalé -->
          <?php if ($comment['report']) {
              echo "<div class='signal'>Ce commentaire a été signalé</div>";
            }
          ?>

          <!-- Contenu du commentaire -->
          <textarea name="txtReportCom" id="textReportCom" rows="8" cols="80"><?= $comment['comment'] ?></textarea>

          <div>
            <!-- Bouton valider -->
            <button type="submit">Valider</button>
            <!-- Bouton supprimer -->
            <button type="submit" formaction="index.php?action=deleteComment&id=<?= $comment['id'] ?>">Supprimer</button>
          </div>

          <!-- Données supplémentaires envoyées -->
          <input type="hidden" name="idArticle" value="<?= $comment['articleId'] ?>" />
          <input type="hidden" name="idComment" value="<?= $comment['id'] ?>" />
          <input type="hidden" name="username" value="<?= $comment['username'] ?>" />
        </fieldset>
      </form>
    <?php endforeach; ?>
  </div>
</section>
