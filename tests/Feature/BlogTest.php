<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BlogTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/blog');

        $response->assertSeeText('Блог');
        $response->assertStatus(200);
    }

    public function testNotFound()
    {
        $response = $this->get('/blog/ressbg');

        $response->assertStatus(404);
    }
}
