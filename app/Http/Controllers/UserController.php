<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User as UserModel;

class UserController extends Controller
{
    public function login(LoginRequest $request)
    {
        $dataForm = $request->all();

        $user = UserModel::where([
          'email' => $dataForm['email'],
          'password' => $dataForm['password'],
        ])->first();

        if (!$token = auth()->login($user)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $return = array(
            'token'  => $token,
            'email'  => auth()->user()->email,
            'error'  => false,
        );

        return (object)$return;
    }

    public function new(UserRequest $request)
    {
        $dataForm = $request->all();

        $data = $this->createUser($dataForm);

        return response()->json($data, 201);
    }

    protected function createUser(array $data)
    {
        return UserModel::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);
    }
}
