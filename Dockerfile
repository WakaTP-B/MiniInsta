FROM php:apache

COPY . /var/www/html/

# chown => change le propriétaire
# www-data:www-data donne photos à l'utilisateur www-data et au groupe www-data (user apache)
# -R => récursif, pour tous les fichiers et dossiers à l'intérieur de photos
RUN chown -R www-data:www-data /var/www/html/Photos

EXPOSE 80