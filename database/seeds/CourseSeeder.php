<?php

use Illuminate\Database\Seeder;
use Yatiry\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Course::class, 3)->create();
    }
}
