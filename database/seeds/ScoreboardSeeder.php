<?php

use Illuminate\Database\Seeder;
use Yatiry\Scoreboard;

class ScoreboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Scoreboard::class, 30)->create();
    }
}
