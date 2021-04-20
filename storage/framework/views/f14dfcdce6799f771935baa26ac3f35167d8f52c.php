
<?php $__env->startSection('mainContent'); ?>
<style type="text/css">
     .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background: linear-gradient(90deg, #7c32ff 0%, #c738d8 51%, #7c32ff 100%);
}

input:focus + .slider {
  box-shadow: 0 0 1px linear-gradient(90deg, #7c32ff 0%, #c738d8 51%, #7c32ff 100%);
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
/* th,td{
    font-size: 9px !important;
    padding: 5px !important

} */
</style>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.staff_list'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.human_resource'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.staff_list'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-6">
                <div class="main-title xs_mt_0 mt_0_sm">
                    <h3 class="mb-30"><?php echo app('translator')->get('lang.select_criteria'); ?> </h3>
                </div>
            </div>
            
<?php if(in_array(162, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ): ?>

            <div class="col-lg-4 text-md-right text-left col-md-6 mb-30-lg col-6 text_sm_right">
                <a href="<?php echo e(route('addStaff')); ?>" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    <?php echo app('translator')->get('lang.add_staff'); ?>
                </a>
            </div>
<?php endif; ?>
        </div>
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
              </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="white-box">
                <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'searchStaff', 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <div class="row">
                            <div class="col-lg-4">
                              <select class="niceSelect w-100 bb form-control" name="role_id" id="role_id">
                                    <option data-display="Role" value=""> <?php echo app('translator')->get('lang.select'); ?> </option>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="col-lg-4 mt-30-md">
                               <div class="col-lg-12">
                                <div class="input-effect">
                                    <input class="primary-input" type="text" placeholder=" <?php echo app('translator')->get('lang.search_by_staff_id'); ?>" name="staff_no">
                                    <span class="focus-border"></span>
                                </div>
                            </div>
                           </div>
                            <div class="col-lg-4 mt-30-md">
                               <div class="col-lg-12">
                                <div class="input-effect">
                                    <input class="primary-input" type="text" placeholder="<?php echo app('translator')->get('lang.search_by_name'); ?>" name="staff_name">
                                    <span class="focus-border"></span>
                                </div>
                            </div>
                           </div>
                        <div class="col-lg-12 mt-20 text-right">
                            <button type="submit" class="primary-btn small fix-gr-bg">
                                <span class="ti-search pr-2"></span>
                                <?php echo app('translator')->get('lang.search'); ?>
                            </button>
                        </div>
                    </div>
            <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
 <div class="row mt-40 full_wide_table">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-4 no-gutters">
                    <div class="main-title">
                        <h3 class="mb-0"><?php echo app('translator')->get('lang.staff_list'); ?></h3>
                    </div>
                </div>
            </div>

         <div class="row">
                <div class="col-lg-12">
                    <table id="table_id" class="display school-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('lang.staff'); ?> <?php echo app('translator')->get('lang.no'); ?></th>
                                <th><?php echo app('translator')->get('lang.name'); ?></th>
                                <th><?php echo app('translator')->get('lang.role'); ?></th>
                                <th><?php echo app('translator')->get('lang.department'); ?></th>
                                <th><?php echo app('translator')->get('lang.description'); ?></th>
                                <th><?php echo app('translator')->get('lang.mobile'); ?></th>
                                <th><?php echo app('translator')->get('lang.email'); ?></th>
                                <th><?php echo app('translator')->get('lang.status'); ?></th>
                                <th><?php echo app('translator')->get('lang.action'); ?></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__currentLoopData = $staffs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr id="<?php echo e(@$value->id); ?>">
                                <td><?php echo e($value->staff_no); ?></td>
                                <td><?php echo e($value->first_name); ?>&nbsp;<?php echo e($value->last_name); ?></td>
                                <td><?php echo e(!empty($value->roles->name)?$value->roles->name:''); ?></td>
                                <td><?php echo e($value->departments !=""?$value->departments->name:""); ?></td>
                                <td><?php echo e($value->designations !=""?$value->designations->title:""); ?></td>
                                <td><?php echo e($value->mobile); ?></td>
                                <td><?php echo e($value->email); ?></td>
                                <td>
                                    <label class="switch">
                                      <input type="checkbox" class="switch-input-staff" <?php echo e(@$value->active_status == 0? '':'checked'); ?> <?php echo e(@$value->role_id == 1? 'disabled':''); ?>>
                                      
                                      <span class="slider round"></span>
                                    </label>
                                </td>

                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                            <?php echo app('translator')->get('lang.select'); ?>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="<?php echo e(route('viewStaff', $value->id)); ?>"><?php echo app('translator')->get('lang.view'); ?></a>
                                           <?php if(in_array(163, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ): ?>

                                            <a class="dropdown-item" href="<?php echo e(route('editStaff', $value->id)); ?>"><?php echo app('translator')->get('lang.edit'); ?></a>
                                           <?php endif; ?>
                                           <?php if(in_array(164, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ): ?>

                                            <?php if($value->role_id != Auth::user()->role_id ): ?>
                                           
                                            
                                            <a  class="dropdown-item" href="#" data-toggle="modal" data-target="#deleteStaffModal<?php echo e($value->id); ?>" data-id="<?php echo e($value->id); ?>"  ><?php echo app('translator')->get('lang.delete'); ?></a>
                                               
                                            <?php endif; ?>
                                            <?php endif; ?>
                                       
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade admin-query" id="deleteStaffModal<?php echo e($value->id); ?>" >
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Confirmation Required</h4>
                                            
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                            
                                        <div class="modal-body">
                                            <div class="text-center">
                                                
                                                <h4 class="text-danger">You are going to remove <?php echo e(@$value->first_name.' '.@$value->last_name); ?>. Removed data CANNOT be restored! Are you ABSOLUTELY Sure!</h4>
                                                
                                            </div>
                            
                                            <div class="mt-40 d-flex justify-content-between">
                                                <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('lang.cancel'); ?></button>
                                                <a href="<?php echo e(url('deleteStaff/'.$value->id)); ?>" class="text-light">
                                                    <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('lang.delete'); ?></button>
                                                
                                                     </a>
                                            </div>
                                        </div>
                            
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u642648155/domains/alphahub.in/public_html/resources/views/backEnd/humanResource/staff_list.blade.php ENDPATH**/ ?>