<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'adinugroho',
            'nama_umkm' => 'genengan_koi',
            'email' => 'adin72978@gmail.com',
            'phone' => '083601822666',
            'status' => 'active',
            'tanggal_lahir' => now(),
            'password' => \Hash::make('Semogaberkah'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('roles')->insert([
            'role' => 'super',
            'user_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
