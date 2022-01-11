<?php $this->titre='WEB 4 SHOP : Votre Panier'; ?>

<?php 
if($_SESSION['logged']){
  echo ("Panier de ".$_SESSION["pseudo"]);
}
else{
  echo ('Panier');
}

$total=0;
?>

<!-- Pas de $produit si pas connecté -->
<?php if(isset($produits)):?>
  <?php foreach($produits as $produit): ?>
    <img src="<?= "Contenu/Images/".$produit['image']?>">
    <p><?=$produit['name']?></p></a>
    <p>Prix : <?=$produit['price']; ?> €</p>
    <p>Quantité : <?=$produit['quantity']; ?></p>

    <?php 
      $prix=$produit['price'];
      $quantite=$produit['quantity'];
      $total=$total+$prix*$quantite;
    ?>

  <?php endforeach ?>
  

  <!-- On affiche le total et le bouton pour passer la commande seulement si 'lutilisateur a une commande en cours -->
  <?php if($commande): ?>
    <p>Prix total de la commande : <?=$total?> €</p>
    <a href="index.php?action=saisirAdresse" class="buttn">Passer la commande</a>
  <?php endif ?>

<?php endif ?>