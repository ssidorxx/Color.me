<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(RegisterRequest $request)
    {
        //- создать юзера
        //- войти под ним
        //- перейти на его страничку профиля

//        dd($request->all());
        // хоть array_merge(), хоть "+"
        $user = User::create(
            ['password' => Hash::make($request->password)] +
            $request->only(['name', 'login', 'email']
            ));

        auth()->login($user);

        return to_route('users.profile');
    }

    public function login()
    {
        return view('users.login1');
    }

    public function loginCheck(LoginRequest $request)
    {
        if (Auth::attempt($request->only(['login', 'password']))) {
            $request->session()->regenerate();

            return to_route('users.profile');
        }
        return back()->withErrors(['errorLogin' => 'Пользователь с такими данными не найден']);
    }

    public function show()
    {
        $orders = Order::where('user_id', auth()->id())->get();

        return view('users.profile', compact('orders'));

    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('main.index');
    }
}
