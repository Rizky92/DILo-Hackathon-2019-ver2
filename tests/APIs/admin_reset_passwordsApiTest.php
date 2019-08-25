<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\admin_reset_passwords;

class admin_reset_passwordsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_admin_reset_passwords()
    {
        $adminResetPasswords = factory(admin_reset_passwords::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/admin_reset_passwords', $adminResetPasswords
        );

        $this->assertApiResponse($adminResetPasswords);
    }

    /**
     * @test
     */
    public function test_read_admin_reset_passwords()
    {
        $adminResetPasswords = factory(admin_reset_passwords::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/admin_reset_passwords/'.$adminResetPasswords->id
        );

        $this->assertApiResponse($adminResetPasswords->toArray());
    }

    /**
     * @test
     */
    public function test_update_admin_reset_passwords()
    {
        $adminResetPasswords = factory(admin_reset_passwords::class)->create();
        $editedadmin_reset_passwords = factory(admin_reset_passwords::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/admin_reset_passwords/'.$adminResetPasswords->id,
            $editedadmin_reset_passwords
        );

        $this->assertApiResponse($editedadmin_reset_passwords);
    }

    /**
     * @test
     */
    public function test_delete_admin_reset_passwords()
    {
        $adminResetPasswords = factory(admin_reset_passwords::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/admin_reset_passwords/'.$adminResetPasswords->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/admin_reset_passwords/'.$adminResetPasswords->id
        );

        $this->response->assertStatus(404);
    }
}
