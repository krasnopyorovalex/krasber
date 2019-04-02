<?php
namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PageTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
        factory('App\Page')->create();
        factory('App\Page')->create(['alias' => 'blog', 'template' => 'page.blog']);
    }

    /** @test */
    public function see_main_page()
    {
        $this->get('/')
            ->assertStatus(200);
    }

    /** @test */
    public function not_found_page()
    {
        $this->get('/not-page')
            ->assertStatus(404);
    }

    /** @test */
    public function see_blog_page()
    {
        $this->get('/blog')
            ->assertStatus(200);
    }

    /** @test */
    public function create_new_article()
    {
        $article = factory('App\Article')->create();

        $this->get('/blog')
            ->assertSee($article->preview)
            ->assertSee($article->alias)
            ->assertSee($article->name);

        $this->get('/blog/' . $article->alias)
            ->assertSee($article->name);
    }
}
