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
            <form action="/formulario" method="post" enctype="multipart/form-data">
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
                <button class="btn btn-primary nextBtn pull-right" type="button">Siguiente</button>
            </div>
        </div>
        <div class="panel panel-primary setup-content" id="step-4">
                <div class="panel-heading">
                     <h3 class="panel-title">Adjuntos</h3>
                </div>
                <div class="panel-body">
                    @include('adjuntos')
                    <button class="btn btn-success pull-right" type="submit">Enviar!</button>
                </div>
            </div>

    <!--    <div class="panel panel-primary setup-content" id="step-2">
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
                <button class="btn btn-primary nextBtn pull-right" type="button">Siguiente</button>
            </div>
        </div>

        <div class="panel panel-primary setup-content" id="step-4">
            <div class="panel-heading">
                 <h3 class="panel-title">Adjuntos</h3>
            </div>
            <div class="panel-body">
                @include('adjuntos')
                <button class="btn btn-success pull-right" type="submit">Enviar!</button>
            </div>
        </div> -->

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
                    <input type="text" class="form-control" name="ocupacion" id="ocupacion" placeholder="Ingrese Ocupación">
                    </div>
                  </div>
                  <div class="row">
                        <div class="form-group col-sm-6">
                        <label for="">Correo</label>
                        <input type="text" class="form-control" name="ocupacion" id="ocupacion" placeholder="Ingrese Ocupación">
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Parentesco</label>
                            <select class="form-control required" name="parentesco_id" id="parentesco_id">
                                <option value="" >Seleccione una opcion</option>
                                @foreach($parentesco as $us)

                                <option value="{{$us->id}}"
                                >{{$us->name}} </option>
                                @endforeach
                            </select>
                        </div>
                  </div>
                  <div class="row">
                        <div class="form-group col-sm-6">
                                <label>Discapacidad:</label>
                                <select class="form-control required" name="discapacidad" id="discapacidad">
                                    <option value="" >Seleccione una opcion</option>
                                    @foreach($discapacidad as $us)

                                    <option value="{{$us->id}}"
                                    >{{$us->name}} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Enfermedad:</label>
                                <select class="form-control required" name="enfermedad_id" id="enfermedad_id">
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
                        <input type="text" class="form-control" name="ingreso" id="ingreso" placeholder="Ingrese Ocupación">
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

        //alert('funciona');
        $('#save').click(function(){
            //alert('funciona');
            var cedula = $('#cedulamiembro').val();
            var ocupacion = $('#ocupacion').val();
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

            if($('#ingreso').val() == '')
            {
                error_first_ingreso = 'Ingreso Requerido';
            $('#error_first_ingreso').text(error_first_ingreso);
            $('#ingreso').css('border-color', '#cc0000');
            first_name_ingreso = '';
            }
            else
            {
                error_first_ingreso = '';
            $('#error_first_ingreso').text(error_first_ingreso);
            $('#ingreso').css('border-color', '');
            first_name_ingreso = $('#ingreso').val();
            }





            $.ajax({
                    url: '{{URL::to('/miembros')}}/ajax/'+cedula,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        //alert(data.cedula);
                        count = count + 1;
                        output = '<tr id="row_'+count+'">';
                        output += '<td>'+data.cedula+' <input type="hidden" name="hidden_first_name[]" id="first_name'+count+'" class="first_name" value="'+first_name+'" /></td>';
                        output += '<td>'+data.nombres+' '+data.apellido+' <input type="hidden" name="hidden_last_name[]" id="last_name'+count+'" value="'+last_name+'" /></td>';
                        output += '<td>'+first_name+' <input type="hidden" name="hidden_first_name[]" id="first_name'+count+'" class="first_name" value="'+first_name+'" /></td>';
                        output += '<td>'+data.sexo+' <input type="hidden" name="hidden_last_name[]" id="last_name'+count+'" value="'+last_name+'" /></td>';
                        output += '<td>'+first_name+' <input type="hidden" name="hidden_first_name[]" id="first_name'+count+'" class="first_name" value="'+first_name+'" /></td>';
                        output += '<td>'+ocupacion+' <input type="hidden" name="hidden_last_name[]" id="last_name'+count+'" value="'+last_name+'" /></td>';
                        output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+count+'">Remove</button></td>';
                        output += '</tr>';
                        $('#user_data').append(output);
                        $('#myModal').modal('toggle');
                    }
                });

        });

        $(document).on('click', '.remove_details', function(){
        var row_id = $(this).attr("id");
        if(confirm("Are you sure you want to remove this row data?"))
        {
        $('#row_'+row_id+'').remove();
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
        curInputs = curStep.find("input[type='text'],input[type='url']"),
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
