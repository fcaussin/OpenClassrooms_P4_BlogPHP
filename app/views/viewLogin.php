<?php
  $title = "Connexion";
?>

<?php ob_start(); ?>
<!-- Affichage du formulaire de connexion -->
<div class="contentLogin">
  <p>Veuillez vous connecter pour accéder à l'espace administrateur.</p>
  <form class="formConnexion" action="index.php?action=adminLogin" method="post">
    <fieldset>
      <legend>Connexion</legend>
      <label for="username">Pseudo :</label>
      <input type="text" name="username" placeholder="Votre pseudo" required><br />
      <label for="password">Mot de passe :</label>
      <input type="password" name="password" placeholder="Votre mot de passe" required><br />
      <input type="submit" value="Se connecter">
    </fieldset>
  </form>
  <p><?= $errorLogin ?></p>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
