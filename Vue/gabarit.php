<?php session_start();
var_dump($_SESSION);

//if($_SESSION('logged')==false):?>
  <a href="<?= "index.php?action=inscription" ?>">
  <p>Inscription</p></a>

<?php //endif; ?>

<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="Contenu/Style/style.css">
    <title><?=$titre?></title>
  </head>
  <body>
    <h1>ISIWEB4shop</h1>
    <?=$contenu?>
  </body>
</html>