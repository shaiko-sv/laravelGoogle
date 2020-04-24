<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use UsersSeeder;

class NewCreateValidationTest extends DuskTestCase
{
    use RefreshDatabase;

    /**
     * A Dusk test example.
     *
     * @return void
     * @throws \Throwable
     */
    public function testExample()
    {
        $this->browse(function ($first, $second) {
            $first->loginAs(User::find(1));
            $second->visit('/admin/news/create')
                ->screenshot('newsForm')
                ->assertSee('Create new News');
        });
//        $user = factory(User::class)->create([
//            'email' => 'taylor@laravel.com',
//        ]);
//
//        $this->browse(function ($browser) use ($user) {
//            $browser->visit('/login')
//                ->type('email', $user->email)
//                ->type('password', 'password')
//                ->screenshot('loginForm')
//                ->press('Login')
//                ->visit('/admin/news/create')
//                ->screenshot('newsCreateForm')
//                ->type('title', '123')
//                ->type('shortText', '456')
//                ->type('text', '789')
//                ->press('Add News')
//                ->screenshot('newsFormValidation')
//                ->assertSee('The title must be at least 5 characters.')//TODO добавить текст ошибки
//                ->assertPathIs('/admin/news/create');
//        });
    }
}
