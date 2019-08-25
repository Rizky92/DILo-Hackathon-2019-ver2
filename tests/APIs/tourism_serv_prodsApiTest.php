<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\tourism_serv_prods;

class tourism_serv_prodsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_tourism_serv_prods()
    {
        $tourismServProds = factory(tourism_serv_prods::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/tourism_serv_prods', $tourismServProds
        );

        $this->assertApiResponse($tourismServProds);
    }

    /**
     * @test
     */
    public function test_read_tourism_serv_prods()
    {
        $tourismServProds = factory(tourism_serv_prods::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/tourism_serv_prods/'.$tourismServProds->id
        );

        $this->assertApiResponse($tourismServProds->toArray());
    }

    /**
     * @test
     */
    public function test_update_tourism_serv_prods()
    {
        $tourismServProds = factory(tourism_serv_prods::class)->create();
        $editedtourism_serv_prods = factory(tourism_serv_prods::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/tourism_serv_prods/'.$tourismServProds->id,
            $editedtourism_serv_prods
        );

        $this->assertApiResponse($editedtourism_serv_prods);
    }

    /**
     * @test
     */
    public function test_delete_tourism_serv_prods()
    {
        $tourismServProds = factory(tourism_serv_prods::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/tourism_serv_prods/'.$tourismServProds->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/tourism_serv_prods/'.$tourismServProds->id
        );

        $this->response->assertStatus(404);
    }
}
