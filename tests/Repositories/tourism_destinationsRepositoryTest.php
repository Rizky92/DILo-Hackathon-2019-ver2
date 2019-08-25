<?php namespace Tests\Repositories;

use App\Models\tourism_destinations;
use App\Repositories\tourism_destinationsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class tourism_destinationsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var tourism_destinationsRepository
     */
    protected $tourismDestinationsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tourismDestinationsRepo = \App::make(tourism_destinationsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_tourism_destinations()
    {
        $tourismDestinations = factory(tourism_destinations::class)->make()->toArray();

        $createdtourism_destinations = $this->tourismDestinationsRepo->create($tourismDestinations);

        $createdtourism_destinations = $createdtourism_destinations->toArray();
        $this->assertArrayHasKey('id', $createdtourism_destinations);
        $this->assertNotNull($createdtourism_destinations['id'], 'Created tourism_destinations must have id specified');
        $this->assertNotNull(tourism_destinations::find($createdtourism_destinations['id']), 'tourism_destinations with given id must be in DB');
        $this->assertModelData($tourismDestinations, $createdtourism_destinations);
    }

    /**
     * @test read
     */
    public function test_read_tourism_destinations()
    {
        $tourismDestinations = factory(tourism_destinations::class)->create();

        $dbtourism_destinations = $this->tourismDestinationsRepo->find($tourismDestinations->id);

        $dbtourism_destinations = $dbtourism_destinations->toArray();
        $this->assertModelData($tourismDestinations->toArray(), $dbtourism_destinations);
    }

    /**
     * @test update
     */
    public function test_update_tourism_destinations()
    {
        $tourismDestinations = factory(tourism_destinations::class)->create();
        $faketourism_destinations = factory(tourism_destinations::class)->make()->toArray();

        $updatedtourism_destinations = $this->tourismDestinationsRepo->update($faketourism_destinations, $tourismDestinations->id);

        $this->assertModelData($faketourism_destinations, $updatedtourism_destinations->toArray());
        $dbtourism_destinations = $this->tourismDestinationsRepo->find($tourismDestinations->id);
        $this->assertModelData($faketourism_destinations, $dbtourism_destinations->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_tourism_destinations()
    {
        $tourismDestinations = factory(tourism_destinations::class)->create();

        $resp = $this->tourismDestinationsRepo->delete($tourismDestinations->id);

        $this->assertTrue($resp);
        $this->assertNull(tourism_destinations::find($tourismDestinations->id), 'tourism_destinations should not exist in DB');
    }
}
