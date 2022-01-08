<?php $this->titre='WEB 4 SHOP : Votre Panier'; ?>

<?php 
if($_SESSION['logged']){
    echo ("Panier de ".$_SESSION["pseudo"]);
  }
  else{
    echo ('Panier');
  }
?>