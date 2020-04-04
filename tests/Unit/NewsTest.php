<?php

namespace Tests\Unit;

use App\News;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NewsTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /**
     * Test for method setNews()
     *
     * @test
     * @return void
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function testGetNews()
    {
        $this->assertNotEmpty(News::getNews());
    }
}
