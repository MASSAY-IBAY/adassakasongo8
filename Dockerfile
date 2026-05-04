# Utiliser une image PHP avec Apache
FROM php:8.2-apache

# Installer les extensions PHP nécessaires pour MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Activer le module de réécriture d'Apache (utile pour les jolies URLs)
RUN a2enmod rewrite

# Définir le répertoire de travail
WORKDIR /var/www/html

# Copier tous les fichiers du projet dans le conteneur
# Comme tout est à la racine, cette commande copie tout proprement
COPY . /var/www/html/

# Donner les droits appropriés au serveur web
RUN chown -R www-data:www-data /var/www/html

# Exposer le port 80
EXPOSE 80

# Démarrer Apache en arrière-plan
CMD ["apache2-foreground"]
