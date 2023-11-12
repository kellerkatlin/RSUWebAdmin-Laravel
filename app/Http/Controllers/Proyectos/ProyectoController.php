<?php

namespace App\Http\Controllers\Proyectos;

use Illuminate\Http\Request;
use App\Models\Proyectos\Proyecto;
use App\Http\Controllers\Controller;
use App\Models\Proyectos\Responsable;
use Illuminate\Support\Facades\Session;

class ProyectoController extends Controller
{

    public function index()
    {
        $proyectos = Proyecto::all();
        $responsables = Responsable::all();
        return view('admin.proyectos.index', compact('proyectos','responsables'));
    }

    public function create()
    {
        return view('admin.proyectos.create');
    }

    public function store(Request $request, Proyecto $proyecto)
    {
        $this->validate($request, [
            'titulo' => 'required',
            'programa' => 'required',
            'lugar_ejecucion' => 'required',
            'beneficiario' => 'required',
            'inicio' => 'required|date',
            'termino' => 'required|date|after:inicio',
        ]);
        $proyecto = Proyecto::create($request->all());
        return redirect()->route('admin.proyectos.index')->with('info', 'Proyecto creado con éxito');
    }
    public function show(Proyecto $proyecto)
    {
        response()->json($proyecto);
    }

    public function edit(Proyecto $proyecto)
    {
        $responsables = Responsable::all();
        return view('admin.proyectos.proyecto', compact('proyecto','responsables')); 
    }

    public function update(Request $request, Proyecto $proyecto)
    {
            $proyecto = Proyecto::find($proyecto->id);
            $proyecto->fill($request->all())->save();
            $responsables = $request->input('responsables_seleccionados', []);
            $proyecto->responsables()->sync($responsables);
            Session::flash('message', 'Proyecto actualizado con éxito');
            return redirect()->route('admin.proyectos.index');
            
    }

    public function destroy(Proyecto $proyecto)
    {
        $proyecto->delete();
        Session::flash('message', 'Proyecto eliminado con éxito');
        return redirect()->route('admin.proyectos.index');
    }
<<<<<<< HEAD
=======
    public function asignarResponsable(Request $request, Proyecto $proyecto)
{
    $responsableId = $request->input('responsable_id');
    $proyecto->responsables()->attach($responsableId);

    return response()->json(['message' => 'Responsable asignado correctamente']);
}

>>>>>>> e123c47941542cfaf7f146ce279b06f02f91200f
}
