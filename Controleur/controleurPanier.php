<?php

require_once 'Modele/panier.php';
require_once 'Vue/Vue.php';

class ControleurPanier {

    public function __construct(){
    
    }

    // Affiche le panier du client
    public function panier(){
        $vue=new Vue('Panier');
        $vue->generer(array(NULL));
    }
}
