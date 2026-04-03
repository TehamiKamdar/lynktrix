<?php if($errors->any()): ?>

    <div class="text-capitalize alert alert-danger alert-dismissible fade show" role="alert">
        <div class="alert-content">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <button type="button" class="close text-capitalize" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" class="font-weight-bold">X</span>
            </button>
        </div>
    </div>

<?php elseif(Session::has('success')): ?>

    <div class="text-capitalize alert alert-success alert-dismissible fade show" role="alert">
        <div class="alert-content">
            <p><?php echo Session::get('success'); ?></p>
            <button type="button" class="close text-capitalize" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" class="font-weight-bold">X</span>
            </button>
        </div>
    </div>

    <?php
        Session::forget('success');
    ?>

<?php elseif(Session::has('notify-warning')): ?>

    <div class="alert alert-warning alert-dismissible fade show m-0" role="alert">
        <div class="alert-content">
            <p><?php echo Session::get('notify-warning'); ?></p>
            <button type="button" class="close text-capitalize" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" class="font-weight-bold">X</span>
            </button>
        </div>
    </div>

    <?php
        Session::forget('notify-warning');
    ?>

<?php elseif(Session::has('error')): ?>

    <div class="text-capitalize alert alert-danger alert-dismissible fade show" role="alert">
        <div class="alert-content">
            <p><?php echo Session::get('error'); ?></p>
            <button type="button" class="close text-capitalize" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" class="font-weight-bold">X</span>
            </button>
        </div>
    </div>

    <?php
        Session::forget('error');
    ?>

<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\tech\resources\views/partial/publisher/alert.blade.php ENDPATH**/ ?>