<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [[
            'id'             => 1,
            'name'           => 'Admin',
            'email'          => 'admin@admin.com',
            'password'       => '$2y$10$0uB4mw9Sayc1.2N2KOFyIed3QT1bM51s9b9qtAtzQzUhLRfJ8qtOa',
            'remember_token' => null,
            'created_at'     => '2019-06-06 10:01:39',
            'updated_at'     => '2019-06-06 10:01:39',
            'deleted_at'     => null,
            'approved'       => 1,
        ]];

        User::insert($users);
    }
}
