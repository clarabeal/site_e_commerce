<?php 

require_once 'Modele/Modele.php';

class Inscription extends Modele {

    //Renvoie vrai si l'utilisateur peut être crée, faux sinon
    public function checkAvaibility($pseudo){
        $sql='SELECT username FROM logins WHERE username=?';
        $resultat=$this->executerRequete($sql,array($pseudo));
        return ($resultat->RowCount()==0);
    }

    //Insère le nouvel utilisateur dans la table customers et logins
    public function register($prenom,$nom,$add1,$add2,$ville,$cp,$numTel,$email,$pseudo,$hashMdp){
        $sql='INSERT INTO customers VALUES (NULL,?,?,?,?,?,?,?,?,1)';
        $this->executerRequete($sql,array($prenom,$nom,$add1,$add2,$ville,$cp,$numTel,$email));

        $customer = $this->getCustomerId($email);
        $customerId = $customer['id'];

        $sql="INSERT INTO logins VALUES (NULL,$customerId,?,?)";
        $this->executerRequete($sql,array($pseudo,$hashMdp));
    }

    //Renvoie l'identifiant de la table customer pour la customer_id de logins
    public function getCustomerId($email){
        $sql='SELECT id FROM customers WHERE email=?';
        $customerId = $this->executerRequete($sql,array($email));
        return $customerId->fetch();
    }
}