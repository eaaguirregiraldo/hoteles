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
        return response()->json($this->ciudadDAO->getById($id));
    }

    public function store(Request $request)
    {
        return response()->json($this->ciudadDAO->create($request->all()));
    }

    public function update(Request $request, $id)
    {
        return response()->json($this->ciudadDAO->update($id, $request->all()));
    }

    public function destroy($id)
    {
        return response()->json($this->ciudadDAO->delete($id));
    }
}