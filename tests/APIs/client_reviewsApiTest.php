<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\client_reviews;

class client_reviewsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_client_reviews()
    {
        $clientReviews = factory(client_reviews::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/client_reviews', $clientReviews
        );

        $this->assertApiResponse($clientReviews);
    }

    /**
     * @test
     */
    public function test_read_client_reviews()
    {
        $clientReviews = factory(client_reviews::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/client_reviews/'.$clientReviews->id
        );

        $this->assertApiResponse($clientReviews->toArray());
    }

    /**
     * @test
     */
    public function test_update_client_reviews()
    {
        $clientReviews = factory(client_reviews::class)->create();
        $editedclient_reviews = factory(client_reviews::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/client_reviews/'.$clientReviews->id,
            $editedclient_reviews
        );

        $this->assertApiResponse($editedclient_reviews);
    }

    /**
     * @test
     */
    public function test_delete_client_reviews()
    {
        $clientReviews = factory(client_reviews::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/client_reviews/'.$clientReviews->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/client_reviews/'.$clientReviews->id
        );

        $this->response->assertStatus(404);
    }
}
