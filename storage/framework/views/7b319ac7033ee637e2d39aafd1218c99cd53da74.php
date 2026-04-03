<?php if (! $__env->hasRenderedOnce('af97940e-7fce-4f64-8f51-9bda7089b966')): $__env->markAsRenderedOnce('af97940e-7fce-4f64-8f51-9bda7089b966');
$__env->startPush('styles'); ?>
    <style>
    </style>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('25967a9a-d653-44df-ace1-c2b8202d8499')): $__env->markAsRenderedOnce('25967a9a-d653-44df-ace1-c2b8202d8499');
$__env->startPush('scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        function goToLogin(email)
        {

            Swal.fire({
                title: 'Access Publisher Account',
                text: "If you access publisher account. Then Admin account will be logout. Do you want to access?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Login'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Please Wait!',
                        text: "Your publisher account will be access is few minutes.",
                        showConfirmButton: false,
                    });
                    window.location.href = `<?php echo e(url('/')); ?>/<?php echo e(\App\Helper\Static\Vars::ADMIN_ROUTE); ?>/access-login/${email}`;
                }
            })
        }
        $(function () {

            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            

            $('#datatablePublisher').dataTable({
                order:          [[1, 'desc']],
                scrollY:        true,
                scrollX:        true,
                scrollCollapse: true,
                paging:         true,
                autoWidth:      true,
                deferRender:    true,
                sScrollXInner:  "99.5%",
                ajax: {
                    url: "<?php echo e(route('admin.publisher-management.publishers.index', ['status' => $status->value])); ?>",
                },
                columns: [
                    {data: 'created_at', name: 'created_at'},
                    {data: 'sid', name: 'sid', width: "15%"},
                    {data: 'first_name', name: 'first_name', width: "15%"},
                    {data: 'last_name', name: 'last_name', width: "15%"},
                    {data: 'user_name', name: 'user_name', width: "15%"},
                    {data: 'email', name: 'email', width: "25%"},
                    {data: 'status', name: 'status', width: "1%"},
                    {data: 'access_login', name: 'access_login', width: "10%"},
                    {data: 'action', name: 'action', orderable: false, searchable: false, width: "0%"},
                ],
                columnDefs: [{
                    'targets': 0,
                    'checkboxes': {
                        'selectRow': false
                    }
                }],
                buttons: []
            });

        });
    </script>
<?php $__env->stopPush(); endif; ?>

<?php $__env->startSection("content"); ?>

    <div class="contents">

        <div class="container-fluid">
            <div class="social-dash-wrap">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title"><?php echo e(ucwords($status->value)); ?> <?php echo e(trans('cruds.publisher.title')); ?></h4>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_create')): ?>
                                <div class="breadcrumb-action justify-content-center flex-wrap">
                                    <div class="action-btn">
                                        <a href="<?php echo e(route("admin.user-management.users.create")); ?>" class="btn btn-sm btn-primary btn-add">
                                            <i class="la la-plus"></i> <?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.publisher.title_singular')); ?>

                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">

                                <?php echo $__env->make("partial.admin.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <table class="table table table-condensed table-bordered table-striped table-hover datatable"
                                       id="datatablePublisher">
                                    <thead>
                                        <tr class="userDatatable-header footable-header">
                                            <th>
                                                <?php echo e(trans('cruds.publisher.fields.created_at')); ?>

                                            </th>
                                            <th>
                                                <?php echo e(trans('cruds.publisher.fields.sid')); ?>

                                            </th>
                                            <th>
                                                <?php echo e(trans('cruds.publisher.fields.first_name')); ?>

                                            </th>
                                            <th>
                                                <?php echo e(trans('cruds.publisher.fields.last_name')); ?>

                                            </th>
                                            <th>
                                                <?php echo e(trans('cruds.publisher.fields.user_name')); ?>

                                            </th>
                                            <th>
                                                <?php echo e(trans('cruds.publisher.fields.email')); ?>

                                            </th>
                                            <th>
                                                <?php echo e(trans('cruds.publisher.fields.status')); ?>

                                            </th>
                                            <th>
                                                <?php echo e(trans('cruds.publisher.fields.access_login')); ?>

                                            </th>
                                            <th>
                                                <?php echo e(trans('global.action')); ?>

                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.admin.panel_table", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Downloads\application\resources\views/template/admin/publishers/index.blade.php ENDPATH**/ ?>