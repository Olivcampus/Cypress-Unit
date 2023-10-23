<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        $rose = User::create(["username" => "Rose", "email" => "rose@mail.com", "password" => Hash::make("pwd"), "bio" => "Je voudrais devenir enseignante pour enfants", "created_at" => Carbon::now()]);
        $musonda = User::create(["username" => "Musonda", "email" => "musonda@mail.com", "password" => Hash::make("pwd2"), "bio" => 'Je songe à devenir infirmière, j’écris mes réflexions', 'created_at' => Carbon::now()]);
        $articleRose = Article::make(["title" => "Le pull du jour", "slug" => "/articleRose", "description" => "Le pull est vert", "body" => 'lkdskcdsqkcdsnckdsncksdckndskckdklkndscknsdkcndslk', 'created_at' => Carbon::now()]);
        $toto = User::create(["username" => "toto", "email" => "toto@mail.com", "password" => Hash::make("toto"), "bio" => "toto", "created_at" => Carbon::now()]);

//        $musonda->following()->attach($rose);

        $articleMusonda1 = Article::make(["title" => "articleMusonda1", "slug" => "article1", "description" => "Le pull est vert", "body" => 'BBBBBB oljfe olje', 'created_at' => Carbon::now()]);
        $articleMusonda2 = Article::make(["title" => "articleMusonda2", "slug" => "article2", "description" => "Le pull est vert", "body" => 'AAAkjeikj KJKNDC; ,lkz,dlk,zdk ', 'created_at' => Carbon::now()]);

        $articleRose->user()->associate($rose)->save();
        $articleMusonda2->user()->associate($musonda)->save();
        $articleMusonda1->user()->associate($musonda)->save();

        $rose->favoritedArticles()->attach($articleMusonda2->id);
        $rose->following()->attach($musonda);
        $rose->followers()->attach($musonda);
        $toto->following()->attach($rose);
//        $rose->following()->attach($articleMusonda1->id);

        $tag = Tag::create(["name" => "education"]);
        $articleRose->tags()->attach($tag);
//        $articleRose->tags()->attach($tag);
        $commentaireMonsonda = Comment::create(["body" => 'Super ton article', "article_id" => $articleRose->id, "user_id" => $musonda->id, "created_at" => Carbon::now()]);
//        $commentaireMonsonda-> associate($rose);
//
//        $articleRose->comments()->save($commentaireMonsonda);


    }
}


//php artisan db:seed --class=DatabaseSeeder
//
//php artisan migrate:fresh --seed

//  Installation de PHPUnit https://github.com/adamwathan/sublime-phpunit ... pour sublimeText

// Testing laravel

//php artisan make:test UserTest -> Cration d un test unitaire pour la classe User.

//Pour exécuter les test phpunit


//1. Configuration des tests avec PHPStorm :
//Pour effectuer des tests dans PHPStorm, vous pouvez utiliser PHPUnit, un framework de test unitaire populaire pour PHP.
// Voici comment configurer PHPStorm pour les tests :
// Installation de PHPUnit : Avant tout, assurez-vous d'avoir PHPUnit installé localement dans votre projet.
// Vous pouvez l'installer via Composer en ajoutant PHPUnit en tant que dépendance dans votre fichier composer.json et en exécutant composer install.
//Création de tests : Écrivez des tests PHPUnit dans votre projet.
// Les fichiers de test doivent être situés dans un répertoire approprié, généralement nommé "tests" ou "tests/Unit".
// Vous pouvez créer des tests en étendant la classe PHPUnit\Framework\TestCase.

//Configuration de PHPStorm :
//  Ouvrez votre projet dans PHPStorm.
//Allez dans "File" (Fichier) > "Settings" (Paramètres) sur Windows ou "PHPStorm" > "Preferences" sur Mac.
//Dans la section "Languages & Frameworks" (Langages et Frameworks), sélectionnez "PHP".
//Assurez-vous que le chemin vers le binaire PHPUnit est correctement configuré.
//Dans la section "Languages & Frameworks" > "PHP" > "Test Frameworks", ajoutez une configuration pour PHPUnit.
// Sélectionnez le fichier de configuration PHPUnit (phpunit.xml) de votre projet.
//
//Exécution des tests :
// Ouvrez le fichier de test que vous souhaitez exécuter.
//Cliquez avec le bouton droit sur le nom du test ou de la classe et sélectionnez "Run 'Nom du Test'".
//
//PHPStorm exécutera les tests et affichera les résultats dans la fenêtre "Run" en bas de l'écran.


//Pour accéder à la bdd
//sqlite3 database/database.sqlite


//php artisan make:test UserSqlTest --unit

//php artisan test


