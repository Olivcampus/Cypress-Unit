<?php
//
//namespace Tests\Feature;
//
//use App\Models\Article;
//use App\Models\User;
//use Illuminate\Foundation\Testing\RefreshDatabase;
//use Tests\TestCase;
//
//class ArticleTest extends TestCase
//{
//    use RefreshDatabase;
//
////    public function testShowArticle()
////    {
////        $article = Article::factory()->create();
////
////        $response = $this->get('api/articles/' . $article->slug)
////            ->assertExactJson([
////                'article' => [
////                    'slug' => $article->slug,
////                    'title' => $article->title,
////                    'body' => $article->body,
////                    'description' => $article->description,
////                    'tagList' => [],
////                    'createdAt' => $article->created_at,
////                    'updatedAt' => $article->updated_at,
////                    'favorited' => false,
////                    'favoritesCount' => 0,
////                    'author' => [
////                        'username' => $article->user->username,
////                        'bio' => $article->user->bio,
////                        'image' => $article->user->image,
////                        'following' => false
////                    ]
////                ]
////            ]);
////    }
////
//////    public function test_articles()
//////    {
//////        $userArticles = $user->articles;
//////        $this->assertEquals(2, $userArticles->count());
//////    }
////
////
////    public function test_articles()
////    {
////        $user = User::find(1);
////        $articles = $user->articles;
////        $this->assertInstanceOf( $articles);
////
////    }
//
//
//
//
//}
