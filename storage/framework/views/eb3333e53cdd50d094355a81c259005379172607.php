
<div class="main-slider-sec">
   <?php if(Cache::has('sliders') && is_array(Cache::get('sliders')) && count(Cache::get('sliders'))): ?>
   <div class="slider-activation owl-carousel nav-style dot-style nav-dot-left">
      <?php $__currentLoopData = Cache::get('sliders'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($s->type == 'product'): ?>
      <a href="<?php echo e(route('product-single', $s->slug ?? '-')); ?>">
         <div class="single-slider-content height-100vh bg-img" data-dot="0<?php echo e($i+1); ?>">
            <img class="lazy" src="<?php echo e($s->image); ?>?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=10&q=60" alt="Slider1">
         </div>
      </a>
      <?php elseif($s->type == 'category'): ?>
      <a href="<?php echo e(route('category', $s->slug ?? '-')); ?>">
         <div class="single-slider-content height-100vh bg-img" data-dot="0<?php echo e($i+1); ?>">
            <img class="lazy" src="<?php echo e($s->image); ?>?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=10&q=60" alt="Slider2">
         </div>
      </a>
      <?php else: ?>
      <a href="">
         <div class="single-slider-content height-100vh bg-img" data-dot="0<?php echo e($i+1); ?>">
            <img class="lazy" src="<?php echo e($s->image); ?>?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=10&q=60" alt="Slider3">
         </div>
      </a>
      <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   </div>
   <?php endif; ?>
</div>
<!-- shipping area -->
<section class="shipping-content">

   <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm outer-ship">

   <div class="shipping_inner_content">
      <div class="row">
         <div class="col-lg-3 col-md-6 col-12">
            <div class="single_shipping_content">
               <div class="shipping_icon">
                  <em class="far fa-<?php echo e(__('msg.iconbox1_i')); ?>"></em>
               </div>
               <div class="shipping_content">
                  <h2><?php echo e(__('msg.iconbox1_h2')); ?></h2>
                  <p><?php echo e(__('msg.iconbox1_p')); ?></p>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-md-6 col-12">
            <div class="single_shipping_content">
               <div class="shipping_icon">
                  <em class="fab fa-<?php echo e(__('msg.iconbox2_i')); ?>"></em>
               </div>
               <div class="shipping_content">
                  <h2><?php echo e(__('msg.iconbox2_h2')); ?></h2>
                  <p><?php echo e(__('msg.iconbox2_p')); ?></p>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-md-6 col-12">
            <div class="single_shipping_content">
               <div class="shipping_icon">
                  <em class="fas fa-<?php echo e(__('msg.iconbox3_i')); ?>"></em>
               </div>
               <div class="shipping_content">
                  <h2><?php echo e(__('msg.iconbox3_h2')); ?></h2>
                  <p><?php echo e(__('msg.iconbox3_p')); ?></p>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-md-6 col-12">
            <div class="single_shipping_content">
               <div class="shipping_icon">
                  <em class="fas fa-<?php echo e(__('msg.iconbox4_i')); ?>"></em>
               </div>
               <div class="shipping_content">
                  <h2><?php echo e(__('msg.iconbox4_h2')); ?></h2>
                  <p><?php echo e(__('msg.iconbox4_p')); ?></p>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</section><?php /**PATH /home2/zennit/public_html/web.grocery/resources/views/themes/eCart/home.blade.php ENDPATH**/ ?>