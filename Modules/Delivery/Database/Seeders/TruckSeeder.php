<?php

namespace Modules\Delivery\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Delivery\App\Models\Truck;

class TruckSeeder extends Seeder
{
    public function run()
    {
        Truck::factory(20)->create();
    }
}
