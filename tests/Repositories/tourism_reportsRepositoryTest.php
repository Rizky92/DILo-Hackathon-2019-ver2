<?php namespace Tests\Repositories;

use App\Models\tourism_reports;
use App\Repositories\tourism_reportsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class tourism_reportsRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var tourism_reportsRepository
     */
    protected $tourismReportsRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tourismReportsRepo = \App::make(tourism_reportsRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_tourism_reports()
    {
        $tourismReports = factory(tourism_reports::class)->make()->toArray();

        $createdtourism_reports = $this->tourismReportsRepo->create($tourismReports);

        $createdtourism_reports = $createdtourism_reports->toArray();
        $this->assertArrayHasKey('id', $createdtourism_reports);
        $this->assertNotNull($createdtourism_reports['id'], 'Created tourism_reports must have id specified');
        $this->assertNotNull(tourism_reports::find($createdtourism_reports['id']), 'tourism_reports with given id must be in DB');
        $this->assertModelData($tourismReports, $createdtourism_reports);
    }

    /**
     * @test read
     */
    public function test_read_tourism_reports()
    {
        $tourismReports = factory(tourism_reports::class)->create();

        $dbtourism_reports = $this->tourismReportsRepo->find($tourismReports->id);

        $dbtourism_reports = $dbtourism_reports->toArray();
        $this->assertModelData($tourismReports->toArray(), $dbtourism_reports);
    }

    /**
     * @test update
     */
    public function test_update_tourism_reports()
    {
        $tourismReports = factory(tourism_reports::class)->create();
        $faketourism_reports = factory(tourism_reports::class)->make()->toArray();

        $updatedtourism_reports = $this->tourismReportsRepo->update($faketourism_reports, $tourismReports->id);

        $this->assertModelData($faketourism_reports, $updatedtourism_reports->toArray());
        $dbtourism_reports = $this->tourismReportsRepo->find($tourismReports->id);
        $this->assertModelData($faketourism_reports, $dbtourism_reports->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_tourism_reports()
    {
        $tourismReports = factory(tourism_reports::class)->create();

        $resp = $this->tourismReportsRepo->delete($tourismReports->id);

        $this->assertTrue($resp);
        $this->assertNull(tourism_reports::find($tourismReports->id), 'tourism_reports should not exist in DB');
    }
}
