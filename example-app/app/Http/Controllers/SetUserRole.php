<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SetUserRole extends Controller
{
    public function setrole($id){
        $user = DB::table('users')->find(Auth::id());
        if($user-> role == 'admin'){
                DB::table('users')
                    ->where('id', '=', $id)
                    ->update(['role' => 'admin']);
            return redirect('admp');
        }
        return redirect('/');
    }
    public function delAdmrole($id){
        $user = DB::table('users')->find(Auth::id());
        if($user-> role == 'admin'){
            DB::table('users')
                ->where('id', '=', $id)
                ->update(['role' => 'user']);
            return redirect('admp');
        }
        return redirect('/');
    }
}
