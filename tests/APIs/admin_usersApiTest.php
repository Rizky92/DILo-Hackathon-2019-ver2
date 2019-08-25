<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\admin_users;

class admin_usersApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_admin_users()
    {
        $adminUsers = factory(admin_users::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/admin_users', $adminUsers
        );

        $this->assertApiResponse($adminUsers);
    }

    /**
     * @test
     */
    public function test_read_admin_users()
    {
        $adminUsers = factory(admin_users::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/admin_users/'.$adminUsers->id
        );

        $this->assertApiResponse($adminUsers->toArray());
    }

    /**
     * @test
     */
    public function test_update_admin_users()
    {
        $adminUsers = factory(admin_users::class)->create();
        $editedadmin_users = factory(admin_users::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/admin_users/'.$adminUsers->id,
            $editedadmin_users
        );

        $this->assertApiResponse($editedadmin_users);
    }

    /**
     * @test
     */
    public function test_delete_admin_users()
    {
        $adminUsers = factory(admin_users::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/admin_users/'.$adminUsers->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/admin_users/'.$adminUsers->id
        );

        $this->response->assertStatus(404);
    }
}
