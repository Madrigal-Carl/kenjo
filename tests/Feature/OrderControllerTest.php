<?php

namespace Tests\Feature;

use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class OrderControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_places_order_and_clears_cart()
    {
        $user = User::create([
            'fullname' => 'Test User',
            'phone_number' => '09123456789',
            'password' => bcrypt('password123'),
        ]);

        $this->actingAs($user);

        // Simulate existing cart items
        Cart::create([
            'customer_id' => $user->id,
            'product_id' => 'product123',
            'quantity' => 2,
        ]);

        $requestPayload = [
            'products' => [
                ['product_id' => 'product123', 'quantity' => 2],
            ],
            'total' => 299.99,
        ];

        $response = $this->postJson('/order', $requestPayload); // changed to /order

        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Order successfully placed.',
        ]);

        $this->assertDatabaseHas('orders', [
            'customer_id' => $user->id,
            'total_amount' => 299.99,
            'status' => 'pending',
        ]);

        $this->assertDatabaseMissing('carts', [
            'customer_id' => $user->id,
        ]);
    }
}
