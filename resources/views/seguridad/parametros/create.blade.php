@extends('adminlte::page')

@section('title', 'Crear parametro')

@section('content_header')
<h1 class="text-center"> Crear parametro</h1>
<h1 class="bg-dark border-1 border-top border"></h1>
@stop

@section('content')
<form actions="{{route('parametros.store')}}" method="POST">
@csrf

<div class="row">
    <div class="col-sm-6 col-xs-12">
        <div class="form-group has-primary">
        <label for="parametro">Parametro:</label>
        <input 
        type="text"
        id="parametro"
        class="from-control"
        placeholder="ingrese el nombre del parametro..."
        name="parametro"
        :value="old('parametro')"
        autofocus
        >
        </div>
        @if ($errors->has('parametro'))
        <div
                 id="parametro-error"
                class="error text-danger pl-3"
                 for="parametro"
                 style="display: block:"
        >
        <strong>{{$errors->firs('parametro')}}</strong>
        </div>
        @endif
    </div>
    <div class="col-sm-6 col-xs-12">
        <div class="form-group has-primary">
        <label for="valor">Valor:</label>
        <input 
        type="text"
        id="valor"
        class="from-control"
        placeholder="ingrese el nombre del valor..."
        name="valor"
        :value="old('valor')"
        autofocus
        >
        </div>
        @if ($errors->has('valor'))
        <div
                 id="valor-error"
                class="error text-danger pl-3"
                 for="valor"
                 style="display: block:"
        >
        <strong>{{$errors->firs('valor')}}</strong>
        </div>
        @endif
    </div>
</div>

</form>
@stop

@section('css')
@stop

@section('js')
@stop