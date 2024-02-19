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
            'tenant_id' => Tenant::find(rand(1,10)),
            'name' => $this->faker->company,
            'email' => $this->faker->email,
            'mobile' => $this->faker->phoneNumber,
        ];
    }
}
