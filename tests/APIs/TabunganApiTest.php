<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Tabungan;

class TabunganApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_tabungan()
    {
        $tabungan = Tabungan::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/tabungans', $tabungan
        );

        $this->assertApiResponse($tabungan);
    }

    /**
     * @test
     */
    public function test_read_tabungan()
    {
        $tabungan = Tabungan::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/tabungans/'.$tabungan->id
        );

        $this->assertApiResponse($tabungan->toArray());
    }

    /**
     * @test
     */
    public function test_update_tabungan()
    {
        $tabungan = Tabungan::factory()->create();
        $editedTabungan = Tabungan::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/tabungans/'.$tabungan->id,
            $editedTabungan
        );

        $this->assertApiResponse($editedTabungan);
    }

    /**
     * @test
     */
    public function test_delete_tabungan()
    {
        $tabungan = Tabungan::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/tabungans/'.$tabungan->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/tabungans/'.$tabungan->id
        );

        $this->response->assertStatus(404);
    }
}
