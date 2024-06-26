<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserCreateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = User
            ::where('login', $request->login)
            ->where('password', $request->password)
            ->first();

        if (!$user) throw new ApiException(401, 'Ошибка аутентификации');

        // Создание токена
        $newToken = Hash::make(microtime(true) * 1000);

        $user->api_token = $newToken;
        $user->save();

        return response()->json([
            'data' => [
                'api_token' => $user->api_token,
                'name' => $user->name,
                'surname' => $user->surname,
                'patronymic' => $user->patronymic,
                'phone_number' => $user->phone_number,
                'password' => $user->password,
                'birth' => $user->birth,
                'login' => $user->login,
                'email' => $user->email,
                'role_id' => $user->role_id,
            ]
        ]);
    }
    public function logout(Request $request) {
        $user = $request->user();
        if (!$user) throw new ApiException(401, 'Ошибка аутентификации');
        $user->api_token = null;
        $user->save();
        return response([
            'data' => [
                'message' => 'Вы вышли из системы',
            ],
        ]);
    }

    public function register(UserCreateRequest $request)
    {
        // Создаем нового пользователя с предоставленными данными
        $user = new User($request->all());
        $user->save();
        return response([
            'message' => 'Регистрация прошла успешно'
        ], 200);
    }
}
