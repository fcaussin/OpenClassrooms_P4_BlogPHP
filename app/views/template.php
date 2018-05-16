<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Venez découvrir le nouveau roman de Jean Forteroche: 'Billet simple pour l'Alaska' et partagez vos avis entre lecteurs">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="css/style.css">
    <title> <?= $title ?> </title>
  </head>
  <body>
    <div class="bloc_page">

    <!-- HEADER -->

    <header id="header">
      <h1><a href="index.php">Billet simple pour l'Alaska</a></h1>
    </header>

    <section class="main">
      <!-- ASIDE -->
      <aside class="aside">
        <h2>Liste des chapitres</h2>
      </aside>

      <!-- SECTION PRINCIPALE -->
      <div class="content">
        <?= $content ?>
      </div>
    </section>

    <footer>
      <p>Jean Forteroche - Billet simple pour l'Alaska</p>
    </footer>

    </div>
  </body>
</html>
