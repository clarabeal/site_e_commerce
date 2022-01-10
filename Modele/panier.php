<?php 

require_once 'Modele/Modele.php';

class Panier extends Modele {

    //Renvoie vrai si l'utilisateur a déjà une commande en cours, faux sinon
    public function checkOrder($idClient){
        $sql='SELECT * FROM orders WHERE customer_id=? AND status=0';
        $resultat=$this->executerRequete($sql,array($idClient));
        return ($resultat->RowCount()==1);
    }

    //Renvoie l'identifiant de la commande 
    public function getIdOrder($idClient){
        $sql='SELECT id FROM orders WHERE customer_id=? AND status=0';
        $idCommande=$this->executerRequete($sql,array($idClient));
        return $idCommande->fetch();
    }

    //Insère une nouvelle commande dans la table orders
    public function createOrder($idClient){
        $sql='INSERT INTO orders VALUES (NULL,?,1,NULL,NULL,?,0,0,NULL)';
        $date=date("Y")."-".date("m")."-".date("j");
        $this->executerRequete($sql,array($idClient,$date));
    }

    //Insère un produit dans orderitems
    public function addProduct($idCommande,$idProduit){
        $resultat=$this->productInOrder($idCommande,$idProduit);
        $quantite=$resultat['quantity'];

        if($quantite!=0){ //Si il y a déjà le produit
            $sql='UPDATE orderitems SET quantity=2 WHERE order_id=? AND product_id=?';
            $this->executerRequete($sql,array($idCommande,$idProduit));
        }
        else{ //On ajoute le produit avec une quantité 1
            $sql='INSERT INTO orderitems VALUES (NULL,?,?,1)';
            $this->executerRequete($sql,array($idCommande,$idProduit));
        }
    }

    // Renvoie la quantité du produit dans la commande
    public function productInOrder($idCommande,$idProduit){
        $sql='SELECT quantity FROM orderitems WHERE order_id=? AND product_id =?';
        $quantite = $this->executerRequete($sql,array($idCommande,$idProduit));
        return $quantite->fetch();
    }

    //Renvoie customer_id du customer
    public function getCustomerId($pseudo){
        $sql='SELECT customer_id FROM logins WHERE username=?';
        $idClient = $this->executerRequete($sql,array($pseudo));
        return $idClient->fetch();
    }

    //Renvoie les caractéristiques des produits présents dans la commande
    public function getProductsOrder($idCommande){
        $sql='SELECT P.name, P.image, P.price, O.quantity FROM orderitems O JOIN products P ON O.product_id=P.id WHERE O.order_id=?';
        $idProduits = $this->executerRequete($sql,array($idCommande));
        return $idProduits->fetchAll();
    }
}
