<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\client_users;

class client_usersApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_client_users()
    {
        $clientUsers = factory(client_users::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/client_users', $clientUsers
        );

        $this->assertApiResponse($clientUsers);
    }

    /**
     * @test
     */
    public function test_read_client_users()
    {
        $clientUsers = factory(client_users::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/client_users/'.$clientUsers->id
        );

        $this->assertApiResponse($clientUsers->toArray());
    }

    /**
     * @test
     */
    public function test_update_client_users()
    {
        $clientUsers = factory(client_users::class)->create();
        $editedclient_users = factory(client_users::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/client_users/'.$clientUsers->id,
            $editedclient_users
        );

        $this->assertApiResponse($editedclient_users);
    }

    /**
     * @test
     */
    public function test_delete_client_users()
    {
        $clientUsers = factory(client_users::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/client_users/'.$clientUsers->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/client_users/'.$clientUsers->id
        );

        $this->response->assertStatus(404);
    }
}
