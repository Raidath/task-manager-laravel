 Mini Application Laravel - Gestion de Tâches
 Technologies utilisées
Laravel 12
PHP 8+
MySQL
Bootstrap 5
Laravel Breeze (authentification)
 Installation du projet 
 git clone https://github.com/Raidath/task-manager-laravel.git
cd task-manager-laravel
Installer les dépendances PHP
composer install
Installer les dépendances frontend
npm install
npm run dev
Configurer le fichier .env
cp .env.example .env 
configure la base de données 
Générer la clé de l’application
php artisan key:generate
Exécuter les migrations
php artisan migrate
Lancer le serveur
php artisan serve
ouvrir dans le navigateur
http://127.0.0.1:8000

