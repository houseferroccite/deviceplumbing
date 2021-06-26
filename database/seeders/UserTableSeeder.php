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
           'name' => 'Администратор',
            'email' => 'admin@admin.ru',
            'password' => bcrypt('admin'),
            'is_admin' => 1,
        ]);
    }
}
