<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'username'  => 'admin',
                'role'      => '1',
                'name'      => 'admin',
                'email'     => 'admin@admin',
                'jabatan'   => 'Superadmin',
                'no_hp'     => '08221616161',
                'foto'      => 'a',
                'password'  => bcrypt('123')
            ]
            );
    }
}
