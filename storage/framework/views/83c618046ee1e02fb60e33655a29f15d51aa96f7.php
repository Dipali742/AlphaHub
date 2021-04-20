
<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->get('lang.library_book_issue'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->get('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.library'); ?></a>
                <a href="<?php echo e(url('member-list')); ?>"><?php echo app('translator')->get('lang.member'); ?> <?php echo app('translator')->get('lang.list'); ?></a>
                <a href="#"><?php echo app('translator')->get('lang.issue_books'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="mb-40 student-details">
  <div class="container-fluid p-0">
     
  <div class="row">
    <div class="col-lg-3">
      <!-- Start Student Meta Information -->
      <div class="main-title">
        <h3 class="mb-20"><?php echo app('translator')->get('lang.issue_books'); ?></h3>
      </div>
      <div class="student-meta-box mt-30">
        <div class="student-meta-top"></div>
        <?php if(@$memberDetails->member_type == 2): ?>
          <img class="student-meta-img img-100" src="<?php echo e(asset(@$getMemberDetails->student_photo)); ?>" alt="">
        <?php else: ?>
          <img class="student-meta-img img-100" src="<?php echo e(asset(@$getMemberDetails->staff_photo)); ?>" alt="">
        <?php endif; ?>
        <div class="white-box">
          <div class="single-meta mt-10">
            <div class="d-flex justify-content-between">
              <div class="name">
                  <?php echo app('translator')->get('lang.staff_name'); ?>
              </div>
              <div class="value">
                <?php if(isset($getMemberDetails)): ?>
                <?php echo e($getMemberDetails->full_name); ?>

                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="single-meta">
            <div class="d-flex justify-content-between">
              <div class="name">
                  <?php echo app('translator')->get('lang.member'); ?> <?php echo app('translator')->get('lang.id'); ?>
              </div>
              <div class="value">
               <?php if(isset($memberDetails)): ?>
               <?php echo e($memberDetails->member_ud_id); ?>

               <?php endif; ?>
             </div>
           </div>
         </div>
         <div class="single-meta">
          <div class="d-flex justify-content-between">
            <div class="name">
                <?php echo app('translator')->get('lang.member_type'); ?>
            </div>
            <div class="value">
             <?php if(isset($memberDetails)): ?>
             <?php echo e($memberDetails->memberTypes->name); ?>

             <?php endif; ?>
           </div>
         </div>
       </div>
       <div class="single-meta">
        <div class="d-flex justify-content-between">
          <div class="name">
              <?php echo app('translator')->get('lang.mobile'); ?>
          </div>
          <div class="value">
           <?php if(isset($getMemberDetails)): ?>
           <?php echo e($getMemberDetails->mobile); ?>

           <?php endif; ?>

         </div>
       </div>
     </div>
   </div>
 </div>
 <!-- End Student Meta Information -->
 <?php if(in_array(312, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ): ?>
 <div class="row mt-30">
  <div class="col-lg-12">
    <div class="main-title">
      <h3 class="mb-30">
          <?php echo app('translator')->get('lang.issue_book'); ?>
      </h3>
    </div>
    <?php if(isset($editData)): ?>
    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'book-category-list/'.$editData->id, 'method' => 'PUT', 'enctype' => 'multipart/form-data'])); ?>

    <?php else: ?>
    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'save-issue-book-data',
    'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

    <?php endif; ?>
    <div class="white-box">
      <div class="add-visitor">
        <div class="row">
         <div class="col-lg-12 mb-20">
           <?php if(session()->has('message-success')): ?>
              <div class="alert alert-success">
                  <?php echo e(session()->get('message-success')); ?>

              </div>
            <?php elseif(session()->has('message-danger')): ?>
              <div class="alert alert-danger">
                  <?php echo e(session()->get('message-danger')); ?>

              </div>
            <?php endif; ?>
           <div class="input-effect">
            <select class="niceSelect w-100 bb form-control<?php echo e($errors->has('book_id') ? ' is-invalid' : ''); ?>" name="book_id" id="classSelectStudent">
              <option data-display="Select Book *" value=""><?php echo app('translator')->get('lang.select_book'); ?></option>
              <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($value->id); ?>"><?php echo e($value->book_title); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <span class="focus-border"></span>
            <?php if($errors->has('book_id')): ?>
            <span class="invalid-feedback invalid-select" role="alert">
              <strong><?php echo e($errors->first('book_id')); ?></strong>
            </span>
            <?php endif; ?>
          </div>
        </div>

        <div class="col-lg-12 mb-20">
          <div class="no-gutters input-right-icon">
            <div class="col">
              <div class="input-effect">
                <input class="primary-input date form-control<?php echo e($errors->has('due_date') ? ' is-invalid' : ''); ?>" id="due_date" type="text"
                placeholder="<?php echo app('translator')->get('lang.return_date'); ?>" name="due_date" autocomplete="off" value="<?php echo e(date('m/d/Y')); ?>">
                <span class="focus-border"></span>
                <?php if($errors->has('due_date')): ?>
                <span class="invalid-feedback" role="alert">
                  <strong><?php echo e($errors->first('due_date')); ?></strong>
                </span>
                <?php endif; ?>
              </div>
            </div>
            <div class="col-auto">
              <button class="" type="button">
                <i class="ti-calendar" id="book_return_date_icon"></i>
              </button>
            </div>
          </div>
        </div>
        <input type="hidden" name="member_id" value="<?php echo e(@$memberDetails->student_staff_id); ?>">
        <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
      </div>
      <div class="row mt-40">
        <div class="col-lg-12 text-center">
          <button class="primary-btn fix-gr-bg">
            <span class="ti-check"></span>
              <?php echo app('translator')->get('lang.issue_book'); ?>
          </button>
        </div>
      </div>
    </div>
  </div>
  <?php echo e(Form::close()); ?>

