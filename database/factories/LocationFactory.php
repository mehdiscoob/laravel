<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    protected $model = Location::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $clients=Client::inRandomOrder()->first();
        return [
            'client_id' =>$clients->id ,
            'tenant_id' => $clients->tenant_id,
            'address' => $this->faker->address,
        ];
    }
}
