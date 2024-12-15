<?php
namespace App\Http\Controllers;

use App\DAO\CiudadDAOInterface;
use Illuminate\Http\Request;

class CiudadController extends Controller
{
    protected $ciudadDAO;

    public function __construct(CiudadDAOInterface $ciudadDAO)
    {
        $this->ciudadDAO = $ciudadDAO;
    }

    public function index()
    {
        return response()->json($this->ciudadDAO->getAll());
    }

    public function show($id)
    {
        $ciudad = $this->ciudadDAO->getById($id);
        if ($ciudad) {
            return response()->json($ciudad);
        }
        return response()->json(['message' => 'Ciudad no encontrada'], 404);
    }

    public function store(Request $request)
    {
        return response()->json($this->ciudadDAO->create($request->all()));
    }

    public function update(Request $request, $id)
    {
        $ciudad = $this->ciudadDAO->update($id, $request->all());
        if ($ciudad) {
            return response()->json($ciudad);
        }
        return response()->json(['message' => 'Ciudad no encontrada'], 404);
    }

    public function destroy($id)
    {
        $deleted = $this->ciudadDAO->delete($id);
        if ($deleted) {
            return response()->json(['message' => 'Ciudad eliminada']);
        }
        return response()->json(['message' => 'Ciudad no encontrada'], 404);
    }
}