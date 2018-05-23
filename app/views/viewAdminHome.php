<?php
$this->title = "Administration" ?>

<aside class="aside">
  <h2>Liste des chapitres</h2>
  <?php foreach ($articlesList as $articleList): ?>
    <a href="<?= "index.php?action=article&id=" . $articleList['id'] ?>">
      <h3 class="articleTitle"><?= $articleList['id'] . " - " . $articleList['title'] ?></h3>
    </a>
  <?php endforeach; ?>
</aside>

<div class="content">
  <h2>Les commentaires signalés:</h2>
  <?php foreach ($comments as $comment): ?>
    <form class="listReport" action="index.php?action=updateComment" method="post">
      <fieldset class="report">
        <legend><b><?= $comment['username'] ?></b> a commenté le chapitre : <?= $comment['articleId']?></legend>
        <time>le <?= $comment['dateCom_fr'] ?></time>

        <textarea name="txtReportCom" id="textReportCom" rows="8" cols="80"><?= $comment['comment'] ?></textarea>
        <div>
          <!-- Bouton valider -->
          <button type="submit">Valider</button>
          <!-- Bouton supprimer -->
          <button type="submit" name="button" formaction="index.php?action=deleteComment&id=<?= $comment['id'] ?>">Supprimer</button>
        </div>
        <!-- Données envoyées -->
        <input type="hidden" name="idArticle" value="<?= $comment['articleId'] ?>" />
        <input type="hidden" name="idComment" value="<?= $comment['id'] ?>" />
        <input type="hidden" name="username" value="<?= $comment['username'] ?>" />
      </fieldset>
    </form>
  <?php endforeach; ?>
</div>
