<?php

require_once 'Modele/monCompte.php';
require_once 'Vue/Vue.php';

class ControleurMonCompte{

    public function __construct(){
      
    }

    //Affiche la liste de tous les produits du site
    public function monCompte(){
        $vue = new Vue("MonCompte");
        $vue->generer(array(NULL));
    }
}
