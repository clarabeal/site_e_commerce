<?php 

require_once 'Modele/Modele.php';

class MonCompte extends Modele {

    // Fonction changeant le mot de passe du client
  
    public function changePass($pseudo,$hashMdp){
        $sql='UPDATE logins SET password=? WHERE username=?';
        $resultat=$this->executerRequete($sql,array($hashMdp,$pseudo));
    }
  
    public function checkMdp($pseudo, $oldHashMdp) {
        $sql='SELECT * FROM logins WHERE username=? AND password=?';
        $resultat=$this->executerRequete($sql,array($pseudo,$oldHashMdp));
        return ($resultat->RowCount()==1);
    }
  
}
