<?php

require_once 'Modele/adresse.php';
require_once 'Vue/Vue.php';

class ControleurAdresse{
    private $adresse;

    public function __construct(){
      $this->adresse = new Adresse();  
    }

    // Affiche formulaire pour rentrer une nouvelle adresse ou utiliser celle enregistrée
    public function adresse($idClient){
        $info = $this->adresse->getCustomerAdress($idClient);
        $vue=new Vue('Adresse');
        $vue->generer(array('info'=>$info));
    }

    public function ctrlCreateNewAdd($idCommande,$prenom,$nom,$add1,$add2,$ville,$cp,$numTel,$email){
        return $this->adresse->createNewAdd($idCommande,$prenom,$nom,$add1,$add2,$ville,$cp,$numTel,$email);
    }

    public function ctrlCreateAdd($idClient){
        $this->adresse->createAdd($idClient);
    }

    public function ctrlUpdateStatusOrder($idCommande,$statut){
        $this->adresse->updateStatusOrder($idCommande,$statut);
    }

    public function ctrlUpdateAdrOrder($idAdr,$idClient){
        $this->adresse->updateAdrOrder($idAdr,$idClient);
    }
}