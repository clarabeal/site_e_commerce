<?php $this->titre=$caracteristiques['name']; ?>

<img src="<?= "Contenu/Images/".$caracteristiques['image']?>">

<p><?=$caracteristiques['name']?></p>
<a href="<?= "index.php?action=categorie&idCat=".$categorie['id']?>">
<p><?=$categorie['name']?><p></a>
<p><?=$caracteristiques['description']; ?></p> 
<p>Notre prix : <?=$caracteristiques['price']; ?> €</p> 

<form action="index.php?action=details&idProduit=4" method="POST">
    <input class="button" type="submit" name="ajoutPanier" value="Ajouter au panier">
</form>




