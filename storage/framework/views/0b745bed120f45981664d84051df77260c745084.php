<!-- breadcumb -->
<section class="page_title corner-title overflow-visible">
   <div class="container">
      <div class="row">
         <div class="col-md-12 text-center">
            <h1><?php echo e($data['data'][0]->name); ?></h1>
            <ol class="breadcrumb">
               <li class="breadcrumb-item">
                  <a href="<?php echo e(route('home')); ?>"><?php echo e(__('msg.home')); ?></a>
               </li>
               <li class="breadcrumb-item active">
                  <?php echo e($data['data'][0]->name); ?>

               </li>
            </ol>
            <div class="divider-15 d-none d-xl-block"></div>
         </div>
      </div>
   </div>
</section>
<!-- eof breadcumb -->
<div class="main-content mt-4 my-md-2">
   <section class="featured_product py-5 seller-sec">
      <div class="container-fluid">
         <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">
            <div class="section_title d-flex mb-3 align-items-baseline border-bottom">
               <h2>
               <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block"><?php echo e($data['data'][0]->store_name); ?> <?php echo e(__('msg.store')); ?></span>
               </h2>
            </div>
            <div class="row ">
               <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                  <div class="dash-bg-right dash-bg-right1">
                     <div class="reward-body-dtt">
                        <div class="reward-img-icon">
                           <img class="lazy" data-original="<?php echo e($data['data'][0]->logo); ?>" alt="<?php echo e($data['data'][0]->store_name); ?>">
                        </div>
                        <span class="rewrd-title"><?php echo e($data['data'][0]->store_name); ?></span>
                     </div>
                  </div>
               </div>
               <?php if(isset($data['products']) && is_array($data['products']) && count($data['products'])): ?>
                  <div class="col-xl-9 col-lg-8 col-md-8 col-12">
                     <div class="featured_product_area product_carousel seller-details owl-carousel">
                        <?php
                        $i=0;
                        ?>
                        <?php $__currentLoopData = $data['products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <?php
                           $i++;
                           ?>
                           <?php if($i%2 !== 0): ?>
                              <div class="product_items">
                                 <article class="single_product">
                                    <figure>
                                       <?php if(!count(getInStockVarients($p))): ?>
                                       <div class="content_label">
                                          <span class="sold-out"><?php echo e(__('msg.sold_out')); ?></span>
                                      </div>
                                       <?php endif; ?>
                                       <div class="product_thumb">
                                          <a class="primary_img" href="<?php echo e(route('product-single', $p->slug)); ?>">
                                             <img class="lazy" data-original="<?php echo e($p->image); ?>" alt="<?php echo e($p->name ?? 'Product Name'); ?>">
                                          </a>
                                       </div>

                                       <figcaption class="product_content">
                                          <h4 class="product_name">
                                             <a href="<?php echo e(route('product-single', $p->slug)); ?>"><?php if(strlen(strip_tags($p->name)) > 20): ?> <?php echo substr(strip_tags($p->name), 0,20)."..."; ?> <?php else: ?> <?php echo substr(strip_tags($p->name), 0,20); ?> <?php endif; ?></a></h4>
                                          </h4>
                                          <div class="action_links">
                                             <span class="inner product_data">
                                                <ul>
                                                   <?php if(count(getInStockVarients($p))): ?>
                                                   <input type="hidden" class="id" name="id" value="<?php echo e($p->id); ?>" data-id="<?php echo e($p->id); ?>">
                                                   <input type="hidden" name="qty" value="1" class="qty" data-qty="1">
                                                   <?php $__currentLoopData = getInStockVarients($p); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                   <input type="hidden" class="varient" data-varient="<?php echo e($v->id); ?>" name="varient" value="<?php echo e($v->id); ?>"  data-price='<?php echo e(get_price(get_price_varients($v))); ?>' data-mrp='<?php echo e(get_price(get_mrp_varients($v))); ?>' data-savings='<?php echo e(get_savings_varients($v)); ?>' checked>
                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                   <input type="hidden" class="slug" value="<?php echo e($p->slug); ?>" data-slug="<?php echo e($p->slug); ?>">
                                                   <?php if(count(getInStockVarients($p))>1): ?>
                                                   <li class="add_to_cart productmodal">
                                                      <a title="Add to cart"><span class="fas fa-shopping-cart"></span></a>
                                                   </li>
                                                   <?php else: ?>
                                                   <li class="add_to_cart addtocart_single" data-id="<?php echo e($p->id); ?>" data-varient="<?php echo e($v->id); ?>" data-qty="1">
                                                      <a title="Add to cart"><span class="fas fa-shopping-cart"></span></a>
                                                   </li>
                                                   <?php endif; ?>
                                                   <li class="quick_button productmodal">
                                                      <a title="quick view"><span class="fas fa-search"></span></a>
                                                   </li>
                                                   <?php endif; ?>
                                                   <li class="wishlist">
                                                      <a  title="Add to Wishlist" class="<?php echo e((isset($p->is_favorite) && intval($p->is_favorite)) ? 'saved' : 'save'); ?>" data-id='<?php echo e($p->id); ?>'></a>
                                                   </li>
                                                </ul>
                                             </span>
                                          </div>
                                          <div class="price_box">
                                             <span class="current_price"><?php echo print_price($p); ?></span>
                                             <span class="old_price"><?php echo print_mrp($p); ?></span>
                                             <?php if(get_savings_varients($p->variants[0])): ?>
                                             <span class="discount-percentage discount-product"><?php echo e(get_savings_varients($p->variants[0])); ?></span>
                                             <?php endif; ?>
                                          </div>
                                       </figcaption>
                                    </figure>
                                 </article>
                                 <?php endif; ?>
                                 <?php if($i%2 == 0): ?>
                                 <article class="single_product">
                                    <figure>
                                       <?php if(!count(getInStockVarients($p))): ?>
                                       <div class="content_label">
                                          <span class="sold-out"><?php echo e(__('msg.sold_out')); ?></span>
                                      </div>
                                       <?php endif; ?>
                                       <div class="product_thumb">
                                          <a class="primary_img" href="<?php echo e(route('product-single', $p->slug)); ?>">
                                             <img class="lazy" data-original="<?php echo e($p->image); ?>" alt="<?php echo e($p->name ?? 'Product Name'); ?>">
                                          </a>
                                       </div>

                                       <figcaption class="product_content">
                                          <h4 class="product_name">
                                             <a href="<?php echo e(route('product-single', $p->slug)); ?>"><?php if(strlen(strip_tags($p->name)) > 30): ?> <?php echo substr(strip_tags($p->name), 0,30)."..."; ?> <?php else: ?> <?php echo substr(strip_tags($p->name), 0,30); ?> <?php endif; ?></a></h4>
                                          </h4>
                                          <div class="action_links">
                                             <span class="inner product_data">
                                                <ul>
                                                   <?php if(count(getInStockVarients($p))): ?>
                                                   <input type="hidden" class="id" name="id" value="<?php echo e($p->id); ?>" data-id="<?php echo e($p->id); ?>">
                                                   <input type="hidden" name="qty" value="1" class="qty" data-qty="1">
                                                   <?php $__currentLoopData = getInStockVarients($p); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                   <input type="hidden" class="varient" data-varient="<?php echo e($v->id); ?>" name="varient" value="<?php echo e($v->id); ?>"  data-price='<?php echo e(get_price(get_price_varients($v))); ?>' data-mrp='<?php echo e(get_price(get_mrp_varients($v))); ?>' data-savings='<?php echo e(get_savings_varients($v)); ?>' checked>
                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                   <input type="hidden" class="slug" value="<?php echo e($p->slug); ?>" data-slug="<?php echo e($p->slug); ?>">
                                                   <?php if(count(getInStockVarients($p))>1): ?>
                                                   <li class="add_to_cart productmodal"><a title="Add to cart"><span class="fas fa-shopping-cart"></span></a></li>
                                                   <?php else: ?>
                                                   <li class="add_to_cart addtocart_single" data-id="<?php echo e($p->id); ?>" data-varient="<?php echo e($v->id); ?>" data-qty="1"><a title="Add to cart"><span class="fas fa-shopping-cart"></span></a></li>
                                                   <?php endif; ?>
                                                   <li class="quick_button productmodal"><a title="quick view"><span class="fas fa-search"></span></a></li>
                                                   <?php endif; ?>
                                                   <li class="wishlist"><a title="Add to Wishlist" class="<?php echo e((isset($p->is_favorite) && intval($p->is_favorite)) ? 'saved' : 'save'); ?>" data-id='<?php echo e($p->id); ?>'></a></li>
                                                </ul>
                                             </span>
                                          </div>
                                          <div class="price_box">
                                             <span class="current_price"><?php echo print_price($p); ?></span>
                                             <span class="old_price"><?php echo print_mrp($p); ?></span>
                                             <?php if(get_savings_varients($p->variants[0])): ?>
                                             <span class="discount-percentage discount-product"><?php echo e(get_savings_varients($p->variants[0])); ?></span>
                                             <?php endif; ?>
                                          </div>
                                       </figcaption>
                                    </figure>
                                 </article>
                              </div>
                           <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </div>
                  </div>
                  <?php else: ?>
                  
                     <div class="col d-flex justify-content-center align-items-center my-3">
                        <h1 class="text-center my-2"><?php echo e(__('msg.no_product_found')); ?></h1>
                     </div>
                  
               <?php endif; ?>
            </div>
         </div>
      </div>
   </section>
</div>
<?php /**PATH /home2/zennit/public_html/web.grocery/resources/views/themes/eCart/seller-details.blade.php ENDPATH**/ ?>