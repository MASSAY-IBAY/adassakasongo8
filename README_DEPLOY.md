# Déploiement sur Render

Ce projet est configuré pour fonctionner sur Render. Pour que les pages affichent les données (Galerie, Détails), vous devez configurer une base de données MySQL.

## Étapes de configuration sur Render

1.  **Créer une base de données MySQL** sur Render (ou utiliser un service externe comme TiDB, Aiven, etc.).
2.  **Importer les données** : Utilisez le fichier `adassa_ongulaire.sql` pour créer les tables et insérer les modèles initiaux.
3.  **Configurer les variables d'environnement** : Dans les paramètres de votre service web sur Render, ajoutez les variables suivantes :
    *   `DB_HOST` : L'hôte de votre base de données (ex: `mysql-service-name`).
    *   `DB_USER` : Votre nom d'utilisateur.
    *   `DB_PASSWORD` : Votre mot de passe.
    *   `DB_NAME` : `adassa_ongulaire`.
    *   `DB_PORT` : `3306` (ou le port spécifié par votre fournisseur).

## Améliorations apportées

*   **Robustesse** : Le site ne plante plus si la base de données est absente ou mal configurée. Il affiche simplement un message "Aucun modèle disponible".
*   **Sécurité** : Les erreurs SQL détaillées ne sont plus affichées aux utilisateurs finaux.
*   **Flexibilité** : Utilisation de variables d'environnement pour une configuration facile sans modifier le code.
