<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert(
            [
                'role'=>'admin',
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin'),
            ],
        );
        DB::table('users')->insert(
            [
                'name' => 'Bilal',
                'email' => 'bilal@gmail.com',
                'password' => bcrypt('bilal'),
            ],
        );
        DB::table('users')->insert(
            [
                'name' => 'Cesur',
                'email' => 'cesur@gmail.com',
                'password' => bcrypt('cesur'),
            ],
        );
        DB::table('users')->insert(
            [
                'name' => 'Azamat',
                'email' => 'azamat@gmail.com',
                'password' => bcrypt('azamat'),
            ],
        );
        DB::table('users')->insert(
            [
                'name' => 'Yahya',
                'email' => 'yahya@gmail.com',
                'password' => bcrypt('yahya'),
            ],
        );
        DB::table('users')->insert(
            [
                'name' => 'Hasan',
                'email' => 'hasan@gmail.com',
                'password' => bcrypt('hasan'),
            ],
        );
        DB::table('users')->insert(
            [
                'name' => 'Kerim',
                'email' => 'kerim@gmail.com',
                'password' => bcrypt('kerim'),
            ],
        );
        DB::table('users')->insert(
            [
                'name' => 'Jimmy',
                'email' => 'jimishukurow@gmail.com',
                'password' => bcrypt('jimmy'),
            ],
        );

        
    }
}
