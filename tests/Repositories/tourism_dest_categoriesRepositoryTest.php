<?php namespace Tests\Repositories;

use App\Models\tourism_dest_categories;
use App\Repositories\tourism_dest_categoriesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class tourism_dest_categoriesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var tourism_dest_categoriesRepository
     */
    protected $tourismDestCategoriesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tourismDestCategoriesRepo = \App::make(tourism_dest_categoriesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_tourism_dest_categories()
    {
        $tourismDestCategories = factory(tourism_dest_categories::class)->make()->toArray();

        $createdtourism_dest_categories = $this->tourismDestCategoriesRepo->create($tourismDestCategories);

        $createdtourism_dest_categories = $createdtourism_dest_categories->toArray();
        $this->assertArrayHasKey('id', $createdtourism_dest_categories);
        $this->assertNotNull($createdtourism_dest_categories['id'], 'Created tourism_dest_categories must have id specified');
        $this->assertNotNull(tourism_dest_categories::find($createdtourism_dest_categories['id']), 'tourism_dest_categories with given id must be in DB');
        $this->assertModelData($tourismDestCategories, $createdtourism_dest_categories);
    }

    /**
     * @test read
     */
    public function test_read_tourism_dest_categories()
    {
        $tourismDestCategories = factory(tourism_dest_categories::class)->create();

        $dbtourism_dest_categories = $this->tourismDestCategoriesRepo->find($tourismDestCategories->id);

        $dbtourism_dest_categories = $dbtourism_dest_categories->toArray();
        $this->assertModelData($tourismDestCategories->toArray(), $dbtourism_dest_categories);
    }

    /**
     * @test update
     */
    public function test_update_tourism_dest_categories()
    {
        $tourismDestCategories = factory(tourism_dest_categories::class)->create();
        $faketourism_dest_categories = factory(tourism_dest_categories::class)->make()->toArray();

        $updatedtourism_dest_categories = $this->tourismDestCategoriesRepo->update($faketourism_dest_categories, $tourismDestCategories->id);

        $this->assertModelData($faketourism_dest_categories, $updatedtourism_dest_categories->toArray());
        $dbtourism_dest_categories = $this->tourismDestCategoriesRepo->find($tourismDestCategories->id);
        $this->assertModelData($faketourism_dest_categories, $dbtourism_dest_categories->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_tourism_dest_categories()
    {
        $tourismDestCategories = factory(tourism_dest_categories::class)->create();

        $resp = $this->tourismDestCategoriesRepo->delete($tourismDestCategories->id);

        $this->assertTrue($resp);
        $this->assertNull(tourism_dest_categories::find($tourismDestCategories->id), 'tourism_dest_categories should not exist in DB');
    }
}
