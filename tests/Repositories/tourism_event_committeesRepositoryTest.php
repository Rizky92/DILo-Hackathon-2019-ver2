<?php namespace Tests\Repositories;

use App\Models\tourism_event_committees;
use App\Repositories\tourism_event_committeesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class tourism_event_committeesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var tourism_event_committeesRepository
     */
    protected $tourismEventCommitteesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tourismEventCommitteesRepo = \App::make(tourism_event_committeesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_tourism_event_committees()
    {
        $tourismEventCommittees = factory(tourism_event_committees::class)->make()->toArray();

        $createdtourism_event_committees = $this->tourismEventCommitteesRepo->create($tourismEventCommittees);

        $createdtourism_event_committees = $createdtourism_event_committees->toArray();
        $this->assertArrayHasKey('id', $createdtourism_event_committees);
        $this->assertNotNull($createdtourism_event_committees['id'], 'Created tourism_event_committees must have id specified');
        $this->assertNotNull(tourism_event_committees::find($createdtourism_event_committees['id']), 'tourism_event_committees with given id must be in DB');
        $this->assertModelData($tourismEventCommittees, $createdtourism_event_committees);
    }

    /**
     * @test read
     */
    public function test_read_tourism_event_committees()
    {
        $tourismEventCommittees = factory(tourism_event_committees::class)->create();

        $dbtourism_event_committees = $this->tourismEventCommitteesRepo->find($tourismEventCommittees->id);

        $dbtourism_event_committees = $dbtourism_event_committees->toArray();
        $this->assertModelData($tourismEventCommittees->toArray(), $dbtourism_event_committees);
    }

    /**
     * @test update
     */
    public function test_update_tourism_event_committees()
    {
        $tourismEventCommittees = factory(tourism_event_committees::class)->create();
        $faketourism_event_committees = factory(tourism_event_committees::class)->make()->toArray();

        $updatedtourism_event_committees = $this->tourismEventCommitteesRepo->update($faketourism_event_committees, $tourismEventCommittees->id);

        $this->assertModelData($faketourism_event_committees, $updatedtourism_event_committees->toArray());
        $dbtourism_event_committees = $this->tourismEventCommitteesRepo->find($tourismEventCommittees->id);
        $this->assertModelData($faketourism_event_committees, $dbtourism_event_committees->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_tourism_event_committees()
    {
        $tourismEventCommittees = factory(tourism_event_committees::class)->create();

        $resp = $this->tourismEventCommitteesRepo->delete($tourismEventCommittees->id);

        $this->assertTrue($resp);
        $this->assertNull(tourism_event_committees::find($tourismEventCommittees->id), 'tourism_event_committees should not exist in DB');
    }
}
