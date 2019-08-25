<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\tourism_events;

class tourism_eventsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_tourism_events()
    {
        $tourismEvents = factory(tourism_events::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/tourism_events', $tourismEvents
        );

        $this->assertApiResponse($tourismEvents);
    }

    /**
     * @test
     */
    public function test_read_tourism_events()
    {
        $tourismEvents = factory(tourism_events::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/tourism_events/'.$tourismEvents->id
        );

        $this->assertApiResponse($tourismEvents->toArray());
    }

    /**
     * @test
     */
    public function test_update_tourism_events()
    {
        $tourismEvents = factory(tourism_events::class)->create();
        $editedtourism_events = factory(tourism_events::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/tourism_events/'.$tourismEvents->id,
            $editedtourism_events
        );

        $this->assertApiResponse($editedtourism_events);
    }

    /**
     * @test
     */
    public function test_delete_tourism_events()
    {
        $tourismEvents = factory(tourism_events::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/tourism_events/'.$tourismEvents->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/tourism_events/'.$tourismEvents->id
        );

        $this->response->assertStatus(404);
    }
}
