<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\tourism_employees;

class tourism_employeesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_tourism_employees()
    {
        $tourismEmployees = factory(tourism_employees::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/tourism_employees', $tourismEmployees
        );

        $this->assertApiResponse($tourismEmployees);
    }

    /**
     * @test
     */
    public function test_read_tourism_employees()
    {
        $tourismEmployees = factory(tourism_employees::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/tourism_employees/'.$tourismEmployees->id
        );

        $this->assertApiResponse($tourismEmployees->toArray());
    }

    /**
     * @test
     */
    public function test_update_tourism_employees()
    {
        $tourismEmployees = factory(tourism_employees::class)->create();
        $editedtourism_employees = factory(tourism_employees::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/tourism_employees/'.$tourismEmployees->id,
            $editedtourism_employees
        );

        $this->assertApiResponse($editedtourism_employees);
    }

    /**
     * @test
     */
    public function test_delete_tourism_employees()
    {
        $tourismEmployees = factory(tourism_employees::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/tourism_employees/'.$tourismEmployees->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/tourism_employees/'.$tourismEmployees->id
        );

        $this->response->assertStatus(404);
    }
}
