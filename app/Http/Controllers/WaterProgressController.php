<?php

namespace App\Http\Controllers;

use App\Http\Requests\WaterProgressRequest;
use App\Models\WaterProgress;
use Spatie\QueryBuilder\QueryBuilder;

class WaterProgressController extends Controller
{
    public function index()
    {
        //Adicionar filtros necessarios conforme https://github.com/spatie/laravel-query-builder
        $waterprogress = QueryBuilder::for(WaterProgress::class)
        ->jsonPaginate();

        return response()->json($waterprogress);
    }

    public function create(){
        //Retornar os dados necessarios para criacao de uma nova instancia do objeto
        $params = [];
        return response()->json($params);
    }

    public function store(WaterProgressRequest $request)
    {
        $waterprogress = WaterProgress::create($request->all());

        return response()->json($waterprogress, 201);
    }

    public function show($id)
    {
        $waterprogress = WaterProgress::findOrFail($id);

        return response()->json($waterprogress);
    }

    public function update(WaterProgressRequest $request, $id)
    {
        $waterprogress = WaterProgress::findOrFail($id);
        $waterprogress->update($request->all());

        return response()->json($waterprogress, 202);
    }

    public function destroy($id)
    {
        WaterProgress::destroy($id);

        return response()->json(null, 204);
    }
}