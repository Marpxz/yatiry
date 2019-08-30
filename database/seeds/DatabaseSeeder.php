<?php

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
        $this->call(CollegeSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(UserSeeder::class);
        //$this->call(Scoreboard::class);
    }
}
