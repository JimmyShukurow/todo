<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();

    	foreach (range(1,85) as $index) {
            DB::table('details_of_lists')->insert([
                'user_id'=>$faker->biasedNumberBetween($min = 2, $max = 8),
                'name' => $faker->name,
                'description' => $faker->realText($maxNbChars = 50, $indexSize = 2),
            ]);
        }
    }
    
}
