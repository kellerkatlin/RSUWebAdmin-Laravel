<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\voluntarios\voluntarios;
use App\Models\voluntarios\regiones;
use App\Models\voluntarios\provincias;
use App\Models\voluntarios\distritos;
use App\Models\voluntarios\tiposdocumentoidentidades;
use App\Models\voluntarios\dias;
use App\Models\voluntarios\grupos_partis;
use Illuminate\Support\Facades\Session;
use Collective\Html\FormFacade as Form;

class VoluntariosController extends Controller
{
    /*
    public function voluntario()
    {
        $tipo_docs = tiposdocumentoidentidades::orderBy('nombre_tipodoc')->get();
        $regiones = regiones::orderBy('region')->get();
        $provincias = provincias::orderBy('provincia')->get();
        $distritos = distritos::orderBy('distrito')->get();
        $dias = dias::all();
        $grupos_partis = grupos_partis::all();

        return view('pagina.voluntariado.voluntariado')
            ->with('tipo_docs', $tipo_docs)
            ->with('regiones', $regiones)
            ->with('provincias', $provincias)
            ->with('distritos', $distritos)
            ->with('dias', $dias)
            ->with('grupos_partis', $grupos_partis);
    }

   

    public function guardarvoluntario(Request $request)
    {
        $this->validate($request, [
            'idtipodoc' => 'required',
            'numerodocumento' => 'required|numeric',
            'paisnacimiento' => 'required',
            'apellido_paterno' => 'required',
            'nombre' => 'required',
            'fecha_nacimiento' => 'required|date',
            'sexo' => 'required',
            'iddistrito' => 'required',
            'seguro' => 'required',
            'direccion' => 'required',
            'correo_electronico' => 'required|email',
            'idtipo_telefono' => 'required',
            'numero_contacto' => 'required',
            'grado_instruccion' => 'required',
            'profesion' => 'required',
            'ocupacion' => 'required',
            'como_se_entero' => 'required',
            'horario_flexible' => 'required',
            'desea_informacion' => 'required',
            'reciv_correos' => 'required',
            'auto_datosper' => 'required',
            'declaracion' => 'required|accepted',

        ]);
        // Obtener el último idvoluntario y aumentarlo en 1
        $idvoluntario = voluntarios::max('idvoluntario') + 1;

        $voluntarios = new voluntarios;
        $voluntarios->idvoluntario = $idvoluntario;
        $voluntarios->idtipodoc = $request->idtipodoc;
        $voluntarios->numero_documento = $request->numerodocumento;
        $voluntarios->pais_nacimiento = $request->paisnacimiento;
        $voluntarios->apellido_paterno = $request->apellido_paterno;
        $voluntarios->apellido_materno = $request->apellido_materno;
        $voluntarios->nombres = $request->nombre;
        $voluntarios->fecha_nacimiento = $request->fecha_nacimiento;
        $voluntarios->sexo = $request->sexo;
        $voluntarios->edad = $request->edad;
        $voluntarios->idseguro = $request->idseguro;
        $voluntarios->seguro = $request->seguro;
        $voluntarios->iddiscapacidad = $request->iddiscapacidad;
        $voluntarios->discapacidad = $request->discapacidad;
        $voluntarios->iddistrito = $request->iddistrito;
        $voluntarios->direccion = $request->direccion;
        $voluntarios->correo_electronico = $request->correo_electronico;
        $voluntarios->idtipo_telefono = $request->idtipo_telefono;
        $voluntarios->numero_contacto = $request->numero_contacto;
        $voluntarios->grado_instruccion = $request->grado_instruccion;
        $voluntarios->profesion = $request->profesion;
        $voluntarios->ocupacion = $request->ocupacion;
        $voluntarios->como_se_entero = $request->como_se_entero;
        $voluntarios->horario_flexible = $request->horario_flexible;
        $voluntarios->desea_informacion = $request->desea_informacion;
        $voluntarios->reciv_correos = $request->reciv_correos;
        $voluntarios->auto_datosper = $request->auto_datosper;
        $voluntarios->declaracion = $request->declaracion;

        $voluntarios->save();
        $voluntarios->diasDisponibles()->attach($request->input('dias_disponibles'));
        $voluntarios->gruposDesea()->attach($request->input('grupos_participar'));

        Session::flash('mensaje', 'Voluntario registrado correctamente');
        return redirect()->route('crearvoluntario', $voluntarios);
    }

    public function reporteVoluntario(Request $request, voluntarios $voluntarios)
    {
        
        $consulta = voluntarios::withTrashed()->join('tiposdocumentoidentidades', 'voluntarios.idtipodoc', '=', 'tiposdocumentoidentidades.idtipodoc')
            ->select(
                'voluntarios.idvoluntario as idvoluntario',
                'tiposdocumentoidentidades.nombre_tipodoc as nombre_tipodoc',
                'voluntarios.numero_documento',
                'voluntarios.pais_nacimiento',
                'voluntarios.apellido_paterno',
                'voluntarios.apellido_materno',
                'voluntarios.nombres',
                'voluntarios.fecha_nacimiento',
                'voluntarios.sexo',
                'voluntarios.edad',
                'voluntarios.correo_electronico',
                'voluntarios.grado_instruccion',
                'voluntarios.profesion',
                'voluntarios.ocupacion',
                'voluntarios.como_se_entero',
                'voluntarios.direccion',
                'voluntarios.discapacidad',
                'voluntarios.seguro',
                'voluntarios.horario_flexible',
                'voluntarios.desea_informacion',
                'voluntarios.reciv_correos',
                'voluntarios.deleted_at',
            )
            ->get();


        return view('admin.voluntarios.voluntariado')
            ->with('consulta', $consulta)
            ->with('voluntarios', $voluntarios);
           ;
    }

    public function modificaVoluntario(voluntarios $voluntarios)
    {
        $consulta = voluntarios::withTrashed()->with('diasDisponibles', 'gruposDesea', 'tipoDocumento', 'distritos', 'distritos.provincias', 'distritos.provincias.regiones')
            ->leftjoin('tiposdocumentoidentidades', 'voluntarios.idtipodoc', '=', 'tiposdocumentoidentidades.idtipodoc')
            ->leftjoin('distritos', 'voluntarios.iddistrito', '=', 'distritos.iddistrito')
            ->leftjoin('provincias', 'distritos.idprovincia', '=', 'provincias.idprovincia')
            ->leftjoin('regiones', 'provincias.idregion', '=', 'regiones.idregion')

            ->select(
                'voluntarios.idvoluntario as idvoluntario',
                'voluntarios.numero_documento',
                'voluntarios.pais_nacimiento',
                'voluntarios.apellido_paterno',
                'voluntarios.apellido_materno',
                'voluntarios.nombres',
                'voluntarios.fecha_nacimiento',
                'voluntarios.sexo',
                'voluntarios.edad',
                'voluntarios.correo_electronico',
                'voluntarios.grado_instruccion',
                'voluntarios.profesion',
                'voluntarios.ocupacion',
                'voluntarios.como_se_entero',
                'voluntarios.direccion',
                'voluntarios.discapacidad',
                'voluntarios.seguro',
                'voluntarios.numero_contacto',
                'voluntarios.horario_flexible',
                'voluntarios.desea_informacion',
                'voluntarios.reciv_correos',
                'voluntarios.auto_datosper',
                'voluntarios.declaracion',
                'voluntarios.idseguro as idseguro',
                'voluntarios.iddiscapacidad as iddiscapacidad',
                'voluntarios.idtipo_telefono as idtipo_telefono',

                'provincias.provincia as provincia',
                'regiones.region as departamento',
                'regiones.idregion as idregion',
                'distritos.distrito as distrito',
                'tiposdocumentoidentidades.nombre_tipodoc as nombre_tipodoc',
                'tiposdocumentoidentidades.idtipodoc as idtipodoc',
                
                
               

            )
            ->where('voluntarios.idvoluntario', $voluntarios->idvoluntario)
            ->get();


        $regiones = regiones::all();
        $documentos = tiposdocumentoidentidades::all();
        $dias = dias::all();
        $grupos_partis = grupos_partis::all();

        return view('admin.voluntarios.reportevoluntariado')
            ->with('voluntarios', $voluntarios)
            ->with('consulta', $consulta[0])
            ->with('grupos_partis', $grupos_partis)
            ->with('dias', $dias)
            ->with('documentos', $documentos)
            ->with('regiones', $regiones);
            
    }

    public function actualizaVoluntario(Request $request, $idvoluntario)
    {
        $this->validate($request, [
            'idtipodoc' => 'required',
            'numerodocumento' => 'required|numeric',
            'paisnacimiento' => 'required',
            'apellido_paterno' => 'required',
            'nombre' => 'required',
            'fecha_nacimiento' => 'required|date',
            'sexo' => 'required',
            'iddistrito' => 'required',
            'seguro' => 'required',
            'direccion' => 'required',
            'correo_electronico' => 'required|email',
            'idtipo_telefono' => 'required',
            'numero_contacto' => 'required',
            'grado_instruccion' => 'required',
            'profesion' => 'required',
            'ocupacion' => 'required',
            'como_se_entero' => 'required',
            'horario_flexible' => 'required',
            'desea_informacion' => 'required',
            'reciv_correos' => 'required',
            'auto_datosper' => 'required',
            'declaracion' => 'required|accepted',
        ]);
    
        $voluntarios = voluntarios::findOrFail($idvoluntario);
        $voluntarios->update($request->all());
    
        $voluntarios->diasDisponibles()->sync($request->input('dias_disponibles'));
        $voluntarios->gruposDesea()->sync($request->input('grupos_participar'));
    
        Session::flash('mensaje', 'Voluntario actualizado correctamente');
        return redirect()->route('reportevoluntario', $voluntarios);
        }
    

    public function activaVoluntario($idvoluntario)
    {
        $voluntarios = voluntarios::withTrashed()->where('idvoluntario', $idvoluntario)->restore();

        Session::flash('mensaje', 'Voluntario activado correctamente');
        return redirect()->route('reportevoluntario');
    }
    public function desactivaVoluntario($idvoluntario)
    {
        $voluntario = voluntarios::find($idvoluntario);

        if ($voluntario) {
            $voluntario->delete();
            Session::flash('mensaje', 'Voluntario desactivado correctamente');
            return redirect()->route('reportevoluntario');
        } else {
            return "no se encontro";
        }
    }

    public function borraVoluntario($idvoluntario)

    {
        $voluntarios = voluntarios::withTrashed()->find($idvoluntario);
        $voluntarios->gruposDesea()->detach();
        $voluntarios->diasDisponibles()->detach();
        $voluntarios->forceDelete();

        Session::flash('mensaje', 'Voluntario borrado correctamente');
        return redirect()->route('reportevoluntario');
    }

*/

