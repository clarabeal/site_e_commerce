# Web 4 shop

Projet réalisé par Julian DEGUT et Clara BEAL

## Organisation

Répartition du travail : Frontend Julian, Backend Clara

## Difficultés rencontrées et solutions

- Passage de l'architecture MVC simple à l'architecture MVC orientée objet <br />
Etant donné qu'il était impossible de faire des tests durant le passage à une architecture orientée objet, une fois l'implémentation des classes fini, il était difficile de savoir quand est-ce que nous avions fait une erreur.

- Possiblité que les utilisateurs non connectés puissent acheter <br />
Nous n'avons pas eu le temps d'apprendre à gérer l'id de session, nous avons préféré consacrer ce temps à développer plus de fonctionnalités pour notre site et donc rendre les commandes possibles seulement pour les clients connectés.


- Problème pour remplir delivery_add_id dans orders car il n'y avait pas de lien entre les tables orders et delivery_addresses <br />
Afin de relier ces tables nous avons inséré une colonne order_id dans delivery_addresses ce qui nous a ensuite permis de pouvoir faire le lien entre ces deux tables


## Architecture du site
- VueAccueil : affichage de tous les produits avec nom et prix

- VueCaracteristiques : affichage d'un produit avec toutes ses caractéristiques : nom, catégorie, description, prix

- VueCategorie : affichage des produits d'une catégorie selectionnée avec nom et prix

- VueInscription : affichage du formulaire d'inscription

- VueConnexion : affichage du formulaire de connexion

- VuePanier : visualisation du panier du client et possibilité de passer la commande

- VueMonCompte : possible de modifier son mot de passe

- VueAdresse : permet à l'utilisateur de rentrer une nouvelle adresse ou d'utiliser celle de son compte

