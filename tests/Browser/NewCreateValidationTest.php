<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class NewCreateValidationTest extends DuskTestCase
{
//    use RefreshDatabase;

    /**
     * A Dusk test example.
     *
     * @return void
     * @throws \Throwable
     */
    public function testExample()
    {
//        $this->browse(function ($first, $second) {
//            $first->loginAs(User::find(1))
//                ->visit('/admin/news/create')
//                ->type('title', '123')
//                ->type('shortText', '456')
//                ->type('text', '789')
//                ->press('Add News')
//                ->assertSee('The title must be at least 5 characters.')//TODO добавить текст ошибки
//                ->assertPathIs('/admin/news/create');
//        });
    }
}
