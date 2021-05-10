<?php

namespace App\Http\Controllers;

use App\Http\Requests\FoodRequest;
use App\Models\Food;
use Spatie\QueryBuilder\QueryBuilder;

class FoodController extends Controller
{
    public function index()
    {
        //Adicionar filtros necessarios conforme https://github.com/spatie/laravel-query-builder
        $food = QueryBuilder::for(Food::class)
            ->paginate();

        return response()->json($food, 200);
    }

    public function create()
    {
        //Retornar os dados necessarios para criacao de uma nova instancia do objeto
        $params = [];
        return response()->json($params);
    }
 
    public function store(FoodRequest $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|',
            'quantity' => 'required|',
            'calories' => 'required|',
            'user_id' => 'required|exists:users,id',
            'food_group_id' => 'required|exists:food_group,id'
        ]);

        $food = Food::create($validatedData);

        return response()->json($food, 201);
    }

    public function show($id)
    {
        $food = Food::findOrFail($id);

        return response()->json($food, 302);
    }

    public function update(FoodRequest $request, $id)
    {
        $food = Food::findOrFail($id);
        $food->update($request->all());

        return response()->json($food, 202);
    }

    public function destroy($id)
    {
        Food::destroy($id);
        return response()->json(null, 204);
    }
};
