<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Position;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Position::all();
        return response()->json($positions);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'salary' => 'required|numeric',
        ]);

        $position = Position::create([
            'name' => $request->name,
            'salary' => $request->salary,
        ]);

        return response()->json($position, 201);
    }

    public function show($id)
    {
        $position = Position::findOrFail($id);
        return response()->json($position);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'string',
            'salary' => 'numeric',
        ]);

        $position = Position::findOrFail($id);

        $position->update([
            'name' => $request->input('name', $position->name),
            'salary' => $request->input('salary', $position->salary),
        ]);

        return response()->json($position, 200);
    }

    public function destroy($id)
    {
        $position = Position::findOrFail($id);
        $position->delete();
        return response()->json(null, 204);
    }
}