<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Order;
use App\Models\Price;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShopTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_are_redirected_to_login(): void
    {
        $this->get(route('shop.home'))->assertRedirect(route('login'));
    }

    public function test_users_can_view_products(): void
    {
        $user = User::factory()->user()->create();
        $product = $this->product();

        $this->actingAs($user)
            ->get(route('shop.products.index'))
            ->assertOk()
            ->assertSee($product->name);

        $this->actingAs($user)
            ->get(route('shop.products.show', $product))
            ->assertOk()
            ->assertSee($product->name)
            ->assertSee('39,95');
    }

    public function test_users_place_an_order_on_their_own_account(): void
    {
        $user = User::factory()->user()->create();
        $other = User::factory()->user()->create();
        $product = $this->product();

        $this->actingAs($user)
            ->post(route('shop.orders.store'), [
                'product_id' => $product->id,
                'user_id' => $other->id,
            ])
            ->assertRedirect(route('shop.orders.index'))
            ->assertSessionHas('success', 'Je bestelling is geplaatst.');

        $this->actingAs($user)
            ->get(route('shop.orders.index'))
            ->assertSee('Je bestelling is geplaatst.');

        $order = Order::query()->first();

        $this->assertNotNull($order);
        $this->assertSame($user->id, $order->user_id);
        $this->assertSame(0, $order->status);
        $this->assertDatabaseHas('order_rows', [
            'order_id' => $order->id,
            'product_id' => $product->id,
        ]);

        $this->actingAs($user)
            ->get(route('shop.orders.index'))
            ->assertOk()
            ->assertSee($product->name);

        $this->actingAs($other)
            ->get(route('shop.orders.index'))
            ->assertOk()
            ->assertSee('Je hebt nog geen bestellingen.');
    }

    public function test_an_order_requires_a_product(): void
    {
        $user = User::factory()->user()->create();

        $this->actingAs($user)
            ->from(route('shop.orders.create'))
            ->followingRedirects()
            ->post(route('shop.orders.store'), [])
            ->assertSee('De bestelling is niet geplaatst. Kies een spel.');

        $this->assertDatabaseCount('orders', 0);
    }

    public function test_users_can_write_a_review_on_their_own_account(): void
    {
        $user = User::factory()->user()->create();
        $product = $this->product();

        $this->actingAs($user)
            ->post(route('shop.reviews.store'), [
                'product_id' => $product->id,
                'comment' => 'Leuk spel',
                'user_id' => User::factory()->user()->create()->id,
            ])
            ->assertRedirect(route('shop.reviews.index'))
            ->assertSessionHas('success', 'Je review is opgeslagen.');

        $this->actingAs($user)
            ->get(route('shop.reviews.index'))
            ->assertSee('Je review is opgeslagen.');

        $this->assertDatabaseHas('reviews', [
            'user_id' => $user->id,
            'product_id' => $product->id,
            'comment' => 'Leuk spel',
        ]);
    }

    public function test_a_review_requires_a_comment(): void
    {
        $user = User::factory()->user()->create();
        $product = $this->product();

        $this->actingAs($user)
            ->from(route('shop.reviews.create'))
            ->post(route('shop.reviews.store'), [
                'product_id' => $product->id,
            ])
            ->assertRedirect(route('shop.reviews.create'))
            ->assertSessionHasErrors([
                'comment' => 'De review is niet opgeslagen. Schrijf een tekst.',
            ]);
    }

    public function test_admins_are_sent_to_the_admin_home(): void
    {
        $admin = User::factory()->admin()->create();

        $this->actingAs($admin)
            ->get(route('shop.home'))
            ->assertRedirect(route('home'));
    }

    public function test_users_can_update_their_own_profile(): void
    {
        $user = User::factory()->user()->create();

        $this->actingAs($user)
            ->put(route('shop.profile.update'), [
                'name' => 'Nieuwe naam',
                'email' => 'nieuw@spelapp.nl',
                'role_id' => 1,
            ])
            ->assertRedirect(route('shop.profile.edit'))
            ->assertSessionHas('success', 'Je account is opgeslagen.');

        $this->actingAs($user)
            ->get(route('shop.profile.edit'))
            ->assertSee('Je account is opgeslagen.');

        $user->refresh();

        $this->assertSame('Nieuwe naam', $user->name);
        $this->assertSame('nieuw@spelapp.nl', $user->email);
        $this->assertSame(2, $user->role_id);
    }

    public function test_profile_email_must_stay_unique(): void
    {
        $user = User::factory()->user()->create();
        $other = User::factory()->user()->create();

        $this->actingAs($user)
            ->from(route('shop.profile.edit'))
            ->put(route('shop.profile.update'), [
                'name' => $user->name,
                'email' => $other->email,
            ])
            ->assertRedirect(route('shop.profile.edit'))
            ->assertSessionHasErrors([
                'email' => 'Je account is niet opgeslagen. Dit e-mailadres is al in gebruik.',
            ]);
    }

    private function product(): Product
    {
        $category = Category::query()->create([
            'name' => 'Strategie',
        ]);

        $product = Product::query()->create([
            'name' => 'Catan',
            'description' => 'Bouw nederzettingen.',
            'category_id' => $category->id,
        ]);

        Price::query()->create([
            'price' => 39.95,
            'effective_date' => now()->toDateString(),
            'product_id' => $product->id,
        ]);

        return $product;
    }
}
