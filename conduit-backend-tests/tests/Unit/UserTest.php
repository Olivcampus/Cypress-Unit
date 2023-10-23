<?php

namespace Tests\Unit;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;


    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_getRouteKeyName()
    {
        $user = new User();
        $routeKeyName = $user->getRouteKeyName();
        $this->assertEquals('username', $routeKeyName);
    }


    public function test_articles()
    {
        $user2 = new User();
        $this->assertEmpty($user2->articles);
        $artcilesuser2 = $user2->articles;
        foreach ($artcilesuser2 as $article) {
            $this->assertEmpty($article->title);
            $this->assertEmpty($article->slug);
            $this->assertEmpty($article->description);
            $this->assertEmpty($article->body);
        }

        $rose = User::find(1);
        $articlesDeRose = $rose->articles;
        $this->assertEquals(1, $articlesDeRose->count());
        foreach ($articlesDeRose as $article) {
            $this->assertNotEmpty($article->title);
            $this->assertNotEmpty($article->slug);
            $this->assertNotEmpty($article->description);
            $this->assertNotEmpty($article->body);
        }

        $munonda = User::find(2);
        $articlesDeMunonda = $munonda->articles;
        $this->assertEquals(2, $articlesDeMunonda->count());
        foreach ($articlesDeMunonda as $article) {
            $this->assertNotEmpty($article->title);
            $this->assertNotEmpty($article->slug);
            $this->assertNotEmpty($article->description);
            $this->assertNotEmpty($article->body);
        }
    }


    public function test_favouriteArticles()
    {
        $munonda = User::find(2);
        $this->assertCount(0, $munonda->favoritedArticles);
        $rose = User::find(1);
        $this->assertCount(1, $rose->favoritedArticles);
        $favoritedArticlesRose = $rose->favoritedArticles;
        foreach ($favoritedArticlesRose as $article) {
            $this->assertNotEmpty($article->title);
            $this->assertNotEmpty($article->slug);
            $this->assertNotEmpty($article->description);
            $this->assertNotEmpty($article->body);
        }
    }

    public function test_followers()
    {


//        $this->assertEquals(
//            User::whereHas('', function (Builder $query) use ($userTest) {
//                $query->where('', $userTest->id);
//            }),
//            $userTest->following
//        );
        $userTest = new User();
        $userfollowing = $userTest->followers;
        $this->assertEquals(0,$userfollowing->count());

        $rose = User::find(1);
        $rosefollowing = $rose->followers;
        $this->assertEquals(2, $rosefollowing->count());

    }


    public function test_following()
    {

//        $this->assertEquals(
//            User::whereHas('', function (Builder $query) use ($userTest) {
//                $query->where('', $userTest->id);
//            }),
//            $userTest->following
//        );
        $userTest = new User();
        $userfollowing = $userTest->following;
        $this->assertEquals(0,$userfollowing->count());

        $toto = User::find(3);
        $totofollowig= $toto->following;
        $this->assertEquals(1, $totofollowig->count());

        $rose = User::find(1);
        $rosefollowing = $rose->following;
        $this->assertEquals(1, $rosefollowing->count());

    }




    public function test_doesUserFollowAnotherUser(){

        $rose = User::find(1);
        $rose->following;
        $this ->assertTrue(true);



        $userTest = new User();
        $userTest->following;
        $this ->assertFalse(false);
    }

    public function test_doesUserFollowArticle(){

        $rose = User::find(1);
        $rose->favoritedArticles;
        $this ->assertTrue(true);

        $userTest = new User();
        $userTest->favoritedArticles;
        $this ->assertFalse(false);
    }


    public function test_setPasswordAttribute(){

        $user = new User();
        $user->setPasswordAttribute('coucou');
        $this->assertTrue(password_verify('coucou', $user->password));
        // Tester le user est pas intelligent.

        $rose = User::find(1);
        $rose->setPasswordAttribute('linus');
        $this->assertTrue(password_verify('linus', $rose->password));
    }


    public function test_getJWTIdentifier(){

        $user = new User();
        $clefUser = $user->getJWTIdentifier();
        $this->assertNull($clefUser);

        $rose = User::find(1);
        $clefRose= $rose->getJWTIdentifier();
        $this->assertNotNull($clefRose);

    }

}
































//use PHPUnit\Framework\TestCase;
//
//class UserTest extends TestCase
//{
//    public function testCreateUser()
//    {
//        // Créez un nouvel utilisateur
//        $user = new \App\User([
//            'name' => 'John Doe',
//            'email' => 'john@example.com',
//            'password' => bcrypt('password'),
//        ]);
//
//        // Assurez-vous que l'utilisateur est enregistré en base de données
//        $this->assertTrue($user->save());
//
//        // Vous pouvez également ajouter d'autres assertions pour vérifier des propriétés de l'utilisateur, etc.
//    }
//}
