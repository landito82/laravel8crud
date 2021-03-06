@extends('adminlte::page')

@section('title', 'CRUD Laravel 8')

@section('content_header')
    <h1>Facturas</h1>
@stop

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="facturas/create" class="btn btn-primary mb-4" role="button">Crear</a>
                        <table id="facturas" class="table mt-4 table-hover">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($facturas as $factura)
                                    <tr>
                                        <th scope="row">{{ $factura->id }}</th>
                                        <td>{{ $factura->fecha }}</td>
                                        <td>{{ $factura->nombre }}</td>
                                        <td>{{ $factura->status }}</td>
                                        <td>
                                            <div class="btn-toolbar" role="toolbar">
                                                <div class="btn-group mr-1" role="group">
                                                    <a href="/facturas/{{ $factura->id }}/edit"
                                                        class="btn btn-secondary btn-sm" role="button">Editar</a>
                                                </div>
                                                <div class="btn-group mr-1" role="group">
                                                    <form action="{{ route('facturas.destroy', $factura->id) }}"
                                                        method="POST" class="formEliminar">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-danger btn-sm">Borrar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('#facturas').DataTable({
                "order": [[ 0, "desc" ]],
            });
        });
    </script>

    <script>
        // Confirmar eliminar registro
        (function() {
            'use strict'

            var forms = document.querySelectorAll('.formEliminar')
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        event.preventDefault()
                        event.stopPropagation()
                        Swal.fire({
                            title: '??Desea eliminar el registro?',
                            icon: 'error',
                            showCancelButton: true,
                            confirmButtonText: 'Eliminar',
                            confirmButtonColor: '#007bff',
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                this.submit();
                                //Swal.fire('Eliminado!', '', 'success')
                            }
                        })
                    }, false)
                })
        })()
    </script>
@stop
