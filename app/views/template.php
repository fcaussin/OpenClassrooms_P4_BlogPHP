<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Venez découvrir le nouveau roman de Jean Forteroche: 'Billet simple pour l'Alaska' et partagez vos avis entre lecteurs">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
  <script>
  tinymce.init({
    selector: '#mytextarea'
  });
  </script>
    <title> <?= $title ?> </title>
  </head>
  <body>
    <div class="bloc_page">

    <!-- HEADER -->

    <header id="header">
      <h1>Billet simple pour l'Alaska</h1>

      <!-- Menu de navigation -->
      <ul>
        <li><a href="index.php"><i class="fas fa-home"></i> Accueil</a></li>
        <!-- Si pas de session affiche se sonnecter -->

        <?php if (empty($_SESSION)) { ?>
          <li><a href="index.php?action=login"><i class="fas fa-user-edit"></i> Se connecter</a></li>

        <!-- Sinon affiche l'utilisateur et le lien de deconnexion -->
        <?php } else { ?>
          <li><a href="index.php?action=login"><i class="fas fa-user-edit"></i> <?= $_SESSION['username']; ?></a></li>
          <li><a href="index.php?action=disconnect"><i class="fas fa-sign-out-alt"></i> Se déconnecter</a></li>
        <?php } ?>
      </ul>
    </header>


    <!-- SECTION PRINCIPALE -->

    <section class="main">
        <?= $content ?>
    </section>


    <!-- FOOTER -->

    <footer>
      <p>Jean Forteroche - Billet simple pour l'Alaska</p>
    </footer>
    </div>
  </body>
</html>
