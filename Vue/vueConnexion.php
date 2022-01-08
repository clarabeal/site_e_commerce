<?php $this->titre='WEB 4 SHOP : Connexion'; ?>

<form action="index.php?action=connexion" method="POST">
    <table>
        <tr><td>Pseudo:</td><td><input type="text" name="pseudoConnexion"></td></tr>
        <tr><td>Mot de passe:</td><td><input type="password" name="mdpConnexion"></td></tr>
        <br/>
      <tr><td><input class="button" type="submit" name="validerConnexion" value="Se connecter"></td></tr>
    </table>   
</form>