<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function store(CustomerRequest $request)
    {
        $customer = new Customer();
        $customer->first_name = $request->get('first_name');
        $customer->last_name = $request->get('last_name');
        $customer->phone = $request->get('phone');
        $customer->address = $request->get('address');
        $customer->save();
        $request->session()->put('customer_id', $customer->id);

        return redirect()->to('/invoice');
    }
}
