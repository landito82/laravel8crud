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
                        <form action="/articulos" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="codigo" class="form-label">Codigo</label>
                                <input type="text" class="form-control" id="codigo" name="codigo">
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripcion</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion">
                            </div>
                            <div class="mb-3">
                                <label for="cantidad" class="form-label">Cantidad</label>
                                <input type="number" class="form-control" id="cantidad" name="cantidad">
                            </div>
                            <div class="mb-3">
                                <label for="precio" class="form-label">Precio</label>
                                <input type="number" class="form-control" id="precio" name="precio" value="0.00">
                            </div>
                            <a href="/articulos" class="btn btn-secondary" role="button">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
