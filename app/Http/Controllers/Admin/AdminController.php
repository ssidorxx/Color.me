<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRegRequest;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Question;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admins.admins.index',[
            'admins'=>Admin::all(),
        ]);
    }

    // переход на страницу авторизации
    public function login()
    {
        return view('admins.admin_login');
    }

    // выполняем проверку идентификационных данных
    public function loginCheck(Request $request)
    {
//        $admin = Admin::where('login', $request->login)->where('password', $request->password)->first();
//        dd($admin);
//        dd(auth('admin')->attempt($request->only(['login', 'password']))); //хэширование пароля
        if(auth('admin')->attempt($request->only(['login', 'password']))){
            $request->session()->regenerate();

            return redirect()->route('admin.main');
        }
        return back()->withErrors([
            'errorLogin'=>'Не удалось войти'
        ]);
    }

    public function create()
    {
        return view('admins.admins.create',);
    }

    public function store(AdminRegRequest $request)
    {
        //- создать админа
        //- войти под ним
        //- перейти на его страничку профиля

//        dd($request->all());
        // хоть array_merge(), хоть "+"
        $admin = Admin::create(
            ['password' => Hash::make($request->password)]+
            $request->only(['login']
            ));

//        auth()->login($admin);

        return to_route('admin.index');
    }

    //выходим из аккаунта
    public function logout()
    {
        auth('admin')->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    public function destroy($id)
    {
        $res = Admin::find($id)->delete();
        return $res ? to_route('admin.index')->with(['success' => 'Успешно удалено!']) :
            to_route('admin.index')->withErrors(['error' => 'Не удалось удалить!']);
    }

    // личный кабинет админа
    public function main()
    {
//        return view('admins.index');
        return view("admins.index",[
            'orders'=>Order::orderBy('id', 'desc')->get(),
            'statuses'=>Status::statusesOrder()->get(),
        ]);
    }
}
