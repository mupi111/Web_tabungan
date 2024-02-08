<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Nasabah;

class NasabahApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_nasabah()
    {
        $nasabah = Nasabah::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/nasabahs', $nasabah
        );

        $this->assertApiResponse($nasabah);
    }

    /**
     * @test
     */
    public function test_read_nasabah()
    {
        $nasabah = Nasabah::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/nasabahs/'.$nasabah->id
        );

        $this->assertApiResponse($nasabah->toArray());
    }

    /**
     * @test
     */
    public function test_update_nasabah()
    {
        $nasabah = Nasabah::factory()->create();
        $editedNasabah = Nasabah::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/nasabahs/'.$nasabah->id,
            $editedNasabah
        );

        $this->assertApiResponse($editedNasabah);
    }

    /**
     * @test
     */
    public function test_delete_nasabah()
    {
        $nasabah = Nasabah::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/nasabahs/'.$nasabah->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/nasabahs/'.$nasabah->id
        );

        $this->response->assertStatus(404);
    }
}
