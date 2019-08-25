<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\tourism_event_committees;

class tourism_event_committeesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_tourism_event_committees()
    {
        $tourismEventCommittees = factory(tourism_event_committees::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/tourism_event_committees', $tourismEventCommittees
        );

        $this->assertApiResponse($tourismEventCommittees);
    }

    /**
     * @test
     */
    public function test_read_tourism_event_committees()
    {
        $tourismEventCommittees = factory(tourism_event_committees::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/tourism_event_committees/'.$tourismEventCommittees->id
        );

        $this->assertApiResponse($tourismEventCommittees->toArray());
    }

    /**
     * @test
     */
    public function test_update_tourism_event_committees()
    {
        $tourismEventCommittees = factory(tourism_event_committees::class)->create();
        $editedtourism_event_committees = factory(tourism_event_committees::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/tourism_event_committees/'.$tourismEventCommittees->id,
            $editedtourism_event_committees
        );

        $this->assertApiResponse($editedtourism_event_committees);
    }

    /**
     * @test
     */
    public function test_delete_tourism_event_committees()
    {
        $tourismEventCommittees = factory(tourism_event_committees::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/tourism_event_committees/'.$tourismEventCommittees->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/tourism_event_committees/'.$tourismEventCommittees->id
        );

        $this->response->assertStatus(404);
    }
}
