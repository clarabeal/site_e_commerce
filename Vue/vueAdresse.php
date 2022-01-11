<?php $this->titre='WEB 4 SHOP : Saisir adresse'; ?>

<form action="index.php?action=saisirAdresse" method="POST">
    <p>Votre adresse<p>
    <p>Prénom : <?=$info['forname']; ?></p>
    <p>Nom : <?=$info['surname']; ?></p>
    <p>Adresse 1 : <?=$info['add1']; ?></p>
    <p>Adresse 2 : <?=$info['add2']; ?></p>
    <p>Ville : <?=$info['add3']; ?></p>
    <p>Code postal : <?=$info['postcode']; ?></p>
    <p>Numéro de téléphone : <?=$info['phone']; ?></p>
    <p>Email : <?=$info['email']; ?></p>
    <br/>
    <!--<input class="button" type="submit" name="validerAdresse" value="Utiliser ces informations">-->

    <!-- Bouton temporaire qui ne fait rien -->
    <p>Utiliser ces informations</p>
    
</form>


<form action="index.php?action=saisirAdresse" method="POST">
   
    <p>Choisir une autre adresse<p>
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
        <tr><td><input class="button" type="submit" name="validerNewAdresse" value="Valider"></td></tr>
    </table>
          
</form>