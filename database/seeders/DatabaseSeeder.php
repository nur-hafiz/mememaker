<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Meme;
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
        Meme::factory(10)->create();
    }
}
