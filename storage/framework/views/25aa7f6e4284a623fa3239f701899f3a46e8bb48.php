
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.notice_board'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.communicate'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.notice_board'); ?></a>
            </div>
        </div>
    </div>
</section>

<section class="mb-40 sms-accordion">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-5">
                <div class="main-title">
                    <h3 class="mb-30"><?php echo app('translator')->get('lang.all'); ?> <?php echo app('translator')->get('lang.notices'); ?></h3>
                </div>
            </div>
             <?php if(in_array(288, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ): ?>
            <div class="offset-lg-5 col-lg-3 text-right col-md-6 col-7">
                <a href="<?php echo e(url('add-notice')); ?>" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    <?php echo app('translator')->get('lang.add'); ?> <?php echo app('translator')->get('lang.notice'); ?>
                </a>
            </div>
            <?php endif; ?>
        </div>
              <?php if(session()->has('message-success-delete')): ?>
             <div class="alert alert-success">
             <?php echo e(session()->get('message-success-delete')); ?>

              </div>
              <?php elseif(session()->has('message-danger-delete')): ?>
              <div class="alert alert-danger">
                  <?php echo e(session()->get('message-danger-delete')); ?>

              </div>
              <?php endif; ?>
        <div class="row">
            <div class="col-lg-12">
                <div id="accordion">
                   <?php $i = 0; ?>
                   <?php if(isset($allNotices)): ?>
                   <?php $__currentLoopData = $allNotices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <div class="card">
                     <a class="card-link" data-toggle="collapse" href="#notice<?php echo e(@$value->id); ?>">
                        <div class="card-header d-flex justify-content-between">
                            <?php echo e(@$value->notice_title); ?>

                            <div>
                            <?php if(in_array(289, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ): ?>
                             <a href="<?php echo e(url('edit-notice/'.$value->id)); ?>">
                                <button type="submit" class="primary-btn small tr-bg mr-10"><?php echo app('translator')->get('lang.edit'); ?> </button>
                             </a>
                             <?php endif; ?>
                              <?php if(in_array(290, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ): ?>
                                <a class="deleteUrl" data-modal-size="modal-md" title="Delete Notice" href="<?php echo e(url('delete-notice-view/'.$value->id)); ?>"><button class="primary-btn small tr-bg"><?php echo app('translator')->get('lang.delete'); ?> </button></a>
                            <?php endif; ?>
                            </div>
                        </div>
                    </a>
                    <?php $i++; ?>
                    <div id="notice<?php echo e(@$value->id); ?>" class="collapse <?php echo e($i ==  1 ? 'show' : ''); ?>" data-parent="#accordion">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <?php echo $value->notice_message; ?>

                                </div>
                                <div class="col-lg-4">
                                    <p class="mb-0">
                                        <span class="ti-calendar mr-10"></span>
                                        <?php echo app('translator')->get('lang.publish'); ?>  <?php echo app('translator')->get('lang.date'); ?> :    
                                         <?php echo e(@$value->publish_on != ""? App\SmGeneralSettings::DateConvater(@$value->publish_on):''); ?>

                                    </p>
                                    <p class="mb-0">
                                        <span class="ti-calendar mr-10"></span>
                                        <?php echo app('translator')->get('lang.notice'); ?>  <?php echo app('translator')->get('lang.date'); ?> :                                         
                                        <?php echo e(@$value->notice_date != ""? App\SmGeneralSettings::DateConvater(@$value->notice_date):''); ?>

                                    </p>
                                    <p>
                                        <span class="ti-user mr-10"></span>
                                        <?php echo app('translator')->get('lang.created_by'); ?> : <?php echo e(@$value->users !=""?@$value->users->full_name:""); ?>

                                    </p>

                                    <?php 
                                    $rolesData = explode(',', $value->inform_to);
                                    if (!empty($rolesData)) {
                                        ?>
                                        <h4><?php echo app('translator')->get('lang.message'); ?> <?php echo app('translator')->get('lang.to'); ?></h4>
                                        <?php
                                        foreach ($rolesData as $key => $value) {
                                            $RoleName = App\SmNoticeBoard::getRoleName($value);
                                            ?>
                                             
                                        <?php if (!empty($RoleName)) { ?>
                                            <p class="mb-0">
                                            <span class="ti-user mr-10"></span><?php echo @$RoleName->name; ?></p>
                                           <?php 
                                        } ?>

                                            <?php

                                        }
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u642648155/domains/alphahub.in/public_html/resources/views/backEnd/communicate/noticeList.blade.php ENDPATH**/ ?>