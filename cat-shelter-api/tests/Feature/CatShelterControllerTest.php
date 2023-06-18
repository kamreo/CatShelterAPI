<?php
namespace Tests\Feature;

use App\Models\CatShelter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CatShelterControllerTest extends TestCase
{
    use RefreshDatabase;

    private CatShelter $catShelter;

    protected function setUp(): void
    {
        parent::setUp();

        $this->catShelter = CatShelter::create([
            'name' => 'Shelter1',
            'address' => 'address1',
        ]);
    }

    public function testGetCatShelters()
    {
        $response = $this->get('/api/cat_shelters');

        $response->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'name',
                    'address',
                    'created_at',
                    'updated_at',
                ],
            ]);
    }

    public function testCreateCatShelter()
    {
        $payload = [
            'name' => 'Whiskers Shelter',
            'address' => '789 Oak Street',
        ];

        $response = $this->post('/api/cat_shelters', $payload);

        $response->assertStatus(201)
            ->assertJsonFragment($payload);
    }

    public function testGetCatShelter()
    {
        $response = $this->get('/api/cat_shelters/' . $this->catShelter->id);

        $response->assertStatus(200)
            ->assertJson($this->catShelter->toArray());
    }

    public function testUpdateCatShelter()
    {
        $updatedData = [
            'name' => 'Kitty Haven',
            'address' => '555 Elm Street',
        ];

        $response = $this->put('/api/cat_shelters/' . $this->catShelter->id, $updatedData);

        $response->assertStatus(200)
            ->assertJsonFragment($updatedData);
    }

    public function testDeleteCatShelter()
    {
        $response = $this->delete('/api/cat_shelters/' . $this->catShelter->id);

        $response->assertStatus(204);
        $this->assertDatabaseMissing('cat_shelters', ['id' => $this->catShelter->id]);
    }
}
