<?php $__env->startSection('title', 'CRUD Laravel 8'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Productos</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="facturas/create" class="btn btn-primary mb-4" role="button">Crear</a>
                        <table id="productos" class="table mt-4 table-hover">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th scope="row"><?php echo e($producto->id); ?></th>
                                        <td><?php echo e($producto->descripcion); ?></td>
                                        <td>
                                            <div class="btn-toolbar" role="toolbar">
                                                <div class="btn-group mr-1" role="group">
                                                    <a href="/facturas/<?php echo e($producto->id); ?>/edit"
                                                        class="btn btn-secondary btn-sm" role="button">Editar</a>
                                                </div>
                                                <div class="btn-group mr-1" role="group">
                                                    <form action="<?php echo e(route('facturas.destroy', $producto->id)); ?>"
                                                        method="POST" class="formEliminar">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
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
    <?php echo \Livewire\Livewire::styles(); ?>

    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <?php echo \Livewire\Livewire::scripts(); ?>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('#productos').DataTable({
                "order": [
                    [0, "desc"]
                ],
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\inetpub\wwwroot\laravel8crud\resources\views/livewire/productos.blade.php ENDPATH**/ ?>