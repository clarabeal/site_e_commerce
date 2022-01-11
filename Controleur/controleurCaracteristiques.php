<?php

require_once 'Modele/produit.php';
require_once 'Modele/categorie.php';
require_once 'Modele/panier.php';
require_once 'Vue/Vue.php';

class ControleurCaracteristiques {
    private $caracteristiques;
    private $categorie;
    private $panier;

    public function __construct(){
        $this->caracteristiques = new Produit();
        $this->categorie = new Categorie();
        $this->panier = new Panier();
    }

    //Affiche les détails sur un produit
    public function caracteristiques($idProduit){
        $caracteristiques = $this->caracteristiques->getCaracteristiques($idProduit);
        $categorie = $this->categorie->getCategorie($idProduit);
        $vue = new Vue("Caracteristiques");
        $vue->generer(array('caracteristiques' => $caracteristiques, 'categorie' => $categorie));
    }

    public function ctrlCheckOrder($idClient){
        return $this->panier->checkOrder($idClient);
    }

    public function ctrlGetIdOrder($idClient){
        return $this->panier->getIdOrder($idClient);
    }

    public function ctrlCreateOrder($idClient){
        $this->panier->createOrder($idClient);
    }

    public function ctrlAddProduct($idCommande,$idProduit,$qteProduit){
        return $this->panier->addProduct($idCommande,$idProduit,$qteProduit);
    }

    public function ctrlGetCustomerId($pseudo){
        return $this->panier->getCustomerId($pseudo);
    }
}
