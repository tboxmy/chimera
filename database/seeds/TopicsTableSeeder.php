<?php

use Illuminate\Database\Seeder;
use App\Topic;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create();
        Topic::create([
            'name' => 'General 01',
            'description' => $faker->text,            
        ]);
        Topic::create([
            'name' => 'Science 01',
            'description' => $faker->text,            
        ]);
    }
}
