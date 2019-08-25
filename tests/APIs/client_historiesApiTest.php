<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\client_histories;

class client_historiesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_client_histories()
    {
        $clientHistories = factory(client_histories::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/client_histories', $clientHistories
        );

        $this->assertApiResponse($clientHistories);
    }

    /**
     * @test
     */
    public function test_read_client_histories()
    {
        $clientHistories = factory(client_histories::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/client_histories/'.$clientHistories->id
        );

        $this->assertApiResponse($clientHistories->toArray());
    }

    /**
     * @test
     */
    public function test_update_client_histories()
    {
        $clientHistories = factory(client_histories::class)->create();
        $editedclient_histories = factory(client_histories::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/client_histories/'.$clientHistories->id,
            $editedclient_histories
        );

        $this->assertApiResponse($editedclient_histories);
    }

    /**
     * @test
     */
    public function test_delete_client_histories()
    {
        $clientHistories = factory(client_histories::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/client_histories/'.$clientHistories->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/client_histories/'.$clientHistories->id
        );

        $this->response->assertStatus(404);
    }
}
