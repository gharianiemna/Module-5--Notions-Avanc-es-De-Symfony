Cette activité consiste à récupérer les données d'une liste déroulante à travers une table et enregistrer des données 
affectant au moins 2 entités avec une relation entre eux

Pour exécuter le code voici les différentes commandes:

1-Cloner le dépot
https://github.com/gharianiemna/Module-5--Notions-Avanc-es-De-Symfony

2-Se déplacer dans le dossier de l'act 5.2 
cd Activity-5.2
cd Act-5.2

3-Installer les dépendances 
composer install

4-Créer la base de données
php bin/console doctrine:database:create

5-Exécuter les migrations
php bin/console doctrine:migrations:migrate

6-Lancer le serveur
php bin/console server:run

