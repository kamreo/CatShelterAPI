<?php
namespace Tests\Feature;

use App\Models\Cat;
use App\Models\CatShelter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CatControllerTest extends TestCase
{
    use RefreshDatabase;

    private CatShelter $catShelter;
    private Cat $cat1;
    private Cat $cat2;

    protected function setUp(): void
    {
        parent::setUp();

        $this->catShelter = CatShelter::create([
            'name' => 'Shelter1',
            'address' => 'address1',
        ]);

        $this->cat1 = Cat::create([
            'name' => 'Whiskers',
            'age' => 2,
            'cat_shelter_id' => $this->catShelter->id
        ]);

        $this->cat2 =  Cat::create([
            'name' => 'Mittens',
            'age' => 3,
            'cat_shelter_id' => $this->catShelter->id
        ]);
    }

    public function testGetCats()
    {
        $response = $this->get('/api/cats');

        $response->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'name',
                    'age',
                    'created_at',
                    'updated_at',
                ],
            ]);
    }

    public function testStoreCat()
    {
        $catData = [
            'name' => 'Whiskers',
            'age' => 2,
            'cat_shelter_id' => $this->catShelter->id

        ];

        $response = $this->post('/api/cats', $catData);

        $response->assertStatus(201)
            ->assertJson([
                'name' => 'Whiskers',
                'age' => 2,
                'cat_shelter_id' => $this->catShelter->id
            ]);

        $this->assertDatabaseHas('cats', [
            'name' => 'Whiskers',
            'age' => 2,
            'cat_shelter_id' => $this->catShelter->id
        ]);
    }

    public function testGetCat()
    {
        $response = $this->get("/api/cats/{$this->cat1->id}");

        $response->assertStatus(200)
            ->assertJson([
                'id' => $this->cat1->id,
                'name' => $this->cat1->name,
                'age' => $this->cat1->age,
            ]);
    }

    public function testUpdateCat()
    {
        $catData = [
            'name' => 'New Name',
            'age' => 3,
            'cat_shelter_id' => $this->catShelter->id
        ];

        $response = $this->put("/api/cats/{$this->cat2->id}", $catData);

        $response->assertStatus(200)
            ->assertJson([
                'id' => $this->cat2->id,
                'name' => 'New Name',
                'age' => 3,
            ]);

        $this->assertDatabaseHas('cats', [
            'id' => $this->cat2->id,
            'name' => 'New Name',
            'age' => 3,
        ]);
    }

    public function testDeleteCat()
    {
        $response = $this->delete("/api/cats/{$this->cat2->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('cats', [
            'id' => $this->cat2->id,
        ]);
    }
}
