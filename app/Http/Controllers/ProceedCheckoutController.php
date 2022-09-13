<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProceedCheckoutController extends Controller
{
    //
    public function checkout(Request $request){
        dd($request->isCreate);
        dd($request->all());
    }
}
