<?php 

require_once 'Modele/Modele.php';

class MonCompte extends Modele {

    // Fonction changeant le mot de passe du client
  
    public function changePass($pseudo,$hashMdp){
        $sql='UPDATE logins SET password=? WHERE pseudo=?';
        $resultat=$this->executerRequete($sql,array($hashMdp,$pseudo));
    }
  
    public function checkMdp($pseudo, $oldHashMdp) {
        $sql='SELECT password FROM logins WHERE username=?';
        $res=$this->executerRequete($sql,array($pseudo))->fetch();
        if($res == $oldHashMdp) {
          return true;
        } else {
          return false;
        }
    }
  
}
