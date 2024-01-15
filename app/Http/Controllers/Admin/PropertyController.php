<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyFormRequest;
use App\Models\Option;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    public function __construct() 
    {
        $this->authorizeResource(Property::class, 'property');
    }

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
    public function store(PropertyFormRequest $request) 
    {
        // Valider les données du formulaire
        $validatedData = $request->validated();
    
        // Initialiser un tableau pour stocker les chemins des images
        $imagePaths = [];
    
        // Vérifier si des images sont téléchargées
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Enregistrer chaque image et obtenir le chemin
                $filePath = $image->store('images', 'public');
                // Ajouter le chemin de l'image au tableau
                $imagePaths[] = $filePath;
            }
        }
    
        // Ajouter les chemins des images aux données validées
        $validatedData['image_paths'] = $imagePaths;
    
        // Créer une instance de Property avec toutes les données validées
        $property = Property::create($validatedData);
    
        // Sync les options
        $property->options()->sync($validatedData['options']);
    
        // Redirection avec un message de succès
        return to_route('admin.property.index')
            ->with(['message' => ['type' => 'success', 'text' => 'Le bien a bien été créé.']]);
    }

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
    public function update(PropertyFormRequest $request, Property $property) 
    {
        $validatedData = $request->validated();
    
        // Traitement des nouvelles images
        if ($request->hasFile('images')) {
            $imagePaths = [];
    
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('images', 'public');
            }
    
            $validatedData['image_paths'] = $imagePaths;
        }
    
        // Mise à jour du bien immobilier
        $property->update($validatedData);
    
        // Sync des options
        if (isset($validatedData['options'])) {
            $property->options()->sync($validatedData['options']);
        }
    
        return to_route('admin.property.index')->with([
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
