<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <link rel="icon" type="image/png" href="<?php echo e(\App\Helper\Static\Methods::staticAsset("img/favicon.png")); ?>">

    <?php echo SEOMeta::generate(); ?>

    <?php echo OpenGraph::generate(); ?>

    <?php echo Twitter::generate(); ?>

    <?php echo JsonLd::generate(); ?>


    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- inject:css-->
    <link rel="stylesheet" href="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/css/bootstrap/bootstrap.css")); ?>"/>
    <link rel="stylesheet" href="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/css/fontawesome.css")); ?>"/>
    <link rel="stylesheet" href="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/css/line-awesome.min.css")); ?>"/>
    <link rel="stylesheet" href="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/css/fontawesome.css")); ?>"/>
    <link rel="stylesheet" href="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/css/line-awesome.min.css")); ?>"/>
    <link rel="stylesheet" href="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/css/style.css")); ?>"/>
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
          href="<?php echo e(\App\Helper\Static\Methods::staticAsset('libs/datatables.net-select-bs4/css/select.bootstrap4.min.css')); ?>"/>

    <?php echo $__env->yieldPushContent('styles'); ?>

    <style>
        .contents {
            padding: 70px 15px 72px 295px !important;
        }
        .btn span, .btn i {
            font-size: 12px;
            margin-right: unset;
        }
        div.dt-buttons {
            display: flex;
        }
        table.dataTable.no-footer,
        table.dataTable thead th, table.dataTable thead td,
        .dataTables_wrapper.no-footer .dataTables_scrollBody {
            border-bottom: 1px solid #f1f2f6;
        }
        table.dataTable thead .sorting:before, table.dataTable thead .sorting_asc:before, table.dataTable thead .sorting_desc:before, table.dataTable thead .sorting_asc_disabled:before, table.dataTable thead .sorting_desc_disabled:before,
        table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:after, table.dataTable thead .sorting_asc_disabled:after, table.dataTable thead .sorting_desc_disabled:after {
            content: unset;
        }
        .disabled-link
        {
            opacity: 0.3;
            pointer-events: none;
        }
    </style>

</head>

<body class="layout-light side-menu overlayScroll">

<?php echo $__env->make("partial.admin.mobile", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make("partial.admin.header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<main class="main-content">
    <?php echo $__env->make("partial.admin.aside", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent("content"); ?>
    <?php echo $__env->make("partial.admin.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</main>

<div id="overlayer">
    <span class="loader-overlay">
        <div class="atbd-spin-dots spin-lg">
            <span class="spin-dot badge-dot dot-primary"></span>
            <span class="spin-dot badge-dot dot-primary"></span>
            <span class="spin-dot badge-dot dot-primary"></span>
            <span class="spin-dot badge-dot dot-primary"></span>
        </div>
    </span>
</div>

<script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/jquery/jquery-3.5.1.min.js")); ?>"></script>
<script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/jquery/jquery-ui.js")); ?>"></script>
<script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/bootstrap/popper.js")); ?>"></script>
<script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/bootstrap/bootstrap.min.js")); ?>"></script>
<script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/feather.min.js")); ?>"></script>
<script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/feather.min.js")); ?>"></script>
<script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/loader.js")); ?>"></script>
<script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/moment.js")); ?>"></script>
<script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/popover.js")); ?>"></script>
<script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/pdfmake.min.js")); ?>"></script>
<script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/vfs_fonts.js")); ?>"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
<script src="<?php echo e(\App\Helper\Static\Methods::staticAsset("vendor_assets/js/admin_extra.js")); ?>"></script>

<script>
    $(function() {
        let selectAllButtonTrans = '<?php echo e(trans('global.select_all')); ?>'
        let selectNoneButtonTrans = '<?php echo e(trans('global.deselect_all')); ?>'
        let languages = {
            'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
        };
        $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, { className: 'btn' })
        $.extend(true, $.fn.dataTable.defaults, {
            language: {
                url: languages['<?php echo e(app()->getLocale()); ?>']
            },
            columnDefs: [{
                orderable: false,
                className: 'select-checkbox',
                targets: 0
            }, {
                orderable: false,
                searchable: false,
                targets: -1
            }],
            select: {
                style:    'multi+shift',
                selector: 'td:first-child'
            },
            order: [],
            processing: true,
            serverSide: true,
            pageLength: 100,
            orderable: true,
            dom: 'lBfrtip<"actions">',
            buttons: [
                {
                    extend: 'selectAll',
                    className: 'btn-primary btn-xs ml-3',
                    text: selectAllButtonTrans,
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'selectNone',
                    className: 'btn-primary btn-xs ml-3',
                    text: selectNoneButtonTrans,
                    exportOptions: {
                        columns: ':visible'
                    }
                }
            ]
        });
        $.fn.dataTable.ext.classes.sPageButton = '';
    });
</script>

<?php echo $__env->yieldPushContent('scripts'); ?>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\tech\resources\views/layouts/admin/panel_table.blade.php ENDPATH**/ ?>