<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Mail\PromotionalEmail;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{


    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'contact_number' => 'required',
        ]);

        // Create new customer record
        Customer::create($request->all());

        return redirect('/customers')->with('success', 'Customer created successfully!');
    }

    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        // Validate incoming request data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers,email,'.$customer->id,
            'contact_number' => 'required',
        ]);

        // Update customer record
        $customer->update($request->all());

        return redirect('/customers')->with('success', 'Customer updated successfully!');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect('/customers')->with('success', 'Customer deleted successfully!');
    }

    public function sendPromotionalEmail(Customer $customer)
{
    Mail::to($customer->email)->send(new PromotionalEmail());
    return redirect('/customers')->with('success', 'Promotional email sent successfully!');
}

}
