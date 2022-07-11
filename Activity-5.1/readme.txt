Leçon 5.1 : Security Components

Pour cette activité, l'objectif est de travailler avec Security Component Symfony
Pour cela il est indispensable d'intervenir sur différentes parties du code, principalement dans :
-l'entité User,
-le formulaire,
-le composant de sécurité pour :
	-les firewalls : quels sont les formulaires et route de login et logout
	-les providers pour dire où sont les données utilisateurs
	-les encoder pour l’algorithme d’encodage à utiliser
-les access_control pour définir les parties de l’application accessible ou non

***************************************************************************************************

Pour exécuter le code voici les différentes routes :

1-composer i
2-symfony console doctrine:database:create
3-symfony console make:migration  
4-symfony console doctrine:migrations:migrate 
5composer require server

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
