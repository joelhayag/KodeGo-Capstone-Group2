<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;
use App\Models\Setting;

class ContactUsMailController extends Controller
{
    //
    public function sendEmail(Request $request){
        if($request->name != '' || $request->email != '' || $request->message != ''){
            Mail::to(Setting::first()->app_email)->send(new ContactUs($request->name, $request->email, $request->message));
        }
        return redirect()->back();
    }
}
