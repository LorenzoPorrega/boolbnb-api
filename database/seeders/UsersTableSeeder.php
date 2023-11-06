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
        $admin = [
            "name" => "admin",
            "surname" => "admin",
            "telephone_num" => "3450608812",
            "email" => "admin@admin.com",
            "password" => '$2y$10$lIb7iVEzEL6EyNSDyD8vguU96.TVlnpIcmzeEyHIwUEmcQzrrC5eS',
        ];

        $admin_user = new User();
        $admin_user->name = $admin["name"];
        $admin_user->surname = $admin["surname"];
        $admin_user->telephone_num = $admin["telephone_num"];
        $admin_user->email = $admin["email"];
        $admin_user->password = $admin["password"];

        $admin_user->save();
    }
}
