<?php $this->titre='WEB 4 SHOP : Mon compte'; ?>

<div class="col-11 bg-light mx-auto mt-3" style="border-radius: 12px;">
  <div class="row align-items-center">
    <div class="col text-center ms-2">
      <h2>Mes informations du compte</h2>
      <p>Iciiiiiiiiiiiiiiiiiiiiiiiiiiiiiii
      iiiiiiiiiiiiiiiiiiiiiiiiiiiii
      iiiiiiiiiiiiiiiiiiiiiiiiii
      iiiiiiiiiiiii</p>
    </div>
    <div class="col vert-sep">
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
