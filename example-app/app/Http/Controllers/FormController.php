<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{
    public function form(Request $request){
        $formFields = $request->only([
            'email',

        ]);

        if($formFields){
            Form::create($formFields);
        }
    }
}
