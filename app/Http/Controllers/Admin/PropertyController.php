<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyFormRequest;
use App\Models\Option;
use App\Models\Property;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.properties.index', [
            'properties' => Property::orderBy('created_at', 'desc')->paginate(25),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $property = new Property();
        $property->fill([
            'surface' => 40,
            'rooms' => 3,
            'bedrooms' => 1,
            'floor' => 0,
            'city' => 'Cotonou',
            'postal_code' => '+229',
            'sold' => false,
        ]);

        return view('admin.properties.form', [
            'property' => $property,
            'options' => Option::pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(PropertyFormRequest $request)
    // {
    //     $property = Property::create($request->validated());
    //     $property->options()->sync($request->validated('options'));
    //     return to_route('admin.property.index')->with(['message' => ['type' => 'success', 'text' => 'Le bien a bien été crée.']])/*->onlyInput('email')*/;
    // }

    public function store(PropertyFormRequest $request) {
        // Valider les données du formulaire
        $validatedData = $request->validated();

        // Enregistrer le fichier et obtenir le chemin
        $filePath = $request->file('image')->store('images', 'public');

        // Ajouter le chemin du fichier aux données validées
        $validatedData['file_path'] = $filePath;

        // Créer une instance de Property avec toutes les données validées
        $property = Property::create($validatedData);

        // Sync les options
        $property->options()->sync($validatedData['options']);

        // Redirection avec un message de succès
        return to_route('admin.property.index')->with(['message' => ['type' => 'success', 'text' => 'Le bien a bien été crée.']])/*->onlyInput('email')*/;
    }

    /*public function store(PropertyFormRequest $request) {
        // Valider les données du formulaire
        $validatedData = $request->validated();

        // Enregistrer le fichier et obtenir le chemin
        $validatedData['file_path'] = $request->file('image')->store('images', 'public');

        // Créer une instance de Property avec toutes les données validées et le chemin du fichier
        Property::create($validatedData)->options()->sync($validatedData['options']);

        // Redirection avec un message de succès
        return to_route('admin.property.index')->with(['message' => ['type' => 'success', 'text' => 'Le bien a bien été crée.']])/*->onlyInput('email')/;
    }*/

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('admin.properties.form', [
            'property' => $property,
            'options' => Option::pluck('name', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(PropertyFormRequest $request, Property $property)
    // {
    //     $property->update($request->validated());
    //     $property->options()->sync($request->validated('options'));
    //     return to_route('admin.property.index')->with(['message' => ['type' => 'success', 'text' => 'Le bien a bien été modifié.']]);
    // }

    public function update(PropertyFormRequest $request, Property $property) {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $validatedData['file_path'] = $request->file('image')->store('images', 'public');
        }

        $property->update($validatedData);
        $property->options()->sync($validatedData['options']);

        return redirect()->route('admin.property.index')->with([
            'message' => ['type' => 'success', 'text' => 'Le bien a bien été modifié.']
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return to_route('admin.property.index')->with(['message' => ['type' => 'success', 'text' => 'Le bien a bien été supprimé.']]);
    }
}
