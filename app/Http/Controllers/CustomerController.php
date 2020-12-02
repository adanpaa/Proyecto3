<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Trainer;
use App\Models\Branch;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customers = Customer::with('branch', 'trainer')->get();
        return view('customers/customersIndex', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $branches = Branch::all();
        $trainers = Trainer::all();
        return view('customers.customersForm', compact('branches', 'trainers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'nombre' => 'required',
            'edad' => 'required',
            'plan' => 'required',
        ]);

        $customer = new Customer();
        $customer->branch_id = $request->branch_id;
        $customer->nombre = $request->nombre;
        $customer->edad = $request->edad;
        $customer->plan = $request->plan;
        $customer->save();
        $customer->trainer()->attach($request->trainer_id);

        return redirect()->route('customer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
        return view('customers/customersShow', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
        $branches = Branch::all();
        $trainers = Trainer::all();
        return view('customers/customersForm', compact('customer', 'branches', 'trainers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
        $request->validate([
            'nombre' => 'required',
            'edad' => 'required',
            'plan' => 'required',
        ]);


        Customer::where('id', $customer->id)->update($request->except('_token', '_method', 'trainer_id'));
        $customer->trainer()->sync($request->trainer_id);

        return redirect()->route('customer.show', [$customer]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
        $customer->delete();
        return redirect()->route('customer.index');
    }
}
