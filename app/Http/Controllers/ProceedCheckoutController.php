<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppUser;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Models\Setting;
use App\Models\Social;
use App\Models\Banner;
use App\Models\Department;
use App\Models\Category;

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
    public function checkout(Request $request)
    {
        $carts = session('cart');

        if(count((array) $carts) < 1){
            return redirect()->back();
        }

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

        if (session('error')) {
            session()->forget('error');
        }

        if (
            empty($user->first_name) || empty($user->last_name) ||  empty($user->email_address) ||
            empty($user->mobile_number) || empty($user->address_country) || empty($user->address_st) ||
            empty($user->address_town) || empty($user->address_state) || empty($user->address_code)
        ) {
            session()->put('error', 'Required field missing');
            return redirect()->back();
        }
        if ($request->isCreate != null) {
            if (empty($user->password)) {
                session()->put('error', 'Password missing');
                return redirect()->back();
            } else {

                $app_user = AppUser::all()->where('mobile_number', '=', $request->phone)->where('email_address', '=', $request->email);
                if (count($app_user) > 0) {
                    session()->put('error', 'Account Already Exist');
                    return redirect()->back();
                }
                $user->password = Hash::make($request->password);
            }
        } else {
            $user->password = '';
        }

        $user->save();
        $this->Order($user->id);

        session()->forget('cart');
        return redirect('/');
    }
    private function Order($customer_id)
    {

        $carts = session('cart');
        foreach ((array) $carts as $id => $product) {
            $order = new Order;
            $order->order_quantity = $product['quantity'];
            $order->order_product_id = $id;
            $order->order_customer_id = $customer_id;
            $order->order_order_status = 'received';
            $order->order_delivery_date = Carbon::now();
            $order->order_courier_id = 1;
            $order->save();
        }
    }
}
