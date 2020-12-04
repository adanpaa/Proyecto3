<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Middleware\IsCustomer;
use App\Models\Trainer;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware(IsCustomer::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Customer::class);
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
        $this->authorize('create', Customer::class);
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

        return redirect()->route('customer.index')->with(['message' => 'Cliente agregado']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        $this->authorize('view', $customer);
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
        //Gate::authorize('admin');
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

        return redirect()->route('customer.show', [$customer])->with(['message' => 'Cliente editado']);

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
        Gate::authorize('admin'); 
        $customer->delete();
        return redirect()->route('customer.index')->with(['message' => 'Cliente Eliminado']);
    }
}
