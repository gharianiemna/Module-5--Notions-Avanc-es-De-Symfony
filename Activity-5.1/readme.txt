Leçon 5.1 : Security Components

Pour exécuter le code voici les différentes commandes:

1-Cloner le dépot
https://github.com/gharianiemna/Module-5--Notions-Avanc-es-De-Symfony

2-Se déplacer dans le dossier de l'act 5.1 
cd Activity-5.1
cd Act-5.1

3-Installer les dépendances 
composer install

4-Créer la base de données
php bin/console doctrine:database:create

5-Exécuter les migrations
php bin/console doctrine:migrations:migrate

6-Lancer le serveur
php bin/console server:run

7- Suivre les routes :
@Route ("/"): Home
@Route ("/Register"): pour créer un compte
@Route ("/login"): pour se connecter:
		- pour acceder au compte admin: email: ADMIN@ADMIN.COM + password: admin123123
		- pour acceder au compte user: email: med@talan.com + password: 123456
@Route ("/index"): accessible uniquement après connexion pour voir les offres de voyage 
@Route ("/admin"): accessible uniquement après connexion pour voir la liste des users
@Route ("/user"): accessible uniquement après connexion affiche un élément différent selon si l’utilisateur possède le rôle ROLE_ADMIN ou non.
@Route ("/logout"):pour se déconnecter
Vous Pouvez Aussi utiliser le Navbar!
