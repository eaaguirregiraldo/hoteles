<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\DAO\CiudadDAO;
use App\Models\Ciudad;
use Illuminate\Support\Facades\Log;

class CiudadDAOTest extends TestCase
{
    protected $ciudadDAO;

    protected function setUp(): void
    {
        parent::setUp();
        $this->ciudadDAO = new CiudadDAO();
        Log::info('Setup for CiudadDAOTest completed.');
    }

    public function testGetAll()
    {
        try {
            Log::info('Running testGetAll.');
            Ciudad::factory()->count(3)->create();
            $ciudades = $this->ciudadDAO->getAll();
            $this->assertCount(3, $ciudades);
        } catch (\Exception $e) {
            Log::error('Error in testGetAll: ' . $e->getMessage());
            $this->fail('Exception thrown in testGetAll.');
        }
    }

    public function testGetById()
    {
        try {
            Log::info('Running testGetById.');
            $ciudad = Ciudad::factory()->create();
            $foundCiudad = $this->ciudadDAO->getById($ciudad->id_ciudad);
            $this->assertNotNull($foundCiudad);
            $this->assertEquals($ciudad->id_ciudad, $foundCiudad->id_ciudad);
        } catch (\Exception $e) {
            Log::error('Error in testGetById: ' . $e->getMessage());
            $this->fail('Exception thrown in testGetById.');
        }
    }

    public function testCreate()
    {
        try {
            Log::info('Running testCreate.');
            $data = ['nombre' => 'Nueva Ciudad'];
            $ciudad = $this->ciudadDAO->create($data);
            $this->assertDatabaseHas('ciudad', $data);
        } catch (\Exception $e) {
            Log::error('Error in testCreate: ' . $e->getMessage());
            $this->fail('Exception thrown in testCreate.');
        }
    }

    public function testUpdate()
    {
        try {
            Log::info('Running testUpdate.');
            $ciudad = Ciudad::factory()->create();
            $data = ['nombre' => 'Ciudad Actualizada'];
            $updatedCiudad = $this->ciudadDAO->update($ciudad->id_ciudad, $data);
            $this->assertNotNull($updatedCiudad);
            $this->assertEquals('Ciudad Actualizada', $updatedCiudad->nombre);
        } catch (\Exception $e) {
            Log::error('Error in testUpdate: ' . $e->getMessage());
            $this->fail('Exception thrown in testUpdate.');
        }
    }

    public function testDelete()
    {
        try {
            Log::info('Running testDelete.');
            $ciudad = Ciudad::factory()->create();
            $deleted = $this->ciudadDAO->delete($ciudad->id_ciudad);
            $this->assertTrue($deleted);
            $this->assertDatabaseMissing('ciudad', ['id_ciudad' => $ciudad->id_ciudad]);
        } catch (\Exception $e) {
            Log::error('Error in testDelete: ' . $e->getMessage());
            $this->fail('Exception thrown in testDelete.');
        }
    }
}