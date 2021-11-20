
<?php if(Cache::has('offers') && is_array(Cache::get('offers')) && count(Cache::get('offers'))): ?>
<?php $__currentLoopData = Cache::get('offers'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if(isset($o->image) && trim($o->image) !== ""): ?>
<section class="main-content home-banner banner-sec-2  my-2 my-md-3">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <div class="banner_box_content">
               <img class="lazy" data-original="<?php echo e($o->image); ?>" alt="ad-1">
            </div>
         </div>
      </div>
   </div>
</section>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?><?php /**PATH /home2/zennit/public_html/web.grocery/resources/views/themes/eCart/parts/offers.blade.php ENDPATH**/ ?>