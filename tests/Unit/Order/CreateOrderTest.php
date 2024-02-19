<?php

namespace Order;

use App\Models\User;
use Database\Seeders\ClientSeeder;
use Database\Seeders\LocationSeeder;
use Database\Seeders\TenantSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Modules\Delivery\Database\Seeders\DeliverySeeder;
use Modules\Delivery\Database\Seeders\TruckSeeder;
use Modules\Order\Database\Seeders\OrderSeeder;
use Tests\TestCase;
use function dd;

class CreateOrderTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(TenantSeeder::class);
        $this->seed(UserSeeder::class);
        $this->seed(ClientSeeder::class);
        $this->seed(LocationSeeder::class);
        $this->seed(TruckSeeder::class);
        $this->seed(OrderSeeder::class);
        $this->seed(DeliverySeeder::class);
    }
    /** @test */
    public function it_creates_an_order()
    {
        // Create a user using the User factory
        $user = User::inRandomOrder()->first();
        $response = $this->postJson('/api/order', [
            'tenant_id' => 1,
            'address' => "sdsadsadsad",
            'client_id' => 10,
            'amount' => 100,
            'type' => "user",
        ],["Authorization"=>"Bearer ".$user]);

        $response->assertStatus(201); // Assuming you return HTTP status 201 for successful order creation
        $this->assertDatabaseHas('orders', ['amount' => 100]); // Assuming 'orders' is your orders table
    }
}
