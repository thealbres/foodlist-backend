<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        //Adicionar filtros necessarios conforme https://github.com/spatie/laravel-query-builder
        $user = QueryBuilder::for(User::class)
        ->paginate();
        
        return response()->json($user);
    }

    public function create(){
        //Retornar os dados necessarios para criacao de uma nova instancia do objeto
        $params = [];
        return response()->json($params);
    }

    public function store(UserRequest $request)
    {
        $user = User::create($request->input());
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->birthday = $request->input('birthday');
        $user->height = $request->input('height');
        $user->type = $request->input('type');
        $user->gender = $request->input('gender');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return response()->json($user, 201);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return response()->json($user);
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return response()->json($user, 200);
    }

    public function destroy($id)
    {
        User::destroy($id);

        return response()->json(null, 204);
    }
}