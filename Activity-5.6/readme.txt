Leçon 5.6 :  Commandes Dans Symfony


Pour exécuter le code voici les différentes commandes:

1-Cloner le dépot
https://github.com/gharianiemna/Module-5--Notions-Avanc-es-De-Symfony

2-Se déplacer dans le dossier de l'act 5.6
cd Activity-5.6
cd Act-5.6

3-Installer les dépendances 
composer install

4-Créer la base de données
php bin/console doctrine:database:create

5-Exécuter les migrations
php bin/console doctrine:migrations:migrate

6- Lancer la commande fixtures
 php bin/console doctrine:fixtures:load


7-Exécuter la requete SQL suivante (à partir du fichier dbuserauth.sql)
INSERT INTO `user` (`id`, `user_name`, `email`, `password`, `roles`, `age`, `adress`) VALUES
('', 'ADMIN', 'ADMIN@ADMIN.COM', '$2y$13$EdZYhWz7bSmBQ/d5cw6kfOGhCC55Kxpj3U01g7nTkyYADiBjcGVYK', '[\"ROLE_ADMIN\"]', 30, 'Paris');

8- Lancer le serveur
php bin/console server:run

9- lancer la commande SendEmails:
php bin/console SendEmails

10- Suivre les routes :
- Page acceuil Home
	 "/"
- Page inscription 
	"/Register"
- Page connection
 	"/login": 
		- pour acceder au compte admin: email: ADMIN@ADMIN.COM + password: admin123123
		- pour acceder au compte user: email: med@talan.com + password: 123456
- Page Admin acces unique admin: affichage la liste des users
	 "/admin"	==> accessible uniquement après connexion 
- Page user affiche un élément différent selon si l’utilisateur possède le rôle ROLE_ADMIN ou non
 	"/user"	==> accessible uniquement après connexion 
- Pour se déconnecter: 
 	"/logout"
Vous Pouvez Aussi utiliser le Navbar!
