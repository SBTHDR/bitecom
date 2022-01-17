<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function CheckoutStore(Request $request){
        $data = array();
    	$data['shipping_name'] = $request->shipping_name;
    	$data['shipping_email'] = $request->shipping_email;
    	$data['shipping_phone'] = $request->shipping_phone;
    	$data['post_code'] = $request->post_code;
    	$data['address'] = $request->address;


    	if ($request->payment_method == 'stripe') {
    		return view('frontend.payment.stripe',compact('data'));
    	}elseif ($request->payment_method == 'card') {
    		return 'card';
    	}else{
            return 'cash';
    	}
    }
}