    public function index()
    {
        $tipo_docs = tiposdocumentoidentidades::orderBy('nombre_tipodoc')->get();
        $regiones = regiones::orderBy('region')->get();
        $provincias = provincias::orderBy('provincia')->get();
        $distritos = distritos::orderBy('distrito')->get();
        $dias = dias::all();
        $grupos_partis = grupos_partis::all();
        $voluntarios = voluntarios::all();

        return view('admin.voluntarios.index')
            ->with('tipo_docs', $tipo_docs)
            ->with('regiones', $regiones)
            ->with('provincias', $provincias)
            ->with('distritos', $distritos)
            ->with('dias', $dias)
            ->with('grupos_partis', $grupos_partis)
            ->with('voluntarios', $voluntarios);
            
    }

    public function obtenerProvincias(Request $request)
    {
        $regionId = (int) $request->input('departamento');

        // Obtener las provincias correspondientes al idregion seleccionado
        $provincias = provincias::where('idregion', $regionId)->get();

        $provinciasArray = [];

        foreach ($provincias as $provincia) {
            $provinciasArray[] = [
                'idprovincia' => $provincia->idprovincia,
                'provincia' => $provincia->provincia
            ];
        }

        return response()->json([
            'provincias' => $provinciasArray
        ]);
    }

    public function obtenerDistritos(Request $request)
    {
        $provinciaId = $request->input('provincia');

        // Obtener la provincia y su región
        $provincia = provincias::with('regiones')->find($provinciaId);

        if (!$provincia) {
            return response()->json(['error' => 'Provincia no encontrada'], 404);
        }

        // Obtener los distritos relacionados a la provincia dentro de la región
        $distritos = $provincia->distritos;

        return response()->json([
            'distritos' => $distritos
        ]);
    }
    public function create()
    {

    }


