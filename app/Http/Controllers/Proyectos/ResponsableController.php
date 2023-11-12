<?php

namespace App\Http\Controllers\Proyectos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Proyectos\Responsable;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Client\ResponseSequence;

class ResponsableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Responsable $responsable)
    {
        $responsable = Responsable::find($responsable->id);
        return response()->json(
            [
                'status' => '200',
                'responsable' => $responsable,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Responsable $responsable)
    {
        $this->validate($request, [
            'dni' => 'required',
            'nombre' => 'required',
            'responsabilidades' => 'required',
            'programa' => 'required',
            'facultad' => 'required',
            'correo' => 'required|email',
            'telefono' => 'required|numeric|digits:9',
        ]);

        $responsable = Responsable::find($responsable->id);
        $responsable->fill($request->all())->save();
        Session::flash('message', 'Responsable actualizado con éxito');
        return redirect()->route('admin.proyectos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
