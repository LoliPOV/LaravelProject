<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DelUserPage extends Controller
{
    public function delete($id){
        $user = DB::table('users')->find(Auth::id());
        if($user-> role == 'admin'){
            DB::table('users')->where('id', '=', $id)->delete();
            return redirect('admp');
        }
        return redirect('/');
    }
}
