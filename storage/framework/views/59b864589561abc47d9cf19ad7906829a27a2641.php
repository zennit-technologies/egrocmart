<!-- breadcumb -->
<section class="page_title corner-title overflow-visible">
   <div class="container">
       <div class="row">
           <div class="col-md-12 text-center">
               <h1><?php echo e(__('msg.contact_page')); ?></h1>
               <ol class="breadcrumb">
                   <li class="breadcrumb-item">
                       <a href="<?php echo e(route('home')); ?>"> <?php echo e(__('msg.home')); ?></a>
                   </li>
                   <li class="breadcrumb-item active">
                       <?php echo e(__('msg.contact_page')); ?>

                   </li>
               </ol>
               <div class="divider-15 d-none d-xl-block"></div>
           </div>
       </div>
   </div>
</section>
<div class="main-content">
   
   <!-- icon section -->

   <div class="iconsec my-2 my-md-3">
       <div class="container-fluid">
           <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow rounded">
               <h2 class="text-center pt-4 text-uppercase contact-us"><?php echo e(__('msg.contact_page')); ?></h2>
               <span class="animate-border mx-auto"></span>
               <div class="row inner-iconsec">
                   <div class="col-md-3 pb-3">
                       <div class="icondiv justify-content-center d-flex tossing pb-3">
                           <em class="fas fa-headphones-alt fa-5x"></em>
                       </div>
                       <h6 class="text-center"><?php echo e(__('msg.call_us1')); ?></h6>
                       <p class="text-center text-capitalize"><strong><?php echo e(__('msg.phone')); ?>:</strong> <?php echo e(Cache::get('support_number')); ?></p>
                   </div>
                   <div class="col-md-3 pb-3">
                       <div class="icondiv justify-content-center d-flex floating pb-3">
                           <em class="fas fa-map-marker-alt fa-5x"></em>
                       </div>
                       <h6 class="text-center"><?php echo e(__('msg.Visit Us')); ?></h6>
                       <p class="text-center text-capitalize"><strong><?php echo e(__('msg.Address')); ?>:</strong> <?php echo e(Cache::get('store_address')); ?></p>
                   </div>
                   <div class="col-md-3 pb-3">
                       <div class="icondiv justify-content-center d-flex pulse pb-3">
                           <em class="fas fa-pencil-ruler fa-5x"></em>
                       </div>
                       <h6 class="text-center"><?php echo e(__('msg.Write Us')); ?></h6>
                       <p class="text-center text-capitalize"><strong><?php echo e(__('msg.Email')); ?>:</strong> <?php echo e(Cache::get('support_email')); ?></p>
                   </div>
                   <div class="col-md-3 pb-3">
                       <div class="icondiv justify-content-center d-flex pulse pb-3">
                           <em class="fas fa-tv fa-5x"></em>
                       </div>
                       <h6 class="text-center"><?php echo e(__('msg.Open')); ?></h6>
                       <p class="text-center text-capitalize"><strong><?php echo e(__('msg.Mon – Sat')); ?>:</strong> <?php echo e(__('msg.9:00 – 18:00')); ?><br /></p>
                   </div>
               </div>

               <!-- eof icon sec -->
               <!-- contact form -->
               <div class="contactsec1 mb-10">
                   <div class="wrap">
                       <form class="main-contactform" action="<?php echo e(route('contact')); ?>" method="POST">
                           <div class="row">
                               <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-12">
                                   <div class="form-group">
                                       <input type="text" class="form-control" name="name" id="name" />
                                       <label for="name"><?php echo e(__('msg.Name')); ?></label>
                                       <span class="input-highlight"></span>
                                   </div>
                                   <div class="form-group">
                                       <input type="email" class="form-control" name="email" id="email" />
                                       <label for="email"><?php echo e(__('msg.Email')); ?></label>
                                       <span class="input-highlight"></span>
                                   </div>
                                   <div class="form-group">
                                       <input type="text" class="form-control" name="phone" id="phone" />
                                       <label for="subject"><?php echo e(__('msg.Phone Number')); ?></label>
                                       <span class="input-highlight"></span>
                                   </div>
                               </div>
                               <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-12">
                                   <div class="form-group">
                                       <textarea name="message" id="message" class="form-control"></textarea>
                                       <label for="message"><?php echo e(__('msg.Message')); ?></label>
                                       <span class="input-highlight"></span>
                                   </div>
                               </div>
                           </div>
                           <div class="mt-5 buttons-type">
                               <button type="submit" name="submit" class="btn shadow"><?php echo e(__('msg.Submit')); ?></button>
                           </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
   </div>

   <!-- eof contact form -->
   <!-- map -->
   <section class="mapsec mb-50">
       <div class="container-fluid">
           <div class="outer_box px-2 py-4 px-md-4 py-md-3 bg-white shadow rounded">
               <div class="col-md-12">
                   <div class="mapcontent">
                       <iframe aria-hidden="false" tabindex="0" title="map" src="https://maps.google.com/maps?q=+<?php echo e(Cache::get('map_latitude')); ?>+,+<?php echo e(Cache::get('map_longitude')); ?>+&hl=en&z=18&amp;output=embed"> </iframe>
                   </div>
               </div>
           </div>
           <div class="divider-bottom-md"></div>
       </div>
   </section>
   <!-- eof map -->
</div>
<?php /**PATH /home2/zennit/public_html/web.grocery/resources/views/themes/eCart/contact.blade.php ENDPATH**/ ?>