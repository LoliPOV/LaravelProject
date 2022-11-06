<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class RegisterController extends Controller
{
    public function save(Request $request){

        $validateFields = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'repeat_password' => 'required'
        ]);


        $formFields = $request->only(['password','repeat_password']);
        if($formFields['password'] != $formFields['repeat_password']){
            return redirect("/register")->withErrors([
                'repeat_password'=> 'Произошла ошибка при вводе пароля, пароли не совпадают'
            ]);
        }

        if(User::where('email', $validateFields['email'])->exists()){
            return redirect("/register")->withErrors([
                'email' => 'Произошла ошибка при вводе почты.',
                'password'=> 'Произошла ошибка при вводе пароля'
            ]);
        }

        $user = User::create($validateFields);

        if($user){
            Auth::login($user);
            return redirect('/user/private');
        }
        return redirect(route('/login'))->withErrors([
            'fromErrors' => 'Бебра ошибка'
        ]);
    }
}
