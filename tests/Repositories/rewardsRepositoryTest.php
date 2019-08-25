<?php namespace Tests\Repositories;

use App\Models\rewards;
use App\Repositories\rewardsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class rewardsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var rewardsRepository
     */
    protected $rewardsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->rewardsRepo = \App::make(rewardsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_rewards()
    {
        $rewards = factory(rewards::class)->make()->toArray();

        $createdrewards = $this->rewardsRepo->create($rewards);

        $createdrewards = $createdrewards->toArray();
        $this->assertArrayHasKey('id', $createdrewards);
        $this->assertNotNull($createdrewards['id'], 'Created rewards must have id specified');
        $this->assertNotNull(rewards::find($createdrewards['id']), 'rewards with given id must be in DB');
        $this->assertModelData($rewards, $createdrewards);
    }

    /**
     * @test read
     */
    public function test_read_rewards()
    {
        $rewards = factory(rewards::class)->create();

        $dbrewards = $this->rewardsRepo->find($rewards->id);

        $dbrewards = $dbrewards->toArray();
        $this->assertModelData($rewards->toArray(), $dbrewards);
    }

    /**
     * @test update
     */
    public function test_update_rewards()
    {
        $rewards = factory(rewards::class)->create();
        $fakerewards = factory(rewards::class)->make()->toArray();

        $updatedrewards = $this->rewardsRepo->update($fakerewards, $rewards->id);

        $this->assertModelData($fakerewards, $updatedrewards->toArray());
        $dbrewards = $this->rewardsRepo->find($rewards->id);
        $this->assertModelData($fakerewards, $dbrewards->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_rewards()
    {
        $rewards = factory(rewards::class)->create();

        $resp = $this->rewardsRepo->delete($rewards->id);

        $this->assertTrue($resp);
        $this->assertNull(rewards::find($rewards->id), 'rewards should not exist in DB');
    }
}
