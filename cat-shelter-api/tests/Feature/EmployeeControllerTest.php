<?php
namespace Tests\Feature;

use App\Models\CatShelter;
use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeeControllerTest extends TestCase
{
    use RefreshDatabase;

    private CatShelter $catShelter;
    private Employee $employee1;
    private Employee $employee2;

    protected function setUp(): void
    {
        parent::setUp();

        $this->catShelter = CatShelter::create([
            'name' => 'Shelter1',
            'address' => 'address1',
        ]);

        $this->employee1 = Employee::create([
            'name' => 'Mark',
            'position' => 'doctor',
            'cat_shelter_id' => $this->catShelter->id
        ]);

        $this->employee2 =  Employee::create([
            'name' => 'Thomas',
            'position' => 'manager',
            'cat_shelter_id' => $this->catShelter->id
        ]);
    }

    public function testGetEmployees()
    {
        $response = $this->get('/api/employees');

        $response->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'name',
                    'position',
                    'created_at',
                    'updated_at',
                ],
            ]);
    }

    public function testCreateEmployee()
    {
        $payload = [
            'name' => 'Mike Johnson',
            'position' => 'Supervisor',
            'cat_shelter_id' => $this->catShelter->id
        ];

        $response = $this->post('/api/employees', $payload);

        $response->assertStatus(201)
            ->assertJson($payload);
    }

    public function testGetEmployee()
    {
        $response = $this->get('/api/employees/' . $this->employee1->id);

        $response->assertStatus(200)
            ->assertJson($this->employee1->toArray());
    }

    public function testUpdateEmployee()
    {
        $updatedData = [
            'name' => 'Michael Smith',
            'position' => 'Senior Manager',
            'cat_shelter_id' => $this->catShelter->id
        ];

        $response = $this->put('/api/employees/' . $this->employee2->id, $updatedData);

        $response->assertStatus(200)
            ->assertJsonFragment($updatedData);
    }

    public function testDeleteEmployee()
    {
        $response = $this->delete('/api/employees/' . $this->employee2->id);

        $response->assertStatus(204);
        $this->assertDatabaseMissing('employees', ['id' => $this->employee2->id]);
    }
}
