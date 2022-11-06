<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdmpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        $user_data = DB::table('users')->find(Auth::id());
        $user= DB::table('users')
            ->select('id', 'email','created_at','role')
            ->get();
        $id = Auth::id();
        $users_email = $user_data-> email;
        $user_created_at = $user_data -> created_at;
        if($user_data->role != 'admin'){
            return redirect()->intended('/');
        }
        return view('admp', ['id'=> $id, 'users_email_data' => $users_email, 'user_created_at' => $user_created_at], compact('user'));
    }
}
