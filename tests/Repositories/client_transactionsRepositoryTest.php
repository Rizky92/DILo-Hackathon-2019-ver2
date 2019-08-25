<?php namespace Tests\Repositories;

use App\Models\client_transactions;
use App\Repositories\client_transactionsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class client_transactionsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var client_transactionsRepository
     */
    protected $clientTransactionsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->clientTransactionsRepo = \App::make(client_transactionsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_client_transactions()
    {
        $clientTransactions = factory(client_transactions::class)->make()->toArray();

        $createdclient_transactions = $this->clientTransactionsRepo->create($clientTransactions);

        $createdclient_transactions = $createdclient_transactions->toArray();
        $this->assertArrayHasKey('id', $createdclient_transactions);
        $this->assertNotNull($createdclient_transactions['id'], 'Created client_transactions must have id specified');
        $this->assertNotNull(client_transactions::find($createdclient_transactions['id']), 'client_transactions with given id must be in DB');
        $this->assertModelData($clientTransactions, $createdclient_transactions);
    }

    /**
     * @test read
     */
    public function test_read_client_transactions()
    {
        $clientTransactions = factory(client_transactions::class)->create();

        $dbclient_transactions = $this->clientTransactionsRepo->find($clientTransactions->id);

        $dbclient_transactions = $dbclient_transactions->toArray();
        $this->assertModelData($clientTransactions->toArray(), $dbclient_transactions);
    }

    /**
     * @test update
     */
    public function test_update_client_transactions()
    {
        $clientTransactions = factory(client_transactions::class)->create();
        $fakeclient_transactions = factory(client_transactions::class)->make()->toArray();

        $updatedclient_transactions = $this->clientTransactionsRepo->update($fakeclient_transactions, $clientTransactions->id);

        $this->assertModelData($fakeclient_transactions, $updatedclient_transactions->toArray());
        $dbclient_transactions = $this->clientTransactionsRepo->find($clientTransactions->id);
        $this->assertModelData($fakeclient_transactions, $dbclient_transactions->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_client_transactions()
    {
        $clientTransactions = factory(client_transactions::class)->create();

        $resp = $this->clientTransactionsRepo->delete($clientTransactions->id);

        $this->assertTrue($resp);
        $this->assertNull(client_transactions::find($clientTransactions->id), 'client_transactions should not exist in DB');
    }
}
