<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use App\Http\Middleware\IsCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TrainersController extends Controller
{


    public function __construct()
    {
        $this->middleware(IsCustomer::class)->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $trainers = Trainer::get();
        return view('trainers/trainersIndex', compact('trainers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Trainer::class);
        return view('trainers/trainersForm');
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
            'apellido' => 'required',
            'edad' => 'required',
            'area' => 'required',
        ]);

        //Guardar

        // $request->merge([
          //  'descripcion' => $request->edad ?? 0,
        //]);"""

        Trainer::create($request->all());

        return redirect('/trainer');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function show(Trainer $trainer)
    {
        //
        return view('trainers/trainerShow', compact('trainer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainer $trainer)
    {
        //
        Gate::authorize('admin');
        return view('trainers/trainersForm', compact('trainer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainer $trainer)
    {
        //
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'edad' => 'required',
            'area' => 'required',
        ]);


        Trainer::where('id', $trainer->id)->update($request->except('_token', '_method'));

        return redirect()->route('trainer.show', [$trainer]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainer $trainer)
    {
        //
        Gate::authorize('admin');
        $trainer->delete();
        return redirect()->route('trainer.index');
    }
}
