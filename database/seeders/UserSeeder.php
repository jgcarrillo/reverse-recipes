<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Inertia\Testing\Concerns\Has;

class UserSeeder extends Seeder
{
    protected $users = [
        [
            'name' => 'Paco',
            'last_name' => 'Barbero',
            'email' => 'paco@pruebapaco.es',
        ],
        [
            'name' => 'Fernando',
            'last_name' => 'Domingo',
            'email' => 'fernando@pruebafernando.es',
        ],
        [
            'name' => 'Carlos',
            'last_name' => 'Fuentes',
            'email' => 'carlos@pruebacarlos.es',
        ],
        [
            'name' => 'Bartolomé',
            'last_name' => 'Sintes',
            'email' => 'bartolome@pruebabartolome.es',
        ],
        [
            'name' => 'Jonathan',
            'last_name' => 'Dos Santos',
            'email' => 'jonathan@pruebajonathan.es',
        ],
        [
            'name' => 'Artem',
            'last_name' => 'Ukraniam',
            'email' => 'artem@pruebaartem.es',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->users as $user) {
            DB::table('users')->insert([
                'name' => $user['name'],
                'last_name' => $user['last_name'],
                'email' => $user['email'],
                'password' => Hash::make('password'),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
        ]);
        }
    }
}
