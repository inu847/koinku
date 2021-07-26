<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UmkmTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('umkms')->insert([
            'username' => 'adinugroho',
            'nama_umkm' => 'adishop',
            'email' => 'adin72978@gmail.com',
            'file_umkm' => 'admin',
            'ktp' => 'admin',
            'phone' => '083601822666',
            'tanggal_lahir' => now(),
            'alamat' => 'Selopuro 02/01',
            'password' => Hash::make('Semogaberkah'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
