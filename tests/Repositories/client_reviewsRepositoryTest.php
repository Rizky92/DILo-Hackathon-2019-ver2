<?php namespace Tests\Repositories;

use App\Models\client_reviews;
use App\Repositories\client_reviewsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class client_reviewsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var client_reviewsRepository
     */
    protected $clientReviewsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->clientReviewsRepo = \App::make(client_reviewsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_client_reviews()
    {
        $clientReviews = factory(client_reviews::class)->make()->toArray();

        $createdclient_reviews = $this->clientReviewsRepo->create($clientReviews);

        $createdclient_reviews = $createdclient_reviews->toArray();
        $this->assertArrayHasKey('id', $createdclient_reviews);
        $this->assertNotNull($createdclient_reviews['id'], 'Created client_reviews must have id specified');
        $this->assertNotNull(client_reviews::find($createdclient_reviews['id']), 'client_reviews with given id must be in DB');
        $this->assertModelData($clientReviews, $createdclient_reviews);
    }

    /**
     * @test read
     */
    public function test_read_client_reviews()
    {
        $clientReviews = factory(client_reviews::class)->create();

        $dbclient_reviews = $this->clientReviewsRepo->find($clientReviews->id);

        $dbclient_reviews = $dbclient_reviews->toArray();
        $this->assertModelData($clientReviews->toArray(), $dbclient_reviews);
    }

    /**
     * @test update
     */
    public function test_update_client_reviews()
    {
        $clientReviews = factory(client_reviews::class)->create();
        $fakeclient_reviews = factory(client_reviews::class)->make()->toArray();

        $updatedclient_reviews = $this->clientReviewsRepo->update($fakeclient_reviews, $clientReviews->id);

        $this->assertModelData($fakeclient_reviews, $updatedclient_reviews->toArray());
        $dbclient_reviews = $this->clientReviewsRepo->find($clientReviews->id);
        $this->assertModelData($fakeclient_reviews, $dbclient_reviews->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_client_reviews()
    {
        $clientReviews = factory(client_reviews::class)->create();

        $resp = $this->clientReviewsRepo->delete($clientReviews->id);

        $this->assertTrue($resp);
        $this->assertNull(client_reviews::find($clientReviews->id), 'client_reviews should not exist in DB');
    }
}
