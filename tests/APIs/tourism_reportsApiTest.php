<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\tourism_reports;

class tourism_reportsApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_tourism_reports()
    {
        $tourismReports = factory(tourism_reports::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/tourism_reports', $tourismReports
        );

        $this->assertApiResponse($tourismReports);
    }

    /**
     * @test
     */
    public function test_read_tourism_reports()
    {
        $tourismReports = factory(tourism_reports::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/tourism_reports/'.$tourismReports->id
        );

        $this->assertApiResponse($tourismReports->toArray());
    }

    /**
     * @test
     */
    public function test_update_tourism_reports()
    {
        $tourismReports = factory(tourism_reports::class)->create();
        $editedtourism_reports = factory(tourism_reports::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/tourism_reports/'.$tourismReports->id,
            $editedtourism_reports
        );

        $this->assertApiResponse($editedtourism_reports);
    }

    /**
     * @test
     */
    public function test_delete_tourism_reports()
    {
        $tourismReports = factory(tourism_reports::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/tourism_reports/'.$tourismReports->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/tourism_reports/'.$tourismReports->id
        );

        $this->response->assertStatus(404);
    }
}
