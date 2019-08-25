<?php namespace Tests\Repositories;

use App\Models\tourism_events;
use App\Repositories\tourism_eventsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class tourism_eventsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var tourism_eventsRepository
     */
    protected $tourismEventsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tourismEventsRepo = \App::make(tourism_eventsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_tourism_events()
    {
        $tourismEvents = factory(tourism_events::class)->make()->toArray();

        $createdtourism_events = $this->tourismEventsRepo->create($tourismEvents);

        $createdtourism_events = $createdtourism_events->toArray();
        $this->assertArrayHasKey('id', $createdtourism_events);
        $this->assertNotNull($createdtourism_events['id'], 'Created tourism_events must have id specified');
        $this->assertNotNull(tourism_events::find($createdtourism_events['id']), 'tourism_events with given id must be in DB');
        $this->assertModelData($tourismEvents, $createdtourism_events);
    }

    /**
     * @test read
     */
    public function test_read_tourism_events()
    {
        $tourismEvents = factory(tourism_events::class)->create();

        $dbtourism_events = $this->tourismEventsRepo->find($tourismEvents->id);

        $dbtourism_events = $dbtourism_events->toArray();
        $this->assertModelData($tourismEvents->toArray(), $dbtourism_events);
    }

    /**
     * @test update
     */
    public function test_update_tourism_events()
    {
        $tourismEvents = factory(tourism_events::class)->create();
        $faketourism_events = factory(tourism_events::class)->make()->toArray();

        $updatedtourism_events = $this->tourismEventsRepo->update($faketourism_events, $tourismEvents->id);

        $this->assertModelData($faketourism_events, $updatedtourism_events->toArray());
        $dbtourism_events = $this->tourismEventsRepo->find($tourismEvents->id);
        $this->assertModelData($faketourism_events, $dbtourism_events->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_tourism_events()
    {
        $tourismEvents = factory(tourism_events::class)->create();

        $resp = $this->tourismEventsRepo->delete($tourismEvents->id);

        $this->assertTrue($resp);
        $this->assertNull(tourism_events::find($tourismEvents->id), 'tourism_events should not exist in DB');
    }
}
