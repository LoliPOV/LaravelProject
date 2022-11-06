<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShowIdea extends Controller
{
    public function showIdead(){
        $idea= DB::table('ideas')
            ->select('idea_name', 'description','tag','idea_author','created_at')
            ->get();

        return view('welcome', compact('idea'));
    }
}
