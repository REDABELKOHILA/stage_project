<?php

// app/Http/Controllers/CustomerController.php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function showForm()
    {
        return view('checkout.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $customer = new Customer();
        $customer->name=$request->name;
        $customer->phone=$request->phone;
        $customer->address=$request->address;
        $customer->save();
        

        $customer->save();

        return redirect()->route('customerProduct.show')->with('customer', $customer);
    }
}
