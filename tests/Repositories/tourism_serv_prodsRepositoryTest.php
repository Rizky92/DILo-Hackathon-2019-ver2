<?php namespace Tests\Repositories;

use App\Models\tourism_serv_prods;
use App\Repositories\tourism_serv_prodsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class tourism_serv_prodsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var tourism_serv_prodsRepository
     */
    protected $tourismServProdsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tourismServProdsRepo = \App::make(tourism_serv_prodsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_tourism_serv_prods()
    {
        $tourismServProds = factory(tourism_serv_prods::class)->make()->toArray();

        $createdtourism_serv_prods = $this->tourismServProdsRepo->create($tourismServProds);

        $createdtourism_serv_prods = $createdtourism_serv_prods->toArray();
        $this->assertArrayHasKey('id', $createdtourism_serv_prods);
        $this->assertNotNull($createdtourism_serv_prods['id'], 'Created tourism_serv_prods must have id specified');
        $this->assertNotNull(tourism_serv_prods::find($createdtourism_serv_prods['id']), 'tourism_serv_prods with given id must be in DB');
        $this->assertModelData($tourismServProds, $createdtourism_serv_prods);
    }

    /**
     * @test read
     */
    public function test_read_tourism_serv_prods()
    {
        $tourismServProds = factory(tourism_serv_prods::class)->create();

        $dbtourism_serv_prods = $this->tourismServProdsRepo->find($tourismServProds->id);

        $dbtourism_serv_prods = $dbtourism_serv_prods->toArray();
        $this->assertModelData($tourismServProds->toArray(), $dbtourism_serv_prods);
    }

    /**
     * @test update
     */
    public function test_update_tourism_serv_prods()
    {
        $tourismServProds = factory(tourism_serv_prods::class)->create();
        $faketourism_serv_prods = factory(tourism_serv_prods::class)->make()->toArray();

        $updatedtourism_serv_prods = $this->tourismServProdsRepo->update($faketourism_serv_prods, $tourismServProds->id);

        $this->assertModelData($faketourism_serv_prods, $updatedtourism_serv_prods->toArray());
        $dbtourism_serv_prods = $this->tourismServProdsRepo->find($tourismServProds->id);
        $this->assertModelData($faketourism_serv_prods, $dbtourism_serv_prods->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_tourism_serv_prods()
    {
        $tourismServProds = factory(tourism_serv_prods::class)->create();

        $resp = $this->tourismServProdsRepo->delete($tourismServProds->id);

        $this->assertTrue($resp);
        $this->assertNull(tourism_serv_prods::find($tourismServProds->id), 'tourism_serv_prods should not exist in DB');
    }
}
