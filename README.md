# <h1 align="center">👨‍💻 Entraînement Laravel 10 👩‍💻</h1>

## Exemples de code
- migration : [2024_02_03_153848_create_articles_table.php](database/migrations/2024_02_03_153848_create_articles_table.php)
- factory : [ArticleFactory.php](database/factories/ArticleFactory.php)
- model : [Article.php](app/Models/Article.php)
- view - liste article : [list.blade.php](resources/views/article/list.blade.php)
- view - formulaire article : [form.blade.php](resources/views/article/form.blade.php)
- controller - article : [ArticleController.php](app/Http/Controllers/ArticleController.php)
- controller - envoi d'un email : [PHPMailerController.php](app/Http/Controllers/PHPMailerController.php)
- command : [GetJoke.php](app/Console/Commands/GetJoke.php)
___

## 1) Lancement
Lancer WampServer avec PHP à partir de la version 8.1.     

Urls accessibles :       
- soit celle donnée par l'exécution de la commande `php artisan serve` : http://127.0.0.1:8000/
- soit celle que l'on a configuré en vhost : http://laravel-10-training/     

Lancer VITE en mode dev : `npm run dev`.    

## 2) Configuration
- /config
- .env
- `composer install` : Composer doit d'abord être installé
- `npm install` : Node.js et npm doivent d'abord être installés
- ajouter des fichiers lang fr :
   - `composer require laravel-lang/common --dev`
   - `php artisan lang:add fr`
   - `php artisan lang:update`
- authentification : 
   - config\auth.php :       
   ```php
         'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
         ],
   ```

### Laravel Breeze     
C'est un kit d'authentification : connexion, inscription, réinitialisation du mot de passe, mise à jour profil, ...      

- `composer require laravel/breeze --dev`      
- `php artisan breeze:install` : exemples d'options choisis => blade, no, 0       

⚠️ Il faut l'installer juste après l'installation de laravel sinon ça écrase certains de nos fichiers comme routes/web.php.

### Attention
Si on utilise pas Laravel Sanctum il faut ignorer ses migrations en ajoutant `\Laravel\Sanctum\Sanctum::ignoreMigrations();` dans la fonction register() du fichier app\Providers\AppServiceProvider.php.    

## 3) Commandes
- charger les fichiers définis dans `vite.config.js` en mode dev : `npm run dev` 
- quand on modifie des routes : `php artisan route:cache` et `php artisan route:clear`
- créer des fichiers lang : `php artisan lang:publish`
- créer un controleur : `php artisan make:controller ArticleController`
- créer un modèle : 
   - `php artisan make:model Article`
   - avec une migration : `php artisan make:model Article --migration`
- créer une commande : `php artisan make:command GetJoke` 
- créer un middleware : `php artisan make:middleware Localization`
- créer un composant : `php artisan make:component formNewsletter`
- test unitaire
   - créer un test unitaire : `php artisan make:test CalculTest --unit`
   - lancer les tests unitaires : `php artisan test`
- lancer une commande : `php artisan app:get-joke`

### Migrations
- créer une migration : `php artisan make:migration create_articles_table`
- exécuter les migrations : 
   - toutes : `php artisan migrate`
   - 1 seule : `php artisan migrate --path=database\migrations\2024_02_03_153848_create_articles_table.php`
- annuler les migrations :
   - toutes : `php artisan migrate:rollback`
   - 1 seule : `php artisan migrate:rollback --path=database\migrations\2024_02_03_153848_create_articles_table.php`
   
### Factory
- créer une factory : `php artisan make:factory ArticleFactory`
   - pour un modèle donné : `php artisan make:factory ArticleFactory --model=Article`
- utiliser une factory : `Article::factory()->count(10)->create();`
   - soit dans un seeder : centralise la génération de données tests, permet de le faire par la console
   - soit ou on veut dans le code : plus flexible

### Seeder
- créer un seeder : `php artisan make:seeder ArticleSeeder`
- exécuter un seeder : `php artisan db:seed --class=ArticleSeeder`

## 4) Extensions
- Laravel Blade Snippets de Winnie Lin
- HTML CSS Support de ecmel

## 5) Définitions
- migration : permet de sauvegarder et d'exécuter des requêtes SQL afin de maintenir la base de données à jour
- factory : permet de créer des enregistrements factices dans une table => déclenchement par le code
- seeder : permet de créer des enregistrements factices dans une table => déclenchement en ligne de commande
- vite : outil pour compiler et regrouper des fichiers CSS et JavaScript.       
Rque : on compile le code pour que le navigateur puisse l'interpréter 

## 6) Documentation
- Laravel : https://laravel.com/docs/10.x/  
- faker : https://fakerphp.github.io/formatters/numbers-and-strings/
- helpers (fonction blade, route, ...) : https://laravel.com/docs/10.x/helpers
- manipuler des chaînes de caractères : https://laravel.com/docs/10.x/strings     
- rules : https://laravel.com/docs/10.x/validation#available-validation-rules
- envoyer un email avec PHPMailer : https://github.com/PHPMailer/PHPMailer 