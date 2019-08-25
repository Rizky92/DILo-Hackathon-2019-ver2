<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\tourism_event_categories;

class tourism_event_categoriesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_tourism_event_categories()
    {
        $tourismEventCategories = factory(tourism_event_categories::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/tourism_event_categories', $tourismEventCategories
        );

        $this->assertApiResponse($tourismEventCategories);
    }

    /**
     * @test
     */
    public function test_read_tourism_event_categories()
    {
        $tourismEventCategories = factory(tourism_event_categories::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/tourism_event_categories/'.$tourismEventCategories->id
        );

        $this->assertApiResponse($tourismEventCategories->toArray());
    }

    /**
     * @test
     */
    public function test_update_tourism_event_categories()
    {
        $tourismEventCategories = factory(tourism_event_categories::class)->create();
        $editedtourism_event_categories = factory(tourism_event_categories::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/tourism_event_categories/'.$tourismEventCategories->id,
            $editedtourism_event_categories
        );

        $this->assertApiResponse($editedtourism_event_categories);
    }

    /**
     * @test
     */
    public function test_delete_tourism_event_categories()
    {
        $tourismEventCategories = factory(tourism_event_categories::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/tourism_event_categories/'.$tourismEventCategories->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/tourism_event_categories/'.$tourismEventCategories->id
        );

        $this->response->assertStatus(404);
    }
}
