<?php

namespace Database\Seeders;

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
        \App\Models\Channel::create(['url' => 'YogscastSips']);
        $count = 123456;
        $delta = 0;
        for($day = 1; $day <= 15; $day++) {
          $date = \DateTime::createFromFormat('m/d/Y', "12/$day/2020");
          \App\Models\Stats::create(['view_count' => $count, 'view_delta' => $delta, 'capture_date' => $date, 'channel_id' => 1]);
          $delta = rand(-500, 2000);
          $count += $delta;
        }
    }
}
