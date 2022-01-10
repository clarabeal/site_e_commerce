<?php

require_once 'Modele/monCompte.php';
require_once 'Vue/Vue.php';

class ControleurMonCompte{

    public function __construct(){
        $this->monCompte = new MonCompte();
    }

    //Affiche la liste de tous les produits du site
    public function monCompte(){
        $vue = new Vue("MonCompte");
        $vue->generer(array(NULL));
    }
  
    public function ctrlChangePass($pseudo,$hashMdp){
       return $this->monCompte->changePass($pseudo,$hashMdp);
    }
  
  public function ctrlCheckMdp($pseudo,$oldHashMdp){
       return $this->monCompte->checkMdp($pseudo,$oldHashMdp);
    }
  
}
