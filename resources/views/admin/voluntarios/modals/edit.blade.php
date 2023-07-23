<form action="{{ route('admin.voluntarios.update', ['voluntario' => $voluntario->idvoluntario]) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" id="voluntarioId" name="voluntarioId">
    <h1>Formulario de Registro y Acreditacion</h1>
    <h2>II. DATOS PERSONALES DE LA/EL VOLUNTARIA/O</h2>

    <div class="row mb-3">
        <div class="col-md-4 field-container">
            <label for="tipo_doc" class="form-label">Tipo Documento:</label>
            <select class="form-control tipoDocumentoEdit" name="idtipodoc">
                <option disabled selected>-- Seleccionar --</option>
                @foreach ($tipo_docs as $tipo_doc)
                    <option value="{{ $tipo_doc->idtipodoc }}" data-nombre="{{ $tipo_doc->nombre_tipodoc }}">
                        {{ $tipo_doc->nombre_tipodoc }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4 field-container">
            <div class="campoAdicionalEdit" style="display: none;">
                <label for="campoAdicionalInput" class="form-label campoAdicionalLabelEdit"></label>
                <input type="number"  name="numerodocumento" class="form-control campoAdicionalInputEdit">
            </div>
        </div>
        <div class="col-md-4 field-container">
            <label for="paisNacimientoVoluntario" class="form-label">País de Nacimiento:</label>
            <input type="text" id="paisNacimientoVoluntario" class="form-control" name="paisnacimiento">
        </div>
    </div>

{{--  <div class="row mb-3">

        <div class="col-md-4 field-container">
            <label for="apellido_paterno" class="form-label">Apellido Paterno:
            </label>
            <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno">
        </div>
        <div class="col-md-4 field-container">
            <label for="apellido_materno" class="form-label">Apellido Materno:

            </label>
            <input type="text" class="form-control" id="apellido_materno" name="apellido_materno">
        </div>
        <div class="col-md-4 field-container">
            <label for="nombres" class="form-label">Nombres:


            </label>
            <input type="text" class="form-control" id="nombre" name="nombre">
        </div>
    </div>

    <div class="row mb-3">

        <div class="col-md-4 field-container">
            <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento:

            </label>
            <input type="date" id="fechaNacimiento" class="form-control" name="fecha_nacimiento">
        </div>
        <div class="col-md-4 field-container">
            <label for="sexo" class="form-label">Sexo:

            </label>
            <select id="sexo" class="form-control" name="sexo">
                <option disabled selected>-- Seleccionar --</option>
                <option value="Femenino">Femenino</option>
                <option value="Masculino">Masculino</option>
                <option value="No definido">No definido</option>
            </select>
        </div>
        <div class="col-md-4 field-container">
            <label for="edad" class="form-label">Edad:

            </label>
            <input type="number" id="edad" class="form-control" name="edad" value="edad">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6 field-container">
            <label for="seguro" class="form-label">¿Cuenta con Seguro Médico?

            </label>
            <select id="seguro" class="form-control" name="seguro">
                <option disabled selected>-- Seleccionar --</option>
                <option value="SI">SI</option>
                <option value="NO">N0</option>
            </select>
        </div>
        <div class="col-md-6 field-container">
            <label for="idseguro">Tipo de seguro (Si la respuesta fue SÍ):</label>
            <select id="idseguro" class="form-control" name="idseguro">
                <option disabled selected>-- Seleccionar --</option>
                <option value="1">SIS</option>
                <option value="2">ESSALUD</option>
                <option value="3">Particular</option>
                <option value="4">Seguro FFAA - PNP</option>
            </select>
        </div>
    </div>
    <div class="row mb-3 field-container">
        <div class="col-md-6">
            <label for="discapacidad" class="form-label">¿Cuenta con algún tipo de discapacidad?</label>
            <select id="discapacidad" class="form-control" name="discapacidad">
                <option disabled selected>-- Seleccionar --</option>
                <option value="SI">SI</option>
                <option value="NO">NO</option>
            </select>

        </div>
        <div class="col-md-6 field-container">
            <label for="iddiscapacidad">Tipo de discapacidad (Si la respuesta fue
                SÍ):</label>
            <select id="iddiscapacidad" class="form-control" name="iddiscapacidad">
                <option disabled selected>-- Seleccionar --</option>
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
        <div class="col-md-4 field-container">
            <label for="departamento">Departamento:</label>
            <select class="form-control" id="departamento" name="departamento">
                <option disabled selected>-- Seleccionar --</option>
                @foreach ($regiones as $region)
                    <option value="{{ $region->idregion }}">{{ $region->region }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4 field-container">
            <label for="provincia">Provincia:</label>
            <select class="form-control" id="provincia" name="provincia" disabled>
                <option disabled selected>-- Seleccionar --</option>
            </select>
        </div>
        <div class="col-md-4 field-container">
            <label for="distrito">Distrito:</label>
            <select class="form-control" id="distrito" name="iddistrito" disabled>
                <option disabled selected>-- Seleccionar --</option>
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12 field-container">
            <label for="direccion" class="form-label">Dirección:</label>
            <input type="text" id="direccion" class="form-control" name="direccion">
        </div>
    </div>
    <h5 class="mb-4 mt-4">Datos Contacto</h5>
    <div class="row mb-3">
        <div class="col-md-4 field-container">
            <label for="correoVoluntario" class="form-label">Correo Electrónico:</label>
            <input type="email" id="correoVoluntario" class="form-control" name="correo_electronico">
        </div>
        <div class="col-md-4 field-container">
            <label for="idtipo_telefono" class="form-label">Tipo Teléfono:</label>
            <select id="idtipo_telefono" class="form-control" name="idtipo_telefono">
                <option disabled selected>-- Seleccionar --</option>
                <option value="1">Celular</option>
                <option value="2">Fijo de Casa</option>
                <option value="3">Fijo de Trabajo</option>
            </select>
        </div>
        <div class="col-md-4 field-container">
            <label for="numero_contacto" class="form-label">Nro. Teléfono:</label>
            <input type="text" id="numero_contacto" class="form-control" name="numero_contacto">
        </div>
    </div>

    <h5 class="mb-4 mt-4">Formación/Ocupación:</h5>
    <div class="row mb-3">

        <div class="col-md-4 field-container">

            <label for="grado_instruccion" class="form-label">Grado de Instrucción:</label>
            <select class="form-control" id="grado_instruccion" name="grado_instruccion">
                <option disabled selected>-- Seleccionar --</option>
                <option value="Primaria">Primaria</option>
                <option value="Secundaria">Secundaria</option>
                <option value="Técnico">Técnico</option>
                <option value="Universitario">Universitario</option>
            </select>

        </div>
        <div class="col-md-4 field-container">

            <label for="profesion" class="form-label">Profesión:</label>
            <input type="text" class="form-control" id="profesion" name="profesion">
        </div>

        <div class="col-md-4 field-container">

            <label for="ocupacion" class="form-label">Ocupación:</label>
            <input type="text" class="form-control" id="ocupacion" name="ocupacion">

        </div>
    </div>
    <label class="form-label mt-3">¿Cómo se enteró del registro de voluntariado?</label>
    <div class="row mb-3 justify-content-center field-container">
        <div class="col-md-2 ">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="como_se_entero" value="Facebook"
                    id="facebook">
                <label class="form-check-label" for="facebook">Facebook</label>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="como_se_entero" value="Twitter"
                    id="twitter">
                <label class="form-check-label" for="twitter">Twitter</label>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="como_se_entero" value="Televisión"
                    id="television">
                <label class="form-check-label" for="television">Televisión</label>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="como_se_entero" value="Web" id="web">
                <label class="form-check-label" for="web">Web</label>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="como_se_entero" value="Familia y/o amigos"
                    id="familia_amigos">
                <label class="form-check-label" for="familia_amigos">Familia y/o amigos</label>
            </div>
        </div>
    </div>
    <div class="row mb-3 justify-content-center">

        <div class="col-md-2">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="como_se_entero"
                    value="Colegio, Instituto, Universidad" id="colegio_universidad">
                <label class="form-check-label" for="colegio_universidad">Colegio, Instituto,
                    Universidad</label>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="como_se_entero" value="Sitio Web MIMP"
                    id="sitio_web_mimp">
                <label class="form-check-label" for="sitio_web_mimp">Sitio Web MIMP</label>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="como_se_entero" value="Eventos Voluntariados"
                    id="eventos_voluntariados">
                <label class="form-check-label" for="eventos_voluntariados">Eventos Voluntariados</label>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="como_se_entero" value="Gobierno"
                    id="gobierno">
                <label class="form-check-label" for="gobierno">Gobierno</label>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="como_se_entero" value="Otros" id="otros">
                <label class="form-check-label" for="otros">Otros</label>
            </div>
        </div>
    </div>
    <h2>IV. EXPECTATIVAS DE LA/EL VOLUNTARIA/O</h2>
    <h3>DISPONIBILIDAD</h3>
    <div class="row mb-4 d-flex align-items-center">
        <div class="col-md-4 field-container">
            <label for="registroVoluntariado">Tiene horarios flexibles? (Disponibilidad completa e
                inmediata)</label>
        </div>
        <div class="col-md-1 field-container">
            <select id="horario_flexible" class="form-control" name="horario_flexible">
                <option disabled selected>-- Seleccionar --</option>
                <option value="SI">SI</option>
                <option value="NO">NO</option>
            </select>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="mb-3 field-container">
                    <label for="dias_disponibles" class="form-label">Días disponibles:</label>
                    @foreach ($dias as $dia)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="dias_disponibles[]"
                                value="{{ $dia->iddia }}">
                            <label class="form-check-label" for="dias_disponibles[]">
                                {{ $dia->nombre_dia }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <div class="row mb-5">

        <div class="col-md-6 field-container">
            <label for="grupos_participar" class="form-label">Seleccione los grupos en los que desearía
                participar:</label>
            <div class="form-check overflow-auto border " style="max-height: 200px; max-width: 500px;">
                @foreach ($grupos_partis as $grupos_parti)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="grupos_participar[]"
                            value="{{ $grupos_parti->idgrupo }}">
                        <label class="form-check-label" for="grupos_participar[]">
                            {{ $grupos_parti->nombre_grupo }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <h2>V. AUTORIZACIONES DE LA/EL VOLUNTARIA/O MAYOR DE EDAD</h2>
    <div class="row mb-3">
        <div class=" d-flex">
            <label for="desea_informacion" class="form-label col-md-9 field-container">¿Desea recibir información
                sobre
                organizaciones
                que pueden
                adecuar actividades a su interés?</label>
            <div class="form-check col-md-1 field-container">
                <input class="form-check-input" type="radio" name="desea_informacion" id="infoOrganizacionesNo"
                    value="0">
                <label class="form-check-label" for="infoOrganizacionesNo">NO</label>
            </div>
            <div class="form-check col-md-1 field-container">
                <input class="form-check-input" type="radio" name="desea_informacion" id="infoOrganizacionesSi"
                    value="1">
                <label class="form-check-label" for="infoOrganizacionesSi">SI</label>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="d-flex">
            <label for="notificacionesCorreo" class="form-label col-md-9 field-container">¿Desea recibir
                notificaciones de
                nuevas
                convocatorias de
                actividades de voluntariado en su correo electrónico?</label>
            <div class="form-check col-md-1 field-container">
                <input class="form-check-input" type="radio" name="reciv_correos" id="notificacionesCorreoNo"
                    value="0">
                <label class="form-check-label" for="notificacionesCorreoNo">NO</label>
            </div>
            <div class="form-check col-md-1 field-container">
                <input class="form-check-input" type="radio" name="reciv_correos" id="notificacionesCorreoSi"
                    value="1">
                <label class="form-check-label" for="notificacionesCorreoSi">SI</label>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="d-flex">
            <label for="autorizacionDatos" class="form-label col-md-9 field-container">¿Autoriza usted el uso y
                publicación de
                sus
                datos personales
                a ser consignados en el Registro de Voluntariado, para acciones vinculadas a oferta y demanda
                del
                servicio
                de voluntariado (Según Ley N° 23283 y su Reglamento)?</label>
            <div class="form-check col-md-1 field-container">
                <input class="form-check-input" type="radio" name="auto_datosper" id="autorizacionDatosNo"
                    value="0">
                <label class="form-check-label" for="autorizacionDatosNo">NO</label>
            </div>
            <div class="form-check col-md-1 field-container">
                <input class="form-check-input" type="radio" name="auto_datosper" id="autorizacionDatosSi"
                    value="1">
                <label class="form-check-label" for="autorizacionDatosSi">SI</label>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-12">
            <h2>VI. DECLARACIONES DE LA/EL VOLUNTARIA/O MAYOR DE EDAD</h2>

            <div class="mb-3 field-container">

                <label class="form-check-label " for="antecedentes">DECLARO BAJO JURAMENTO: NO REGISTRAR
                    ANTECEDENTES
                    POLICIALES, NI JUDICIALES, NI PENALES, POR DELITOS COMETIDOS EN CONTRA DE LA LIBERTAD SEXUAL
                    HOMICIDIO,
                    FEMINICIDIO, TRAFICO ILICITO DE DROGAS, TERRORISMO, CONTRA EL PATRIMONIO, LESIONES GRAVES,
                    EXPOSICIÓN DE
                    PERSONAS AL PELIGRO O SECUESTRO.</label>
            </div>

            <div class="mb-3 field-container">
                <label class="form-check-label" for="informacion">DECLARO QUE LA INFORMACIÓN Y/O DATOS
                    CONSIGNADOS
                    EN
                    EL
                    PRESENTE FORMULARIO Y LOS DOCUMENTOS QUE SE ADJUNTAN SON VERDADEROS Y ME SOMETO A LAS
                    SANCIONES
                    ESTIPULADAS EN LAS NORMAS LEGALES VIGENTES EN CASO DE HABER DADO INFORMACIÓN FALSA.</label>
            </div>

            <div class="mb-3 field-container">
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

            <div class="form-check">
                <div class="d-flex justify-content-between align-items-center field-container">
                    <input class="form-check-input" type="checkbox" id="terminos" name="declaracion"
                        value="1">
                    <label class="form-check-label" for="terminos">Acepto Términos y Condiciones:</label>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer field-container">
        <button type="submit" class="btn btn-primary">Crear Voluntario</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    </div>--}}
</form>
