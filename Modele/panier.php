<?php 

require_once 'Modele/Modele.php';

class Panier extends Modele {

    //Renvoie vrai si l'utilisateur a déjà une commande en cours, faux sinon
    public function checkOrder($idClient){
        $sql='SELECT * FROM orders WHERE customer_id=? AND status=0';
        $resultat=$this->executerRequete($sql,array($idClient));
        return ($resultat->RowCount()==1);
    }

    //Renvoie l'identifiant de la commande 
    public function getIdOrder($idClient){
        $sql='SELECT id FROM orders WHERE customer_id=? AND status=0';
        $idCommande=$this->executerRequete($sql,array($idClient));
        return $idCommande->fetch();
    }

    //Insère une nouvelle commande dans la table orders
    public function createOrder($idClient){
        $sql='INSERT INTO orders VALUES (NULL,?,1,NULL,NULL,?,0,0,NULL)';
        $date=date("Y")."-".date("m")."-".date("j");
        $this->executerRequete($sql,array($idClient,$date));
    }

    //Renvoie vrai si le produit a été ajouté à la commande, faux sinon
    public function addProduct($idCommande,$idProduit,$qteProduit){

        //On vérifie qu'il n'y a pas de rupture de stock
        if(!$this->checkSoldOut($idProduit)){
          if($this->checkQuantity($idProduit)['quantity'] >= $qteProduit) {
            //On peut ajouter le(s) produit

            $resultat=$this->productQuantityOrder($idCommande,$idProduit);
            if($resultat == false) { $quantite=0;}
            else {
              $quantite=$resultat['quantity'];
            }
  
            if($quantite!=0){ //Si il y a déjà le produit dans le panier

                $quantite = $quantite + $qteProduit;

                $sql='UPDATE orderitems SET quantity=? WHERE order_id=? AND product_id=?';
                $this->executerRequete($sql,array($quantite,$idCommande,$idProduit));
            }
            else{ //On ajoute le produit avec la quantité demandée
                $sql='INSERT INTO orderitems VALUES (NULL,?,?,?)';
                $this->executerRequete($sql,array($idCommande,$idProduit,$qteProduit));
            }

            //On modifie le stock
            $this->updateQuantity($idProduit,-1 * $qteProduit);
            
            return true;
          }
          else{
              return false;
          }
            
      } else {
        return false;
      }
            
    }

    // Renvoie la quantité du produit dans la commande
    public function productQuantityOrder($idCommande,$idProduit){
        $sql='SELECT quantity FROM orderitems WHERE order_id=? AND product_id =?';
        $quantite = $this->executerRequete($sql,array($idCommande,$idProduit));
        return $quantite->fetch();
    }

    //Renvoie customer_id du customer
    public function getCustomerId($pseudo){
        $sql='SELECT customer_id FROM logins WHERE username=?';
        $idClient = $this->executerRequete($sql,array($pseudo));
        return $idClient->fetch();
    }

    //Renvoie les caractéristiques des produits présents dans la commande
    public function getProductsOrder($idCommande){
        $sql='SELECT P.name, P.image, P.price, O.quantity FROM orderitems O JOIN products P ON O.product_id=P.id WHERE O.order_id=?';
        $idProduits = $this->executerRequete($sql,array($idCommande));
        return $idProduits->fetchAll();
    }

    //Renvoie le stock d'un produit
    public function checkQuantity($idProduit){
        $sql='SELECT quantity FROM products WHERE id=?';
        $quantite=$this->executerRequete($sql,array($idProduit));
        return $quantite->fetch();
    }

    //Modifie la quantité dans la table products
    public function updateQuantity($idProduit,$quantite){
        //On cherche la quantité qu'il y avait avant
        $resultat=$this->checkQuantity($idProduit);
        $q=$resultat['quantity'];

        $newQuantite=$q+$quantite;

        $sql='UPDATE products SET quantity=? WHERE id=?';
        $this->executerRequete($sql,array($newQuantite,$idProduit));
    }

    //Renvoie vrai si il y a une rupture de stock, faux sinon
    public function checkSoldOut($idProduit){
        $resultat=$this->checkQuantity($idProduit);
        $quantite=$resultat['quantity'];
        return($quantite==0);
    }
  
    //Fonction qui vide le panier
    public function viderPanier($idCommande) {
        $sql='SELECT * FROM orderitems WHERE order_id=?';
        $prods=$this->executerRequete($sql,array($idCommande))->fetchAll();
        foreach($prods as $produit) {
            $this->updateQuantity($produit['product_id'], $produit['quantity']);
            $sql='DELETE FROM orderitems WHERE order_id=? AND product_id=?';
            $this->executerRequete($sql,array($idCommande,$produit['product_id']));
        }
        
        $sql='DELETE FROM orders WHERE id=?';
        $this->executerRequete($sql,array($idCommande));
    }
}
