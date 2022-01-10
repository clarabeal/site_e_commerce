<?php

require_once 'Modele/panier.php';
require_once 'Vue/Vue.php';

class ControleurPanier {
    private $panier;

    public function __construct(){
        $this->panier = new Panier();
    }

    // Affiche le panier du client
    public function panierConnect($idCommande){
        $produits=$this->panier->getProductsOrder($idCommande);
        $vue=new Vue('Panier');
        $vue->generer(array('produits'=>$produits));
    }

    // Affiche le panier du client pas connecté
    public function panier(){
        $vue=new Vue('Panier');
        $vue->generer(array(NULL));
    }
}
