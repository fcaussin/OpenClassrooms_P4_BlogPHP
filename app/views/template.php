<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Venez découvrir le nouveau roman de Jean Forteroche: 'Billet simple pour l'Alaska' et partagez vos avis entre lecteurs">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <title> <?= $title ?> </title>
  </head>
  <body>
    <div class="bloc_page">

    <!-- HEADER -->

    <header id="header">
      <h1>Billet simple pour l'Alaska</h1>
      <ul>
        <li><a href="index.php"><i class="fas fa-home"></i> Accueil</a></li>

        <!-- Affiche l'utilisateur si session existe -->
          <li><a href="index.php?action=login"><i class="fas fa-user-edit"></i>
            <?php if (empty($_SESSION)) { echo "Administration";
              } else {
                echo $_SESSION['username'];
              }
            ?>
          </a></li>
      </ul>
    </header>

    <!-- SECTION PRINCIPALE -->
    <section class="main">
        <?= $content ?>
    </section>

    <footer>
      <p>Jean Forteroche - Billet simple pour l'Alaska</p>
    </footer>

    </div>
  </body>
</html>
