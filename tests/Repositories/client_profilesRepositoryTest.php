<?php namespace Tests\Repositories;

use App\Models\client_profiles;
use App\Repositories\client_profilesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class client_profilesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var client_profilesRepository
     */
    protected $clientProfilesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->clientProfilesRepo = \App::make(client_profilesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_client_profiles()
    {
        $clientProfiles = factory(client_profiles::class)->make()->toArray();

        $createdclient_profiles = $this->clientProfilesRepo->create($clientProfiles);

        $createdclient_profiles = $createdclient_profiles->toArray();
        $this->assertArrayHasKey('id', $createdclient_profiles);
        $this->assertNotNull($createdclient_profiles['id'], 'Created client_profiles must have id specified');
        $this->assertNotNull(client_profiles::find($createdclient_profiles['id']), 'client_profiles with given id must be in DB');
        $this->assertModelData($clientProfiles, $createdclient_profiles);
    }

    /**
     * @test read
     */
    public function test_read_client_profiles()
    {
        $clientProfiles = factory(client_profiles::class)->create();

        $dbclient_profiles = $this->clientProfilesRepo->find($clientProfiles->id);

        $dbclient_profiles = $dbclient_profiles->toArray();
        $this->assertModelData($clientProfiles->toArray(), $dbclient_profiles);
    }

    /**
     * @test update
     */
    public function test_update_client_profiles()
    {
        $clientProfiles = factory(client_profiles::class)->create();
        $fakeclient_profiles = factory(client_profiles::class)->make()->toArray();

        $updatedclient_profiles = $this->clientProfilesRepo->update($fakeclient_profiles, $clientProfiles->id);

        $this->assertModelData($fakeclient_profiles, $updatedclient_profiles->toArray());
        $dbclient_profiles = $this->clientProfilesRepo->find($clientProfiles->id);
        $this->assertModelData($fakeclient_profiles, $dbclient_profiles->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_client_profiles()
    {
        $clientProfiles = factory(client_profiles::class)->create();

        $resp = $this->clientProfilesRepo->delete($clientProfiles->id);

        $this->assertTrue($resp);
        $this->assertNull(client_profiles::find($clientProfiles->id), 'client_profiles should not exist in DB');
    }
}
