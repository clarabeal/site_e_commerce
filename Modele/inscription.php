<?php 

require_once 'Modele/Modele.php';

class Inscription extends Modele {

    //Renvoie vrai si l'utilisateur peut être crée, faux sinon
    public function checkAvaibility($pseudo){
        $sql='SELECT username FROM logins WHERE username=?';
        $resultat=$this->executerRequete($sql,array($pseudo));
        return ($resultat->RowCount()==0);
    }

    //Insère le nouvel utilisateur dans la table logins
    public function register($pseudo,$hashMdp){
        $sql='INSERT INTO logins VALUES (NULL,?,?,?)';
        $this->executerRequete($sql,array($this->customerId($pseudo),$pseudo,$hashMdp));
    }

    //Renvoie l'id pour créer le customer_id
    public function customerId($pseudo){
        $sql='SELECT id FROM logins WHERE username=?';
        $resultat=$this->executerRequete($sql,array($pseudo));
        return $resultat->fetch();
    }
}