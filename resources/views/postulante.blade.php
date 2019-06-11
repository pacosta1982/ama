<div class="form-group col-sm-3">
    <label for="">Nombre</label>
    <input type="text" name="nombre" class="form-control" value="{{ isset($nombre)? $nombre :null}}" readonly>
</div>
<div class="form-group col-sm-3">
    <label for="">Apellido</label>
    <input type="text" name="apellido" class="form-control" value="{{ isset($apellido)? $apellido :null}}" readonly>
</div>
<div class="form-group col-sm-3">
    <label for="">Cedula</label>
    <input type="text" name="ci" class="form-control" value="{{isset($cedula)? $cedula :null}}" readonly>
</div>
<div class="form-group col-sm-3">
    <label for="">Sexo</label>
    <input type="text" name="sexo" id="myTextBox" class="form-control" value="{{isset($sexo)? $sexo :null}}" readonly>
</div>
@if($sexo == 'F')
    <div class="form-group col-sm-3" id="embarazo">
            <label>Embarazo</label>
            <select class="form-control required" name="embarazo" id="embarazo">
                <option value="" >Seleccione una opción</option>
                <option value="t"

                >Si</option>
                <option value="f"

                >No</option>
            </select>
        </div>

        <div class="form-group col-sm-3" id="gestacion">
            <label>Tiempo de Gestación:</label>
            <input type="text" name="gestacion" class="form-control"  value="{{isset($gestacion)? $gestacion :null}}">
        </div>
    @endif
    <div class="form-group col-sm-3">
            <label for="">Fecha de Nacimiento</label>
            <input type="text" name="fecha_nac" class="form-control" value="{{isset($fecha)? $fecha :null}}" readonly>
    </div>
    <div class="form-group col-sm-3">
            <label for="">Estado Civil</label>
            <input type="text" name="estado_civil" class="form-control" value="{{isset($est)? $est :null}}" readonly>
    </div>
    <div class="form-group col-sm-3">
            <label for="">Nacionalidad</label>
            <input type="text" name="nacionalidad" class="form-control" value="{{isset($nac)? $nac :null}}" readonly>
    </div>
    <div class="form-group col-sm-3">
            <label for="">Email</label>
            <input type="text" name="email" class="form-control" value="" >
    </div>
    <div class="form-group col-sm-3">
            <label for="">Telefono</label>
            <input type="text" name="celular" required class="form-control" value="" >
    </div>
    <div class="form-group col-sm-3">
        <label>Parentesco</label>
        <select class="form-control required" readonly name="parentesco_id" id="parentesco_id">
            <option value="1" >Postulante</option>
        </select>
    </div>
    <div class="form-group col-sm-3">
            <label>Departamento</label>
            <select class="form-control required" readonly name="departamento" id="departamento">
                <option value="11" >Central</option>
            </select>
        </div>
        <div class="form-group col-sm-3">
                <label>Ciudad</label>
            <select class="form-control required" name="ciudad" id="ciudad" required>
                <option value="" >Seleccione una opcion</option>
                @foreach($ciudad as $ciu)
                <option value="{{$ciu->CiuId}}"
                >{{$ciu->CiuNom}} </option>
                @endforeach
            </select>
        </div>
    <div class="form-group col-sm-3">
            <label for="">Barrio</label>
            <input type="text" name="barrio" class="form-control" value="" required>
    </div>
    <div class="form-group col-sm-3">
            <label for="">Domicilio</label>
            <input type="text" name="domicilio_actual" class="form-control" value="" required>
    </div>
    <div class="form-group col-sm-3">
            <label for="">Ingreso</label>
            <input type="text" name="barrio" class="form-control" value="" required>
    </div>
    <div class="form-group col-sm-3">
            <label>Discapacidad:</label>
            <select class="form-control required" name="discapacidad" id="discapacidad">
                <option value="" >Seleccione una opcion</option>
                @foreach($discapacidad as $us)

                <option value="{{$us->id}}"
                >{{$us->name}} </option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-sm-3">
            <label>Enfermedad:</label>
            <select class="form-control required" name="enfermedad_id" id="enfermedad_id">
                <option value="" >Seleccione una opcion</option>
                @foreach($enfermedad as $en)

                <option value="{{$en->id}}"
                >{{$en->name}} </option>
                @endforeach
            </select>
        </div>
