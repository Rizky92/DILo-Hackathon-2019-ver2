<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\missions;

class missionsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_missions()
    {
        $missions = factory(missions::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/missions', $missions
        );

        $this->assertApiResponse($missions);
    }

    /**
     * @test
     */
    public function test_read_missions()
    {
        $missions = factory(missions::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/missions/'.$missions->id
        );

        $this->assertApiResponse($missions->toArray());
    }

    /**
     * @test
     */
    public function test_update_missions()
    {
        $missions = factory(missions::class)->create();
        $editedmissions = factory(missions::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/missions/'.$missions->id,
            $editedmissions
        );

        $this->assertApiResponse($editedmissions);
    }

    /**
     * @test
     */
    public function test_delete_missions()
    {
        $missions = factory(missions::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/missions/'.$missions->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/missions/'.$missions->id
        );

        $this->response->assertStatus(404);
    }
}
