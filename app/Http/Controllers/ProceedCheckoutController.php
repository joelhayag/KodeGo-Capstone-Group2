<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppUser;

class ProceedCheckoutController extends Controller
{
    //'first_name',
    /*'last_name',
    'mobile_number',
    'email_address',
    'password',
    'privilege',
    'other_notes',
    'address_country',
    'address_st',
    'address_others',
    'address_town',
    'address_state',
    'address_code'*/
    public function checkout(Request $request){

        $user = new AppUser;
        $user->first_name = $request->fname;
        $user->last_name = $request->lname;
        $user->email_address = $request->email;
        $user->mobile_number = $request->phone;
        $user->password = $request->password;
        $user->privilege = 'Customer';
        $user->other_notes = $request->other ? $request->other : '';
        $user->address_country = $request->country;
        $user->address_st = $request->street;
        $user->address_others = $request->apartment ? $request->apartment : '';
        $user->address_town = $request->town;
        $user->address_state = $request->state;
        $user->address_code = $request->code;

        if(session('error')){
            session()->forget('error');
        }

        if(empty($user->first_name) || empty($user->last_name) ||  empty($user->email_address) ||
        empty($user->mobile_number) || empty($user->address_country) || empty($user->address_st) ||
        empty($user->address_town) || empty($user->address_state) || empty($user->address_code)){
            session()->put('error', 'Required field missing');
            return redirect()->back();
        }
        if($request->isCreate != null){
            if(empty($user->password)){
                session()->put('error', 'Password missing');
                return redirect()->back();
            }else{
                $user->save();
            }
        }
        return redirect()->back();
    }
}
