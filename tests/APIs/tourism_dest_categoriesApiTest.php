<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\tourism_dest_categories;

class tourism_dest_categoriesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_tourism_dest_categories()
    {
        $tourismDestCategories = factory(tourism_dest_categories::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/tourism_dest_categories', $tourismDestCategories
        );

        $this->assertApiResponse($tourismDestCategories);
    }

    /**
     * @test
     */
    public function test_read_tourism_dest_categories()
    {
        $tourismDestCategories = factory(tourism_dest_categories::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/tourism_dest_categories/'.$tourismDestCategories->id
        );

        $this->assertApiResponse($tourismDestCategories->toArray());
    }

    /**
     * @test
     */
    public function test_update_tourism_dest_categories()
    {
        $tourismDestCategories = factory(tourism_dest_categories::class)->create();
        $editedtourism_dest_categories = factory(tourism_dest_categories::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/tourism_dest_categories/'.$tourismDestCategories->id,
            $editedtourism_dest_categories
        );

        $this->assertApiResponse($editedtourism_dest_categories);
    }

    /**
     * @test
     */
    public function test_delete_tourism_dest_categories()
    {
        $tourismDestCategories = factory(tourism_dest_categories::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/tourism_dest_categories/'.$tourismDestCategories->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/tourism_dest_categories/'.$tourismDestCategories->id
        );

        $this->response->assertStatus(404);
    }
}
