<?php

namespace Tests\Feature;

use App\Models\Property;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PropertyTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_send_not_found_on_non_existent_property(): void
    {
        $response = $this->get('/biens/nobis-quasi-sit-ut-ut-49');

        $response->assertStatus(404);
    }

    public function test_ok_on_property(): void
    {
        $property = Property::factory()->create();
        $response = $this->get('/biens/nobis-quasi-sit-ut-ut-' . $property->id);

        $response->assertRedirectToRoute('property.show', ['property' => $property->id, 'slug' => $property->getSlug()]);
    }
}
