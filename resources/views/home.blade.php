{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
<div class="container">

    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step col-xs-3">
                <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                <p><small>Postulante</small></p>
            </div>
            <div class="stepwizard-step col-xs-3">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p><small>Miembros</small></p>
            </div>
            <div class="stepwizard-step col-xs-3">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p><small>Cuestionario</small></p>
            </div>
            <div class="stepwizard-step col-xs-3">
                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                <p><small>Adjuntos</small></p>
            </div>
        </div>
    </div>


        <div class="panel panel-primary setup-content" id="step-1">
            <div class="panel-heading">
                 <h3 class="panel-title">Postulante</h3>
            </div>
            <div class="panel-body">
                <div class="row">
            <form action="/formulario" method="post" id="my-form" enctype="multipart/form-data" xl-form>
                @csrf
                @include('postulante')
                </div>
                <button class="btn btn-primary nextBtn pull-right" type="button">Siguiente</button>
            </div>
        </div>
        <div class="panel panel-primary setup-content" id="step-2">
                <div class="panel-heading">
                     <h3 class="panel-title">Miembros</h3>
                </div>
                <div class="panel-body">
                    @include('miembros')
                    <button class="btn btn-primary nextBtn pull-right" type="button">Siguiente</button>
                </div>
            </div>
        <div class="panel panel-primary setup-content" id="step-3">
            <div class="panel-heading">
                    <h3 class="panel-title">Cuestionario</h3>
            </div>
            <div class="panel-body">
                @include('cuestionario')
                <button class="btn btn-primary nextBtn cuestionario pull-right" type="button">Siguiente</button>
            </div>
        </div>
        <div class="panel panel-primary setup-content" id="step-4">
                <div class="panel-heading">
                     <h3 class="panel-title">Adjuntos</h3>
                </div>
                <div class="panel-body">
                    @include('adjuntos')
                    <button class="btn btn-success pull-right" id="sendmemessage" type="submit">Enviar!</button>
                </div>
            </div>
    </form>
</div>

<div class="example-modal" >
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 style="font-weight: bold;" class="modal-title">Agregar Miembro</h4>
              </div>
              <div class="modal-body">
                <form action="/addmiembro" method="get">
                <input type="text" hidden name="postulante" value="">
                  <div class="form-group">
                    <label for="">Ingrese Cedula</label>
                    <input type="text" class="form-control" name="cedulamiembro" id="cedulamiembro" placeholder="Ingrese Cédula">
                    <span id="error_first_name" class="text-danger"></span>
                </div>
                  <div class="row">
                    <div class="form-group col-sm-6">
                    <label for="">Ingrese Ocupacion</label>
                    <input type="text" class="form-control" name="ocupacion" id="ocupacion" placeholder="Ingrese Ocupación">
                    <span id="error_first_ocupacion" class="text-danger"></span>
                    </div>
                    <div class="form-group col-sm-6">
                    <label for="">Telefono</label>
                    <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Ingrese Telefono">
                    </div>
                  </div>
                  <div class="row">
                        <div class="form-group col-sm-6">
                        <label for="">Correo</label>
                        <input type="text" class="form-control" name="emailmiembro" id="emailmiembro" placeholder="Ingrese Correo">
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Parentesco</label>
                            <select class="form-control required" name="parentesco_idmiembro" id="parentesco_idmiembro">
                                <option value="" >Seleccione una opcion</option>
                                @foreach($parentesco as $us)
                                <option value="{{$us->id}}"
                                >{{$us->name}} </option>
                                @endforeach
                            </select>
                            <span id="error_first_parentesco_id" class="text-danger"></span>
                        </div>
                  </div>
                  <div class="row">
                        <div class="form-group col-sm-6">
                                <label>Discapacidad:</label>
                                <select class="form-control required" name="discapacidadmiembro" id="discapacidadmiembro">
                                    <option value="" >Seleccione una opcion</option>
                                    @foreach($discapacidad as $us)

                                    <option value="{{$us->id}}"
                                    >{{$us->name}} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Enfermedad:</label>
                                <select class="form-control required" name="enfermedad_idmiembro" id="enfermedad_idmiembro">
                                    <option value="" >Seleccione una opcion</option>
                                    @foreach($enfermedad as $en)

                                    <option value="{{$en->id}}"
                                    >{{$en->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                  </div>
                  <div class="row">
                        <div class="form-group col-sm-6">
                        <label>Escolaridad</label>
                        <select class="form-control required" name="institucion_id" id="institucion_id">
                            <option value="" >Seleccione una opción</option>
                            @foreach($escolaridad as $es)
                                <option value="{{$es->id}}"

                                >{{$es->name}} </option>
                                @endforeach
                            </select>
                            <span id="error_first_institucion_id" class="text-danger"></span>
                        </div>
                        <div class="form-group col-sm-6">
                        <label for="">Ingreso Mensual</label>
                        <input type="text" class="form-control" name="ingresomiembro" id="ingresomiembro" placeholder="Ingrese Ingreso Mensual">
                        <span id="error_first_ingreso" class="text-danger"></span>
                        </div>
                  </div>
              </div>
                <div class="modal-footer">
                <input type="button" class="btn " name="save" id="save"  value="Aceptar"/>
              </div>
            </form>
            </div>
        </div>
    </div>
</div>
@stop



@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
    /* Latest compiled and minified CSS included as External Resource*/

/* Optional theme */

/*@import url('//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css');*/
 body {

}

.disabled {
  pointer-events: none;
  cursor: default;
  opacity: 0.6;
}
.stepwizard-step p {
    margin-top: 0px;
    color:#666;
}
.stepwizard-row {
    display: table-row;
}
.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}
.stepwizard-step button[disabled] {
    /*opacity: 1 !important;
    filter: alpha(opacity=100) !important;*/
}
.stepwizard .btn.disabled, .stepwizard .btn[disabled], .stepwizard fieldset[disabled] .btn {
    opacity:1 !important;
    color:#bbb;
}
.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content:" ";
    width: 100%;
    height: 1px;
    background-color: none;
    z-index: 0;
}
.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}
.btn-circle {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 15px;
}
    </style>
