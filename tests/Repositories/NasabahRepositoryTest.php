<?php namespace Tests\Repositories;

use App\Models\Nasabah;
use App\Repositories\NasabahRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class NasabahRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var NasabahRepository
     */
    protected $nasabahRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->nasabahRepo = \App::make(NasabahRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_nasabah()
    {
        $nasabah = Nasabah::factory()->make()->toArray();

        $createdNasabah = $this->nasabahRepo->create($nasabah);

        $createdNasabah = $createdNasabah->toArray();
        $this->assertArrayHasKey('id', $createdNasabah);
        $this->assertNotNull($createdNasabah['id'], 'Created Nasabah must have id specified');
        $this->assertNotNull(Nasabah::find($createdNasabah['id']), 'Nasabah with given id must be in DB');
        $this->assertModelData($nasabah, $createdNasabah);
    }

    /**
     * @test read
     */
    public function test_read_nasabah()
    {
        $nasabah = Nasabah::factory()->create();

        $dbNasabah = $this->nasabahRepo->find($nasabah->id);

        $dbNasabah = $dbNasabah->toArray();
        $this->assertModelData($nasabah->toArray(), $dbNasabah);
    }

    /**
     * @test update
     */
    public function test_update_nasabah()
    {
        $nasabah = Nasabah::factory()->create();
        $fakeNasabah = Nasabah::factory()->make()->toArray();

        $updatedNasabah = $this->nasabahRepo->update($fakeNasabah, $nasabah->id);

        $this->assertModelData($fakeNasabah, $updatedNasabah->toArray());
        $dbNasabah = $this->nasabahRepo->find($nasabah->id);
        $this->assertModelData($fakeNasabah, $dbNasabah->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_nasabah()
    {
        $nasabah = Nasabah::factory()->create();

        $resp = $this->nasabahRepo->delete($nasabah->id);

        $this->assertTrue($resp);
        $this->assertNull(Nasabah::find($nasabah->id), 'Nasabah should not exist in DB');
    }
}
