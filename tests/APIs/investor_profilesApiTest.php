<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\investor_profiles;

class investor_profilesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_investor_profiles()
    {
        $investorProfiles = factory(investor_profiles::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/investor_profiles', $investorProfiles
        );

        $this->assertApiResponse($investorProfiles);
    }

    /**
     * @test
     */
    public function test_read_investor_profiles()
    {
        $investorProfiles = factory(investor_profiles::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/investor_profiles/'.$investorProfiles->id
        );

        $this->assertApiResponse($investorProfiles->toArray());
    }

    /**
     * @test
     */
    public function test_update_investor_profiles()
    {
        $investorProfiles = factory(investor_profiles::class)->create();
        $editedinvestor_profiles = factory(investor_profiles::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/investor_profiles/'.$investorProfiles->id,
            $editedinvestor_profiles
        );

        $this->assertApiResponse($editedinvestor_profiles);
    }

    /**
     * @test
     */
    public function test_delete_investor_profiles()
    {
        $investorProfiles = factory(investor_profiles::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/investor_profiles/'.$investorProfiles->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/investor_profiles/'.$investorProfiles->id
        );

        $this->response->assertStatus(404);
    }
}
