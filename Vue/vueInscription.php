<?php $this->titre='WEB 4 SHOP : Inscription' ?>

<div class="row">
  <div class="col-10 bg-light mx-auto my-3" style="border-radius: 12px;">
      <!--<form action="index.php?action=inscription" method="POST">
          <table>
              <tr><td>Pseudo souhaité:</td><td><input type="text" name="pseudoInscription" required></td></tr>
              <tr><td>Mot de passe:</td><td><input type="password" name="mdpInscription" required></td></tr>
              <tr><td>Confirmer mot de passe:</td><td><input type="password" name="confirmerMdpInscription" required></td></tr>       
              <br/>
          </table>
          
          <p>Entrez vos informations :</p>

          <table>
              <tr><td>Prénom:</td><td><input type="text" name="prenomClient" required></td></tr>
              <tr><td>Nom:</td><td><input type="text" name="nomClient" required></td></tr>
              <tr><td>Adresse 1:</td><td><input type="text" name="add1Client" required></td></tr>
              <tr><td>Adresse 2:</td><td><input type="text" name="add2Client" required></td></tr>
              <tr><td>Ville:</td><td><input type="text" name="villeClient" required></td></tr>
              <tr><td>Code postal:</td><td><input type="text" name="cpClient" required></td></tr>   
              <tr><td>Numéro de téléphone:</td><td><input type="text" name="numTelClient" required></td></tr>
              <tr><td>Email:</td><td><input type="text" name="emailClient" required></td></tr>    
              <br/>
              <tr><td><input class="button" type="submit" name="validerInscription" value="S'inscrire">
          </table>
      </form>-->
    <div class="row">
      <div class="col vert-sep">
        <form action="index.php?action=inscription" method="POST">
          <h1 class="text-center my-3">Inscription</h1>
          <legend>Informations du compte</legend>
          <div class="mb-3">
            <label for="pseudo" class="form-label">Pseudo :</label>
            <input type="text" class="form-control" name="pseudoInscription" required>
          </div>
          <div class="mb-3">
            <label for="motdepasse" class="form-label">Mot de passe :</label>
            <input type="password" class="form-control" name="mdpInscription" required>
          </div>
          <div class="mb-3">
            <label for="confirmMotdepasse" class="form-label">Confirmation du mot de passe :</label>
            <input type="password" class="form-control" name="confirmerMdpInscription" required>
          </div>
          <hr style="border: 1px solid gray;"/>
          <legend>Informations personnelles</legend>
          <div class="mb-3">
            <label for="prenom" class="form-label">Prénom :</label>
            <input type="text" class="form-control" name="prenomClient" required>
          </div>
          <div class="mb-3">
            <label for="nom" class="form-label">Nom :</label>
            <input type="text" class="form-control" name="nomClient" required>
          </div>
          <div class="mb-3">
            <label for="adresse1" class="form-label">Adresse 1 :</label>
            <input type="text" class="form-control" name="add1Client" required>
          </div>
          <div class="mb-3">
            <label for="adresse2" class="form-label">Adresse 2 :</label>
            <input type="text" class="form-control" name="add2Client" required>
          </div>
          <div class="mb-3">
            <label for="ville" class="form-label">Ville :</label>
            <input type="text" class="form-control" name="villeClient" required>
          </div>
          <div class="mb-3">
            <label for="codePostal" class="form-label">Code Postal :</label>
            <input type="text" class="form-control" name="cpClient" required>
          </div>
          <div class="mb-3">
            <label for="telephone" class="form-label">Numéro de téléphone :</label>
            <input type="tel" class="form-control" name="numTelClient" required>
          </div>
          <div class="mb-3">
            <label for="emil" class="form-label">Email :</label>
            <input type="email" class="form-control" name="emailClient" required>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-danger px-5 mb-3" name="validerInscription">S'inscrire</button>
          </div>
        </form>
      </div>
      <div class="col">
        <div class="row align-items-center">
          <div class="col text-center">
            <h2>Déja inscrit ?</h2>
            <p>Vous pouvez vous connecter via ce lien et commencer
            à faire vos achats !</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- 
Pseudo :
mot de passe :
confirmer :

prenom
nom
adresse 1
adresse 2
ville
code postal
num
email
-->