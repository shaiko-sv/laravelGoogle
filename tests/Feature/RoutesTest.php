<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoutesTest extends TestCase
{

    /**
     * Test admin group routes
     *
     * @return void
     */
    public function testAdminRoute()
    {
        $response = $this->withoutMiddleware()->get('/admin');
        $response->assertStatus(200);
    }

    public function testCategoriesCrudRoute()
    {
        $response = $this->withoutMiddleware()->get('/admin/categoriesCrud');
        $response->assertStatus(200);
    }

    public function testCategoriesCreateRoute()
    {
        $response = $this->withoutMiddleware()->get('admin/categoriesCrud/create');
        $response->assertStatus(200);
    }

    public function testDownloadImageRoute()
    {
        $response = $this->withoutMiddleware()->get('admin/downloadImage');
        $response->assertStatus(200);
    }

    public function testDownloadJsonRoute()
    {
        $response = $this->withoutMiddleware()->get('admin/downloadJson');
        $response->assertStatus(200);
    }

    public function testNewsCreudRoute()
    {
        $response = $this->withoutMiddleware()->get('admin/newsCrud');
        $response->assertStatus(200);
    }

    public function testNewsCreateRoute()
    {
        $response = $this->withoutMiddleware()->get('admin/newsCrud/create');
        $response->assertStatus(200);
    }

    public function testUserCrudRoute()
    {
        $response = $this->withoutMiddleware()->get('admin/usersCrud');
        $response->assertStatus(200);
    }

    public function testUserCreatRoute()
    {
        $response = $this->withoutMiddleware()->get('admin/usersCrud/create'); //TODO: create view, and change index() method
        $response->assertStatus(200);
    }

    /**
     * Test routes which don't need login
     *
     * @return void
     */
    public function testMainRoute()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testNewsRoute()
    {
        $response = $this->get('/news');
        $response->assertStatus(200);
    }

    public function testOneNewsRoute()
    {
        $response = $this->get('/news/one/1');
        $response->assertStatus(200);
    }

    public function testNewsByCategoryRoute()
    {
        $response = $this->get('/news/category/coronavirus');
        $response->assertStatus(200);
    }

    public function testHomeRoute()
    {
        $response = $this->get('/home');
        $response->assertStatus(200);
    }

    public function testLaravelRoute()
    {
        $response = $this->get('/laravel');
        $response->assertStatus(200);
    }

    public function testLoginRoute()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function testLogoutRoute()
    {
        $response = $this->get('/logout');
        $response->assertStatus(302);
    }

    public function testCategoriesRoute()
    {
        $response = $this->get('/news/category');
        $response->assertStatus(200);
    }

    public function testPasswordResetRoute()
    {
        $response = $this->get('/password/reset');
        $response->assertStatus(200);
    }

    public function testVueRoute()
    {
        $response = $this->get('/vue');
        $response->assertStatus(200);
    }
}
