<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = [[
            "name" => "Islam Lorenzo",
            "surname" => "cognome",
            "telephone_num" => "3450608812",
            "email" => "test1@test.com",
            "password" => '$2y$10$lIb7iVEzEL6EyNSDyD8vguU96.TVlnpIcmzeEyHIwUEmcQzrrC5eS',
            "id" => '1'
        ],
        [
            "name" => "Andrea Michele",
            "surname" => "cognome",
            "telephone_num" => "3549841981",
            "email" => "test2@test.com",
            "password" => '$2y$10$lIb7iVEzEL6EyNSDyD8vguU96.TVlnpIcmzeEyHIwUEmcQzrrC5eS',
            "id" => '2'
        ]
    ];
        foreach ($admin as $singleOne)
        User::create([
            'name' => $singleOne['name'],
            'surname' => $singleOne['surname'],
            'telephone_num' => $singleOne['telephone_num'],
            'email' => $singleOne['email'],
            'password' => $singleOne['password'],
            'id' => $singleOne['id'],
        ]);
    }
}
