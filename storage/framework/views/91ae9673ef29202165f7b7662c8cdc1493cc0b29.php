<?php if($errors->any()): ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <div class="alert-content">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <button type="button" class="close text-capitalize" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">close now</span>
            </button>
        </div>
    </div>

<?php elseif(Session::has('success')): ?>

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <div class="alert-content">
            <p><?php echo e(Session::get('success')); ?></p>
            <button type="button" class="close text-capitalize" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">close now</span>
            </button>
        </div>
    </div>

    <?php
        Session::forget('success');
    ?>

<?php elseif(Session::has('status')): ?>

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <div class="alert-content">
            <p><?php echo e(Session::get('status')); ?></p>
            <button type="button" class="close text-capitalize" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">close now</span>
            </button>
        </div>
    </div>

    <?php
        Session::forget('success');
    ?>

<?php elseif(Session::has('high_priority_error')): ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <div class="alert-content">
            <p><?php echo e(Session::get('high_priority_error')); ?></p>
            <button type="button" class="close text-capitalize" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">close now</span>
            </button>
        </div>
    </div>

    <?php
        Session::forget('high_priority_error');
    ?>

<?php elseif(Session::has('error')): ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <div class="alert-content">
            <p><?php echo Session::get('error'); ?></p>
            <button type="button" class="close text-capitalize" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">X</span>
            </button>
        </div>
    </div>

    <?php
        Session::forget('error');
    ?>

<?php endif; ?>
<?php /**PATH C:\Users\lenovo\Downloads\application\resources\views/partial/admin/alert.blade.php ENDPATH**/ ?>