<?php

require_once 'Controleur/controleurAccueil.php';
require_once 'Controleur/controleurCaracteristiques.php';
require_once 'Controleur/controleurCategorie.php';
require_once 'Controleur/controleurInscription.php';
require_once 'Controleur/controleurConnexion.php';
require_once 'Controleur/controleurPanier.php';
require_once 'Controleur/controleurMonCompte.php';
require_once 'Controleur/controleurAdresse.php';
require_once 'Vue/vue.php';

class Routeur {
  private $ctrlAccueil;
  private $ctrlCaracteristiques;
  private $ctrlCategorie;
  private $ctrlInscription;
  private $ctrlConnexion;
  private $ctrlPanier;
  private $ctrlMonCompte;
  private $ctrlAdresse;

  public function __construct(){
    $this->ctrlAccueil = new ControleurAccueil();
    $this->ctrlCaracteristiques = new ControleurCaracteristiques();
    $this->ctrlCategorie = new ControleurCategorie();
    $this->ctrlInscription = new ControleurInscription();
    $this->ctrlConnexion = new ControleurConnexion();
    $this->ctrlPanier = new ControleurPanier();
    $this->ctrlMonCompte = new ControleurMonCompte();
    $this->ctrlAdresse = new ControleurAdresse();
  }
    
