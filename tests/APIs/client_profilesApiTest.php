<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\client_profiles;

class client_profilesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_client_profiles()
    {
        $clientProfiles = factory(client_profiles::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/client_profiles', $clientProfiles
        );

        $this->assertApiResponse($clientProfiles);
    }

    /**
     * @test
     */
    public function test_read_client_profiles()
    {
        $clientProfiles = factory(client_profiles::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/client_profiles/'.$clientProfiles->id
        );

        $this->assertApiResponse($clientProfiles->toArray());
    }

    /**
     * @test
     */
    public function test_update_client_profiles()
    {
        $clientProfiles = factory(client_profiles::class)->create();
        $editedclient_profiles = factory(client_profiles::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/client_profiles/'.$clientProfiles->id,
            $editedclient_profiles
        );

        $this->assertApiResponse($editedclient_profiles);
    }

    /**
     * @test
     */
    public function test_delete_client_profiles()
    {
        $clientProfiles = factory(client_profiles::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/client_profiles/'.$clientProfiles->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/client_profiles/'.$clientProfiles->id
        );

        $this->response->assertStatus(404);
    }
}
