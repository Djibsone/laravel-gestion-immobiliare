<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PropertyResource;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index ()
    {
        // return PropertyResource::collection(Property::paginate(5));
        // return new PropertyResource(Property::find(1));
        return PropertyResource::collection(Property::limit(5)->with('options')->get());
    }

    public function show(Property $property)
    {
        // Load the 'options' relation
        $property->load('options');

        // Return the resource
        return new PropertyResource($property);
    }
}
