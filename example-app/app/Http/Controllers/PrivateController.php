<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PrivateController extends Controller
{
    public function index()
    {
        if(!Auth::check()){
            return redirect('/');
        }
        $user = DB::table('users')->find(Auth::id());
        $id = Auth::id();
        $users_email = $user-> email;
        $user_created_at = $user -> created_at;
        $private = $user -> private;
        $role = $user -> role;
        return view('private', ['id'=> $id, 'users_email_data' => $users_email, 'user_created_at' => $user_created_at, 'private'=> $private, 'role' => $role]);
    }
}
