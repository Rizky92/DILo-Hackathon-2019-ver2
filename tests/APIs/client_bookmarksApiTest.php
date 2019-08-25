<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\client_bookmarks;

class client_bookmarksApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_client_bookmarks()
    {
        $clientBookmarks = factory(client_bookmarks::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/client_bookmarks', $clientBookmarks
        );

        $this->assertApiResponse($clientBookmarks);
    }

    /**
     * @test
     */
    public function test_read_client_bookmarks()
    {
        $clientBookmarks = factory(client_bookmarks::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/client_bookmarks/'.$clientBookmarks->id
        );

        $this->assertApiResponse($clientBookmarks->toArray());
    }

    /**
     * @test
     */
    public function test_update_client_bookmarks()
    {
        $clientBookmarks = factory(client_bookmarks::class)->create();
        $editedclient_bookmarks = factory(client_bookmarks::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/client_bookmarks/'.$clientBookmarks->id,
            $editedclient_bookmarks
        );

        $this->assertApiResponse($editedclient_bookmarks);
    }

    /**
     * @test
     */
    public function test_delete_client_bookmarks()
    {
        $clientBookmarks = factory(client_bookmarks::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/client_bookmarks/'.$clientBookmarks->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/client_bookmarks/'.$clientBookmarks->id
        );

        $this->response->assertStatus(404);
    }
}
