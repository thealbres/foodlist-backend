<?php

namespace App\Http\Controllers;

use App\Http\Requests\GoalRequest;
use App\Models\Goal;
use Spatie\QueryBuilder\QueryBuilder;

class GoalController extends Controller
{
    public function index()
    {
        //Adicionar filtros necessarios conforme https://github.com/spatie/laravel-query-builder
        $goal = QueryBuilder::for(Goal::class)
            ->jsonPaginate();

        return response()->json($goal, 200);
    }

    public function create()
    {
        //Retornar os dados necessarios para criacao de uma nova instancia do objeto
        $params = [];
        return response()->json($params);
    }

    public function store(GoalRequest $request)
    {

        $validatedData = $request->validate([
            'height' => 'required|',
            'imc' => 'required|',
            'user_id' => 'required|exists:users,id',
        ]);

        $goal = Goal::create($validatedData);

        return response()->json($goal, 201);
    }

    public function show($id)
    {
        $goal = Goal::findOrFail($id);

        return response()->json($goal, 302);
    }

    public function update(GoalRequest $request, $id)
    {
        $goal = Goal::findOrFail($id);
        $goal->update($request->all());

        return response()->json($goal, 202);
    }

    public function destroy($id)
    {
        Goal::destroy($id);

        return response()->json(null, 204);
    }
}
