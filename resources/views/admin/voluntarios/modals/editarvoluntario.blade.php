@extends('adminlte::page')

@section('title', 'admin')


@section('content_header')
    <h1>Reporte de Voluntariados</h1>
@stop

@section('content')
<title>Modificar Voluntario</title>
<div class="container align-items-center">
    <form  action="{{ route('actualizavoluntario', ['idvoluntario' => $idvoluntario]) }}" method="POST">
        {{ csrf_field() }}
        <h1>Formulario de Registro y Acreditacion</h1>
        <h2>II. DATOS PERSONALES DE LA/EL VOLUNTARIA/O</h2>

        <div class="row mb-3 ">

            <div class="col-md-4">
                <label for="tipo_doc">Tipo Documento:</label>
                <select class="form-select" id="tipo_doc" name="idtipodoc">
                    <option disabled selected>--seleccionar--</optcion>
                        @foreach ($documentos as $documento)
                    <option value="{{ $documento->idtipodoc }}" data-nombre="{{ $documento->nombre_tipodoc }}"
                        {{ $consulta->idtipodoc == $documento->idtipodoc ? 'selected' : '' }}>
                        {{ $documento->nombre_tipodoc }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <div id="">
                    <label id="campoAdicionalLabel" for="campoAdicionalInput"></label>
                    <input type="number" id="campoAdicionalInput" name="numerodocumento" class="form-control"
                        value="{{ $consulta->numero_documento }}">
                </div>
            </div>
            <div class="col-md-4">
                <label for="paisNacimientoVoluntario">País de Nacimiento:
                </label>
                <input type="text" id="paisNacimientoVoluntario" class="form-control" name="paisnacimiento"
                    value="{{ $consulta->pais_nacimiento }}">
            </div>

        </div>

        <div class="row mb-3">

            <div class="col-md-4">
                <label for="apellido_paterno" class="form-label">Apellido Paterno:</label>
                <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno"
                    value="{{ $consulta->apellido_paterno }}">
            </div>
            <div class="col-md-4">
                <label for="apellido_materno" class="form-label">Apellido Materno:</label>
                <input type="text" class="form-control" id="apellido_materno" name="apellido_materno"
                    value="{{ $consulta->apellido_materno }}">
            </div>
            <div class="col-md-4">
                <label for="nombres" class="form-label">Nombres:</label>
                <input type="text" class="form-control" id="nombre" name="nombre"
                    value="{{ $consulta->nombres }}">
            </div>
        </div>

        <div class="row mb-3">

            <div class="col-md-4">
                <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento:</label>
                <input type="date" id="fechaNacimiento" class="form-control" name="fecha_nacimiento"
                    value="{{ $consulta->fecha_nacimiento }}">
            </div>
            <div class="col-md-4">
                <label for="sexo" class="form-label">Sexo:</label>
                <select id="sexo" class="form-select" name="sexo">
                    <option value="{{ $consulta->sexo }}">{{ $consulta->sexo }}</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Masculino">Masculino</option>
                    <option value="No definido">No definido</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="edad" class="form-label">Edad:</label>
                <input type="number" id="edad" class="form-control" name="edad" value="{{ $consulta->edad }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="seguro" class="form-label">¿Cuenta con Seguro Médico?</label>
                <select id="seguro" class="form-select" name="seguro">
                    <option value="{{ $consulta->seguro }}">{{ $consulta->seguro }}</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="idseguro">Tipo de seguro (Si la respuesta fue SÍ):</label>
                <select id="idseguro" class="form-select" name="idseguro">
                    <option value="{{ $consulta->idseguro }}">{{ $consulta->nombreseguro }}</option>
                    <option value="1">SIS</option>
                    <option value="2">ESSALUD</option>
                    <option value="3">Particular</option>
                    <option value="4">Seguro FFAA - PNP</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="discapacidad" class="form-label">¿Cuenta con algún tipo de discapacidad?</label>
                <select id="discapacidad" class="form-select" name="discapacidad">
                    <option value="{{ $consulta->discapacidad }}">{{ $consulta->discapacidad }}</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                </select>

            </div>
            <div class="col-md-6">
                <label for="iddiscapacidad">Tipo de discapacidad (Si la respuesta fue
                    SÍ):</label>
                <select id="iddiscapacidad" class="form-select" name="iddiscapacidad">
                    <option value="{{ $consulta->iddiscapacidad }}">{{ $consulta->nombre_discapacidad }}</option>
                    <option value="1">Dificultad para ver</option>
                    <option value="2">Dificultad para oír</option>
                    <option value="3">Dificultad para hablar o comunicarse</option>
                    <option value="4">Dificultad para moverse o caminar</option>
                    <option value="5">Dificultad para entender o aprender</option>
                    <option value="6">Dificultad para relacionarse con los
                        demas</option>
                </select>
            </div>
        </div>
        <h5 class="mb-4 mt-4">Domicilo Actual</h5>

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="departamento">Departamento:</label>
                <select class="form-select" id="departamento" name="departamento">
                    <option value="">Seleccionar</option>
                    <option value="{{ $consulta->departamento }}">{{ $consulta->departamento }}</option>
                    @foreach ($regiones as $region)
                        <option value="{{ $region->idregion }}"  {{ $consulta->idregion == $region->idregion ? 'selected' : '' }}>{{ $region->region }}</option>
                    @endforeach

                </select>
            </div>
            <div class="col-md-4">
                <label for="provincia">Provincia:</label>
                <select class="form-select" id="provincia" name="provincia" disabled>
                    <option value="{{ $consulta->provincia }}">{{ $consulta->provincia }}</option>
                    <option value="">Seleccionar</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="distrito">Distrito:</label>
                <select class="form-select" id="distrito" name="iddistrito" disabled>
                    <option value="{{ $consulta->iddistrito }}">{{ $consulta->distrito }}</option>
                    <option value="">Seleccionar</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="direccion" class="form-label">Dirección:</label>
                <input type="text" id="direccion" class="form-control" name="direccion"
                    value="{{ $consulta->direccion }}">
            </div>
        </div>
        <h5 class="mb-4 mt-4">Datos Contacto</h5>
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="correoVoluntario" class="form-label">Correo Electrónico:</label>
                <input type="email" id="correoVoluntario" class="form-control" name="correo_electronico"
                    value="{{ $consulta->correo_electronico }}">
            </div>
            <div class="col-md-4">
                <label for="idtipo_telefono" class="form-label">Tipo Teléfono:</label>
                <select id="idtipo_telefono" class="form-select" name="idtipo_telefono">
                    <option value="{{ $consulta->idtipo_telefono }}">{{ $consulta->nombre_tipo_telefono }}</option>
                    <option value="1">Celular</option>
                    <option value="2">Fijo de Casa</option>
                    <option value="3">Fijo de Trabajo</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="numero_contacto" class="form-label">Nro. Teléfono:</label>
                <input type="text" id="numero_contacto" class="form-control" name="numero_contacto"
                    value="{{ $consulta->numero_contacto }}">
            </div>
        </div>

        <h5 class="mb-4 mt-4">Formación/Ocupación:</h5>
        <div class="row mb-3">

            <div class="col-md-4">

                <label for="grado_instruccion" class="form-label">Grado de Instrucción:</label>
                <select class="form-select" id="grado_instruccion" name="grado_instruccion">
                    <option value="{{ $consulta->grado_instruccion }}">{{ $consulta->grado_instruccion }}</option>
                    <option value="">Seleccionar</option>
                    <option value="Primaria">Primaria</option>
                    <option value="Secundaria">Secundaria</option>
                    <option value="Técnico">Técnico</option>
                    <option value="Universitario">Universitario</option>
                </select>

            </div>
            <div class="col-md-4">

                <label for="profesion" class="form-label">Profesión:</label>
                <input type="text" class="form-control" id="profesion" name="profesion"
                    value="{{ $consulta->profesion }} ">
            </div>

            <div class="col-md-4">

                <label for="ocupacion" class="form-label">Ocupación:</label>
                <input type="text" class="form-control" id="ocupacion" name="ocupacion"
                    value="{{ $consulta->ocupacion }}">

            </div>
        </div>
        <label class="form-label mt-3">¿Cómo se enteró del registro de voluntariado?</label>
        <div class="row mb-3 justify-content-center">
            <div class="col-md-2">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="como_se_entero" value="Facebook"
                        @if ($consulta->como_se_entero == 'Facebook') checked @endif id="facebook">
                    <label class="form-check-label" for="facebook">Facebook</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="como_se_entero" value="Twitter"
                        id="twitter" @if ($consulta->como_se_entero == 'Twitter') checked @endif>
                    <label class="form-check-label" for="twitter">Twitter</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="como_se_entero" value="Television"
                        id="television" @if ($consulta->como_se_entero == 'Television') checked @endif>
                    <label class="form-check-label" for="television">Televisión</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="como_se_entero" value="Web"
                        @if ($consulta->como_se_entero == 'Web') checked @endif id="web">
                    <label class="form-check-label" for="web">Web</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="como_se_entero" value="Familia y/o amigos"
                        id="familia_amigos" @if ($consulta->como_se_entero == 'Familia y/o amigos') checked @endif>
                    <label class="form-check-label" for="familia_amigos">Familia y/o amigos</label>
                </div>
            </div>
        </div>
        <div class="row mb-3 justify-content-center">

            <div class="col-md-2">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="como_se_entero"
                        value="Colegio, Instituto, Universidad" id="colegio_universidad"
                        @if ($consulta->como_se_entero == 'Colegio, Instituto, Universidad') checked @endif>
                    <label class="form-check-label" for="colegio_universidad">Colegio, Instituto, Universidad</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="como_se_entero" value="Sitio Web MIMP"
                        id="sitio_web_mimp" @if ($consulta->como_se_entero == 'Sitio Web MIMP') checked @endif>
                    <label class="form-check-label" for="sitio_web_mimp">Sitio Web MIMP</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="como_se_entero"
                        value="Eventos Voluntariados" id="eventos_voluntariados"
                        @if ($consulta->como_se_entero == 'Eventos Voluntariados') checked @endif>
                    <label class="form-check-label" for="eventos_voluntariados">Eventos Voluntariados</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="como_se_entero" value="Gobierno"
                        id="gobierno" @if ($consulta->como_se_entero == 'Gobierno') checked @endif>
                    <label class="form-check-label" for="gobierno">Gobierno</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="como_se_entero" value="Otros"
                        id="otros" @if ($consulta->como_se_entero == 'Otros') checked @endif>
                    <label class="form-check-label" for="otros">Otros</label>
                </div>
            </div>
        </div>
        <h2>IV. EXPECTATIVAS DE LA/EL VOLUNTARIA/O</h2>
        <h3>DISPONIBILIDAD</h3>
        <div class="row mb-4 d-flex align-items-center">
            <div class="col-md-4">
                <label for="registroVoluntariado">Tiene horarios flexibles? (Disponibilidad completa e
                    inmediata)</label>
            </div>
            <div class="col-md-1">
                <select id="horario_flexible" class="form-select" name="horario_flexible">
                    <option value="{{ $consulta->horario_flexible }}">{{ $consulta->horario_flexible }}</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO </option>
                </select>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="mb-3">
                        <label for="dias_disponibles" class="form-label">Días disponibles:</label>
                        @foreach ($dias as $dia)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="dias[]"
                                    value="{{ $dia->iddia }}" @if ($consulta->diasDisponibles->contains('iddia', $dia->iddia)) checked @endif>
                                <label class="form-check-label" for="dia">{{ $dia->nombre_dia }}</label>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>


        <div class="row mb-5">

            <div class="col-md-6">
                <label for="grupos_participar" class="form-label">Seleccione los grupos en los que desearía
                    participar:</label>
                <div class="form-check overflow-auto border " style="max-height: 200px; max-width: 500px;">
                    @foreach ($grupos_partis as $grupos_parti)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="dias[]"
                                value="{{ $grupos_parti->idgrupo }}"
                                @if ($consulta->gruposDesea->contains('idgrupo', $grupos_parti->idgrupo)) checked @endif>
                            <label class="form-check-label" for="dia">{{ $grupos_parti->nombre_grupo }}</label>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

        <h2>V. AUTORIZACIONES DE LA/EL VOLUNTARIA/O MAYOR DE EDAD</h2>
        <div class="row mb-3">
            <div class=" d-flex">
                <label for="desea_informacion" class="form-label col-md-9">¿Desea recibir información sobre
                    organizaciones
                    que pueden
                    adecuar actividades a su interés?</label>
                <div class="form-check col-md-1">
                    <input class="form-check-input" type="radio" name="desea_informacion"
                        id="infoOrganizacionesNo" value="0" @if ($consulta->desea_informacion == '0') checked @endif>
                    <label class="form-check-label" for="infoOrganizacionesNo">NO</label>
                </div>
                <div class="form-check col-md-1">
                    <input class="form-check-input" type="radio" name="desea_informacion"
                        id="infoOrganizacionesSi" value="1" @if ($consulta->desea_informacion == '1') checked @endif>
                    <label class="form-check-label" for="infoOrganizacionesSi">SI</label>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="d-flex">
                <label for="notificacionesCorreo" class="form-label col-md-9">¿Desea recibir notificaciones de
                    nuevas
                    convocatorias de
                    actividades de voluntariado en su correo electrónico?</label>
                <div class="form-check col-md-1">
                    <input class="form-check-input" type="radio" name="reciv_correos" id="notificacionesCorreoNo"
                        value="0" @if ($consulta->reciv_correos == '0') checked @endif>
                    <label class="form-check-label" for="notificacionesCorreoNo">NO</label>
                </div>
                <div class="form-check col-md-1">
                    <input class="form-check-input" type="radio" name="reciv_correos" id="notificacionesCorreoSi"
                        value="1" @if ($consulta->reciv_correos == '1') checked @endif>
                    <label class="form-check-label" for="notificacionesCorreoSi">SI</label>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="d-flex">
                <label for="autorizacionDatos" class="form-label col-md-9">¿Autoriza usted el uso y publicación de
                    sus
                    datos
                    personales
                    a ser consignados en el Registro de Voluntariado, para acciones vinculadas a oferta y demanda
                    del
                    servicio
                    de voluntariado (Según Ley N° 23283 y su Reglamento)?</label>
                <div class="form-check col-md-1">
                    <input class="form-check-input" type="radio" name="auto_datosper" id="autorizacionDatosNo"
                        value="0" @if ($consulta->auto_datosper == '0') checked @endif>
                    <label class="form-check-label" for="autorizacionDatosNo">NO</label>
                </div>
                <div class="form-check col-md-1">
                    <input class="form-check-input" type="radio" name="auto_datosper" id="autorizacionDatosSi"
                        value="1" @if ($consulta->auto_datosper == '1') checked @endif>
                    <label class="form-check-label" for="autorizacionDatosSi">SI</label>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
                <h2>VI. DECLARACIONES DE LA/EL VOLUNTARIA/O MAYOR DE EDAD</h2>

                <div class="mb-3">

                    <label class="form-check-label" for="antecedentes">DECLARO BAJO JURAMENTO: NO REGISTRAR
                        ANTECEDENTES
                        POLICIALES, NI JUDICIALES, NI PENALES, POR DELITOS COMETIDOS EN CONTRA DE LA LIBERTAD SEXUAL
                        HOMICIDIO,
                        FEMINICIDIO, TRAFICO ILICITO DE DROGAS, TERRORISMO, CONTRA EL PATRIMONIO, LESIONES GRAVES,
                        EXPOSICIÓN DE
                        PERSONAS AL PELIGRO O SECUESTRO.</label>
                </div>

                <div class="mb-3">
                    <label class="form-check-label" for="informacion">DECLARO QUE LA INFORMACIÓN Y/O DATOS
                        CONSIGNADOS
                        EN
                        EL
                        PRESENTE FORMULARIO Y LOS DOCUMENTOS QUE SE ADJUNTAN SON VERDADEROS Y ME SOMETO A LAS
                        SANCIONES
                        ESTIPULADAS EN LAS NORMAS LEGALES VIGENTES EN CASO DE HABER DADO INFORMACIÓN FALSA.</label>
                </div>

                <div class="mb-3">
                    <label class="form-check-label" for="inscripcion">EN TAL SENTIDO, ACEPTANDO LOS TÉRMINOS Y/O
                        CONDICIONES
                        PRECEDENTES, SOLICITO MI INSCRIPCIÓN EN EL REGISTRO DE VOLUNTARIADO DEL MIMP, PARA LO CUAL
                        ADJUNTO
                        AL
                        PRESENTE EL DOCUMENTO QUE ME ACREDITA HABER REALIZADO LAS JORNADAS DE VOLUNTARIADO
                        NECESARIAS
                        PARA
                        MI
                        INSCRIPCIÓN, ESTABLECIDAS SEGÚN D.S. Nº 004-2017-MIMP.</label>
                </div>

                <div class="form-group text-center">
                    <label for="terminos">Acepto Términos y Condiciones:</label>
                    <input class="form-check-input" type="checkbox" id="terminos" name="declaracion"
                        value="1">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success mb-5">Enviar formulario</button>
    </form>
</div>
    
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
