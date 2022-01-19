<?php

namespace Database\Seeders;

use App\Models\Lokasi;
use App\Models\User;
use App\Models\Wifi;
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
        // \App\Models\User::factory(10)->create();
        User::factory(2)->create();
        Wifi::factory(5)->create();
    }
}
