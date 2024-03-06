<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // insert fake user
		\App\Models\User::factory(5)->create();
		
		// insert questions data
		$this->call(QuestionsTableSeeder::class);
    }
}