    public function store(Request $request, voluntarios $voluntarios)
    {
        $this->validate($request, [
            'idtipodoc' => 'required',
            'numerodocumento' => 'required|numeric',
            'paisnacimiento' => 'required',
            'apellido_paterno' => 'required',
            'nombre' => 'required',
            'fecha_nacimiento' => 'required|date',
            'sexo' => 'required',
            'iddistrito' => 'required',
            'seguro' => 'required',
            'direccion' => 'required',
            'correo_electronico' => 'required|email',
            'idtipo_telefono' => 'required',
            'numero_contacto' => 'required',
            'grado_instruccion' => 'required',
            'profesion' => 'required',
            'ocupacion' => 'required',
            'como_se_entero' => 'required',
            'horario_flexible' => 'required',
            'desea_informacion' => 'required',
            'reciv_correos' => 'required',
            'auto_datosper' => 'required',
            'declaracion' => 'required|accepted',

        ]);
        // Obtener el último idvoluntario y aumentarlo en 1
        $idvoluntario = voluntarios::max('idvoluntario') + 1;

        $voluntarios = new voluntarios;
        $voluntarios->idvoluntario = $idvoluntario;
        $voluntarios->idtipodoc = $request->idtipodoc;
        $voluntarios->numero_documento = $request->numerodocumento;
        $voluntarios->pais_nacimiento = $request->paisnacimiento;
        $voluntarios->apellido_paterno = $request->apellido_paterno;
        $voluntarios->apellido_materno = $request->apellido_materno;
        $voluntarios->nombres = $request->nombre;
        $voluntarios->fecha_nacimiento = $request->fecha_nacimiento;
        $voluntarios->sexo = $request->sexo;
        $voluntarios->edad = $request->edad;
        $voluntarios->idseguro = $request->idseguro;
        $voluntarios->seguro = $request->seguro;
        $voluntarios->iddiscapacidad = $request->iddiscapacidad;
        $voluntarios->discapacidad = $request->discapacidad;
        $voluntarios->iddistrito = $request->iddistrito;
        $voluntarios->direccion = $request->direccion;
        $voluntarios->correo_electronico = $request->correo_electronico;
        $voluntarios->idtipo_telefono = $request->idtipo_telefono;
        $voluntarios->numero_contacto = $request->numero_contacto;
        $voluntarios->grado_instruccion = $request->grado_instruccion;
        $voluntarios->profesion = $request->profesion;
        $voluntarios->ocupacion = $request->ocupacion;
        $voluntarios->como_se_entero = $request->como_se_entero;
        $voluntarios->horario_flexible = $request->horario_flexible;
        $voluntarios->desea_informacion = $request->desea_informacion;
        $voluntarios->reciv_correos = $request->reciv_correos;
        $voluntarios->auto_datosper = $request->auto_datosper;
        $voluntarios->declaracion = $request->declaracion;

        $voluntarios->save();
        $voluntarios->diasDisponibles()->attach($request->input('dias_disponibles'));
        $voluntarios->gruposDesea()->attach($request->input('grupos_participar'));

        Session::flash('mensaje', 'Voluntario registrado correctamente');
        return redirect()->route('admin.voluntarios.index', $voluntarios);
    }
}
