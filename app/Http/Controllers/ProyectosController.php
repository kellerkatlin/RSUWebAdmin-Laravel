<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Collective\Html\FormFacade as Form;
use Illuminate\Support\Facades\Session;

class ProyectosController extends Controller
{
    public function index()
    {
        $proyectos = Project::all();
        return view('admin.proyectos.index', compact('proyectos'));
    }

    public function create()
    {
        // Mostrar el formulario para crear un nuevo proyecto
        return view('admin.proyectos.create');
    }

    public function store(Request $request)
    {
        // Validar y guardar los datos del nuevo proyecto
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'budget' => 'required|numeric',
        ]);
        $ultimoId = Project::latest()->value('id') + 1;

        $proyecto = new Project($request->all());
        $proyecto->id = $ultimoId;
        $proyecto->save();

        Session::flash('mensaje', 'Proyecto creado exitosamente.');
        return redirect()->route('admin.proyectos.index');
    }

    public function show(Project $proyecto)
    {
        return response()->json($proyecto);
    }

    public function edit(Project $proyecto)
    {
        return response()->json([
            'status' => '200',
            'proyecto' => $proyecto
        ]);
    }

    public function update(Request $request, Project $proyecto)
    {
        // Validar y actualizar los datos del proyecto
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'budget' => 'required|numeric',
        ]);
        $proyectoId = $request->Input('proyectoId');
        $proyecto = Project::find($proyectoId);
        $proyecto->title = $request->Input('title');
        $proyecto->description = $request->Input('description');
        $proyecto->start_date = $request->Input('start_date');
        $proyecto->end_date = $request->Input('end_date');
        $proyecto->budget = $request->Input('budget');
        $proyecto->update();

        Session::flash('mensaje', 'Proyecto actualizado exitosamente.');
        return redirect()->back();
    }

    public function destroy(Project $proyecto)
    {
        $proyecto->delete();

        Session::flash('mensaje', 'Proyecto eliminado exitosamente.');
        return redirect()->route('admin.proyectos.index');
    }
}
