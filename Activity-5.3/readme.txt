Leçon 5.3 : AJAX

Pour exécuter le code voici les différentes commandes:

1-Cloner le dépot
https://github.com/gharianiemna/Module-5--Notions-Avanc-es-De-Symfony

2-Se déplacer dans le dossier de l'act 5.3 
cd Activity-5.3
cd Act-5.3

3-Installer les dépendances 
composer install

4-Créer la base de données
php bin/console doctrine:database:create

5-Exécuter les migrations
php bin/console doctrine:migrations:migrate

6-Exécuter la requete SQL suivante (à partir du fichier dbuserauth.sql)
INSERT INTO `user` (`id`, `user_name`, `email`, `password`, `roles`) VALUES
('', 'ADMIN', 'ADMIN@ADMIN.COM', '$2y$13$EdZYhWz7bSmBQ/d5cw6kfOGhCC55Kxpj3U01g7nTkyYADiBjcGVYK', '[\"ROLE_ADMIN\"]'),
('', 'ahmed', 'med@talan.com', '$2y$13$9/dCMjX9AZaOHviJPNbOEuu7/dGqfRQr7dQCmKxywM93sbGzBwmLW', '[\"ROLE_USER\"]'),

7- Lancer le serveur
php bin/console server:run

8- Suivre les routes :
- Page acceuil Home
	 "/"
- Page inscription 
	"/Register"
- Page connection
 	"/login"
- Page pour récupérer les informations de l'utilisateur connecté:
  	"/ajax-index" 	==> accessible uniquement après connexion 

Vous Pouvez Aussi utiliser le Navbar!
   