<!-- TITRE DE LA PAGE -->
<?php $this->title = "Accueil administration" ?>

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
  <h2>Gestion des commentaires signalés:</h2>
  <div class="comments">
    <!-- AFFICHE LES COMMENTAIRES SIGNALES -->
    <?php foreach ($comments as $comment): ?>
      <!-- FORMULAIRE MODIFICATION DU COMMENTAIRE -->
      <form class="formReport" action="index.php?action=updateComment" method="post">
        <fieldset class="report">

          <!-- Auteur et date d'ajout du commentaire -->
          <legend><b><?= $comment['username'] ?></b> a commenté :</legend>

          <time class="headerRoport">le <?= $comment['dateCom_fr'] ?></time>

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
</div>
