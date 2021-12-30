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
        $sql='INSERT INTO logins VALUES (NULL,"1",?,?)';
        $this->executerRequete($sql,array($pseudo,$hashMdp));
    }
}