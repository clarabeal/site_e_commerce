<?php $this->titre=$caracteristiques['name']; ?>


<div class="col-8 bg-light mx-auto mt-3" style="border-radius: 12px;">
  <div class="row align-items-center">
    <div class="col text-center ms-2 vert-sep py-3">
      <img src="<?= "Contenu/Images/".$caracteristiques['image']?>" style="width:400px;
                                                                           height:400px;
                                                                           box-shadow: 0 30px 40px rgba(0,0,0,.1);">
    </div>
    <div class="col text-center">
      <div class="row">
        <h1><?=$caracteristiques['name']?></h1>
        <a href="<?= "index.php?action=categorie&idCat=".$categorie['id']?>">Voir tous les <?=$categorie['name']?></a>
        <p><?=$caracteristiques['description']; ?></p> 
        <p>Prix : <?=$caracteristiques['price']; ?> €</p> 


        <form action="<?="index.php?action=details&idProduit=".$caracteristiques['id'];?>" method="POST">
          <div class="container mb-3">
            <p class="mb-2">Choisissez la quantité :</p><input type="number" name="qte" class="form-control mx-auto" style="width:60px;" min="1" max="20"/>
          </div>
          <input class="btn btn-danger button" type="submit" name="ajoutPanier" value="Ajouter au panier">
        </form>
      </div>
    </div>
  </div>
</div>

<div class="row bg-light fixed-bottom py-3">
  <div class="col text-center">
    <a class="text-decoration-none text-dark fst-italic fs-5" href="index.php">Revenir a l'accueil</a>
  </div>
</div>

