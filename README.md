# Web 4 shop

Projet réalisé par Julian DEGUT et Clara BEAL

## Organisation

Répartition du travail : Frontend Julian, Backend Clara

## Difficultés rencontrées et solutions

- Passage de l'architecture MVC simple à l'architecture MVC orientée objet <br />
Etant donné qu'il était impossible de faire des tests durant le passage à une architecture orientée objet, une fois l'implémentation des classes fini, il était difficile de savoir quand est-ce que nous avions fait une erreur.

- Problème pour remplir delivery_add_id dans orders car il n'y avait pas de lien entre les tables orders et delivery_addresses <br />
Afin de relier ces tables nous avons inséré une colonne order_id dans delivery_addresses ce qui nous a ensuite permis de pouvoir faire le lien entre ces deux tables


## Architecture du site
- VueAccueil : affichage de tous les produits avec nom et prix

- VueCaracteristiques : affichage d'un produit avec toutes ses caractéristiques : nom, catégorie, description, prix ainsi que les avis des clients

- VueCategorie : affichage des produits d'une catégorie selectionnée avec nom et prix

- VueInscription : affichage du formulaire d'inscription

- VueConnexion : affichage du formulaire de connexion

- VuePanier : visualisation du panier du client et possibilité de passer la commande

- VueMonCompte : possible de modifier son mot de passe, voir ses informations et ses commandes

- VueAdresse : permet à l'utilisateur de rentrer une nouvelle adresse ou d'utiliser celle de son compte

- VuePaiement : permet à l'utilisateur de choisir son moyen de paiement chèque ou paypal

- VueMaCommande : récapitulatif de la commande passée (produits, mode de paiement) et accès à la facture


