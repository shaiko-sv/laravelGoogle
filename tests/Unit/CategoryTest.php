<?php

namespace Tests\Unit;

use App\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
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

    public function testSetCategories()
    {
        $this->assertNotEmpty(Category::setCategories());
        $this->assertIsArray(Category::setCategories());
        $this->assertIsArray(Category::setCategories()[1]);
        $this->assertEquals(1, Category::setCategories()[1]['id']);
    }

    public function testGetCategories()
    {
        $this->assertIsArray(Category::getCategories());
        for($i=1; $i<=count(Category::getCategories()); $i++){
            $this->assertEquals($i, Category::setCategories()[$i]['id']);
        }
    }

    public function testGetCategoryNameById()
    {
        $this->assertEquals('Coronavirus', Category::getCategoryNameById(1));
    }

    public function testGetCategorySlugById()
    {
        $this->assertEquals('coronavirus', Category::getCategorySlugById(1));
    }

    public function testGetCategoryIdByName()
    {
        $this->assertEquals(1 , Category::getCategoryIdByName('coronavirus'));
    }

}
