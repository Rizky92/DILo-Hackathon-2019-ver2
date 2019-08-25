<?php namespace Tests\Repositories;

use App\Models\client_scores;
use App\Repositories\client_scoresRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class client_scoresRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var client_scoresRepository
     */
    protected $clientScoresRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->clientScoresRepo = \App::make(client_scoresRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_client_scores()
    {
        $clientScores = factory(client_scores::class)->make()->toArray();

        $createdclient_scores = $this->clientScoresRepo->create($clientScores);

        $createdclient_scores = $createdclient_scores->toArray();
        $this->assertArrayHasKey('id', $createdclient_scores);
        $this->assertNotNull($createdclient_scores['id'], 'Created client_scores must have id specified');
        $this->assertNotNull(client_scores::find($createdclient_scores['id']), 'client_scores with given id must be in DB');
        $this->assertModelData($clientScores, $createdclient_scores);
    }

    /**
     * @test read
     */
    public function test_read_client_scores()
    {
        $clientScores = factory(client_scores::class)->create();

        $dbclient_scores = $this->clientScoresRepo->find($clientScores->id);

        $dbclient_scores = $dbclient_scores->toArray();
        $this->assertModelData($clientScores->toArray(), $dbclient_scores);
    }

    /**
     * @test update
     */
    public function test_update_client_scores()
    {
        $clientScores = factory(client_scores::class)->create();
        $fakeclient_scores = factory(client_scores::class)->make()->toArray();

        $updatedclient_scores = $this->clientScoresRepo->update($fakeclient_scores, $clientScores->id);

        $this->assertModelData($fakeclient_scores, $updatedclient_scores->toArray());
        $dbclient_scores = $this->clientScoresRepo->find($clientScores->id);
        $this->assertModelData($fakeclient_scores, $dbclient_scores->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_client_scores()
    {
        $clientScores = factory(client_scores::class)->create();

        $resp = $this->clientScoresRepo->delete($clientScores->id);

        $this->assertTrue($resp);
        $this->assertNull(client_scores::find($clientScores->id), 'client_scores should not exist in DB');
    }
}
