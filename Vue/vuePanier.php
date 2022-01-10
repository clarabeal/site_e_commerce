<?php $this->titre='WEB 4 SHOP : Votre Panier'; ?>

<?php 
if($_SESSION['logged']){
    echo ("Panier de ".$_SESSION["pseudo"]);
  }
  else{
    echo ('Panier');
  }
?>

<?php foreach($produits as $produit): ?>
  <img src="<?= "Contenu/Images/".$produit['image']?>">
  <p><?=$produit['name']?></p></a>
  <p>Prix : <?=$produit['price']; ?> €</p>
<?php endforeach ?>