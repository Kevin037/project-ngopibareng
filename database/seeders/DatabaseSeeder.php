<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1000)->create();

        // $user = User::factory(100000)->make();

        // $chunks = $user->chunk(2000);
        
        // $chunks->each(function ($chunk) {
        //     User::insert($chunk->toArray());
        // });

    
        // JALANKAN INI DULU YA
        // User::create([
        //     'nama' => 'kevin',
        //     'email' => 'kevinadmin@gmail.com',
        //     'alamat' => 'ngawi, jawa timur',
        //     'no_telp' => '086754835782',
        //     'role_id' => '1',
        //     'password' => bcrypt('test1234'),
        // ]);

        // Role::create([
        //     'nama_role' => 'admin'
        // ]);

        // Role::create([
        //     'nama_role' => 'user'
        // ]);
        // JALANKAN INI DULU YA

    }
}
