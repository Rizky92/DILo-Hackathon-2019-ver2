<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\client_transactions;

class client_transactionsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_client_transactions()
    {
        $clientTransactions = factory(client_transactions::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/client_transactions', $clientTransactions
        );

        $this->assertApiResponse($clientTransactions);
    }

    /**
     * @test
     */
    public function test_read_client_transactions()
    {
        $clientTransactions = factory(client_transactions::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/client_transactions/'.$clientTransactions->id
        );

        $this->assertApiResponse($clientTransactions->toArray());
    }

    /**
     * @test
     */
    public function test_update_client_transactions()
    {
        $clientTransactions = factory(client_transactions::class)->create();
        $editedclient_transactions = factory(client_transactions::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/client_transactions/'.$clientTransactions->id,
            $editedclient_transactions
        );

        $this->assertApiResponse($editedclient_transactions);
    }

    /**
     * @test
     */
    public function test_delete_client_transactions()
    {
        $clientTransactions = factory(client_transactions::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/client_transactions/'.$clientTransactions->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/client_transactions/'.$clientTransactions->id
        );

        $this->response->assertStatus(404);
    }
}