</div>
</div>
<?php endif; ?>
</div>

<div class="col-lg-9">
 <div class="row">
  <div class="col-lg-4 no-gutters">
    <div class="main-title">
      <h3 class="mb-0"> <?php echo app('translator')->get('lang.issued_book'); ?></h3>
    </div>
  </div>
</div>

<div class="row">
 <div class="col-lg-12">
  <table id="table_id" class="display school-table" cellspacing="0" width="100%">
    <thead>
      <?php if(session()->has('message-success-return') != "" ||
        session()->get('message-danger-return') != ""): ?>
        <tr>
            <td colspan="6">
                 <?php if(session()->has('message-success-return')): ?>
                  <div class="alert alert-success">
                      <?php echo e(session()->get('message-success-return')); ?>

                  </div>
                <?php elseif(session()->has('message-danger-return')): ?>
                  <div class="alert alert-danger">
                      <?php echo e(session()->get('message-danger-return')); ?>

                  </div>
                <?php endif; ?>
            </td>
        </tr>
         <?php endif; ?>
      <tr>
        <th width="15%"><?php echo app('translator')->get('lang.book_title'); ?></th>
        <th width="15%"><?php echo app('translator')->get('lang.book_number'); ?></th>
        <th width="15%"><?php echo app('translator')->get('lang.issue_date'); ?></th>
        <th width="15%"><?php echo app('translator')->get('lang.return_date'); ?></th>
        <th width="15%"><?php echo app('translator')->get('lang.status'); ?></th>
        <th width="15%"><?php echo app('translator')->get('lang.action'); ?></th>
      </tr>
    </thead>

    <tbody>
      <?php if(isset($totalIssuedBooks)): ?>
      <?php $__currentLoopData = $totalIssuedBooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($value->books->book_title); ?></td>
        <td><?php echo e($value->books->book_number); ?></td>
        <td  data-sort="<?php echo e(strtotime($value->given_date)); ?>" >
          <?php echo e($value->given_date != ""? App\SmGeneralSettings::DateConvater($value->given_date):''); ?>


        </td>
        <td  data-sort="<?php echo e(strtotime($value->due_date)); ?>" >
         <?php echo e($value->due_date != ""? App\SmGeneralSettings::DateConvater($value->due_date):''); ?>


        </td>
        <td>
          <?php if($value->issue_status == 'I'): ?>
          <button class="primary-btn small bg-warning text-white border-0"><?php echo app('translator')->get('lang.issued'); ?></button>
          <?php else: ?>
         <button class="primary-btn small bg-success text-white border-0"><?php echo app('translator')->get('lang.returned'); ?></button>
          <?php endif; ?>
        </td>
        <td>
          <div class="dropdown">
            <?php if($value->issue_status == 'I'): ?>

             <?php if(in_array(313, App\GlobalVariable::GlobarModuleLinks()) || Auth::user()->role_id == 1 ): ?>

            <a title="Return Book" data-modal-size="modal-md" href="<?php echo e(url('return-book-view/'.$value->id)); ?>" class="modalLink primary-btn fix-gr-bg"><?php echo app('translator')->get('lang.return'); ?></a>
            
            <?php endif; ?>
            <?php endif; ?>
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

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u642648155/domains/alphahub.in/public_html/resources/views/backEnd/library/issueBooks.blade.php ENDPATH**/ ?>