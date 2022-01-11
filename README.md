# Web 4 shop

Projet réalisé par Julian DEGUT et Clara BEAL

## Organisation

Répartition du travail : Frontend Julian, Backend Clara

## Difficultés rencontrées et solutions

- Passage de l'architecture MVC simple à l'architecture MVC orientée objet <br />
Etant donné qu'il était impossible de faire des tests durant le passage à une architecture orientée objet, une fois l'implémentation des classes fini, il était difficile de savoir quand est-ce que nous avions fait une erreur.

- Possiblité que les utilisateurs non connectés puissent acheter <br />
Nous n'avons pas eu le temps d'apprendre à gérer l'id de session, nous avons préféré consacrer ce temps à développer plus de fonctionnalités pour notre site et donc rendre les commandes possibles seulement pour les clients connectés.

- Affichage des quantités en fonction du stock <br />
Il était difficile d'afficher les le stock des produits tout en les mettant à jour suite aux commandes passées. Il n'est donc pas possible de choisir une quantité supérieure à 1 avant de mettre le produit dans le panier. Le client peut cependant ajouter le produit plusieurs fois dans son panier s'il veut plusieurs exemplaires de celui-ci. Une erreur lui indiquera si le produit est en rupture de stock.


## Architecture du site
- VueAccueil : affichage de tous les produits avec nom et prix

- VueCaracteristiques : affichage d'un produit avec toutes ses caractéristiques : nom, catégorie, description, prix

- VueCategorie : affichage des produits d'une catégorie selectionnée avec nom et prix

- VueInscription : affichage du formulaire d'inscription

- VueConnexion : affichage du formulaire de connexion

- VuePanier : visualisation du panier du client et possibilité de passer la commande

- VueMonCompte : Possible de modifier son mot de passe

- VueAdresse : permet à l'utilisateur de rentrer une nouvelle adresse ou d'utiliser celle de son compte

