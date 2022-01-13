<?php $this->titre='WEB 4 SHOP : Mon compte'; ?>

<div class="col-11 bg-light mx-auto mt-3" style="border-radius: 12px;">
  <div class="row align-items-center">
    <div class="col text-center">
      <h2>Mes informations</h2>
      <p>Prénom : <?=$info['forname']; ?></p>
      <p>Nom : <?=$info['surname']; ?></p>
      <p>Adresse 1 : <?=$info['add1']; ?></p>
      <p>Adresse 2 : <?=$info['add2']; ?></p>
      <p>Ville : <?=$info['add3']; ?></p>
      <p>Code postal : <?=$info['postcode']; ?></p>
      <p>Numéro de téléphone : <?=$info['phone']; ?></p>
      <p>Email : <?=$info['email']; ?></p>
    </div>
    <div class="col vert-sep me-2">
      <form action="index.php?action=moncompte" method="POST">
        <h1 class="text-center my-3">Changer mon mot de passe</h1>
        <div class="mb-3">
          <label for="oldMdp" class="form-label">Ancien mot de passe :</label>
          <input type="password" class="form-control" name="oldMdp" required>
        </div>
        <div class="mb-3">
          <label for="newMdp" class="form-label">Nouveau mot de passe :</label>
          <input type="password" class="form-control" name="newMdp" required>
        </div>
        <div class="mb-3">
          <label for="confirmNewMdp" class="form-label">Confirmation du nouveau mot de passe :</label>
          <input type="password" class="form-control" name="confirmNewMdp" required>
        </div>
        <div class="text-center mb-3">
          <input type="submit" class="button btn btn-danger px-5" name="validerChgtMdp" value="Se connecter">
        </div>
      </form>
    </div>
  </div>
</div>

<div class="col-11 bg-light mx-auto mt-5" style="border-radius: 12px;">
  <div class="row align-items-center">
    <div class="col text-center pt-2">
      <h2>Mes commandes</h2>
      <hr/>
      <?php if(isset($commandes)):
        if(count($commandes) > 0):
        foreach($commandes as $commande): 
      
        if($commande['status'] == 3) { $status = "en attente de paiement (chèque)"; }
        elseif($commande['status'] == 2) { $status = "confirmée"; }
        elseif($commande['status'] == 10) { $status = "expédiée"; }
      ?>
      <div class="row align-items-center pt-2">
        <div class="col text-center">
          <p>Commande numéro : <?=$commande['id']?></p>
        </div>
        <div class="col text-center">
          <p>Status de la commande : <?=$status?></p>
        </div>
        <div class="col text-center">
          <p>Date de la commande : <?=$commande['date'] ?></p>
        </div>
        <div class="col text-center">
          <p>Prix total : <?=$commande['total'] ?> €</p>
        </div>
        <div class="col text-center">
          <a href="Contenu/factures.php?id=<?=$commande['id'] ?>" class="text-decoration-none">Facture</a>
        </div>
      </div>
      <?php if(array_search($commande, $commandes) <  count($commandes) - 1) {echo('<hr/>');}else{echo('<br/>');} ?>
      <?php endforeach; ?>
      <?php endif;?>
      <?php else: ?>
      <div class="row align-items-center py-5">
        <div class="col text-center">
          <h3>Pas encore de commandes...</h3>
          <a href="index.php" class="text-decoration-none">Commencer à faire mes achats !</a>
        </div>
      </div>
      <?php endif;?>
    </div>
  </div>
</div>

<div style="height: 100px"></div>
<div class="row bg-light fixed-bottom py-3">
  <div class="col text-center">
    <a class="text-decoration-none text-dark fst-italic fs-5" href="index.php">Revenir a l'accueil</a>
  </div>
</div>