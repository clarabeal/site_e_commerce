<?php

require_once 'Modele/inscription.php';
require_once 'Vue/Vue.php';

class ControleurInscription {
    private $inscription;

    public function __construct(){
        $this->inscription = new Inscription();
    }

    // Affiche le formulaire d'inscription
    public function inscription(){
        $vue=new Vue('Inscription');
        $vue->generer(array(NULL));
    }

    public function ctrlCheckAvaibility($pseudo){
       return $this->inscription->checkAvaibility($pseudo);
    }

    public function ctrlRegister($pseudo,$MDP){
        $this->inscription->register($pseudo,$MDP);
    }
}