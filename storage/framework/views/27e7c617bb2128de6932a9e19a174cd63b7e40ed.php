<?php $__env->startSection("step_form_content"); ?>

    <div class="form-header">
        <h2 id="formTitle">Promotional Type</h2>
        <p id="formDescription">Please fill in your basic account details to get started.</p>
    </div>

    <form id="stepThree" action="javascript:void(0)">
        <div id="formFields">
            <div class="step-fields">
                <div class="form-group">
                    <label for="website_url" class="font-weight-bold">Website URL<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="website_url" name="website_url"
                        placeholder="https://www.domain.com">
                </div>

                <div class="form-group">
                    <label for="brief_introduction" class="font-weight-bold">Brief Introduction<span
                            class="text-danger">*</span></label>
                    <textarea class="form-control" id="brief_introduction" name="brief_introduction" rows="3"
                        placeholder="Please write a brief introduction to help us and the brand get to know you quickly."></textarea>
                </div>

                <div class="form-group">
                    <div class="countryOption">
                        <label for="categories" class="font-weight-bold">Category (Max. 4)<span class="text-danger">*</span></label>
                        <div class="atbd-select ">
                            <select name="categories[]" id="categories" class="form-control" multiple="multiple">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category['id']); ?>"><?php echo e($category['name']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="countryOption">
                        <label for="partner_types" class="font-weight-bold">Partner Type (Max. 3)<span
                                class="text-danger">*</span></label>
                        <div class="atbd-select ">
                            <select name="partner_types[]" id="partner_types" class="form-control" multiple="multiple">
                                <?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($partner['id']); ?>"><?php echo e($partner['name']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="countryOption">
                        <label for="website_country" class="font-weight-bold">Website Country / Region<span
                                class="text-danger">*</span></label>
                        <select class="js-example-basic-single js-states form-control" id="website_country" name="website_country">
                            <option value="" disabled selected>Please Select</option>
                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php echo e(isset($stepTwo['country']) && $stepTwo['country'] == $country['id'] ? "selected" : null); ?>

                                    value="<?php echo e($country['id']); ?>"><?php echo e(ucwords($country['name'])); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="monthly_traffic" class="font-weight-bold">Monthly Traffic<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="monthly_traffic" name="monthly_traffic" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="monthly_page_views" class="font-weight-bold">Monthly Page Views<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="monthly_page_views" name="monthly_page_views"
                                placeholder="">
                        </div>
                    </div>
                </div>

                <div class="button-group d-flex pt-3 justify-content-between flex-wrap">
                    <button onclick="stepFormShow(2)" class="btn btn-outline"><i class="mr-2 ri-arrow-left-s-line"></i>Previous</button>
                    <button type="submit" id="stepThree" class="btn btn-accent">Save &amp; Next<i class="ml-2 ri-arrow-right-s-line"></i></button>
                </div>
            </div>
        </div>
    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("auth.publisher_register.base", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\lynktrix\resources\views/auth/publisher_register/step_three.blade.php ENDPATH**/ ?>