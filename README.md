# Adassa Ongulaire 💅

Site web professionnel pour **Adassa Prothésiste Ongulaire**. Ce projet est optimisé pour un déploiement sur **Render** via **GitHub**.

## 🚀 Déploiement sur Render

1. **GitHub** : Créez un nouveau dépôt sur votre compte GitHub et poussez tous les fichiers de ce dossier.
2. **Render** :
   - Connectez-vous à [Render.com](https://render.com).
   - Cliquez sur **New +** > **Web Service**.
   - Connectez votre dépôt GitHub "adassa_ongulaire".
   - Render détectera automatiquement le fichier `composer.json` et choisira l'environnement PHP.
3. **Base de données** :
   - Créez une base de données **MySQL** (Render ne propose pas MySQL nativement en gratuit, vous pouvez utiliser un service comme **Aiven**, **Tidb Cloud**, ou prendre un module MySQL payant sur Render).
   - Importez le contenu du fichier `adassa_ongulaire.sql` dans votre nouvelle base de données.
   - Sur Render, allez dans l'onglet **Environment** de votre Web Service et ajoutez les variables suivantes :
     - `DB_HOST` : L'hôte de votre BDD (ex: mysql.mon-service.com).
     - `DB_NAME` : `adassa_ongulaire`.
     - `DB_USER` : Votre nom d'utilisateur BDD.
     - `DB_PASSWORD` : Votre mot de passe BDD.
     - `DB_PORT` : Le port (généralement `3306`).

## 📁 Structure du projet

- `index.php` : Page d'accueil avec les derniers modèles.
- `galerie.php` : Galerie complète filtrable.
- `outils.php` : Présentation du matériel utilisé.
- `contact.php` : Formulaire de contact pour les clientes.
- `css/style.css` : Design "Rose Doux" avec effets 3D.
- `images/` : Dossiers contenant les photos des modèles et outils.
- `config.php` : Connexion sécurisée à la base de données via variables d'environnement.

## 🛠️ Modifications apportées pour le Cloud
- Suppression de la page `ajouter.php` (gestion via BDD directe conseillée pour la sécurité).
- Mise à jour de `header.php` pour retirer les liens inutiles.
- Ajout de `Dockerfile` pour un déploiement robuste sur Render.
- Ajout de `composer.json` pour la compatibilité PHP.
- Ajout de `.gitignore` pour un dépôt GitHub propre.

---
*Réalisé pour Adassa Ongulaire.*
