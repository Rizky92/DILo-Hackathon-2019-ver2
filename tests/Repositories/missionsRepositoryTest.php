<?php namespace Tests\Repositories;

use App\Models\missions;
use App\Repositories\missionsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class missionsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var missionsRepository
     */
    protected $missionsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->missionsRepo = \App::make(missionsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_missions()
    {
        $missions = factory(missions::class)->make()->toArray();

        $createdmissions = $this->missionsRepo->create($missions);

        $createdmissions = $createdmissions->toArray();
        $this->assertArrayHasKey('id', $createdmissions);
        $this->assertNotNull($createdmissions['id'], 'Created missions must have id specified');
        $this->assertNotNull(missions::find($createdmissions['id']), 'missions with given id must be in DB');
        $this->assertModelData($missions, $createdmissions);
    }

    /**
     * @test read
     */
    public function test_read_missions()
    {
        $missions = factory(missions::class)->create();

        $dbmissions = $this->missionsRepo->find($missions->id);

        $dbmissions = $dbmissions->toArray();
        $this->assertModelData($missions->toArray(), $dbmissions);
    }

    /**
     * @test update
     */
    public function test_update_missions()
    {
        $missions = factory(missions::class)->create();
        $fakemissions = factory(missions::class)->make()->toArray();

        $updatedmissions = $this->missionsRepo->update($fakemissions, $missions->id);

        $this->assertModelData($fakemissions, $updatedmissions->toArray());
        $dbmissions = $this->missionsRepo->find($missions->id);
        $this->assertModelData($fakemissions, $dbmissions->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_missions()
    {
        $missions = factory(missions::class)->create();

        $resp = $this->missionsRepo->delete($missions->id);

        $this->assertTrue($resp);
        $this->assertNull(missions::find($missions->id), 'missions should not exist in DB');
    }
}
