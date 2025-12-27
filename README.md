# TP Symfony : E-Learning & Product Form

Projet réalisé dans le cadre du TP Symfony (EHEI 2025/2026).

## 📋 Fonctionnalités réalisées

### TP 1 : Structure & Templating
- Mise en place du Layout global (Header, Footer Sticky).
- Création des pages "Accueil" et "Catalogue".
- Utilisation de DTOs (`Course`, `Author`, `Category`) pour structurer les données.

### TP 2 : Services & Injection de Dépendances
- **Refactoring** : Extraction de la logique de données hors du Contrôleur.
- **Handler** : Création de `DefaultCourseHandler` pour gérer la récupération des cours.
- **Factory** : Implémentation de `DefaultCourseFactory` pour la création des objets.
- **Interface** : Utilisation de `SimilarCourseProviderInterface` pour la fonctionnalité "Cours similaires".

### TP 3 : Page Produit (Headphones)
- **Objectif** : Transformer une page HTML statique en page Symfony dynamique.
- **Réalisation** :
    - Création du `AddToCartType` (Champs Quantity & Color).
    - Intégration dans `CartController`.
    - Templating fidèle au design Bootstrap fourni.
    - Route accessible via : `/product/headphones`.

### TP 4 : Les Formulaires Avancés
- **Wishlist** : Ajout d'un bouton formulaire (CSRF protected) sur la page de détail d'un cours.
- **Newsletter** : Création d'un formulaire global dans le footer géré par un `SubscribeController` dédié (Embedded Controller).

## 🛠 Installation

1. Démarrer le projet :
   ```bash
   make start
