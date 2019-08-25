<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\client_scores;

class client_scoresApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_client_scores()
    {
        $clientScores = factory(client_scores::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/client_scores', $clientScores
        );

        $this->assertApiResponse($clientScores);
    }

    /**
     * @test
     */
    public function test_read_client_scores()
    {
        $clientScores = factory(client_scores::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/client_scores/'.$clientScores->id
        );

        $this->assertApiResponse($clientScores->toArray());
    }

    /**
     * @test
     */
    public function test_update_client_scores()
    {
        $clientScores = factory(client_scores::class)->create();
        $editedclient_scores = factory(client_scores::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/client_scores/'.$clientScores->id,
            $editedclient_scores
        );

        $this->assertApiResponse($editedclient_scores);
    }

    /**
     * @test
     */
    public function test_delete_client_scores()
    {
        $clientScores = factory(client_scores::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/client_scores/'.$clientScores->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/client_scores/'.$clientScores->id
        );

        $this->response->assertStatus(404);
    }
}
