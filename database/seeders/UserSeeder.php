<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entities = [
            [
                'nom'  => "AGBOKA",
                'prenom'  => "Fabrice",
                'phone'  => "22590948503",
                'email'     => 'fabrice@gmail.com',
                'password'  => bcrypt('password'),
                'role_id'   => 1,
                'state' => true,
            ],
            [
                'nom'  => "DOE",
                'prenom'  => "John",
                'phone'  => "22590948503",
                'email'     => 'john@gmail.com',
                'password'  => bcrypt('password'),
                'role_id'   => 2,
                'state' => true,
            ],
            [
                'nom'  => "DOE",
                'prenom'  => "Jane",
                'email'     => 'jane@gmail.com',
                'password'  => bcrypt('password'),
                'role_id'   => 2,
                'state' => true,
            ],
        ];

        foreach ($entities as $value) {
            User::create($value);
        }
    }
}
