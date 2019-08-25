<?php namespace Tests\Repositories;

use App\Models\admin_reset_passwords;
use App\Repositories\admin_reset_passwordsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class admin_reset_passwordsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var admin_reset_passwordsRepository
     */
    protected $adminResetPasswordsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->adminResetPasswordsRepo = \App::make(admin_reset_passwordsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_admin_reset_passwords()
    {
        $adminResetPasswords = factory(admin_reset_passwords::class)->make()->toArray();

        $createdadmin_reset_passwords = $this->adminResetPasswordsRepo->create($adminResetPasswords);

        $createdadmin_reset_passwords = $createdadmin_reset_passwords->toArray();
        $this->assertArrayHasKey('id', $createdadmin_reset_passwords);
        $this->assertNotNull($createdadmin_reset_passwords['id'], 'Created admin_reset_passwords must have id specified');
        $this->assertNotNull(admin_reset_passwords::find($createdadmin_reset_passwords['id']), 'admin_reset_passwords with given id must be in DB');
        $this->assertModelData($adminResetPasswords, $createdadmin_reset_passwords);
    }

    /**
     * @test read
     */
    public function test_read_admin_reset_passwords()
    {
        $adminResetPasswords = factory(admin_reset_passwords::class)->create();

        $dbadmin_reset_passwords = $this->adminResetPasswordsRepo->find($adminResetPasswords->id);

        $dbadmin_reset_passwords = $dbadmin_reset_passwords->toArray();
        $this->assertModelData($adminResetPasswords->toArray(), $dbadmin_reset_passwords);
    }

    /**
     * @test update
     */
    public function test_update_admin_reset_passwords()
    {
        $adminResetPasswords = factory(admin_reset_passwords::class)->create();
        $fakeadmin_reset_passwords = factory(admin_reset_passwords::class)->make()->toArray();

        $updatedadmin_reset_passwords = $this->adminResetPasswordsRepo->update($fakeadmin_reset_passwords, $adminResetPasswords->id);

        $this->assertModelData($fakeadmin_reset_passwords, $updatedadmin_reset_passwords->toArray());
        $dbadmin_reset_passwords = $this->adminResetPasswordsRepo->find($adminResetPasswords->id);
        $this->assertModelData($fakeadmin_reset_passwords, $dbadmin_reset_passwords->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_admin_reset_passwords()
    {
        $adminResetPasswords = factory(admin_reset_passwords::class)->create();

        $resp = $this->adminResetPasswordsRepo->delete($adminResetPasswords->id);

        $this->assertTrue($resp);
        $this->assertNull(admin_reset_passwords::find($adminResetPasswords->id), 'admin_reset_passwords should not exist in DB');
    }
}
