<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    protected $users = [
        ['name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => '$2y$10$chKzpDkKnHwHShv/wdU7WuoTnzH7c.HLLOqyNyTLMzIfKqc9RAfd.',
//            'created_at' => '2020-04-07 11:57:29',
//            'updated_at' => '2020-04-07 11:57:29'
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert($this->users);
    }
}
