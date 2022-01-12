<?php 

require_once 'Modele/Modele.php';

class Paiement extends Modele{

    public function paid($type,$idCommande) {
        $sql='UPDATE orders SET status=2 WHERE id=?';
        $this->executerRequete($sql,array($idCommande));
        $sql='UPDATE orders SET payment_type=? WHERE id=?';
        $this->executerRequete($sql,array($type,$idCommande));
    }
  
}
