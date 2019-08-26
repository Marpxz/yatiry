<?php

use App\Scoreboard;
use Illuminate\Database\Seeder;

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
