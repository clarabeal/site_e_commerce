<?php $this->titre='WEB 4 SHOP : Inscription' ?>

<form action="index.php?action=inscription" method="POST">
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
        <tr><td><input class="button" type="submit" name="validerInscription" value="S'inscrire"></td></tr>
    </table>
</form>    