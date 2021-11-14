

<?php $__env->startSection('title', 'CRUD Laravel 8'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Facturas</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

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
                                <?php $__currentLoopData = $facturas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $factura): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th scope="row"><?php echo e($factura->id); ?></th>
                                        <td><?php echo e($factura->fecha); ?></td>
                                        <td><?php echo e($factura->nombre); ?></td>
                                        <td><?php echo e($factura->status); ?></td>
                                        <td>
                                            <div class="btn-toolbar" role="toolbar">
                                                <div class="btn-group mr-1" role="group">
                                                    <a href="/facturas/<?php echo e($factura->id); ?>/edit"
                                                        class="btn btn-secondary btn-sm" role="button">Editar</a>
                                                </div>
                                                <div class="btn-group mr-1" role="group">
                                                    <form action="<?php echo e(route('facturas.destroy', $factura->id)); ?>"
                                                        method="POST" class="formEliminar">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit"
                                                            class="btn btn-danger btn-sm">Borrar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
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
                            title: '¿Desea eliminar el registro?',
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\inetpub\wwwroot\laravel8crud\resources\views/factura/index.blade.php ENDPATH**/ ?>