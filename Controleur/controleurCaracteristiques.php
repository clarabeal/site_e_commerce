<?php

require_once 'Modele/produit.php';
require_once 'Modele/categorie.php';
require_once 'Vue/Vue.php';

class ControleurCaracteristiques {
    private $caracteristiques;
    private $categorie;

    public function __construct(){
        $this->caracteristiques = new Produit();
        $this->categorie = new Categorie();
    }

    //Affiche les détails sur un produit
    public function caracteristiques($idProduit){
        $caracteristiques = $this->caracteristiques->getCaracteristiques($idProduit);
        $categorie = $this->categorie->getCategorie($idProduit);
        $vue = new Vue("Caracteristiques");
        $vue->generer(array('caracteristiques' => $caracteristiques, 'categorie' => $categorie));
    }
    
}