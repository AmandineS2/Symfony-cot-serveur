Bienvenue sur mon projet symfony en back-end. 

Ici, je vais vous expliquer comment j'ai crée une API en symfony. 

Tout d'abord il faut installer Symfony via Composer, cependant il vous faudra installer composer si vous ne l'avait pas déjà.
https://getcomposer.org/.


#installation de composer
composer install


#installation de Symfony
Voici le lien vers le site officiel de Symfony :  https://symfony.com/doc/current/setup.html

composer create-project symfony/skeleton:"6.3.*" my_project_directory (Vous pouvez changer le "my_project_directory" par le nom de votre projet)

(aller dans votre dossier projet)
cd my_project_directory

#Lancer Symfony sur le serveur local
symfony server:start

#Arrêter Symfony sur le serveur local
symfony server:stop

#créer une base de données
php bin/console doctrine:database:create

#Lancer une migration
php bin/console doctrine:migration:migrate

#Migrer les fixture
php bin/console doctrine:fixtures:load






