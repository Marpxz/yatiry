<?php

use Illuminate\Database\Seeder;
use Yatiry\College;

class CollegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(College::class, 1)->create();
    }
}
