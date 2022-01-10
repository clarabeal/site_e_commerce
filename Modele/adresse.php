<?php 

require_once 'Modele/Modele.php';

class Adresse extends Modele{

    //Renvoie l'adresse du client
    public function getCustomerAdress($idClient){
        $sql='SELECT C.* FROM customers C JOIN logins L ON C.id=L.customer_id WHERE L.customer_id=?';
        $informations = $this->executerRequete($sql,array($idClient));
        return $informations->fetch();
    }
}