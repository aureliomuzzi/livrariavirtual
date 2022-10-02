<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarios = [
            [
                'name' => 'Administrador',
                'username' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('123'), 
            ],
        ];

        foreach ($usuarios as $usuario) {
            User::firstOrCreate($usuario);
        }
    }
}
