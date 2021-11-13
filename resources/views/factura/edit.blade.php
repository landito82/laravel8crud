@extends('adminlte::page')

@section('title', 'CRUD Laravel 8')

@section('content_header')
    <h1>Editar Registro</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="/facturas/{{ $factura->id }}" method="POST" class="needs-validation" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="fecha" class="form-label">Fecha</label>
                                <input type="text" class="form-control datetimepicker-input" id="fecha" name="fecha" value="{{ $factura->fecha }}" data-toggle="datetimepicker" data-target="#fecha" required/>
                                <div class="invalid-feedback">
                                    Por favor seleccione un fecha.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cliente_id" class="form-label">Cliente</label>
                                <select class="form-control select2bs4" id="cliente_id" name="cliente_id" required>
                                    <option value="{{ $factura->cliente_id }}" selected="selected">{{ $factura->nombre }}</option>
                                </select>
                                <div class="invalid-feedback">
                                    Por favor seleccione un cliente.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status" class="form-label">Status</label>
                                <input type="text" class="form-control" id="status" name="status"
                                    value="{{ $factura->status }}" required>
                                    <div class="invalid-feedback">
                                        Por favor seleccione un status.
                                    </div>
                                </div>
                            <a href="/facturas" class="btn btn-secondary" role="button">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link href="/css/admin_custom.css" rel="stylesheet">
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css"
        rel="stylesheet" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css"
        rel="stylesheet" />
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script type="text/javascript">
        $(function() {
            $('#fecha').datetimepicker({
                format: 'YYYY-MM-DD'
            });
        });
    </script>

    <script type="text/javascript">
        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function() {
            $("#cliente_id").select2({
                placeholder: '--Seleccione--',
                theme: 'bootstrap4',
                ajax: {
                    url: "{{ route('getClientes') }}",
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term // search term
                        };
                    },
                    processResults: function(response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }
            });
        });
    </script>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
@stop
