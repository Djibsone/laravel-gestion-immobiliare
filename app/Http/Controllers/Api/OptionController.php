<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OptionFormRequest;
use App\Http\Resources\OptionResource;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function index ()
    {
        return OptionResource::collection(Option::paginate());
    }

    public function show(Option $option)
    {
        // Return the resource
        return new OptionResource($option);
    }

    public function store(OptionFormRequest $request)
    {
        Option::create($request->validated());
    }

    public function update(OptionFormRequest $request, Option $option)
    {
        try {
            $validatedData = $request->validated();
            $option->update($validatedData);
        } catch (\Exception $e) {
            return response()->json( $e->getMessage() );
        }
    }
}
