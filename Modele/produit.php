<?php 

require_once 'Modele/Modele.php';

class Produit extends Modele{

    //Renvoie la liste de tous les produits, triés par ordre alphabétique pour la page d'accueil
    public function getProducts(){
        $sql = 'SELECT * FROM products ORDER BY name';
        $produits = $this->executerRequete($sql);
        return $produits;
    }

    //Renvoie les caractéristiques associées au produit
    public function getCaracteristiques($idProduit){
        $sql = 'SELECT * FROM products WHERE id=?';
        $caracteristiques = $this->executerRequete($sql,array($idProduit));
        if($caracteristiques->RowCount()==1){ // On regarde si le produit existe
            return $caracteristiques->fetch(); // Accès à la première ligne de résultat
        }
        else{
            throw new Exception("Aucun produit ne correspond à l'identifiant'$idProduit'");
        }
    }

    // Renvoie les produits associés à la catégorie
    public function getProdCat($idCat){
        $sql = 'SELECT P.* FROM products P JOIN categories C ON P.cat_id=C.id WHERE C.id=?';
        $produits = $this->executerRequete($sql,array($idCat));
        if($produits->RowCount()>=1){ //On regarde si la catégorie existe
            return $produits;
        }
        else{
            throw new Exception("Aucune catégorie ne correspond à l'identifiant'$idCat'");
        }
    }
}