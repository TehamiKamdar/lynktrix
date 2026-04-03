<?php if (! $__env->hasRenderedOnce('663f5e55-dd05-4a7b-ae0c-610a1d171393')): $__env->markAsRenderedOnce('663f5e55-dd05-4a7b-ae0c-610a1d171393');
$__env->startPush('styles'); ?>
    <style>
    </style>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('93a3c839-ed1a-4f2e-8a00-434b8ffe77a9')): $__env->markAsRenderedOnce('93a3c839-ed1a-4f2e-8a00-434b8ffe77a9');
$__env->startPush('scripts'); ?>
    <script type="text/javascript">

        function sendStatusData(ids, status)
        {
            $.ajax({
                url: "<?php echo e(route('admin.approval.statusUpdate')); ?>",
                type: 'POST',
                headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
                data: { a_id: ids, status: status }
            }).done(function () { location.reload() });
        }

        $(function () {

            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

            function statusChange(status, approveButtonTrans, color)
            {
                let approveButton = {
                    text: approveButtonTrans,
                    className: `btn-${color} btn-xs ml-3`,
                    action: function (e, dt, node, config) {
                        let ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                            return $(entry).attr("id");
                        });
                        if (ids.length === 0) {
                            alert('<?php echo e(trans('global.datatables.zero_selected')); ?>')
                            return
                        }
                        if (confirm('<?php echo e(trans('global.areYouSure')); ?>')) {
                            sendStatusData(ids, status)
                        }
                    }
                }
                dtButtons.push(approveButton)
            }

            <?php if($status->value == \App\Models\AdvertiserApply::STATUS_PENDING): ?>

                statusChange("<?php echo e(\App\Models\AdvertiserApply::STATUS_ACTIVE); ?>", "Approve", "success")
                statusChange("<?php echo e(\App\Models\AdvertiserApply::STATUS_HOLD); ?>", "Hold", "info")
                statusChange("<?php echo e(\App\Models\AdvertiserApply::STATUS_REJECTED); ?>", "Reject", "danger")

            <?php elseif($status->value == \App\Models\AdvertiserApply::STATUS_REJECTED): ?>

                statusChange("<?php echo e(\App\Models\AdvertiserApply::STATUS_ACTIVE); ?>", "Approve", "success")
                statusChange("<?php echo e(\App\Models\AdvertiserApply::STATUS_HOLD); ?>", "Hold", "info")

            <?php elseif($status->value == \App\Models\AdvertiserApply::STATUS_HOLD || $status->value == \App\Models\AdvertiserApply::STATUS_ADMITAD_HOLD): ?>

                statusChange("<?php echo e(\App\Models\AdvertiserApply::STATUS_ACTIVE); ?>", "Approve", "success")
                statusChange("<?php echo e(\App\Models\AdvertiserApply::STATUS_REJECTED); ?>", "Reject", "danger")

            <?php elseif($status->value == \App\Models\AdvertiserApply::STATUS_ACTIVE): ?>

                statusChange("<?php echo e(\App\Models\AdvertiserApply::STATUS_HOLD); ?>", "Hold", "info")
                statusChange("<?php echo e(\App\Models\AdvertiserApply::STATUS_REJECTED); ?>", "Reject", "danger")

            <?php endif; ?>

            $('#datatableApplyAdvertiser').dataTable({
    order:          [[8, 'desc']],
    scrollY:        true,
    scrollX:        true,
    scrollCollapse: true,
    paging:         true,
    autoWidth:      true,
    deferRender:    true,
    processing:     true,
    serverSide:     true,
    sScrollXInner:  "99.5%",
    pageLength:     50,  // Set default pagination to 50 per page
    lengthMenu:     [25, 50, 100, 200],  // Allow users to choose 25, 50, 100, or 200 per page
    ajax: {
        url: "<?php echo e(route('admin.approval.index', ['status' => $status->value])); ?>",
        data: function (d) {
            d.source = $('#source').val();
            d.country = $('#country').val();
            d.on_demand_status = $('#on_demand_status').val();
        }
    },
    columns: [
        {data: 'id', name: 'id', width: "1%"},
        {data: 'created_at', name: 'created_at'},
        {data: 'source', name: 'source'},
        {data: 'advertiser_sid', name: 'advertiser_sid'},
        {data: 'advertiser_name', name: 'advertiser_name'},
        {data: 'publisher_website', name: 'publisher_website', orderable: false, searchable: false},
        {data: 'primary_region', name: 'primary_region'},
        {data: 'type', name: 'type'},
        {data: 'on_demand_status', name: 'on_demand_status'},
        {data: 'action', name: 'action', orderable: false, searchable: false, width: "0%"},
    ],
    buttons: dtButtons
});

            $('#on_demand_status').change(() => {
                $('#datatableApplyAdvertiser').DataTable().draw();
            });

            $('#source').change(() => {
                $('#datatableApplyAdvertiser').DataTable().draw();
                $(this).val();
            });

            $('#country').change(() => {
                $('#datatableApplyAdvertiser').DataTable().draw();
            });
        });
    </script>
<?php $__env->stopPush(); endif; ?>

<?php $__env->startSection("content"); ?>

    <div class="contents">

        <div class="container-fluid">
            <div class="social-dash-wrap">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title"><?php echo e(trans('advertiser.approval.title')); ?> <?php echo e(ucwords(str_replace("_", " ", $status->value))); ?> <?php echo e(trans('global.list')); ?></h4>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="breadcrumb-main">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <select class="js-example-basic-single js-states form-control" id="on_demand_status" name="on_demand_status">
                                            <option value="" disabled selected>Select On Demand Status</option>
                                            <option value="active">Active</option>
                                            <option value="not_active">Not Active</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <select class="js-example-basic-single js-states form-control" id="source" name="source">
                                            <option value="" disabled selected>Select Source</option>
                                            <?php $__currentLoopData = \App\Helper\Static\Vars::OPTION_LIST; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($list); ?>"><?php echo e(ucwords($list)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <select class="js-example-basic-single js-states form-control" id="country" name="country">
                                            <option value="" disabled selected>Select Country</option>
                                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($country['iso2']); ?>"><?php echo e($country['name']); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">

                                <?php echo $__env->make("partial.admin.alert", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <table class="table table table-condensed table-bordered table-striped table-hover datatable"
                                       id="datatableApplyAdvertiser">
                                    <thead>
                                        <tr class="userDatatable-header footable-header">
                                            <th></th>
                                            <th>
                                                <?php echo e(trans('advertiser.approval.fields.created_at')); ?>

                                            </th>
                                            <th>
                                                <?php echo e(trans('advertiser.approval.fields.network_name')); ?>

                                            </th>
                                            <th>
                                                <?php echo e(trans('advertiser.approval.fields.advertiser_id')); ?>

                                            </th>
                                            <th>
                                                <?php echo e(trans('advertiser.approval.fields.advertiser_name')); ?>

                                            </th>
                                            <th>
                                                <?php echo e(trans('advertiser.approval.fields.publisher_website')); ?>

                                            </th>
                                            <th>
                                                <?php echo e(trans('advertiser.approval.fields.primary_region')); ?>

                                            </th>
                                            <th>
                                                <?php echo e(trans('advertiser.approval.fields.type')); ?>

                                            </th>
                                            <th>
                                                <?php echo e(trans('advertiser.approval.fields.on_demand_status')); ?>

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

<?php echo $__env->make("layouts.admin.panel_table", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\lenovo\Downloads\application\resources\views/template/admin/advertisers/apply/index.blade.php ENDPATH**/ ?>