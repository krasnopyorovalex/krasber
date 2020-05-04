<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Article;
use App\Page;

/**
 * Class PageTest
 * @package Tests\Feature
 */
class PageTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
        factory(Page::class)->create();
        factory(Page::class)->create(['alias' => 'blog', 'template' => 'page.blog']);
    }

    /** @test */
    public function see_main_page(): void
    {
        $this->get('/')
            ->assertStatus(200);
    }

    /** @test */
    public function not_found_page(): void
    {
        $this->get('/not-page')
            ->assertStatus(404);
    }

    /** @test */
    public function see_blog_page(): void
    {
        $this->get('/blog')
            ->assertStatus(200);
    }

    /** @test */
    public function create_new_article(): void
    {
        $article = factory(Article::class)->create();

        $this->get('/blog')
            ->assertSee($article->preview)
            ->assertSee($article->alias)
            ->assertSee($article->name);

        $this->get('/blog/' . $article->alias)
            ->assertSee($article->name);
    }
}
