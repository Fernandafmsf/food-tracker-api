<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(UserRequest $request)
    {
        $user = $request->all();

        $user['password'] = Hash::make($request->password);

        $user = User::create($user);

        return response()->json(['message' => 'Usuário criado com sucesso'], 201);
    }

    public function fetch(){
        $users = User::all();
        return response()->json($users);
    }

}
