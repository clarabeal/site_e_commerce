<?php $this->titre=$nom['name']; ?>

<p>Notre offre :</p>
<ul>
<?php foreach($categories as $categorie): ?>
    <a href="<?= "index.php?action=categorie&idCat=".$categorie['id']?>">
    <li><?=$categorie['name']?></li></a>
<?php endforeach; ?>
</ul>

<?php foreach($produits as $produit): ?>
    <img src="<?= "Contenu/Images/".$produit['image']?>">
    <a href="<?= "index.php?action=details&idProduit=".$produit['id'] ?>">
    <p><?=$produit['name']?></p></a>
    <p>Notre prix : <?=$produit['price']; ?> €</p>
    <hr/>
<?php endforeach; ?>