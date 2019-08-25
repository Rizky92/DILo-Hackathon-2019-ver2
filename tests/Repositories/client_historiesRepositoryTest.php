<?php namespace Tests\Repositories;

use App\Models\client_histories;
use App\Repositories\client_historiesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class client_historiesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var client_historiesRepository
     */
    protected $clientHistoriesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->clientHistoriesRepo = \App::make(client_historiesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_client_histories()
    {
        $clientHistories = factory(client_histories::class)->make()->toArray();

        $createdclient_histories = $this->clientHistoriesRepo->create($clientHistories);

        $createdclient_histories = $createdclient_histories->toArray();
        $this->assertArrayHasKey('id', $createdclient_histories);
        $this->assertNotNull($createdclient_histories['id'], 'Created client_histories must have id specified');
        $this->assertNotNull(client_histories::find($createdclient_histories['id']), 'client_histories with given id must be in DB');
        $this->assertModelData($clientHistories, $createdclient_histories);
    }

    /**
     * @test read
     */
    public function test_read_client_histories()
    {
        $clientHistories = factory(client_histories::class)->create();

        $dbclient_histories = $this->clientHistoriesRepo->find($clientHistories->id);

        $dbclient_histories = $dbclient_histories->toArray();
        $this->assertModelData($clientHistories->toArray(), $dbclient_histories);
    }

    /**
     * @test update
     */
    public function test_update_client_histories()
    {
        $clientHistories = factory(client_histories::class)->create();
        $fakeclient_histories = factory(client_histories::class)->make()->toArray();

        $updatedclient_histories = $this->clientHistoriesRepo->update($fakeclient_histories, $clientHistories->id);

        $this->assertModelData($fakeclient_histories, $updatedclient_histories->toArray());
        $dbclient_histories = $this->clientHistoriesRepo->find($clientHistories->id);
        $this->assertModelData($fakeclient_histories, $dbclient_histories->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_client_histories()
    {
        $clientHistories = factory(client_histories::class)->create();

        $resp = $this->clientHistoriesRepo->delete($clientHistories->id);

        $this->assertTrue($resp);
        $this->assertNull(client_histories::find($clientHistories->id), 'client_histories should not exist in DB');
    }
}
