<?php namespace Tests\Repositories;

use App\Models\tourism_serv_prod_categories;
use App\Repositories\tourism_serv_prod_categoriesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class tourism_serv_prod_categoriesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var tourism_serv_prod_categoriesRepository
     */
    protected $tourismServProdCategoriesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tourismServProdCategoriesRepo = \App::make(tourism_serv_prod_categoriesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_tourism_serv_prod_categories()
    {
        $tourismServProdCategories = factory(tourism_serv_prod_categories::class)->make()->toArray();

        $createdtourism_serv_prod_categories = $this->tourismServProdCategoriesRepo->create($tourismServProdCategories);

        $createdtourism_serv_prod_categories = $createdtourism_serv_prod_categories->toArray();
        $this->assertArrayHasKey('id', $createdtourism_serv_prod_categories);
        $this->assertNotNull($createdtourism_serv_prod_categories['id'], 'Created tourism_serv_prod_categories must have id specified');
        $this->assertNotNull(tourism_serv_prod_categories::find($createdtourism_serv_prod_categories['id']), 'tourism_serv_prod_categories with given id must be in DB');
        $this->assertModelData($tourismServProdCategories, $createdtourism_serv_prod_categories);
    }

    /**
     * @test read
     */
    public function test_read_tourism_serv_prod_categories()
    {
        $tourismServProdCategories = factory(tourism_serv_prod_categories::class)->create();

        $dbtourism_serv_prod_categories = $this->tourismServProdCategoriesRepo->find($tourismServProdCategories->id);

        $dbtourism_serv_prod_categories = $dbtourism_serv_prod_categories->toArray();
        $this->assertModelData($tourismServProdCategories->toArray(), $dbtourism_serv_prod_categories);
    }

    /**
     * @test update
     */
    public function test_update_tourism_serv_prod_categories()
    {
        $tourismServProdCategories = factory(tourism_serv_prod_categories::class)->create();
        $faketourism_serv_prod_categories = factory(tourism_serv_prod_categories::class)->make()->toArray();

        $updatedtourism_serv_prod_categories = $this->tourismServProdCategoriesRepo->update($faketourism_serv_prod_categories, $tourismServProdCategories->id);

        $this->assertModelData($faketourism_serv_prod_categories, $updatedtourism_serv_prod_categories->toArray());
        $dbtourism_serv_prod_categories = $this->tourismServProdCategoriesRepo->find($tourismServProdCategories->id);
        $this->assertModelData($faketourism_serv_prod_categories, $dbtourism_serv_prod_categories->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_tourism_serv_prod_categories()
    {
        $tourismServProdCategories = factory(tourism_serv_prod_categories::class)->create();

        $resp = $this->tourismServProdCategoriesRepo->delete($tourismServProdCategories->id);

        $this->assertTrue($resp);
        $this->assertNull(tourism_serv_prod_categories::find($tourismServProdCategories->id), 'tourism_serv_prod_categories should not exist in DB');
    }
}
