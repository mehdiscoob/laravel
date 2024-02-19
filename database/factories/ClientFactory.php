<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    protected $model = Client::class;

    public function definition()
    {
        return [
            'tenant_id' => Tenant::inRandomOrder()->first(),
            'name' => $this->faker->company,
            'email' => $this->faker->email,
            'mobile' => $this->faker->phoneNumber,
        ];
    }
}
