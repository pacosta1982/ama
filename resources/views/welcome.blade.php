{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
<section class="invoice">
        @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif
        @if(Session::has('error'))
        <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
        @endif
        <h2>Formulario de Inscripción AMA</h2>
    <form action="/filtros" method="post">
        @csrf
        <div class="row no-print">
          <div class="col-xs-12">
            <div class="input-group input-group-sm">
            <input type="number" id="nroexp" required maxlength="8" name="NroExp" value="" placeholder="Ingrese N° de Cedula" class="form-control">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
          </div>
        </div>
    </form>
  </section>
@stop

