<?php namespace Tests\Repositories;

use App\Models\investor_profiles;
use App\Repositories\investor_profilesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class investor_profilesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var investor_profilesRepository
     */
    protected $investorProfilesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->investorProfilesRepo = \App::make(investor_profilesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_investor_profiles()
    {
        $investorProfiles = factory(investor_profiles::class)->make()->toArray();

        $createdinvestor_profiles = $this->investorProfilesRepo->create($investorProfiles);

        $createdinvestor_profiles = $createdinvestor_profiles->toArray();
        $this->assertArrayHasKey('id', $createdinvestor_profiles);
        $this->assertNotNull($createdinvestor_profiles['id'], 'Created investor_profiles must have id specified');
        $this->assertNotNull(investor_profiles::find($createdinvestor_profiles['id']), 'investor_profiles with given id must be in DB');
        $this->assertModelData($investorProfiles, $createdinvestor_profiles);
    }

    /**
     * @test read
     */
    public function test_read_investor_profiles()
    {
        $investorProfiles = factory(investor_profiles::class)->create();

        $dbinvestor_profiles = $this->investorProfilesRepo->find($investorProfiles->id);

        $dbinvestor_profiles = $dbinvestor_profiles->toArray();
        $this->assertModelData($investorProfiles->toArray(), $dbinvestor_profiles);
    }

    /**
     * @test update
     */
    public function test_update_investor_profiles()
    {
        $investorProfiles = factory(investor_profiles::class)->create();
        $fakeinvestor_profiles = factory(investor_profiles::class)->make()->toArray();

        $updatedinvestor_profiles = $this->investorProfilesRepo->update($fakeinvestor_profiles, $investorProfiles->id);

        $this->assertModelData($fakeinvestor_profiles, $updatedinvestor_profiles->toArray());
        $dbinvestor_profiles = $this->investorProfilesRepo->find($investorProfiles->id);
        $this->assertModelData($fakeinvestor_profiles, $dbinvestor_profiles->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_investor_profiles()
    {
        $investorProfiles = factory(investor_profiles::class)->create();

        $resp = $this->investorProfilesRepo->delete($investorProfiles->id);

        $this->assertTrue($resp);
        $this->assertNull(investor_profiles::find($investorProfiles->id), 'investor_profiles should not exist in DB');
    }
}
