<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\rewards;

class rewardsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_rewards()
    {
        $rewards = factory(rewards::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/rewards', $rewards
        );

        $this->assertApiResponse($rewards);
    }

    /**
     * @test
     */
    public function test_read_rewards()
    {
        $rewards = factory(rewards::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/rewards/'.$rewards->id
        );

        $this->assertApiResponse($rewards->toArray());
    }

    /**
     * @test
     */
    public function test_update_rewards()
    {
        $rewards = factory(rewards::class)->create();
        $editedrewards = factory(rewards::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/rewards/'.$rewards->id,
            $editedrewards
        );

        $this->assertApiResponse($editedrewards);
    }

    /**
     * @test
     */
    public function test_delete_rewards()
    {
        $rewards = factory(rewards::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/rewards/'.$rewards->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/rewards/'.$rewards->id
        );

        $this->response->assertStatus(404);
    }
}
