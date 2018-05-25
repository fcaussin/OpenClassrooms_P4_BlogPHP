<!-- TITRE DE LA PAGE -->
<?php $this->title = $article['title']; ?>

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


<!-- AFFICHAGE DE L'ARTICLE -->
<section class="content">
  <article>
    <!-- Titre et date d'ajout de l'article -->
    <header>
      <h2 class="articleTitle"><?= $article['title'] ?></h2>
      <time><?= $article['dateArt_fr'] ?></time>
    </header>

    <!-- Contenu de l'article -->
    <p><?= $article['content'] ?></p>
    <hr />
  </article>


  <!-- FORMULAIRE D'AJOUT DE COMMENTAIRE -->
  <form class="formComment" action="index.php?action=addComment" method="post">
    <fieldset class="addComment">
      <legend>Ajouter un commentaire</legend>

      <!-- Nom de l'auter du commentaire -->
      <input type="text" name="username" id="username" placeholder="Votre pseudo" required /><br />

      <!-- Contenu du commentaire -->
      <textarea name="txtComment" id="txtComment" rows="8" cols="80" placeholder="Votre commentaire" required></textarea><br />

      <!-- Bouton valider -->
      <button type="submit">Commenter</button>

      <!-- Donnée supplémentaire envoyée -->
      <input type="hidden" name="idArticle" value="<?= $article['id'] ?>" />
    </fieldset>
  </form>


  <!-- AFFICHAGE DES COMMENTAIRES -->
  <div class="commentsList">
    <hr />
    <h3><u>Commentaires du chapitre : <?= $article['title'] ?></u></h3>

    <?php foreach ($comments as $comment): ?>
      <!-- FORMULAIRE POUR SIGNALER LE COMMENTAIRE -->
      <form class="formReport" action="index.php?action=reportComment" method="post">
        <fieldset class="reportComment">
          <!-- Nom et date d'ajout du commentaire -->
          <legend><b><?= $comment['username'] ?></b> a commenté :</legend>
          <time>le <?= $comment['dateCom_fr'] ?></time>

          <!-- Si commentaire n'est pas signalé -->
          <?php if (!$comment['report']) { ?>
            <!-- Affiche le commentaire -->
            <p><?= $comment['comment'] ?></p>
            <!-- Bouton signaler -->
            <button type="submit">Signaler</button>
            <!-- Données envoyées si le commentaire est signalé -->
            <input type="hidden" name="idArticle" value="<?= $comment['articleId'] ?>" />
            <input type="hidden" name="username" value="<?= $comment['username'] ?>" />
            <input type="hidden" name="txtComment" value="<?= $comment['comment'] ?>" />
            <input type="hidden" name="idComment" value="<?= $comment['id'] ?>" />

            <!-- Sinon affiche que le commentaire a été signalé -->
          <?php } else {
              echo "<p class='signal'>CE COMMENTAIRE A ETE SIGNALE !!</p>";
            }
          ?>
        </fieldset>
      </form>
    <?php endforeach; ?>
  </div>
</section>
