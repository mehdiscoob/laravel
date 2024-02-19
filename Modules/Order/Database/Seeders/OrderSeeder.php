<?php

namespace Modules\Order\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Order\App\Models\Order;


class OrderSeeder extends Seeder
{
    public function run()
    {
        Order::factory(100)->create();
    }
}
