<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IdeaController extends Controller
{
    public function idea(Request $request){
        $request['idea_author'] = Auth::id();
        $request->validate([
            'idea_name' => 'required',
            'description' => 'required',
            'tag' => 'required',
            'idea_author'=> 'required'
        ]);
        $formFields = $request->only(['idea_name', 'description','tag', 'idea_author']);
        if(Idea::where('idea_name', $formFields['idea_name'])->exists()){
            return redirect("/realiseidea");
        }

        $idea = Idea::create($formFields);
        if($idea){
            return redirect('/');
        }
    }
}
