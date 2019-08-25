<?php namespace Tests\Repositories;

use App\Models\tourism_event_rundowns;
use App\Repositories\tourism_event_rundownsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class tourism_event_rundownsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var tourism_event_rundownsRepository
     */
    protected $tourismEventRundownsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tourismEventRundownsRepo = \App::make(tourism_event_rundownsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_tourism_event_rundowns()
    {
        $tourismEventRundowns = factory(tourism_event_rundowns::class)->make()->toArray();

        $createdtourism_event_rundowns = $this->tourismEventRundownsRepo->create($tourismEventRundowns);

        $createdtourism_event_rundowns = $createdtourism_event_rundowns->toArray();
        $this->assertArrayHasKey('id', $createdtourism_event_rundowns);
        $this->assertNotNull($createdtourism_event_rundowns['id'], 'Created tourism_event_rundowns must have id specified');
        $this->assertNotNull(tourism_event_rundowns::find($createdtourism_event_rundowns['id']), 'tourism_event_rundowns with given id must be in DB');
        $this->assertModelData($tourismEventRundowns, $createdtourism_event_rundowns);
    }

    /**
     * @test read
     */
    public function test_read_tourism_event_rundowns()
    {
        $tourismEventRundowns = factory(tourism_event_rundowns::class)->create();

        $dbtourism_event_rundowns = $this->tourismEventRundownsRepo->find($tourismEventRundowns->id);

        $dbtourism_event_rundowns = $dbtourism_event_rundowns->toArray();
        $this->assertModelData($tourismEventRundowns->toArray(), $dbtourism_event_rundowns);
    }

    /**
     * @test update
     */
    public function test_update_tourism_event_rundowns()
    {
        $tourismEventRundowns = factory(tourism_event_rundowns::class)->create();
        $faketourism_event_rundowns = factory(tourism_event_rundowns::class)->make()->toArray();

        $updatedtourism_event_rundowns = $this->tourismEventRundownsRepo->update($faketourism_event_rundowns, $tourismEventRundowns->id);

        $this->assertModelData($faketourism_event_rundowns, $updatedtourism_event_rundowns->toArray());
        $dbtourism_event_rundowns = $this->tourismEventRundownsRepo->find($tourismEventRundowns->id);
        $this->assertModelData($faketourism_event_rundowns, $dbtourism_event_rundowns->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_tourism_event_rundowns()
    {
        $tourismEventRundowns = factory(tourism_event_rundowns::class)->create();

        $resp = $this->tourismEventRundownsRepo->delete($tourismEventRundowns->id);

        $this->assertTrue($resp);
        $this->assertNull(tourism_event_rundowns::find($tourismEventRundowns->id), 'tourism_event_rundowns should not exist in DB');
    }
}
