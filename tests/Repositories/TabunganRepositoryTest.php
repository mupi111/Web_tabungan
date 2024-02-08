<?php namespace Tests\Repositories;

use App\Models\Tabungan;
use App\Repositories\TabunganRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class TabunganRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var TabunganRepository
     */
    protected $tabunganRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tabunganRepo = \App::make(TabunganRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_tabungan()
    {
        $tabungan = Tabungan::factory()->make()->toArray();

        $createdTabungan = $this->tabunganRepo->create($tabungan);

        $createdTabungan = $createdTabungan->toArray();
        $this->assertArrayHasKey('id', $createdTabungan);
        $this->assertNotNull($createdTabungan['id'], 'Created Tabungan must have id specified');
        $this->assertNotNull(Tabungan::find($createdTabungan['id']), 'Tabungan with given id must be in DB');
        $this->assertModelData($tabungan, $createdTabungan);
    }

    /**
     * @test read
     */
    public function test_read_tabungan()
    {
        $tabungan = Tabungan::factory()->create();

        $dbTabungan = $this->tabunganRepo->find($tabungan->id);

        $dbTabungan = $dbTabungan->toArray();
        $this->assertModelData($tabungan->toArray(), $dbTabungan);
    }

    /**
     * @test update
     */
    public function test_update_tabungan()
    {
        $tabungan = Tabungan::factory()->create();
        $fakeTabungan = Tabungan::factory()->make()->toArray();

        $updatedTabungan = $this->tabunganRepo->update($fakeTabungan, $tabungan->id);

        $this->assertModelData($fakeTabungan, $updatedTabungan->toArray());
        $dbTabungan = $this->tabunganRepo->find($tabungan->id);
        $this->assertModelData($fakeTabungan, $dbTabungan->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_tabungan()
    {
        $tabungan = Tabungan::factory()->create();

        $resp = $this->tabunganRepo->delete($tabungan->id);

        $this->assertTrue($resp);
        $this->assertNull(Tabungan::find($tabungan->id), 'Tabungan should not exist in DB');
    }
}
