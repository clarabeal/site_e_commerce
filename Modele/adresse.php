<?php 

require_once 'Modele/Modele.php';

class Adresse extends Modele{

    //Renvoie l'adresse du client
    public function getCustomerAdress($idClient){
        $sql='SELECT C.* FROM customers C JOIN logins L ON C.id=L.customer_id WHERE L.customer_id=?';
        $informations = $this->executerRequete($sql,array($idClient));
        return $informations->fetch();
    }

    //Remplit delivery_addresses avec valeurs du formulaire et renvoie l'id de celle ci
    public function createNewAdd($idCommande,$prenom,$nom,$add1,$add2,$ville,$cp,$numTel,$email){
        $sql='INSERT INTO delivery_addresses VALUES (NULL,?,?,?,?,?,?,?,?,?)';
        $this->executerRequete($sql,array($idCommande,$prenom,$nom,$add1,$add2,$ville,$cp,$numTel,$email));

        //On souhaite retourner l'id de l'adresse pour remplir table orders
        $sql='SELECT id FROM delivery_addresses WHERE order_id=?';
        $idAdr=$this->executerRequete($sql,array($idCommande));
        return $idAdr->fetch();
    }

    //Récupère l'id de l'adresse liée à la commande
    public function getAdrId($idCommande){
        $sql='SELECT id FROM delivery_addresses WHERE order_id=?';
        $id=$this->executerRequete($sql,array($idCommande));
        return $id->fetch()['id'];
    }
  
    //Met à jour la commande en lui affectant l'adresse de livraison
    public function updateAdrId($idCommande){
        $sql="UPDATE orders SET delivery_add_id=? WHERE id=?";
        $this->executerRequete($sql,array($this->getAdrId($idCommande),$idCommande));
    }

    //Remplit delivery_adresses avec valeurs de customers(probleme pour l'id)
    public function createAdd($idClient,$idCommande){
        $sql='INSERT INTO delivery_addresses(id, order_id, firstname,lastname,add1,add2,city,postcode,phone,email) SELECT id,?,forname,surname,add1,add2,add3,postcode,phone,email FROM customers WHERE id=?';
        $this->executerRequete($sql,array($idCommande,$idClient));
    }

    //Permet de mettre à jour le statut de la commande
    public function updateStatusOrder($idCommande,$statut){
        $sql='UPDATE orders SET status=? WHERE id=?';
        $this->executerRequete($sql,array($statut,$idCommande));
    }

}