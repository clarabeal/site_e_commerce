<?php

require_once 'Modele/produit.php';
require_once 'Modele/categorie.php';
require_once 'Vue/Vue.php';

class ControleurAccueil{
    private $produits;
    private $categories;

    public function __construct(){
        $this->produits = new Produit();
        $this->categories = new Categorie();
    }

    //Affiche la liste de tous les produits du site
    public function accueil(){
        $produits = $this->produits->getProducts();
        $categories = $this->categories->getCategories();
        $vue = new Vue("Accueil");
        $vue->generer(array('produits' => $produits,'categories' => $categories));
    }
}
