<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\tourism_event_rundowns;

class tourism_event_rundownsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_tourism_event_rundowns()
    {
        $tourismEventRundowns = factory(tourism_event_rundowns::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/tourism_event_rundowns', $tourismEventRundowns
        );

        $this->assertApiResponse($tourismEventRundowns);
    }

    /**
     * @test
     */
    public function test_read_tourism_event_rundowns()
    {
        $tourismEventRundowns = factory(tourism_event_rundowns::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/tourism_event_rundowns/'.$tourismEventRundowns->id
        );

        $this->assertApiResponse($tourismEventRundowns->toArray());
    }

    /**
     * @test
     */
    public function test_update_tourism_event_rundowns()
    {
        $tourismEventRundowns = factory(tourism_event_rundowns::class)->create();
        $editedtourism_event_rundowns = factory(tourism_event_rundowns::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/tourism_event_rundowns/'.$tourismEventRundowns->id,
            $editedtourism_event_rundowns
        );

        $this->assertApiResponse($editedtourism_event_rundowns);
    }

    /**
     * @test
     */
    public function test_delete_tourism_event_rundowns()
    {
        $tourismEventRundowns = factory(tourism_event_rundowns::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/tourism_event_rundowns/'.$tourismEventRundowns->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/tourism_event_rundowns/'.$tourismEventRundowns->id
        );

        $this->response->assertStatus(404);
    }
}
