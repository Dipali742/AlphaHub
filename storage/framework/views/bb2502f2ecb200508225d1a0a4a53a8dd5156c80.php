
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.edit'); ?> <?php echo app('translator')->get('lang.notice'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.communicate'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.edit'); ?> <?php echo app('translator')->get('lang.notice'); ?></a>
            </div>
        </div>
    </div>
</section>

<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="main-title">
                    <h3 class="mb-30"><?php echo app('translator')->get('lang.edit'); ?> <?php echo app('translator')->get('lang.notice'); ?> </h3>
                </div>
            </div>
            <div class="offset-lg-6 col-lg-2 text-right col-md-6">
                <a href="<?php echo e(url('notice-list')); ?>" class="primary-btn small fix-gr-bg">
                    <?php echo app('translator')->get('lang.notice_board'); ?>
                </a>
            </div>
        </div>
        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'update-notice-data', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

        <div class="row">
            <div class="col-lg-12">
                <?php if(session()->has('message-success')): ?>
                <div class="alert alert-success">
                  <?php echo e(session()->get('message-success')); ?>

              </div>
              <?php elseif(session()->has('message-danger')): ?>
              <div class="alert alert-danger">
                  <?php echo e(session()->get('message-danger')); ?>

              </div>
              <?php endif; ?>
              <div class="white-box">
                <div class="">
                    <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                    <input type="hidden" name="notice_id"  value="<?php echo e(@$noticeDataDetails->id); ?>">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="input-effect mb-30">
                                <input class="primary-input form-control<?php echo e($errors->has('notice_title') ? ' is-invalid' : ''); ?>"
                                type="text" name="notice_title" autocomplete="off" value="<?php echo e(isset($noticeDataDetails)? $noticeDataDetails->notice_title : ''); ?>">
                                <label><?php echo app('translator')->get('lang.title'); ?><span>*</span> </label>
                                <span class="focus-border"></span>
                                <?php if($errors->has('notice_title')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('notice_title')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="input-effect mt-0">
                                
                                <textarea class="primary-input form-control" cols="0" rows="5" name="notice_message" id="notice_message"><?php echo (isset($noticeDataDetails)) ? $noticeDataDetails->notice_message : ''; ?></textarea>

                                <label><?php echo app('translator')->get('lang.notice'); ?> <span></span> </label>
                                <span class="focus-border textarea"></span>

                            </div>
                        </div>
                        <div class="col-lg-5">
                         <div class="no-gutters input-right-icon mb-30">
                            <div class="col">
                                <div class="input-effect">
                                    <input class="primary-input date form-control<?php echo e($errors->has('notice_date') ? ' is-invalid' : ''); ?>" id="notice_date" type="text" name="notice_date" value="<?php echo e((isset($noticeDataDetails)) ? date('m/d/Y', strtotime($noticeDataDetails->notice_date)) : ' '); ?>">
                                    <label><?php echo app('translator')->get('lang.notice_date'); ?><span>*</span> </label>
                                    <span class="focus-border"></span>
                                    <?php if($errors->has('notice_date')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('notice_date')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <button class="" type="button">
                                    <i class="ti-calendar" id="submission_date_icon"></i>
                                </button>
                            </div>
                        </div>

                        <div class="no-gutters input-right-icon">
                            <div class="col">
                                <div class="input-effect">
                                    <input class="primary-input date form-control<?php echo e($errors->has('publish_on') ? ' is-invalid' : ''); ?>" id="publish_on" type="text"
                                    name="publish_on" value="<?php echo e((isset($noticeDataDetails)) ? date('m/d/Y', strtotime($noticeDataDetails->publish_on)) : ' '); ?>">
                                
                                    <label><?php echo app('translator')->get('lang.publish_on'); ?> <span>*</span> </label>
                                    <span class="focus-border"></span>
                                    <?php if($errors->has('publish_on')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('publish_on')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <button class="" type="button">
                                    <i class="ti-calendar" id="submission_date_icon"></i>
                                </button>
                            </div>
                        </div>

                        <div class="col-lg-12 mt-50">
                            <label><?php echo app('translator')->get('lang.message'); ?> <?php echo app('translator')->get('lang.to'); ?> </label><br>
                        <?php if(isset($noticeDataDetails)): ?>
                             <?php 
                             $inform_to = explode(',' ,$noticeDataDetails->inform_to);
                             ?>
                        <?php endif; ?>                            
                               <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <div class="">

                                 <input type="checkbox" id="role<?php echo e($role->id); ?>" class="common-checkbox" name="role[]" value="<?php echo e($role->id); ?>" 
                                    
                                    <?php $__currentLoopData = $inform_to; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(@$role->id == @$value): ?>
                                    checked
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    >
                                    <label for="role<?php echo e(@$role->id); ?>"> <?php echo e(@$role->name); ?></label>
                                    
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($errors->has('role')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('role')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-40">
                            <div class="col-lg-12 text-center">
                                <button class="primary-btn fix-gr-bg">
                                    <span class="ti-check"></span>
                                    <?php echo app('translator')->get('lang.update_content'); ?>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo e(Form::close()); ?>

    </div>
</section>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u642648155/domains/alphahub.in/public_html/resources/views/backEnd/communicate/editSendMessage.blade.php ENDPATH**/ ?>