<?php

namespace App\Http\Controllers;

use App\Http\Requests\MealRequest;
use App\Models\Meal;
use App\Models\Food;
use App\Models\FoodsMeal;
use Spatie\QueryBuilder\QueryBuilder;

class MealController extends Controller
{
    public function index()
    {
        //Adicionar filtros necessarios conforme https://github.com/spatie/laravel-query-builder
        $meal = QueryBuilder::for(Meal::class)
            ->jsonPaginate();

        return response()->json($meal);
    }

    public function create()
    {
        //Retornar os dados necessarios para criacao de uma nova instancia do objeto
        $params = [
            "lunch" => "Almoço",
            "dinner" => "Jantar",
            "breakfast" => "Café da Manhã",
            "snack" => "Lanche"
        ];
        return response()->json($params);
    }

    public function store(MealRequest $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'foods' => 'required'
        ]);

        $meal = Meal::create($validatedData);
        if ($request->has('foods')) {
            $foods = $request->get('foods');
            foreach ($foods as $food) {
                $newFood =  FoodsMeal::create([
                    'meal_id' => $meal->id,
                    'food_id' => $food,
                ]);
            }
        }

        return response()->json($meal, 201);
    }

    public function show($id)
    {
        $meal = Meal::findOrFail($id);

        return response()->json($meal, 200);
    }

    public function destroy($id)
    {
        $currentFoods = FoodsMeal::where('meal_id', $id)->delete();
        Meal::destroy($id);
        return response()->json(null, 204);
    }
}
