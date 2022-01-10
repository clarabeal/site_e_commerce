<?php 

require_once 'Modele/Modele.php';

class MonCompte extends Modele {

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
        $sql='INSERT INTO orders VALUES (NULL,?,1,NULL,NULL,NULL,0,0,NULL)';
        $this->executerRequete($sql,array($idClient));
    }

    //Insère un produit dans orderitems
    public function addProduct($idCommande,$idProduit){
        $sql='INSERT INTO orderitems VALUES (NULL,?,?,1)';
        $this->executerRequete($sql,array($idCommande,$idProduit));
    }

    //Renvoie customer_id du customer
    public function getCustomerId($pseudo){
        $sql='SELECT customer_id FROM logins WHERE username=?';
        $idClient = $this->executerRequete($sql,array($pseudo));
        return $idClient->fetch();
    }
}
