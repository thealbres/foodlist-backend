<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserProgressRequest;
use App\Models\UserProgress;
use Spatie\QueryBuilder\QueryBuilder;

class UserProgressController extends Controller
{
    public function index()
    {
        //Adicionar filtros necessarios conforme https://github.com/spatie/laravel-query-builder
        $userprogress = QueryBuilder::for(UserProgress::class)
        ->jsonPaginate();

        return response()->json($userprogress);
    }

    public function create(){
        //Retornar os dados necessarios para criacao de uma nova instancia do objeto
        $params = [];
        return response()->json($params);
    }

    public function store(UserProgressRequest $request)
    {
        $userprogress = UserProgress::create($request->all());

        return response()->json($userprogress, 201);
    }

    public function show($id)
    {
        $userprogress = UserProgress::findOrFail($id);

        return response()->json($userprogress, 200);
    }

    public function update(UserProgressRequest $request, $id)
    {
        $userprogress = UserProgress::findOrFail($id);
        $userprogress->update($request->all());

        return response()->json($userprogress, 202);
    }

    public function destroy($id)
    {
        UserProgress::destroy($id);

        return response()->json(null, 204);
    }
}