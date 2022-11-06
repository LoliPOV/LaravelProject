<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    public function settings(Request $request){
        $private = $request -> private;
        if($private == 'on'){
            DB::table('users')
                ->where('id','=',Auth::id())
                ->update(['private' => 1]);
            return redirect('/user/private');
        }elseif($private == null){
            DB::table('users')
                ->where('id','=',Auth::id())
                ->update(['private' => 0]);
            return redirect('/user/private');
        }
    }
}
