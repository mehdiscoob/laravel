<?php

namespace Modules\Order\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Order\App\Models\Order::class;

    /**
     * Define the model's default state.
     */
    public function definition()
    {
        return [
            'tenant_id' => \App\Models\Tenant::factory(),
            'client_id' => \App\Models\Client::factory(),
            'amount' => $this->faker->randomFloat(2, 10, 100),
        ];
    }
}

