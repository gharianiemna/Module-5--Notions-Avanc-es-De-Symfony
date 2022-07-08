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
@Route ("/"): Home
@Route ("/Register"): pour créer un compte
@Route ("/login"): pour se connecter
@Route ("/index"): accessible uniquement après connexion pour voir les offres de voyage 
@Route ("/admin"): accessible uniquement après connexion pour voir la liste des users
@Route ("/user"): accessible uniquement après connexion affiche un élément différent selon si l’utilisateur possède le rôle ROLE_ADMIN ou non.
@Route ("/logout"):pour se déconnecter
Vous Pouvez Aussi utiliser le Navbar!
