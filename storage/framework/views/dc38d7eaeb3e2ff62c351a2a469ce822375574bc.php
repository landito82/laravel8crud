

<?php $__env->startSection('title', 'CRUD Laravel 8'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Editar Registro</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="/clientes/<?php echo e($cliente->id); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="form-group">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo e($cliente->nombre); ?>">
                            </div>
                            <div class="form-group">
                                <label for="rnc" class="form-label">RNC/Cedula</label>
                                <input type="text" class="form-control" id="rnc" name="rnc" value="<?php echo e($cliente->rnc); ?>">
                            </div>
                            <div class="form-group">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo e($cliente->telefono); ?>">
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">Correo</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?php echo e($cliente->email); ?>">
                            </div>
                            <div class="form-group">
                                <label for="direccion" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo e($cliente->direccion); ?>">
                            </div>
                            <div class="form-group">
                                <label for="status" class="form-label">Status</label>
                                <input type="text" class="form-control" id="status" name="status"
                                    value="<?php echo e($cliente->status); ?>">
                            </div>
                            <a href="/clientes" class="btn btn-secondary" role="button">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="/css/admin_custom.css" rel="stylesheet" >
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet"  crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css" rel="stylesheet" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script type="text/javascript">
        $(function () {
            $('#datetimepicker1').datetimepicker({
                format:'YYYY-MM-DD'
            });
        });
    </script>    
    <script type="text/javascript">
        $(document).ready(function() {
            $('#cliente_id').select2({
                placeholder: '--Seleccione--',
                theme: 'bootstrap4',

            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\inetpub\wwwroot\laravel8crud\resources\views/cliente/edit.blade.php ENDPATH**/ ?>