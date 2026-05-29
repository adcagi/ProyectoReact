<?php



namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Club;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function index()
    {
        return response()->json(Club::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255'
        ]);

        $club = Club::create($request->all());

        return response()->json([
            'message' => 'Club creado correctamente',
            'data' => $club
        ], 201);
    }

    public function show($id)
    {
        return response()->json(Club::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $club = Club::findOrFail($id);

            $request->validate([
                'name' => 'required|string|max:255',
                'city' => 'required|string|max:255'
            ]);


        $club->update($request->all());

        return response()->json([
            'message' => 'Club actualizado correctamente',
            'data' => $club
        ]);
    }

    public function destroy($id)
    {
        Club::findOrFail($id)->delete();

        return response()->json(['message' => 'Club eliminado correctamente']);
    }
}