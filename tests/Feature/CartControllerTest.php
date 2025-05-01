<?php

namespace Tests\Feature;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;

class CartControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        // Create a user
        $this->user = User::create([
            'fullname' => 'Test User',
            'phone_number' => '09123456789',
            'password' => Hash::make('password123'),
        ]);

        $this->actingAs($this->user);
    }

    public function test_index_returns_cart_items()
    {
        $cart = Cart::create([
            'customer_id' => $this->user->id,
            'products' => [
                ['id' => 'product1', 'quantity' => 2],
                ['id' => 'product2', 'quantity' => 1],
            ]
        ]);

        $response = $this->getJson(route('cart.index'));

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'products' => $cart->products,
        ]);
    }

    public function test_store_adds_product_to_cart()
    {
        $product = Product::create([
            'name' => 'Test Product',
            'category' => 'Test Category',
            'price' => 100,
            'details' => 'Product Details'
        ]);

        $response = $this->postJson(route('cart.store'), [
            'product' => [
                'id' => $product->id,
                'quantity' => 2
            ]
        ]);

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);

        $cart = Cart::where('customer_id', $this->user->id)->first();
        $this->assertNotEmpty($cart);
        $this->assertCount(1, $cart->products);
    }

    public function test_remove_product_from_cart()
    {
        $cart = Cart::create([
            'customer_id' => $this->user->id,
            'products' => [
                ['id' => 'product1', 'quantity' => 2],
                ['id' => 'product2', 'quantity' => 1],
            ]
        ]);

        $productIdToRemove = 'product1';

        $response = $this->deleteJson(route('cart.remove', ['id' => $productIdToRemove]));

        $response->assertStatus(200);
        $response->assertJson(['message' => 'Product removed']);

        $cart->refresh();
        $this->assertCount(1, $cart->products);
    }

    public function test_update_cart_product_quantity()
    {
        $cart = Cart::create([
            'customer_id' => $this->user->id,
            'products' => [
                ['id' => 'product1', 'quantity' => 2],
                ['id' => 'product2', 'quantity' => 1],
            ]
        ]);

        $response = $this->putJson(route('cart.update', ['id' => 'product1']), [
            'quantity' => 5
        ]);

        $response->assertStatus(200);
        $response->assertJson(['message' => 'Quantity updated']);

        $cart = $cart->fresh();
        $product = collect($cart->products)->firstWhere('id', 'product1');
        $this->assertEquals(5, $product['quantity']);
    }
}
