<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_primary()
    {
        $article = factory('App\Article')->create();

        $this->assertInstanceOf('App\Article', $article);
    }
}
