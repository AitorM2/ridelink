<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fleets;

class FleetsController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $fleets = $user->fleets;
        return view('fleets.index', compact('fleets'));
    }

    public function create()
    {
        $companies = auth()->user()->companies()->pluck('name', 'id');
        return view('fleets.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'car_name' => 'required|string|max:255',
            'car_model' => 'required|string|max:255',
            'car_plate' => 'required|string|max:255',
            'car_color' => 'nullable|string|max:255',
            'car_vin' => 'nullable|string|max:255',
            'car_image' => 'nullable|image|max:2048',
            'kilometers' => 'nullable|numeric|min:0',
            'company_id' => 'required|exists:companies,id',
            'user_id' => 'nullable|exists:users,id',
        ]);

        if ($request->hasFile('car_image')) {
            $validated['car_image'] = $request->file('car_image')->store('fleets', 'public');
        }
        
        $validated['user_id'] = auth()->id();

        Fleets::create($validated);

        return redirect()->route('fleets.index')->with('success', 'Vehículo añadido correctamente.');
    }

    public function edit(Fleets $fleet)
    {
        $companies = auth()->user()->companies()->pluck('name', 'id');
        return view('fleets.edit', compact('fleet', 'companies'));
    }

    public function update(Request $request, Fleets $fleet)
    {
        $validated = $request->validate([
            'car_name' => 'required|string|max:255',
            'car_model' => 'required|string|max:255',
            'car_plate' => 'required|string|max:255',
            'car_color' => 'nullable|string|max:255',
            'car_vin' => 'nullable|string|max:255',
            'car_image' => 'nullable|image|max:2048',
            'kilometers' => 'nullable|numeric|min:0',
            'company_id' => 'required|exists:companies,id',
        ]);

        if ($request->hasFile('car_image')) {
            $validated['car_image'] = $request->file('car_image')->store('fleets', 'public');
        }

        $fleet->update($validated);

        return redirect()->route('fleets.index')->with('success', 'Vehículo actualizado correctamente.');
    }

    public function destroy(Fleets $fleet)
    {
        $fleet->delete();
        return redirect()->route('fleets.index')->with('success', 'Vehículo eliminado correctamente.');
    }

    public function show(Fleets $fleet)
    {
        return view('fleets.show', compact('fleet'));
    }
}
