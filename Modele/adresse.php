<?php 

require_once 'Modele/Modele.php';

class Adresse extends Modele{

    //Renvoie l'adresse du client
    public function getCustomerAdress($idClient){
        $sql='SELECT C.* FROM customers C JOIN logins L ON C.id=L.customer_id WHERE L.customer_id=?';
        $informations = $this->executerRequete($sql,array($idClient));
        return $informations->fetch();
    }

    //Remplit delivery_addresses avec valeurs du formulaire
    public function createNewAdd($prenom,$nom,$add1,$add2,$ville,$cp,$numTel,$email){
        $sql='INSERT INTO delivery_addresses VALUES (NULL,?,?,?,?,?,?,?,?)';
        $this->executerRequete($sql,array($prenom,$nom,$add1,$add2,$ville,$cp,$numTel,$email));
    }

    //Remplit delivery_adresses avec valeurs de customers
    public function createAdd($idClient){
        $sql='INSERT INTO delivery_addresses(id, firstname,lastname,add1,add2,city,postcode,phone,email) SELECT id,forname,surname,add1,add2,add3,postcode,phone,email FROM customers WHERE id=?';
        $this->executerRequete($sql,array($idClient));
    }

}