
Pour cette activité, l'objectif est de travailler  Security Component Symfony
 Pour cela il est indispensable d'intervenir sur différentes parties du code, principalement dans :
-l'entité User,
-le formulaire,
-le composant de sécurité pour :
	-les firewalls : quels sont les formulaires et route de login et logout
	-les providers pour dire où sont les données utilisateurs
	-les encoder pour l’algorithme d’encodage à utiliser
-les access_control pour définir les parties de l’application accessible ou non

**********************************************************************************************************************

Pour executer le code voici les diffrenetes routes:
@Route("/"): Home
@Route("/Register"): pour creer un compte
@Route("/connect"):pour se connecter


Vous Pouvez Aussi utiliser le Navbar!