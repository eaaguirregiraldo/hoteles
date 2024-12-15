<?php
namespace App\DAO;

use App\Models\Ciudad;
use Illuminate\Support\Facades\Log;

class CiudadDAO implements CiudadDAOInterface
{
    public function getAll()
    {
        Log::info('Fetching all cities from the database.');
        return Ciudad::all();
    }

    public function getById($id)
    {
        Log::info("Fetching city with ID: $id from the database.");
        return Ciudad::find($id);
    }

    public function create(array $data)
    {
        Log::info('Creating a new city in the database.', $data);
        return Ciudad::create($data);
    }

    public function update($id, array $data)
    {
        Log::info("Updating city with ID: $id in the database.", $data);
        $ciudad = Ciudad::find($id);
        if ($ciudad) {
            $ciudad->update($data);
            return $ciudad;
        }
        return null;
    }

    public function delete($id)
    {
        Log::info("Deleting city with ID: $id from the database.");
        $ciudad = Ciudad::find($id);
        if ($ciudad) {
            $ciudad->delete();
            return true;
        }
        return false;
    }
}