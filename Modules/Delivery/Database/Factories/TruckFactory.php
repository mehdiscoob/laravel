<?php

namespace Modules\Delivery\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TruckFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Delivery\App\Models\Truck::class;

    /**
     * Define the model's default state.
     */
    public function definition()
    {
        return [
            'tenant_id' => \App\Models\Tenant::factory(),
            'registration_number' => $this->faker->unique()->regexify('[A-Z0-9]{8}'),
            "is_busy"=>0
        ];
    }
}

