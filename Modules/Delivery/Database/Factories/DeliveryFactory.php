<?php

namespace Modules\Delivery\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Delivery\App\Models\Truck;
use Modules\Order\App\Models\Order;

class DeliveryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Delivery\App\Models\Delivery::class;

    /**
     * Define the model's default state.
     */
    public function definition()
    {

        return [
            'tenant_id' => \App\Models\Tenant::factory(),
            'order_id' => Order::inRandomOrder()->first(),
            'truck_id' => Truck::inRandomOrder()->first(),
            'delivery_date' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
        ];
    }
}

