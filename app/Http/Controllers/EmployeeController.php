<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return response()->json($employees);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'position_id' => 'required|exists:positions,id',
        ]);

        $employee = Employee::create([
            'name' => $request->name,
            'position_id' => $request->position_id,
        ]);

        return response()->json($employee, 201);
    }

    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return response()->json($employee);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'string',
            'position_id' => 'exists:positions,id',
        ]);

        $employee = Employee::findOrFail($id);

        $employee->update([
            'name' => $request->input('name', $employee->name),
            'position_id' => $request->input('position_id', $employee->position_id),
        ]);

        return response()->json($employee, 200);
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return response()->json(null, 204);
    }
}