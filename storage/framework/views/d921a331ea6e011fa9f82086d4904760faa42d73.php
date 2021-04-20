
<?php $__env->startSection('main_content'); ?>
    <!--================ Home Banner Area =================-->
    <section class="container box-1420">
        <div class="banner-area" style="background: linear-gradient(0deg, rgba(124, 50, 255, 0.6), rgba(199, 56, 216, 0.6)), url(<?php echo e($contact_info->image != ""? $contact_info->image : '../img/client/common-banner1.jpg'); ?>) no-repeat center;">

            <div class="banner-inner">
                <div class="banner-content">
                    <h2><?php echo e($contact_info->title); ?></h2>
                    <p><?php echo e($contact_info->description); ?></p>

                    <a class="primary-btn fix-gr-bg semi-large" href="<?php echo e(url($contact_info->button_url)); ?>"><?php echo e($contact_info->button_text); ?></a>

                </div>
            </div>
        </div>
    </section>
    <!--================ End Home Banner Area =================-->

   <!--================Contact Area =================-->
   <section class="contact_area section-gap-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <!-- <div id="mapBox" class="mapBox" 
                        data-lat="23.707310" 
                        data-lon="90.415480" 
                        data-zoom="13" 
                        data-info="Panthapath, Dhaka"   
                        data-mlat="23.707310"
                        data-mlon="90.415480">
                    </div> -->
                    <div class="map mapBox"></div>
                </div>
                <div class="offset-lg-1 col-lg-5">
                    <div class="contact_info">
                        <div class="info_item">
                            <i class="ti-home"></i>
                            <h6><?php echo e($contact_info->address); ?></h6>
                            <p><?php echo e($contact_info->address_text); ?></p>
                        </div>
                        <div class="info_item">
                            <i class="ti-headphone-alt"></i>
                            <h6><a href="#"><?php echo e($contact_info->phone); ?></a></h6>
                            <p><?php echo e($contact_info->phone_text); ?></p>
                        </div>
                        <div class="info_item">
                            <i class="ti-envelope"></i>
                            <h6><a href="#"><?php echo e($contact_info->email); ?></a></h6>
                            <p><?php echo e($contact_info->email_text); ?></p>
                        </div>
                    </div>
                    <section class="container box-1420 mt-30">
                            <?php if(session()->has('message-success')): ?>
                              <div class="alert alert-success">
                                  <?php echo e(session()->get('message-success')); ?>

                              </div>
                            <?php elseif(session()->has('message-danger')): ?>
                              <div class="alert alert-danger">
                                  <?php echo e(session()->get('message-danger')); ?>

                              </div>
                            <?php endif; ?>
                        </section>
                    <form action="<?php echo e(url('send-message')); ?>" class="row contact_form mt-50" method="post" id="contactForm" novalidate="novalidate">
                        <?php echo csrf_field(); ?>
                        <div class="col-lg-12">
                            <div class="input-effect">
                                <input class="primary-input form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" type="text" id="" name="name">
                                <span class="focus-border"></span>
                                <label>Enter your name <span>*</span>
                                <?php if($errors->has('name')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                </span>
                            <?php endif; ?>

                            </div>
                            <div class="input-effect mt-20">
                                <input class="primary-input form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" type="email" id="" name="email">
                                <span class="focus-border"></span>
                                <label>Enter your email <span>*</span>
                                <?php if($errors->has('email')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="input-effect mt-20">
                                <input class="primary-input form-control<?php echo e($errors->has('subject') ? ' is-invalid' : ''); ?>" type="text" id="" name="subject">
                                <span class="focus-border"></span>
                                <label>Enter Subject <span>*</span>
                                <?php if($errors->has('subject')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('subject')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="input-effect mt-20">
                                <textarea class="primary-input form-control" name="message" cols="0" rows="4"></textarea>
                                <span class="focus-border textarea"></span>
                                <label>Enter Message <span>*</span>
                                <?php if($errors->has('message')): ?>
                                    <span class="text-danger" role="alert">
                                        <strong><?php echo e($errors->first('message')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-12 mt-30">
                            <button type="submit" value="submit" class="primary-btn fix-gr-bg">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--================Contact Area =================-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/gmap3.min.js"></script>
<script>
    $('.map')
      .gmap3({
        center:[<?php echo $contact_info->latitude;?>, <?php echo $contact_info->longitude;?>],
        zoom:4
      })
      .marker([
        {position:[<?php echo $contact_info->latitude;?>, <?php echo $contact_info->longitude;?>]},
        {address:"<?php echo $contact_info->google_map_address;?>"},
        {address:"<?php echo $contact_info->google_map_address;?>", icon: "https://maps.google.com/mapfiles/marker_grey.png"}
      ])
      .on('click', function (marker) {
        marker.setIcon('https://maps.google.com/mapfiles/marker_green.png');
      });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontEnd.home.front_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u642648155/domains/alphahub.in/public_html/resources/views/frontEnd/home/light_contact.blade.php ENDPATH**/ ?>