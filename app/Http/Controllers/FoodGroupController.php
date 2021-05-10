<?php

namespace App\Http\Controllers;

use App\Http\Requests\FoodGroupRequest;
use App\Models\FoodGroup;
use Spatie\QueryBuilder\QueryBuilder;

class FoodGroupController extends Controller
{
    public function index()
    {
        //Adicionar filtros necessarios conforme https://github.com/spatie/laravel-query-builder
        $foodgroup = QueryBuilder::for(FoodGroup::class)
        ->jsonPaginate();

        return response()->json($foodgroup, 200);
    }

    public function create(){
        //Retornar os dados necessarios para criacao de uma nova instancia do objeto
        $params = [];
        return response()->json($params);
    }

    public function store(FoodGroupRequest $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|',
            'user_id' => 'required|exists:users,id',
        ]);

        $foodgroup = FoodGroup::create($validatedData);
        return response()->json($foodgroup, 201);
    }

    public function show($id)
    {
        $foodgroup = FoodGroup::findOrFail($id);

        return response()->json($foodgroup, 302);
    }

    public function update(FoodGroupRequest $request, $id)
    {
        $foodgroup = FoodGroup::findOrFail($id);
        $foodgroup->update($request->all());

        return response()->json($foodgroup, 202);
    }

    public function destroy($id)
    {
        FoodGroup::destroy($id);

        return response()->json(null, 204);
    }
}