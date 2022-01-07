<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="Contenu/Style/style.css"/>
    <title><?=$titre?></title>
    <?php 
      if(!isset($_SESSION['logged'])){
      $_SESSION['logged']=false;
      }?>
  </head>
  <body style="background: rgb(45,45,45);">
    <div class="container-fluid">
      <div id="menu" class="row align-items-center fixed-top" 
           style="background-color: rgb(35,35,35);">
        <div class="col-8 ms-3 d-flex">
          <img src="Contenu/Images/logo.png" style="width: 150px; height: 100px;">
          <div class="row align-content-center">
            <a href="index.php" class="text-decoration-none"><h1 class="fst-italic fw-bold" style="letter-spacing:3px; font-family: Serif; color: rgb(230, 106, 106); text-shadow: 1px 1px 2px rgb(113, 54, 156);">Web 4 Shop</h1></a>
          </div>
        </div>
        <div class="col-3 text-center">
          <?php
            if($_SESSION['logged']){
              echo ('<a href=index.php?action=moncompte class="buttn text-uppercase">');
              echo ($_SESSION["pseudo"].'</a>');
              echo ('<a style="margin-left:10px;" href=index.php?action=inscription class="buttn">');
              echo ('Déconnexion</a>');
            }
            else {
              echo ('<a href=index.php?action=inscription class="buttn">');
              echo ('Inscription</a>');
              echo ('<a style="margin-left:10px;" href=index.php?action=connexion class="buttn">');
              echo ('Connexion</a>');
            }

            echo ('<a href=index.php?action=panier>');
            echo ('Votre Panier</a>');
          ?>
        </div>
      </div>
      <div style="height: 100px"></div>
      <?=$contenu?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="Contenu/Scripts/scroll-nav.js"></script>
  </body>
</html>