<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class LoginController extends Controller
{
    public function login(Request $request){
//        if(Auth::check()){
//            return redirect()->intended('/private');
//        }
        $formFields = $request->only(['email', 'password']);

        $role = DB::table('users')->where('email', $formFields['email'])->value('role');

        if(Auth::attempt($formFields)){
            if($role == 'admin'){
                return redirect('/admp');
            }
            return redirect()->intended('/user/private');
        }

        return redirect('login')->withErrors([
            'email' => 'Неудалось авторизоваться'
        ]);
    }
}
