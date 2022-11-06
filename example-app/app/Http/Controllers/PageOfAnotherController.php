<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageOfAnotherController extends Controller
{

    public function index($id)
    {
        $user = DB::table('users')->find($id);
        if(!$user){
            return redirect("/")->withErrors([
                'user_not_find'=> 'Пользователя не существует'
            ]);
        }
        $users_email = $user-> email;
        $user_created_at = $user -> created_at;
        $private = $user -> private;
        $role = DB::table('users')->find(Auth::id()) -> role;
        if($id == Auth::id()){
            return redirect()->intended('/');
        }
        return view('private', ['id'=> $id, 'users_email_data' => $users_email, 'user_created_at' => $user_created_at, 'private'=> $private, 'role' => $role]);
    }
}
