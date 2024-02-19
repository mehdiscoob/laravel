<?php

namespace Modules\Delivery\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Delivery\App\Models\Delivery;

class DeliverySeeder extends Seeder
{
    public function run()
    {
        Delivery::factory(50)->create();
    }
}
