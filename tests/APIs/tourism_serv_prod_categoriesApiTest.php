<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\tourism_serv_prod_categories;

class tourism_serv_prod_categoriesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_tourism_serv_prod_categories()
    {
        $tourismServProdCategories = factory(tourism_serv_prod_categories::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/tourism_serv_prod_categories', $tourismServProdCategories
        );

        $this->assertApiResponse($tourismServProdCategories);
    }

    /**
     * @test
     */
    public function test_read_tourism_serv_prod_categories()
    {
        $tourismServProdCategories = factory(tourism_serv_prod_categories::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/tourism_serv_prod_categories/'.$tourismServProdCategories->id
        );

        $this->assertApiResponse($tourismServProdCategories->toArray());
    }

    /**
     * @test
     */
    public function test_update_tourism_serv_prod_categories()
    {
        $tourismServProdCategories = factory(tourism_serv_prod_categories::class)->create();
        $editedtourism_serv_prod_categories = factory(tourism_serv_prod_categories::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/tourism_serv_prod_categories/'.$tourismServProdCategories->id,
            $editedtourism_serv_prod_categories
        );

        $this->assertApiResponse($editedtourism_serv_prod_categories);
    }

    /**
     * @test
     */
    public function test_delete_tourism_serv_prod_categories()
    {
        $tourismServProdCategories = factory(tourism_serv_prod_categories::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/tourism_serv_prod_categories/'.$tourismServProdCategories->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/tourism_serv_prod_categories/'.$tourismServProdCategories->id
        );

        $this->response->assertStatus(404);
    }
}
