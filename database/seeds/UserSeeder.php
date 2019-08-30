<?php


use Illuminate\Database\Seeder;
use Yatiry\Scoreboard;
use Yatiry\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(User::class, 40)->create();
        factory(User::class, 50)->create()->each(function ($user) {
            $user->scoreboard()->save(factory(Scoreboard::class)->make());
        });
    }
}
