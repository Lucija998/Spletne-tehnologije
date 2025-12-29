<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use Illuminate\Http\Request;

class IncidentController extends Controller
{
    // GET /api/incidents
    public function index()
    {
        return response()->json(Incident::latest()->get());
    }

    // POST /api/incidents
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'severity' => ['required', 'string', 'max:50'],
            'status' => ['nullable', 'string', 'max:50'],
        ]);

        // default status, če ni poslan
        if (empty($validated['status'])) {
            $validated['status'] = 'nov';
        }

        $incident = Incident::create($validated);

        return response()->json($incident, 201);
    }

    // GET /api/incidents/{id}
    public function show($id)
    {
        $incident = Incident::findOrFail($id);
        return response()->json($incident);
    }

    // PUT/PATCH /api/incidents/{id}
    public function update(Request $request, $id)
    {
        $incident = Incident::findOrFail($id);

        $validated = $request->validate([
            'title' => ['sometimes', 'required', 'string', 'max:255'],
            'description' => ['sometimes', 'required', 'string'],
            'severity' => ['sometimes', 'required', 'string', 'max:50'],
            'status' => ['sometimes', 'required', 'string', 'max:50'],
        ]);

        $incident->update($validated);

        return response()->json($incident);
    }

    // DELETE /api/incidents/{id}
    public function destroy($id)
    {
        $incident = Incident::findOrFail($id);
        $incident->delete();

        return response()->json(['message' => 'Deleted']);
    }
}
