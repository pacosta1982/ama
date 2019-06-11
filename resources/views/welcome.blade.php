{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
<section class="invoice">
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

