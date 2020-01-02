<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(DTScheduleSeeder::class);
        $this->call(MstAreaSeeder::class);
        $this->call(MstClassSeeder::class);
        $this->call(MstStationSeeder::class);
        $this->call(MstTrainSeeder::class);
        $this->call(MstUserSeeder::class);
        $this->call(DTTransactSeeder::class);
    }
}
