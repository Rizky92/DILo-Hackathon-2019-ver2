<?php namespace Tests\Repositories;

use App\Models\admin_users;
use App\Repositories\admin_usersRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class admin_usersRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var admin_usersRepository
     */
    protected $adminUsersRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->adminUsersRepo = \App::make(admin_usersRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_admin_users()
    {
        $adminUsers = factory(admin_users::class)->make()->toArray();

        $createdadmin_users = $this->adminUsersRepo->create($adminUsers);

        $createdadmin_users = $createdadmin_users->toArray();
        $this->assertArrayHasKey('id', $createdadmin_users);
        $this->assertNotNull($createdadmin_users['id'], 'Created admin_users must have id specified');
        $this->assertNotNull(admin_users::find($createdadmin_users['id']), 'admin_users with given id must be in DB');
        $this->assertModelData($adminUsers, $createdadmin_users);
    }

    /**
     * @test read
     */
    public function test_read_admin_users()
    {
        $adminUsers = factory(admin_users::class)->create();

        $dbadmin_users = $this->adminUsersRepo->find($adminUsers->id);

        $dbadmin_users = $dbadmin_users->toArray();
        $this->assertModelData($adminUsers->toArray(), $dbadmin_users);
    }

    /**
     * @test update
     */
    public function test_update_admin_users()
    {
        $adminUsers = factory(admin_users::class)->create();
        $fakeadmin_users = factory(admin_users::class)->make()->toArray();

        $updatedadmin_users = $this->adminUsersRepo->update($fakeadmin_users, $adminUsers->id);

        $this->assertModelData($fakeadmin_users, $updatedadmin_users->toArray());
        $dbadmin_users = $this->adminUsersRepo->find($adminUsers->id);
        $this->assertModelData($fakeadmin_users, $dbadmin_users->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_admin_users()
    {
        $adminUsers = factory(admin_users::class)->create();

        $resp = $this->adminUsersRepo->delete($adminUsers->id);

        $this->assertTrue($resp);
        $this->assertNull(admin_users::find($adminUsers->id), 'admin_users should not exist in DB');
    }
}
