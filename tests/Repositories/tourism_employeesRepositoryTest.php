<?php namespace Tests\Repositories;

use App\Models\tourism_employees;
use App\Repositories\tourism_employeesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class tourism_employeesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var tourism_employeesRepository
     */
    protected $tourismEmployeesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tourismEmployeesRepo = \App::make(tourism_employeesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_tourism_employees()
    {
        $tourismEmployees = factory(tourism_employees::class)->make()->toArray();

        $createdtourism_employees = $this->tourismEmployeesRepo->create($tourismEmployees);

        $createdtourism_employees = $createdtourism_employees->toArray();
        $this->assertArrayHasKey('id', $createdtourism_employees);
        $this->assertNotNull($createdtourism_employees['id'], 'Created tourism_employees must have id specified');
        $this->assertNotNull(tourism_employees::find($createdtourism_employees['id']), 'tourism_employees with given id must be in DB');
        $this->assertModelData($tourismEmployees, $createdtourism_employees);
    }

    /**
     * @test read
     */
    public function test_read_tourism_employees()
    {
        $tourismEmployees = factory(tourism_employees::class)->create();

        $dbtourism_employees = $this->tourismEmployeesRepo->find($tourismEmployees->id);

        $dbtourism_employees = $dbtourism_employees->toArray();
        $this->assertModelData($tourismEmployees->toArray(), $dbtourism_employees);
    }

    /**
     * @test update
     */
    public function test_update_tourism_employees()
    {
        $tourismEmployees = factory(tourism_employees::class)->create();
        $faketourism_employees = factory(tourism_employees::class)->make()->toArray();

        $updatedtourism_employees = $this->tourismEmployeesRepo->update($faketourism_employees, $tourismEmployees->id);

        $this->assertModelData($faketourism_employees, $updatedtourism_employees->toArray());
        $dbtourism_employees = $this->tourismEmployeesRepo->find($tourismEmployees->id);
        $this->assertModelData($faketourism_employees, $dbtourism_employees->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_tourism_employees()
    {
        $tourismEmployees = factory(tourism_employees::class)->create();

        $resp = $this->tourismEmployeesRepo->delete($tourismEmployees->id);

        $this->assertTrue($resp);
        $this->assertNull(tourism_employees::find($tourismEmployees->id), 'tourism_employees should not exist in DB');
    }
}
