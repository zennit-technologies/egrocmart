


<section class="subscribe-news">
   <div class="newsletter">
      <div class="container-fluid">
         <div class="newsletter-inner center-sm">
            <div class="row justify-content-center align-items-center">
               <div class="col-md-12">
                  <div class="newsletter-bg">
                     <div class="row  align-items-center">
                        <div class="col-xl-6 col-lg-6">
                           <div class="d-lg-flex align-items-center">
                              <div class="newsletter-icon">
                                 <em class="far fa-envelope-open fa-3x"></em>
                              </div>
                              <div class="newsletter-title">
                                 <h2 class="main_title"><?php echo e(__('msg.subscribe_to_our_newsletter')); ?></h2>
                                 <div class="sub-title"><?php echo e(__('msg.newsletter_line')); ?>

                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                           <form action="<?php echo e(route('newsletter')); ?>" method="POST" class="ajax-form">
                              <?php echo csrf_field(); ?>
                              <div class="formResponse"></div>
                              <div class="newsletter-box">
                                 <input type="email"  id="email" name="email" placeholder="Email Here..." required>
                                 <button title="Subscribe" name="submit" type="submit" class="btn-color"><?php echo e(__('msg.subscribe')); ?></button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>


<footer class="footer" id="iconfooter3">
   <div class="container-fluid">
      <hr>
      <div class="footer-inner">
         <div class="footer-middle">
            <div class="row">
               <div class="col f-col">
                  <div class="footer-static-block">
                     <span class="opener plus"></span>
                     <div class="f-logo">
                        <a href="<?php echo e(route('home')); ?>" class="">
                        <img src="<?php echo e(_asset(Cache::get('web_logo'))); ?>" alt="Logo">
                        </a>
                     </div>
                     <div class="footer-respond">
                        <p class="company__desc"><?php echo e(Cache::get('common_meta_description', '')); ?></p>
                        <?php if(trim(Cache::get('android_app_url', '')) != ''): ?>
                        <a target="_blank" href="<?php echo e(Cache::get('android_app_url', 'https://play.google.com')); ?>" class="app_button">
                        <img src="<?php echo e(_asset(Cache::get('google_play', theme('images/google1.png')))); ?>" alt="Google Play Store">
                        </a>
                        <?php endif; ?>
                     </div>
                  </div>
               </div>
               <div class="col f-col">
                  <div class="footer-static-block">
                     <span class="opener plus"></span>
                     <h3 class="title"><?php echo e(__('msg.customer_services')); ?> <span
                        class="animate-border animate-border border-black"></span><em
                        class="fas fa-angle-down arrowdown"></em></h3>
                     <ul class="collapse dont-collapse-sm link">
                        <li><a href="<?php echo e(route('page', 'privacy-policy')); ?>"><?php echo e(__('msg.privay_policy')); ?></a></li>
                        <li><a href="<?php echo e(route('page', 'tnc')); ?>"><?php echo e(__('msg.terms_and_conditions')); ?></a></li>
                        <li><a href="<?php echo e(route('page', 'refund-policy')); ?>"><?php echo e(__('msg.refund_policy')); ?></a></li>
                        <li><a href="<?php echo e(route('page', 'shipping-policy')); ?>"><?php echo e(__('msg.shipping_policy')); ?></a></li>
                        <li><a href="<?php echo e(route('page', 'delivery-returns-policy')); ?>"><?php echo e(__('msg.delivery_returns')); ?></a></li>
                     </ul>
                  </div>
               </div>
               <div class="col f-col">
                  <div class="footer-static-block">
                     <span class="opener plus"></span>
                     <h3 class="title">pages <span
                        class="animate-border animate-border border-black"></span><em
                        class="fas fa-angle-down arrowdown"></em></h3>
                     <ul class="collapse dont-collapse-sm link">
                        <li><a href="<?php echo e(route('about')); ?>"><?php echo e(__('msg.about_us')); ?></a></li>
                        
                        <li><a href="<?php echo e(route('page', 'faq')); ?>"><?php echo e(__('msg.faq')); ?></a></li>
                        <li><a href="<?php echo e(route('contact')); ?>"><?php echo e(__('msg.contact_us')); ?> </a></li>
                     </ul>
                  </div>
               </div>
               <div class="col f-col">
                  <div class="footer-static-block">
                     <span class="opener plus"></span>
                     <h3 class="title"><?php echo e(__('msg.address')); ?> <span
                        class="animate-border animate-border border-black"></span><em
                        class="fas fa-angle-down arrowdown"></em></h3>
                     <ul class="collapse dont-collapse-sm address-footer">
                        <?php
                        $store_address = str_ireplace("<br>", ' ',  Cache::get('store_address') );
                        ?>
                        <?php if(trim(Cache::get('store_address', '')) != ''): ?>
                        <li class="item company__address">
                           <em class="fas fa-map-marker"> </em>
                           <p><?php echo e($store_address); ?></p>
                        </li>
                        <?php endif; ?>
                        <li class="item">
                           <em class="fas fa-envelope"> </em>
                           <p> <a href="#"><?php echo e(Cache::get('support_email')); ?></a> </p>
                        </li>
                        <li class="item">
                           <em class="fas fa-phone"> </em>
                           <p><?php echo e(Cache::get('support_number')); ?></p>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="col f-col">
                  <!--<div class="footer-static-block">
                     <span class="opener plus"></span>
                     <h3 class="title"><?php echo e(__('msg.reach_us')); ?> <span
                        class="animate-border animate-border border-black"></span><em
                        class="fas fa-angle-down arrowdown"></em></h3>
                     <div class="footer-respond">
                        <iframe
                           width="100%"
                           height="200"
                            allowfullscreen="" aria-hidden="false" tabindex="0" title="map"
                           src="https://maps.google.com/maps?q=+<?php echo e(Cache::get('map_latitude')); ?>+,+<?php echo e(Cache::get('map_longitude')); ?>+&hl=en&z=18&amp;output=embed">
                        </iframe>
                     </div>
                  </div>-->
               </div>
            </div>
         </div>
      </div>
         <hr>
         <div class="footer-bottom ">
            <div class="row mtb-30">
               <div class="col-md-4 col-12 ">
                  <?php if(Cache::has('social_media') && is_array(Cache::get('social_media')) && count(Cache::get('social_media'))): ?>
                  <div class="footer_social pt-xs-15 center-sm">
                     <ul class="social-icon">
                        <li>
                           <div class="title"><?php echo e(__('msg.follow_us_on')); ?></div>
                        </li>
                        <?php $__currentLoopData = Cache::get('social_media'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e($c->link); ?>" target="_blank"><em class="fab <?php echo e($c->icon); ?>"></em></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </ul>
                  </div>
                  <?php endif; ?>
               </div>
               <div class="col-md-4 col-12 ">
                  <div class="copy-right "><?php echo e(__('msg.copyright')); ?> &copy; <?php echo e(date('Y')); ?> <?php echo e(__('msg.made')); ?> <a href="https://zennits.com/" target="_blank" rel="noopener noreferrer"><?php echo e(__('msg.wrteam')); ?>.</a>
                  </div>
               </div>
               <div class="col-md-4 col-12">
                  <div class="payment">
                     <div class="payment_icon">
                        <ul>
                           <li>
                              <?php if(isset(Cache::get('payment_methods')->cod_payment_method) && Cache::get('payment_methods')->cod_payment_method == 1): ?>
                              <img src="<?php echo e(URL::asset('images/cod.svg')); ?>" alt="">
                              <?php endif; ?>
                           </li>
                           <li>
                              <?php if(isset(Cache::get('payment_methods')->paypal_payment_method) && Cache::get('payment_methods')->paypal_payment_method == 1): ?>
                              <img src="<?php echo e(URL::asset('images/paypal.svg')); ?>" alt="" >
                              <?php endif; ?>
                           </li>
                           <li>
                              <?php if(isset(Cache::get('payment_methods')->payumoney_payment_method) && Cache::get('payment_methods')->payumoney_payment_method == 1): ?>
                              <img src="<?php echo e(URL::asset('images/payu.svg')); ?>" alt="">
                              <?php endif; ?>
                           </li>
                           <li>
                              <?php if(isset(Cache::get('payment_methods')->razorpay_payment_method) && Cache::get('payment_methods')->razorpay_payment_method == 1): ?>
                              <img src="<?php echo e(URL::asset('images/rozerpay.svg')); ?>" alt="">
                              <?php endif; ?>
                           </li>
                           <li>
                              <?php if(isset(Cache::get('payment_methods')->stripe_payment_method) && Cache::get('payment_methods')->stripe_payment_method == 1): ?>
                              <img src="<?php echo e(URL::asset('images/stripe.svg')); ?>">
                              <?php endif; ?>
                           </li>
                           <li>
                              <?php if(isset(Cache::get('payment_methods')->midtrans_payment_method) && Cache::get('payment_methods')->midtrans_payment_method == 1): ?>
                              <img src="<?php echo e(URL::asset('images/midtrans.svg')); ?>" alt="" >
                              <?php endif; ?>
                           </li>
                           <li>
                              <?php if(isset(Cache::get('payment_methods')->flutterwave_payment_method) && Cache::get('payment_methods')->flutterwave_payment_method == 1): ?>
                              <img src="<?php echo e(URL::asset('images/flutterwave.svg')); ?>" alt="" >
                              <?php endif; ?>
                           </li>
                           <li>
                              <?php if(isset(Cache::get('payment_methods')->paystack_payment_method) && Cache::get('payment_methods')->paystack_payment_method == 1): ?>
                              <img src="<?php echo e(URL::asset('images/paystack.svg')); ?>" alt="" >
                              <?php endif; ?>
                           </li>
                           <li>
                              <?php if(isset(Cache::get('payment_methods')->paytm_payment_method) && Cache::get('payment_methods')->paytm_payment_method == 1): ?>
                              <img src="<?php echo e(URL::asset('images/paytm.svg')); ?>" alt="" >
                              <?php endif; ?>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>

            </div>
         </div>

   </div>
</footer>
<!-- dark mode -->
<div id="switch-mode">
   <span class="dark-mode mode-control">
      <em class="fas fa-moon"></em>
   </span>
   <span class="light-mode mode-control d-none">
      <em class="fas fa-sun"></em>
   </span>
</div>

<!-- color switcher -->

<div class="demo-style-switch" id="switch-style">
   <a id="toggle-switcher" class="switch-button"><em class="far fa-sun fa-spin"></em></a>
   <div class="switched-options">
      <ul class="styles color-inputs">
         <li>
            <label><?php echo e(__('msg.custom_color')); ?></label>
            <span class="sp-original-input-container">
               <div class="sp-colorize-container sp-add-on">
                  <div class="sp-colorize"></div>
               </div>
               <input id="theme-color-master" value="#ff9900" name="theme-color-master" class="spectrum with-add-on">
            </span>
         </li>
      </ul>
   </div>
</div>

</body>
</html>

<!-- this for gulp if you dont know about that then dont change it or not uncomment it-->
<!-- ****************************** gulp start **************************************** -->

<!-- ltr gulp -->
<!--<script src="<?php echo e(theme('js/footerbundle.js')); ?>"></script>-->

<!-- rtl gulp-->
<!-- <script src="<?php echo e(theme('js/rtlfooterbundle.js')); ?>"></script> -->

<!-- ****************************** gulp end **************************************** -->

<script src="<?php echo e(theme('js/plugins.js')); ?>"></script>
<script src="<?php echo e(theme('js/semantic.min.js')); ?>"></script>
<script src="<?php echo e(theme('js/elevatezoom.js')); ?>"></script>
<script src="<?php echo e(theme('js/owl-carousel.js')); ?>"></script>
<script src="<?php echo e(theme('js/wow.js')); ?>"></script>
<script src="<?php echo e(theme('js/script.js')); ?>"></script>
<script src="<?php echo e(theme('js/cartajax.js')); ?>"></script>
<script src="<?php echo e(theme('js/lazy.js')); ?>"></script>
<script src="<?php echo e(theme('js/spectrum.min.js')); ?>"></script>

<!--rtl-->




<!-- common outer js -->
<script src="<?php echo e(asset('js/script.js')); ?>"></script>

<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="<?php echo e(asset('js/firebase-app.js')); ?>"></script>
<script src="<?php echo e(asset('js/firebase-analytics.js')); ?>"></script>
<script src="<?php echo e(asset('js/firebase-auth.js')); ?>"></script>
<script src="<?php echo e(asset('js/firebase-firestore.js')); ?>"></script>
<script src="<?php echo e(asset('js/firebase.js')); ?>"></script>
<?php /**PATH /home2/zennit/public_html/web.grocery/resources/views/themes/eCart/common/footer.blade.php ENDPATH**/ ?>