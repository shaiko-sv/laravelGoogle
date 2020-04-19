<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
     /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('12345678'),
                'is_admin' => true,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
