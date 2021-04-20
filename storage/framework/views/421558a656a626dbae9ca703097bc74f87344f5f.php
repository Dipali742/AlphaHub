
<?php $__env->startSection('mainContent'); ?>
<?php
function showPicName($data){
@$name = explode('/', @$data);
return @$name[3];
}
?>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.syllabus'); ?> <?php echo app('translator')->get('lang.list'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.teacher'); ?> </a>
                <a href="#"><?php echo app('translator')->get('lang.syllabus'); ?> <?php echo app('translator')->get('lang.list'); ?> </a>
            </div>
        </div>
    </div>
</section>

<section class="admin-visitor-area">
    <div class="container-fluid p-0">

<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-4 no-gutters">
                <div class="main-title">
                    <h3 class="mb-0"><?php echo app('translator')->get('lang.syllabus'); ?> <?php echo app('translator')->get('lang.list'); ?> </h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">

                <table id="table_id" class="display school-table" cellspacing="0" width="100%">

                    <thead>
                        <?php if(session()->has('message-success-delete') != "" ||
                        session()->get('message-danger-delete') != ""): ?>
                        <tr>
                            <td colspan="6">
                                <?php if(session()->has('message-success-delete')): ?>
                                <div class="alert alert-success">
                                    <?php echo e(session()->get('message-success-delete')); ?>

                                </div>
                                <?php elseif(session()->has('message-danger-delete')): ?>
                                <div class="alert alert-danger">
                                    <?php echo e(session()->get('message-danger-delete')); ?>

                                </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endif; ?>
                        <tr>
                            <th><?php echo app('translator')->get('lang.content_title'); ?></th>
                            <th><?php echo app('translator')->get('lang.type'); ?></th>
                            <th><?php echo app('translator')->get('lang.date'); ?></th>
                            <th><?php echo app('translator')->get('lang.available_for'); ?></th>
                            <th><?php echo app('translator')->get('lang.class_section'); ?></th>
                            <th><?php echo app('translator')->get('lang.action'); ?></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if(isset($uploadContents)): ?>
                        <?php $__currentLoopData = $uploadContents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>

                            <td><?php echo e(@$value->content_title); ?></td>
                            <td>
                                <?php if(@$value->content_type == 'as'): ?>
                                    <?php echo e('Assignment'); ?>

                                <?php elseif(@$value->content_type == 'st'): ?>
                                    <?php echo e('Study Material'); ?>

                                <?php elseif(@$value->content_type == 'sy'): ?>
                                    <?php echo e('Syllabus'); ?>

                                <?php else: ?>
                                    <?php echo e('Others Download'); ?>

                                <?php endif; ?>
                            </td>
                            <td  data-sort="<?php echo e(strtotime(@$value->upload_date)); ?>" >
                               <?php echo e(@$value->upload_date != ""? App\SmGeneralSettings::DateConvater(@$value->upload_date):''); ?>


                            </td>
                            <td>
                                <?php if(@$value->available_for_admin == 1): ?>
                                    <?php echo e('All admin'); ?><br>
                                <?php endif; ?>
                                <?php if(@$value->available_for_all_classes == 1): ?>
                                    <?php echo e('All classes student'); ?>

                                <?php endif; ?>
                            </td>
                            <td>

                            <?php if(@$value->class != ""): ?>
                                <?php echo e(@$value->classes->class_name); ?>

                            <?php endif; ?> 

                            <?php if(@$value->section != ""): ?>
                                (<?php echo e(@$value->sections->section_name); ?>)
                            <?php endif; ?>


                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                        <?php echo app('translator')->get('lang.select'); ?>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">

                                        <?php if(@$value->upload_file != ""): ?>
                                            <?php if(@in_array(32, App\GlobalVariable::GlobarModuleLinks())): ?>
                                            <a class="dropdown-item" href="<?php echo e(url('upload-content-document/'.showPicName(@$value->upload_file))); ?>">
                                                <?php echo app('translator')->get('lang.download'); ?>  <span class="pl ti-download"></span></a>

                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u642648155/domains/alphahub.in/public_html/resources/views/backEnd/studentPanel/studentSyllabus.blade.php ENDPATH**/ ?>