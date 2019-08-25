<?php namespace Tests\Repositories;

use App\Models\tourism_event_categories;
use App\Repositories\tourism_event_categoriesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class tourism_event_categoriesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var tourism_event_categoriesRepository
     */
    protected $tourismEventCategoriesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tourismEventCategoriesRepo = \App::make(tourism_event_categoriesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_tourism_event_categories()
    {
        $tourismEventCategories = factory(tourism_event_categories::class)->make()->toArray();

        $createdtourism_event_categories = $this->tourismEventCategoriesRepo->create($tourismEventCategories);

        $createdtourism_event_categories = $createdtourism_event_categories->toArray();
        $this->assertArrayHasKey('id', $createdtourism_event_categories);
        $this->assertNotNull($createdtourism_event_categories['id'], 'Created tourism_event_categories must have id specified');
        $this->assertNotNull(tourism_event_categories::find($createdtourism_event_categories['id']), 'tourism_event_categories with given id must be in DB');
        $this->assertModelData($tourismEventCategories, $createdtourism_event_categories);
    }

    /**
     * @test read
     */
    public function test_read_tourism_event_categories()
    {
        $tourismEventCategories = factory(tourism_event_categories::class)->create();

        $dbtourism_event_categories = $this->tourismEventCategoriesRepo->find($tourismEventCategories->id);

        $dbtourism_event_categories = $dbtourism_event_categories->toArray();
        $this->assertModelData($tourismEventCategories->toArray(), $dbtourism_event_categories);
    }

    /**
     * @test update
     */
    public function test_update_tourism_event_categories()
    {
        $tourismEventCategories = factory(tourism_event_categories::class)->create();
        $faketourism_event_categories = factory(tourism_event_categories::class)->make()->toArray();

        $updatedtourism_event_categories = $this->tourismEventCategoriesRepo->update($faketourism_event_categories, $tourismEventCategories->id);

        $this->assertModelData($faketourism_event_categories, $updatedtourism_event_categories->toArray());
        $dbtourism_event_categories = $this->tourismEventCategoriesRepo->find($tourismEventCategories->id);
        $this->assertModelData($faketourism_event_categories, $dbtourism_event_categories->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_tourism_event_categories()
    {
        $tourismEventCategories = factory(tourism_event_categories::class)->create();

        $resp = $this->tourismEventCategoriesRepo->delete($tourismEventCategories->id);

        $this->assertTrue($resp);
        $this->assertNull(tourism_event_categories::find($tourismEventCategories->id), 'tourism_event_categories should not exist in DB');
    }
}