  //Traite une requête entrante
  public function routerRequete(){
    try {
      if(isset($_GET['action'])){
        
        // Caractéristiques //
        
        if($_GET['action']=='details'){

          $idProduit=intval($this->getParametre($_GET,'idProduit')); //intval renvoie la valeur numerique du parametre ou 0 en cas d'echec
          
          if($idProduit!=0){
            $this->ctrlCaracteristiques->caracteristiques($idProduit);
          }
          else{
            throw new Exception("Identifiant du produit incorrect");
          }
          
          if(isset($_POST['ajoutPanier'])){

            if($_SESSION['logged']){

              $pseudoClient=$this->getParametre($_SESSION,'pseudo');
              $client=$this->ctrlCaracteristiques->ctrlGetCustomerId($pseudoClient);
              $idClient=$client['customer_id'];
              $qteProduit=intval($this->getParametre($_POST,'qte'));
              
              if($qteProduit==NULL) {
                $qteProduit=1;
              }

              if($this->ctrlCaracteristiques->ctrlCheckOrder($idClient)){ //On regarde si l'utilisateur a une commande en cours
                $commande=$this->ctrlCaracteristiques->ctrlGetIdOrder($idClient);
                $idCommande=$commande['id'];

                //On vérifie qu'il n'y a pas de problème de stock
                if($this->ctrlCaracteristiques->ctrlAddProduct($idCommande,$idProduit,$qteProduit)){
                  #header('Location:index.php?action=panier');
                }
                else{
                  throw new Exception("Produit en rupture de stock");
                }
              }
              else{
                //Si l'utilisateur n'a pas de commande en cours il faut en créer une
                $this->ctrlCaracteristiques->ctrlCreateOrder($idClient);

                $commande=$this->ctrlCaracteristiques->ctrlGetIdOrder($idClient);
                $idCommande=$commande['id'];

                if($this->ctrlCaracteristiques->ctrlAddProduct($idCommande,$idProduit,$qteProduit)){
                  header('Location:index.php?action=panier');
                }
                else{
                  throw new Exception("Produit en rupture de stock");
                }
              }
            }
            else{
              throw new Exception("Connectez vous avant d'acheter");
            }
          }
        }
        
        // Catégories //
        
        else if($_GET['action']=='categorie'){
          $id=intval($this->getParametre($_GET,'idCat'));
          if($id!=0){
            $this->ctrlCategorie->categorie($id);
          }
          else{
            throw new Exception("Identifiant de la catégorie incorrect");
          }
        }
        
        // Inscription //
        
        else if($_GET['action']=='inscription'){
          if(!$_SESSION['logged']){ //Si l'utilisateur n'est pas connecté on affiche la page de connexion
            $this->ctrlInscription->inscription();

            if(isset($_POST['validerInscription'])){

              if($this->getParametre($_POST,'mdpInscription')==$this->getParametre($_POST,'confirmerMdpInscription')){
                $pseudo=$this->getParametre($_POST,'pseudoInscription');
                $email=$this->getParametre($_POST,'emailClient');

                if($this->ctrlInscription->ctrlCheckAvaibilityPseudo($pseudo)){ //Si le pseudo et l'adresse mail sont disponibles on peut créer le compte
                  if($this->ctrlInscription->ctrlCheckAvaibilityEmail($email)){
                    $hashMdpInscription=sha1($this->getParametre($_POST,'mdpInscription'));
                    $prenom=$this->getParametre($_POST,'prenomClient');
                    $nom=$this->getParametre($_POST,'nomClient');
                    $add1=$this->getParametre($_POST,'add1Client');
                    $add2=$this->getParametre($_POST,'add2Client');
                    $ville=$this->getParametre($_POST,'villeClient');
                    $cp=$this->getParametre($_POST,'cpClient');
                    $numTel=$this->getParametre($_POST,'numTelClient');

                    $this->ctrlInscription->ctrlRegister($prenom,$nom,$add1,$add2,$ville,$cp,$numTel,$email,$pseudo,$hashMdpInscription);
                    $_SESSION['logged']=true; //Une fois enregistré on connecte l'utilisateur
                    $_SESSION['pseudo']=$pseudo;
                    echo('<script> location.replace("index.php"); </script>');
                  }
                  else{
                    throw new Exception("Email déjà utilisé");
                  }
                }
                else{
                  throw new Exception("Utilisateur déjà existant");
                }
              }
              else{
                throw new Exception("Le mot de passe n'est pas le même");
              }
            } 
          }
          else{ //Si l'utilisateur est connecté, on le déconnecte
            $_SESSION['logged']=false;
            $_SESSION['pseudo']=NULL;
            echo('<script> location.replace("index.php"); </script>');
          }
        }
        
        // Connexion //
        
        else if($_GET['action']=='connexion'){
          $this->ctrlConnexion->connexion();
          if(isset($_POST['validerConnexion'])){

            $pseudo=$this->getParametre($_POST,'pseudoConnexion');
            $hashMdpConnexion=sha1($this->getParametre($_POST,'mdpConnexion'));

            if($this->ctrlConnexion->ctrlCheckUser($pseudo,$hashMdpConnexion)){
              $_SESSION['logged']=true;
              $_SESSION['pseudo']=$pseudo;
              header('Location:index.php');
              exit();
            }
            else{
              throw new Exception("Mauvais pseudo/mot de passe");
            }
          }
        }
        
        // Panier //
        
        else if($_GET['action']=='panier'){

          if($_SESSION['logged']){
            $pseudoClient=$this->getParametre($_SESSION,'pseudo');

            $client=$this->ctrlCaracteristiques->ctrlGetCustomerId($pseudoClient);
            $idClient=$client['customer_id'];

            $commande=$this->ctrlCaracteristiques->ctrlGetIdOrder($idClient);
            $idCommande=$commande['id'];

            $this->ctrlPanier->panierConnect($idCommande);
            
            if(isset($_POST['viderPanier'])) {
              $this->ctrlPanier->ctrlViderPanier($idCommande);
            }
          }
          else{
            $this->ctrlPanier->panier();
          }
        }
        
        // Mon compte //
        
        else if($_GET['action']=='moncompte') {
          $this->ctrlMonCompte->monCompte();
          
          if($_SESSION['logged']) {
          
            // Change le mdp du compte si l'utilisateur l'utilise correctement
            if(isset($_POST['validerChgtMdp'])) {

              $newMdp=$this->getParametre($_POST,'newMdp');
              $confirmNewMdp=$this->getParametre($_POST,'confirmNewMdp');

              if($newMdp==$confirmNewMdp) {

                $pseudo=$this->getParametre($_SESSION,'pseudo');
                $oldHashMdp=sha1($this->getParametre($_POST,'oldMdp'));
                if($this->ctrlMonCompte->ctrlCheckMdp($pseudo,$oldHashMdp)) {

                  $newHashMdp=sha1($newMdp);
                  $this->ctrlMonCompte->ctrlChangePass($pseudo,$newHashMdp);
                } else {
                  throw new Exception("Mauvais ancien mot de passe");
                } 
              } else {
                throw new Exception("Le nouveau mot de passe doit être le même que celui confirmé");
              }
            }
          } else {
            header('Location:index.php');
          }
        }

        // Adresse //

        else if($_GET['action']=='saisirAdresse'){

          $pseudoClient=$this->getParametre($_SESSION,'pseudo');

          $client=$this->ctrlCaracteristiques->ctrlGetCustomerId($pseudoClient);
          $idClient=$client['customer_id'];

          $this->ctrlAdresse->adresse($idClient);

          if(isset($_POST['validerNewAdresse'])){
            //On créé une nouvelle adresse dans delivery_addresses avec les valeurs du formulaire
            $prenom=$this->getParametre($_POST,'prenomClient');
            $nom=$this->getParametre($_POST,'nomClient');
            $add1=$this->getParametre($_POST,'add1Client');
            $add2=$this->getParametre($_POST,'add2Client');
            $ville=$this->getParametre($_POST,'villeClient');
            $cp=$this->getParametre($_POST,'cpClient');
            $numTel=$this->getParametre($_POST,'numTelClient');
            $email=$this->getParametre($_POST,'emailClient');

            $resultat = $this->ctrlAdresse->ctrlCreateNewAdd($prenom,$nom,$add1,$add2,$ville,$cp,$numTel,$email);
            $idAdr=$resultat['id'];

            //On remplit table orders avec id adresse
            $this->ctrlAdresse->ctrlUpdateAdrOrder($idAdr,$idClient);

            //On passe le statut de la commande à 1
            $this->ctrlAdresse->ctrlUpdateStatusOrder($idClient,1);

            header('Location:index.php');
            //header('Location:index.php?action=paiement');
          }
          else if(isset($_POST['validerAdresse'])){ //Marche pas

            $pseudoClient=$this->getParametre($_SESSION,'pseudo');
            $client=$this->ctrlCaracteristiques->ctrlGetCustomerId($pseudoClient);
            $idClient=$client['customer_id'];

            $this->ctrlAdresse->ctrlCreateAdd($idClient);

            //Manque récupérer l'id pour remplir id adresse dans orders

            //On passe le statut de la commande à 1
            $this->ctrlAdresse->ctrlUpdateStatusOrder($idClient,1);

            header('Location:index.php');
            //header('Location:index.php?action=paiement');
          }
        }
             
        // Action non valide //
             
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
