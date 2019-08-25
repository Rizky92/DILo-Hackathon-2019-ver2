<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\tourism_destinations;

class tourism_destinationsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_tourism_destinations()
    {
        $tourismDestinations = factory(tourism_destinations::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/tourism_destinations', $tourismDestinations
        );

        $this->assertApiResponse($tourismDestinations);
    }

    /**
     * @test
     */
    public function test_read_tourism_destinations()
    {
        $tourismDestinations = factory(tourism_destinations::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/tourism_destinations/'.$tourismDestinations->id
        );

        $this->assertApiResponse($tourismDestinations->toArray());
    }

    /**
     * @test
     */
    public function test_update_tourism_destinations()
    {
        $tourismDestinations = factory(tourism_destinations::class)->create();
        $editedtourism_destinations = factory(tourism_destinations::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/tourism_destinations/'.$tourismDestinations->id,
            $editedtourism_destinations
        );

        $this->assertApiResponse($editedtourism_destinations);
    }

    /**
     * @test
     */
    public function test_delete_tourism_destinations()
    {
        $tourismDestinations = factory(tourism_destinations::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/tourism_destinations/'.$tourismDestinations->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/tourism_destinations/'.$tourismDestinations->id
        );

        $this->response->assertStatus(404);
    }
}
