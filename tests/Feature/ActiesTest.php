<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ActiesTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_list_create_edit_update_and_delete_a_category(): void
    {
        $admin = User::factory()->admin()->create();

        $this->actingAs($admin)
            ->get(route('categories.index'))
            ->assertOk();

        $this->actingAs($admin)
            ->get(route('categories.create'))
            ->assertOk();

        $this->actingAs($admin)
            ->post(route('categories.store'), [
                'name' => 'Strategie',
            ])
            ->assertRedirect(route('categories.index'));

        $category = Category::query()->where('name', 'Strategie')->first();

        $this->assertNotNull($category);

        $this->actingAs($admin)
            ->get(route('categories.edit', $category))
            ->assertOk()
            ->assertSee('Strategie');

        $this->actingAs($admin)
            ->put(route('categories.update', $category), [
                'name' => 'Familie',
            ])
            ->assertRedirect(route('categories.index'));

        $this->assertSame('Familie', $category->fresh()->name);

        $this->actingAs($admin)
            ->delete(route('categories.delete', $category))
            ->assertRedirect(route('categories.index'));

        $this->assertModelMissing($category);
    }
}
