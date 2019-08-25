<?php namespace Tests\Repositories;

use App\Models\client_bookmarks;
use App\Repositories\client_bookmarksRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class client_bookmarksRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var client_bookmarksRepository
     */
    protected $clientBookmarksRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->clientBookmarksRepo = \App::make(client_bookmarksRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_client_bookmarks()
    {
        $clientBookmarks = factory(client_bookmarks::class)->make()->toArray();

        $createdclient_bookmarks = $this->clientBookmarksRepo->create($clientBookmarks);

        $createdclient_bookmarks = $createdclient_bookmarks->toArray();
        $this->assertArrayHasKey('id', $createdclient_bookmarks);
        $this->assertNotNull($createdclient_bookmarks['id'], 'Created client_bookmarks must have id specified');
        $this->assertNotNull(client_bookmarks::find($createdclient_bookmarks['id']), 'client_bookmarks with given id must be in DB');
        $this->assertModelData($clientBookmarks, $createdclient_bookmarks);
    }

    /**
     * @test read
     */
    public function test_read_client_bookmarks()
    {
        $clientBookmarks = factory(client_bookmarks::class)->create();

        $dbclient_bookmarks = $this->clientBookmarksRepo->find($clientBookmarks->id);

        $dbclient_bookmarks = $dbclient_bookmarks->toArray();
        $this->assertModelData($clientBookmarks->toArray(), $dbclient_bookmarks);
    }

    /**
     * @test update
     */
    public function test_update_client_bookmarks()
    {
        $clientBookmarks = factory(client_bookmarks::class)->create();
        $fakeclient_bookmarks = factory(client_bookmarks::class)->make()->toArray();

        $updatedclient_bookmarks = $this->clientBookmarksRepo->update($fakeclient_bookmarks, $clientBookmarks->id);

        $this->assertModelData($fakeclient_bookmarks, $updatedclient_bookmarks->toArray());
        $dbclient_bookmarks = $this->clientBookmarksRepo->find($clientBookmarks->id);
        $this->assertModelData($fakeclient_bookmarks, $dbclient_bookmarks->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_client_bookmarks()
    {
        $clientBookmarks = factory(client_bookmarks::class)->create();

        $resp = $this->clientBookmarksRepo->delete($clientBookmarks->id);

        $this->assertTrue($resp);
        $this->assertNull(client_bookmarks::find($clientBookmarks->id), 'client_bookmarks should not exist in DB');
    }
}
