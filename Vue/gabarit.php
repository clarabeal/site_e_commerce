<?php 

if(!isset($_SESSION['logged'])){
  $_SESSION['logged']=false;
}

if($_SESSION['logged']){
  echo ("<a href= \"index.php?action=inscription\">");
  echo ("<p>Déconnexion</p></a>");
  echo ("Profil:");
}

else{
  echo ("<a href= \"index.php?action=inscription\">");
  echo ("<p>Inscription</p></a>");
  echo ("<a href= \"index.php?action=connexion\">");
  echo ("<p>Connexion</p></a>");
}
?>

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