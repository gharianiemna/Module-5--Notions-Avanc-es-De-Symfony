Leçon 5.4 : Tests Unitaires -Découverte de PHPUnit-

Pour exécuter le code voici les différentes commandes:

1-Cloner le dépot
https://github.com/gharianiemna/Module-5--Notions-Avanc-es-De-Symfony

2-Se déplacer dans le dossier de l'act 5.4 
cd Activity-5.4
cd Act-5.4

3-Installer les dépendances 
composer install

4- excuter dans le terminal les commandes des tests unitaires suivantes :
* méthode getState: vendor/bin/phpunit --filter testgetState tests/Service/FileSystemImprovedTest.php
* méthode createFile: vendor/bin/phpunit --filter testcreateFile tests/Service/FileSystemImprovedTest.php
* méthode deleteFile: vendor/bin/phpunit --filter testdeleteFile tests/Service/FileSystemImprovedTest.php