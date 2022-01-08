<?php 

require_once 'Modele/Modele.php';

class Connexion extends Modele {

    //Renvoie vrai si l'utilisateur existe dans la bd, faux sinon
    public function checkUser($pseudo,$hashMdp){
        $sql='SELECT * FROM logins WHERE username=? AND password=?';
        $resultat=$this->executerRequete($sql,array($pseudo,$hashMdp));
        return ($resultat->RowCount()==1);
    }

    //Renvoie customer_id du customer
    public function getCustomerId($pseudo){
        $sql='SELECT customer_id FROM logins WHERE username=?';
        $customerId = $this->executerRequete($sql,array($pseudo));
        return $customerId->fetch();
    }
}