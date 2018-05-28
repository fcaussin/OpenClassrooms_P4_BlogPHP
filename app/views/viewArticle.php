<!-- TITRE DE LA PAGE -->
<?php $this->title = $article['title']; ?>

<!-- MAIN -->

<aside class="aside">
  <div class="menuAside">
    <h2>Liste des chapitres</h2>
    <ul>
      <!-- Liste des titres des articles -->
      <?php foreach ($articlesList as $articleList): ?>
        <?php if ($articleList['statut']): ?>
        <li><a href="<?= "index.php?action=article&id=" . $articleList['id'] ?>">
          <?= $articleList['title'] ?></a>
        </li>
        <?php endif; ?>
      <?php endforeach; ?>
    </ul>
  </div>
</aside>


<!-- AFFICHAGE DE L'ARTICLE -->
<div class="content">
  <article class="articles">
    <!-- Titre et date d'ajout de l'article -->
    <header>
      <h2 class="articleTitle"><i class="fas fa-book"></i> <?= $article['title'] ?></h2>
      <time><?= $article['dateArt_fr'] ?></time>
    </header>

    <!-- Contenu de l'article -->
    <p><?= $article['content'] ?></p>
  </article>

  <div class="comments">
    <h3><i class="far fa-comment-dots"></i> Commentaires du chapitre : <?= $article['title'] ?></h3>

    <!-- FORMULAIRE D'AJOUT DE COMMENTAIRE -->
    <form class="formComment" action="index.php?action=addComment" method="post">
      <fieldset class="addComment">
        <legend>Ajouter un commentaire</legend>

        <!-- Nom de l'auter du commentaire -->
        <input type="text" name="username" id="username" placeholder="Votre pseudo" required /><br />

        <!-- Contenu du commentaire -->
        <textarea name="txtComment" id="txtComment" rows="8" cols="80" placeholder="Votre commentaire" required></textarea><br />

        <!-- Bouton valider -->
        <div>
          <button type="submit">Commenter</button>
          <button type="reset">Effacer</button>
        </div>
        <!-- Donnée supplémentaire envoyée -->
        <input type="hidden" name="idArticle" value="<?= $article['id'] ?>" />
      </fieldset>
    </form>


    <!-- AFFICHAGE DES COMMENTAIRES -->
    <div class="commentsList">
      <?php foreach ($comments as $comment): ?>
        <!-- FORMULAIRE POUR SIGNALER LE COMMENTAIRE -->
        <form class="formReport" action="index.php?action=reportComment" method="post">
          <fieldset class="reportComment">
            <!-- Nom et date d'ajout du commentaire -->
            <legend><b><?= $comment['username'] ?></b> a commenté :</legend>

            <div class="headerReport">
              <time>le <?= $comment['dateCom_fr'] ?></time>
              <!-- Si commentaire n'est pas signalé -->
              <?php if (!$comment['report']) { ?>
                <!-- Bouton signaler -->
                <button type="submit" class="buttonReport">Signaler</i></button>
              <?php } else {
                  echo "<i class='signal'>COMMENTAIRE SIGNALE !!</i>";
                }
              ?>
            </div>



            <!-- Affiche le commentaire -->
            <p><?= $comment['comment'] ?></p>
            <!-- Données envoyées si le commentaire est signalé -->
            <input type="hidden" name="idArticle" value="<?= $comment['articleId'] ?>" />
            <input type="hidden" name="username" value="<?= $comment['username'] ?>" />
            <input type="hidden" name="txtComment" value="<?= $comment['comment'] ?>" />
            <input type="hidden" name="idComment" value="<?= $comment['id'] ?>" />

            <!-- Sinon affiche que le commentaire a été signalé -->
          </fieldset>
        </form>
      <?php endforeach; ?>
    </div>
  </div>
</div>
