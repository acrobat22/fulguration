# fulguration
Proto CV 

Pré-requis

composer ==> https://getcomposer.org/doc/00-intro.md

Use
Symfony 2.8
Initialisation du projet


cd fulguration
composer install
php app/console doctrine:database:create
php app/console doctrine:schema:update --force
php app/console asset:install
mkdir -p web/uploads/images
chmod -R 777 web/uploads