@stop

@section('js')
    <script src="{{asset('js/jquery.numeric.js')}}"></script>
    <script type="text/javascript">

    $("#nroexp").numeric({ decimal: false });
    $("#ingreso").numeric({ decimal: false });
    $("#ingresomiembro").numeric({ decimal: false });


    </script>
    <script> console.log('Hi!');
        $(".announce").click(function(){ // Click to only happen on announce links
            $('#myModal').modal('show');
        });
    </script>
    <script>
    $(document).ready(function () {
        var count = 0;
        var first_name = 'Piter';
        var last_name = 'Acosta';

        var jsonStr = '{"miembros":[]}';
        var obj = JSON.parse(jsonStr);

        function getSelectedText(elementId) {
            var elt = document.getElementById(elementId);

            if (elt.selectedIndex == -1)
                return null;

            return elt.options[elt.selectedIndex].text;
        }
        //alert('funciona');
        $('#save').click(function(){
            //alert('funciona');
            function getSelectedText(elementId) {
    var elt = document.getElementById(elementId);

    if (elt.selectedIndex == -1)
        return null;

    return elt.options[elt.selectedIndex].text;
}

            var cedula = $('#cedulamiembro').val();
            var ocupacion = $('#ocupacion').val();
            var parentesco = $('#parentesco_idmiembro').val();
            var escolaridad = $('#institucion_id').val();
            var ingreso = $('#ingresomiembro').val();
            var telefono = $('#telefono').val();
            var correo = $('#emailmiembro').val();
            var parentesco_text = getSelectedText('parentesco_idmiembro');
            var escolaridad_text = getSelectedText('institucion_id');
            var enfermedad = getSelectedText('enfermedad_idmiembro');
            var discapacidad = getSelectedText('discapacidadmiembro');
            var error_first_name = '';
            var error_first_ocupacion = '';

            if($('#cedulamiembro').val() == '')
            {
            error_first_name = 'Cedula es Requerida';
            $('#error_first_name').text(error_first_name);
            $('#cedulamiembro').css('border-color', '#cc0000');
            first_name = '';
            }
            else
            {
            error_first_name = '';
            $('#error_first_name').text(error_first_name);
            $('#cedulamiembro').css('border-color', '');
            first_name = $('#cedulamiembro').val();
            }

            if($('#ocupacion').val() == '')
            {
            error_first_ocupacion = 'Ocupación es Requerida';
            $('#error_first_ocupacion').text(error_first_ocupacion);
            $('#ocupacion').css('border-color', '#cc0000');
            first_name_ocupacion = '';
            }
            else
            {
            error_first_ocupacion = '';
            $('#error_first_ocupacion').text(error_first_ocupacion);
            $('#ocupacion').css('border-color', '');
            first_name_ocupacion = $('#ocupacion').val();
            }

            if($('#institucion_id').val() == '')
            {
            error_first_institucion_id = 'Escolaridad es Requerida';
            $('#error_first_institucion_id').text(error_first_institucion_id);
            $('#institucion_id').css('border-color', '#cc0000');
            first_name_institucion_id = '';
            }
            else
            {
            error_first_institucion_id = '';
            $('#error_first_institucion_id').text(error_first_institucion_id);
            $('#institucion_id').css('border-color', '');
            first_name_institucion_id = $('#institucion_id').val();
            }

            if($('#parentesco_idmiembro').val() == '')
            {
            error_first_parentesco_id = 'Parentesco Requerido';
            $('#error_first_parentesco_id').text(error_first_parentesco_id);
            $('#parentesco_idmiembro').css('border-color', '#cc0000');
            first_name_parentesco_id = '';
            }
            else
            {
            error_first_parentesco_id = '';
            $('#error_first_parentesco_id').text(error_first_parentesco_id);
            $('#parentesco_idmiembro').css('border-color', '');
            first_name_parentesco_id = $('#parentesco_idmiembro').val();
            }

            if($('#ingresomiembro').val() == '')
            {
            error_first_ingreso = 'Ingreso Requerido';
            $('#error_first_ingreso').text(error_first_ingreso);
            $('#ingresomiembro').css('border-color', '#cc0000');
            first_name_ingreso = '';
            }
            else
            {
            error_first_ingreso = '';
            $('#error_first_ingreso').text(error_first_ingreso);
            $('#ingresomiembro').css('border-color', '');
            first_name_ingreso = $('#ingresomiembro').val();
            }



            if($('#cedulamiembro').val() != '' &&  $('#ocupacion').val() != '' && $('#institucion_id').val() != '' && $('#parentesco_idmiembro').val() != '' && $('#ingresomiembro').val() != ''){


            $.ajax({
                    url: '{{URL::to('/miembros')}}/ajax/'+cedula,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        //alert(data.cedula);
                        count = count + 1;
                        //output = '<input type="text" name="cedulamiembro" value="abc">'
                        output = '<tr id="row_'+count+'">';
                        output += '<td>'+data.cedula+' <input type="hidden" name="hidden_first_name[]" id="cedulamiembro'+count+'" class="first_name" value="'+first_name+'" /></td>';
                        output += '<td>'+data.nombres+' '+data.apellido+' <input type="hidden" name="hidden_last_name[]" id="last_name'+count+'" value="'+last_name+'" /></td>';
                        output += '<td>'+parentesco_text+' <input type="hidden" name="hidden_first_name[]" id="first_name'+count+'" class="first_name" value="'+parentesco+'" /></td>';
                        output += '<td>'+data.sexo+' <input type="hidden" name="hidden_last_name[]" id="last_name'+count+'" value="'+last_name+'" /></td>';
                        output += '<td>'+escolaridad_text+' <input type="hidden" name="hidden_first_name[]" id="escolaridad'+count+'" class="first_name" value="'+escolaridad+'" /></td>';
                        output += '<td>'+ocupacion+' <input type="hidden" name="hidden_last_name[]" id="last_name'+count+'" value="'+last_name+'" /></td>';
                        output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+count+'">Eliminar</button></td>';
                        output += '</tr>';
                        //jsonObj.miembros['cedula'] = data.cedula;
                        obj['miembros'].push({"id":count,"cedula":data.cedula,"nombre":data.nombres,"apellido":data.nombres,"parentesco":parentesco_text,
                                                "sexo":data.sexo,"escolaridad":escolaridad_text,"ocupacion":ocupacion,"ingreso":ingreso,
                                                "correo":correo,"telefono":telefono,"enfermedad":enfermedad,"discapacidad":discapacidad});
                        jsonStr = JSON.stringify(obj);


                        $('#user_data').append(output);
                        document.getElementById("datosmiembros").value = jsonStr;
                        $('#myModal').modal('toggle');

                        $('#cedulamiembro').val('');
                        $('#ocupacion').val('');
                        $('#institucion_id').val('');

                        $('#institucion_id').val('');
                        $('#parentesco_idmiembro').val('');
                        $('#ingresomiembro').val('');

                        $('#telefono').val('');
                        $('#emailmiembro').val('');
                        $('#discapacidadmiembro').val('');

                        $('#enfermedad_idmiembro').val('');

                    }
                });
            }

        });



        $(document).on('click', '.remove_details', function(){
        var row_id = $(this).attr("id");
        if(confirm("Esta seguro que quiere eliminar los datos?"))
        {
        $('#row_'+row_id+'').remove();
        delete obj['miembros'][row_id];
        jsonStr = JSON.stringify(obj);
        console.log(jsonStr);
        //jsonStr.delete[row_id];
        //console.log(jsonStr);
        }
        else
        {
        return false;
        }
        });

    var navListItems = $('div.setup-panel div a'),
    allWells = $('.setup-content'),
    allNextBtn = $('.nextBtn');

allWells.hide();

navListItems.click(function (e) {
    e.preventDefault();
    var $target = $($(this).attr('href')),
        $item = $(this);

    if (!$item.hasClass('disabled')) {
        navListItems.removeClass('btn-success').addClass('btn-default');
        $item.addClass('btn-success');
        allWells.hide();
        $target.show();
        $target.find('input:eq(0)').focus();
    }
});

allNextBtn.click(function () {
    var curStep = $(this).closest(".setup-content"),
        curStepBtn = curStep.attr("id"),
        nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
        curInputs = curStep.find("input[type='text'],input[type='url'],input[type='radio'],select"),
        isValid = true;

    $(".form-group").removeClass("has-error");
    for (var i = 0; i < curInputs.length; i++) {
        if (!curInputs[i].validity.valid) {
            isValid = false;
            $(curInputs[i]).closest(".form-group").addClass("has-error");
        }
    }

    if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
});

$('div.setup-panel div a.btn-success').trigger('click');
});
    </script>

@stop
