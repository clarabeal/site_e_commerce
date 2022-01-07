<?php $this->titre='WEB 4 SHOP : '.ucfirst($nom['name']); ?>

<div class="row align-items-center">
  <div class="col align-items-center mt-3 mb-3">
    <div id="ourCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#ourCarousel" data-bs-slide-to="0" class="active" aria-current="true"></button>
        <?php for($i = 1; $i < count($categories); $i++): ?>
          <button type="button" data-bs-target="#ourCarousel" data-bs-slide-to="<?=$i?>"></button>
        <?php endfor; ?>
        <button type="button" data-bs-target="#ourCarousel" data-bs-slide-to="3"></button>
      </div>
      <div class="carousel-inner" style="height:600px;">
        <div class="carousel-item active">
          <a href="index.php"><img src="Contenu/Images/tous_produits.jpg" style="height:1080px;width:1920px;">
          <h1 class="text-uppercase text-center fw-bold" style="position:absolute; top:29%; left:50%; transform:translate(-50%,-71%); font-family: Serif; color: rgb(0,0,0); font-size: 50px;">TOUS NOS PRODUITS</h1></a>
        </div>
        <?php for($i = 0; $i < count($categories); $i++): ?>
          <div class="carousel-item">
            <a href="<?="index.php?action=categorie&idCat=".$categories[$i]['id']?>" class="text-decoration-none"><img src="<?="Contenu/Images/".$categories[$i]['name'].".jpg"?>" class="d-block mx-auto" alt="<?=$categories[$i]['name']?>" style="height:1080px;width:1920px;">
            <h1 class="text-uppercase text-center fw-bold" style="position:absolute; top:29%; left:50%; transform:translate(-50%,-71%); font-family: Serif; color: rgb(0,0,0); font-size: 50px;">NOS <?=$categories[$i]['name']?></h1></a>
          </div>
        <?php endfor; ?>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#ourCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Précédent</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#ourCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Suivant</span>
      </button>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-10 bg-light mx-auto mt-3" style="border-radius: 12px;">
  <?php for($i = 0; $i < count($produits); $i = $i + 2): ?>
    <div class="row">
      <div class="col d-flex justify-content-center text-center m-5">
        <div class="boxed">
          <a class="text-decoration-none" href="<?= "index.php?action=details&idProduit=".$produits[$i]['id'] ?>">
          <img class="img-prod" src="<?= "Contenu/Images/".$produits[$i]['image']?>">
          <p><?=$produits[$i]['name']?></p></a>
          <p>Notre prix : <?=$produits[$i]['price']; ?> €</p>
        </div>
      </div>
      <div class="col d-flex justify-content-center text-center m-5">
        <?php if($i < count($produits)-1): ?>
          <div class="boxed">
            <a class="text-decoration-none" href="<?= "index.php?action=details&idProduit=".$produits[$i+1]['id'] ?>">
            <img class="img-prod" src="<?= "Contenu/Images/".$produits[$i+1]['image']?>">
            <p><?=$produits[$i+1]['name']?></p></a>
            <p>Notre prix : <?=$produits[$i+1]['price']; ?> €</p>
          </div>
        <?php endif;?>
      </div>
    </div>
  <?php endfor; ?>
  </div>
</div>
