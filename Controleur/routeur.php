<?php

require_once 'Controleur/controleurAccueil.php';
require_once 'Controleur/controleurCaracteristiques.php';
require_once 'Controleur/controleurCategorie.php';
require_once 'Controleur/controleurInscription.php';
require_once 'Vue/vue.php';

class Routeur {
    private $ctrlAccueil;
    private $ctrlCaracteristiques;
    private $ctrlCategorie;
    private $ctrlInscription;

    public function __construct(){
      $this->ctrlAccueil = new ControleurAccueil();
      $this->ctrlCaracteristiques = new ControleurCaracteristiques();
      $this->ctrlCategorie = new ControleurCategorie();
      $this->ctrlInscription = new ControleurInscription();
    }
    
    //Traite une requête entrante
    public function routerRequete(){
        try {
          if(isset($_GET['action'])){
            if($_GET['action']=='details'){
              $id=intval($this->getParametre($_GET,'idProduit')); //intval renvoie la valeur numerique du parametre ou 0 en cas d'echec
              if($id!=0){
                $this->ctrlCaracteristiques->caracteristiques($id);
              }
              else{
                throw new Exception("Identifiant du produit incorrect");
              } 
            }
            else if($_GET['action']=='categorie'){
              $id=intval($this->getParametre($_GET,'idCat'));
              if($id!=0){
                $this->ctrlCategorie->categorie($id);
              }
              else{
                throw new Exception("Identifiant de la catégorie incorrect");
              }
            }
            else if($_GET['action']=='inscription'){
              $this->ctrlInscription->inscription();

              if(isset($_POST['validerInscription'])){

                if($this->getParametre($_POST,'MdpInscription')==$this->getParametre($_POST,'confirmerMdpInscription')){
                  $pseudo=$this->getParametre($_POST,'pseudoInscription');

                  if($this->ctrlInscription->ctrlCheckAvaibility($pseudo)){
                    $hashMdpInscription=sha1($this->getParametre($_POST,'MdpInscription'));
                    $this->ctrlInscription->ctrlRegister($pseudo,$hashMdpInscription);
                    $_SESSION['logged']=true; //Une fois enregistré on connecte l'utilisateur
                    header('Location:index.php');
                  }
                  else{
                    throw new Exception("Utilisateur déjà existant");
                  }
                }
                else{
                  throw new Exception("Le même mot de passe n'est pas le même");
                }
              }
            }
            else{
              throw new Exception("Action non valide");
            }
          }
          else{ //Aucune action définie : affichage de l'accueil
            $this->ctrlAccueil->accueil();
          }
        }
        catch(Exception $e){
          $this->erreur($e->getMessage());
        }  
    }

    // Affiche une erreur
    private function erreur($msgErreur){
        $vue = new Vue ("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }

    //Recherche un paramètre dans un tableau
    private function getParametre($tableau,$nom){
      if(isset($tableau[$nom])){
          return $tableau[$nom];
      }
      else{
          throw new Exception("Paramètre '$nom' absent");
      }
  }
}