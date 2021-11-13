@extends('adminlte::page')

@section('title', 'CRUD Laravel 8')

@section('content_header')
    <h1>Crear Registro</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="/clientes" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre">
                            </div>
                            <div class="form-group">
                                <label for="rnc" class="form-label">RNC/Cedula</label>
                                <input type="text" class="form-control" id="rnc" name="rnc">
                            </div>
                            <div class="form-group">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono">
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">Correo</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="direccion" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion">
                            </div>
                            <a href="/clientes" class="btn btn-secondary" role="button">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link href="/css/admin_custom.css" rel="stylesheet" >
@stop

@section('js')
@stop
