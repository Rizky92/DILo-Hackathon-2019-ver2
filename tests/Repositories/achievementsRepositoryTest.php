<?php namespace Tests\Repositories;

use App\Models\achievements;
use App\Repositories\achievementsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class achievementsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var achievementsRepository
     */
    protected $achievementsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->achievementsRepo = \App::make(achievementsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_achievements()
    {
        $achievements = factory(achievements::class)->make()->toArray();

        $createdachievements = $this->achievementsRepo->create($achievements);

        $createdachievements = $createdachievements->toArray();
        $this->assertArrayHasKey('id', $createdachievements);
        $this->assertNotNull($createdachievements['id'], 'Created achievements must have id specified');
        $this->assertNotNull(achievements::find($createdachievements['id']), 'achievements with given id must be in DB');
        $this->assertModelData($achievements, $createdachievements);
    }

    /**
     * @test read
     */
    public function test_read_achievements()
    {
        $achievements = factory(achievements::class)->create();

        $dbachievements = $this->achievementsRepo->find($achievements->id);

        $dbachievements = $dbachievements->toArray();
        $this->assertModelData($achievements->toArray(), $dbachievements);
    }

    /**
     * @test update
     */
    public function test_update_achievements()
    {
        $achievements = factory(achievements::class)->create();
        $fakeachievements = factory(achievements::class)->make()->toArray();

        $updatedachievements = $this->achievementsRepo->update($fakeachievements, $achievements->id);

        $this->assertModelData($fakeachievements, $updatedachievements->toArray());
        $dbachievements = $this->achievementsRepo->find($achievements->id);
        $this->assertModelData($fakeachievements, $dbachievements->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_achievements()
    {
        $achievements = factory(achievements::class)->create();

        $resp = $this->achievementsRepo->delete($achievements->id);

        $this->assertTrue($resp);
        $this->assertNull(achievements::find($achievements->id), 'achievements should not exist in DB');
    }
}
