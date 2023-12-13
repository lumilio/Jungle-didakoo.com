<?php

use Illuminate\Database\Seeder;
use Database\Seeders\GameModeSeeder;
use App\GameMode;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(GameMode::class, 5)->create();
    }
}
