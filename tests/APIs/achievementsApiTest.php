<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\achievements;

class achievementsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_achievements()
    {
        $achievements = factory(achievements::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/achievements', $achievements
        );

        $this->assertApiResponse($achievements);
    }

    /**
     * @test
     */
    public function test_read_achievements()
    {
        $achievements = factory(achievements::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/achievements/'.$achievements->id
        );

        $this->assertApiResponse($achievements->toArray());
    }

    /**
     * @test
     */
    public function test_update_achievements()
    {
        $achievements = factory(achievements::class)->create();
        $editedachievements = factory(achievements::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/achievements/'.$achievements->id,
            $editedachievements
        );

        $this->assertApiResponse($editedachievements);
    }

    /**
     * @test
     */
    public function test_delete_achievements()
    {
        $achievements = factory(achievements::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/achievements/'.$achievements->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/achievements/'.$achievements->id
        );

        $this->response->assertStatus(404);
    }
}
