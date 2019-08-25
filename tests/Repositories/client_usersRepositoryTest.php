<?php namespace Tests\Repositories;

use App\Models\client_users;
use App\Repositories\client_usersRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class client_usersRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var client_usersRepository
     */
    protected $clientUsersRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->clientUsersRepo = \App::make(client_usersRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_client_users()
    {
        $clientUsers = factory(client_users::class)->make()->toArray();

        $createdclient_users = $this->clientUsersRepo->create($clientUsers);

        $createdclient_users = $createdclient_users->toArray();
        $this->assertArrayHasKey('id', $createdclient_users);
        $this->assertNotNull($createdclient_users['id'], 'Created client_users must have id specified');
        $this->assertNotNull(client_users::find($createdclient_users['id']), 'client_users with given id must be in DB');
        $this->assertModelData($clientUsers, $createdclient_users);
    }

    /**
     * @test read
     */
    public function test_read_client_users()
    {
        $clientUsers = factory(client_users::class)->create();

        $dbclient_users = $this->clientUsersRepo->find($clientUsers->id);

        $dbclient_users = $dbclient_users->toArray();
        $this->assertModelData($clientUsers->toArray(), $dbclient_users);
    }

    /**
     * @test update
     */
    public function test_update_client_users()
    {
        $clientUsers = factory(client_users::class)->create();
        $fakeclient_users = factory(client_users::class)->make()->toArray();

        $updatedclient_users = $this->clientUsersRepo->update($fakeclient_users, $clientUsers->id);

        $this->assertModelData($fakeclient_users, $updatedclient_users->toArray());
        $dbclient_users = $this->clientUsersRepo->find($clientUsers->id);
        $this->assertModelData($fakeclient_users, $dbclient_users->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_client_users()
    {
        $clientUsers = factory(client_users::class)->create();

        $resp = $this->clientUsersRepo->delete($clientUsers->id);

        $this->assertTrue($resp);
        $this->assertNull(client_users::find($clientUsers->id), 'client_users should not exist in DB');
    }
}
