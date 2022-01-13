<?php

require_once 'Modele/monCompte.php';
require_once 'Vue/Vue.php';

class ControleurMonCompte{
    private $monCompte;
  
    public function __construct(){
        $this->monCompte = new MonCompte();
    }

    //Affiche la liste de tous les produits du site
    public function monCompte($idClient){
        $info = $this->monCompte->getCompteInfo($idClient);
        $commandes = $this->monCompte->getMesCommandes($idClient);
        $vue = new Vue("MonCompte");
        $vue->generer(array('info'=>$info,'commandes'=>$commandes));
    }
  
    public function ctrlChangePass($pseudo,$hashMdp){
        return $this->monCompte->changePass($pseudo,$hashMdp);
    }
  
    public function ctrlCheckMdp($pseudo,$oldHashMdp){
        return $this->monCompte->checkMdp($pseudo,$oldHashMdp);
    }
  
}
