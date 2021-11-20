<?php if(isset($s->products) && is_array($s->products) && count($s->products)): ?>
<style>
* {
  box-sizing: border-box;
}

.column1 {
  float: left;
  width: 33.33%;
  /*padding: 5px;*/
  
}
#row1{
    /*padding-left: 15px;*/
    /*padding-right: 15px;*/
}

/* Clearfix (clear floats) */
.row1::after {
  content: "";
  clear: both;
  display: table;
}
</style>


<div class="row1 my-2 main-content">
  <div class="column1 main-content">
    <img src="https://grocery.zennit.in/upload/images/img-1.jpg" alt="shopping" style="width:100%">
  </div>
  <div class="column1 main-content">
    <img src="https://grocery.zennit.in/upload/images/img-2.jpg" alt="shopping" style="width:100%">
  </div>
  <div class="column1 main-content">
    <img src="https://grocery.zennit.in/upload/images/img-3.jpg" alt="shopping" style="width:100%">
  </div>
</div>

<div class="main-content my-2 my-md-3">
   <section class="trending_content product_area">
      <div class="container-fluid">
         <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">
         <div class="row">
            <div class="col-12">
               <div class="product_right_bar">
                  <div class="product_container">
                  <?php if(isset($s->title) && $s->title != ""): ?>
                     <div class="section_title d-flex mb-3 align-items-baseline border-bottom">
                        <h2>
                           <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block"><?php echo e($s->title); ?></span>
                        </h2>
                        <div class="pop_desc_title">
                           <?php if(isset($s->slug) && $s->slug != ""): ?>
                           <a href="<?php echo e(route('shop', ['section' => $s->slug])); ?>" class="btn-1 view title-section view-all ml-auto mr-0 btn btn-primary btn-sm shadow-md w-100 w-md-auto"><?php echo e(__('msg.view_all')); ?>&nbsp;&nbsp;<i class="fas fa-long-arrow-alt-right"></i></a>
                           <?php endif; ?>
                        </div>
                     </div>
                     <?php endif; ?>
                     <div class="product_carousel_content product_right_Carousel owl-carousel">
                        <?php   $maxProductShow = get('style_1.max_product_on_homne_page');
                        $i=0;
                        ?>
                        <?php $__currentLoopData = $s->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php
                        $i++;
                        ?>
                        <?php if((--$maxProductShow) > -1): ?>
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
                                    <a class="primary_img" href="<?php echo e(route('product-single', $p->slug)); ?>"><img class="lazy"
                                       data-original="<?php echo e($p->image); ?>" alt="<?php echo e($p->name ?? 'Product Image'); ?>"></a>

                                    <div class="action_links">
                                       <span class="inner product_data">
                                          <input type="hidden" class="slug" value="<?php echo e($p->slug); ?>" data-slug="<?php echo e($p->slug); ?>">
                                          <ul>
                                             <?php if(count(getInStockVarients($p))): ?>
                                             <input type="hidden" class="id" name="id" value="<?php echo e($p->id); ?>" data-id="<?php echo e($p->id); ?>">
                                             <?php $__currentLoopData = getInStockVarients($p); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                             <!--<input type="hidden" name="qty" value="<?php echo e($v->cart_count+1); ?>" class="qty" data-qty="<?php echo e($v->cart_count+1); ?>" id="qty-<?php echo e($v->id); ?>">-->
                                             <input type="hidden" class="qtyPicker qtyPicker-single-page qty" name="qty" type="number" id="qty-<?php echo e($v->id); ?>" name="qty" data-min="1" min="1" max="<?php echo e((int)$v->stock+1); ?>" data-max="<?php echo e((int)$v->stock+1); ?>" data-max-allowed="<?php echo e(Cache::get('max_cart_items_count')+1); ?>" value="<?php echo e($v->cart_count+1); ?>" readonly data-qty="<?php echo e($v->cart_count+1); ?>">
                                             <input type="hidden" class="varient" data-varient="<?php echo e($v->id); ?>" name="varient" value="<?php echo e($v->id); ?>"  data-price='<?php echo e(get_price(get_price_varients($v))); ?>' data-mrp='<?php echo e(get_price(get_mrp_varients($v))); ?>' data-savings='<?php echo e(get_savings_varients($v)); ?>' checked>
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                             <input type="hidden" class="slug" value="<?php echo e($p->slug); ?>" data-slug="<?php echo e($p->slug); ?>">
                                             <input type="hidden" class="name" name="name" value="<?php echo e($p->name); ?>" data-name="<?php echo e($p->name); ?>">
                                             <input type="hidden" class="image" name="image" value="<?php echo e($p->image); ?>" data-image="<?php echo e($p->image); ?>">
                                             <input type="hidden" class="price" name="price" value="<?php echo e(print_price($p)); ?>" data-price="<?php echo e(print_price($p)); ?>">

                                             <?php if(count(getInStockVarients($p))>1): ?>
                                             <li class="add_to_cart productmodal" data-bs-toggle="modal" data-bs-target="#modal_box" data-tab="login"><a title="Add to cart"><span class="fas fa-shopping-cart"></span></a></li>
                                             <?php else: ?>
                                             <li class="add_to_cart addtocart_single" data-id="<?php echo e($p->id); ?>" data-varient="<?php echo e($v->id); ?>" data-qty="1"><a title="Add to cart"><span class="fas fa-shopping-cart"></span></a></li>
                                             <?php endif; ?>
                                             <li class="quick_button productmodal"><a title="quick view"><span class="fas fa-eye"></span></a></li>
                                             <?php endif; ?>
                                             <?php if(session()->has('favourite')): ?>
                                             <?php if(in_array($p->id, session()->get('favourite'))): ?>
                                             <li class="wishlist"><a  title="Add to Wishlist" class="saved" data-id='<?php echo e($p->id); ?>'></a></li>
                                             <?php else: ?>
                                             <li class="wishlist"><a  title="Add to Wishlist" class="save" data-id='<?php echo e($p->id); ?>'></a></li>
                                             <?php endif; ?>
                                             <?php else: ?>
                                             <li class="wishlist"><a  title="Add to Wishlist" class="<?php echo e((isset($p->is_favorite) && intval($p->is_favorite)) ? 'saved' : 'save'); ?>" data-id='<?php echo e($p->id); ?>'></a></li>
                                             <?php endif; ?>
                                          </ul>
                                       </span>
                                    </div>
                                 </div>
                                 <figcaption class="product_content">
                                    <h4 class="product_name"><a href="<?php echo e(route('product-single', $p->slug)); ?>"><?php if(strlen(strip_tags($p->name)) > 30): ?> <?php echo substr(strip_tags($p->name), 0,30)."..."; ?> <?php else: ?> <?php echo substr(strip_tags($p->name), 0,30); ?> <?php endif; ?></a></h4>
                                    <p>
                                    </p>
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

                                    <a class="primary_img" href="<?php echo e(route('product-single', $p->slug)); ?>"><img class="lazy"
                                       data-original="<?php echo e($p->image); ?>" alt="<?php echo e($p->name ?? 'Product Image'); ?>"></a>

                                    <div class="action_links">
                                       <span class="inner product_data">
                                          <ul>
                                             <?php if(count(getInStockVarients($p))): ?>
                                             <input type="hidden" class="id" name="id" value="<?php echo e($p->id); ?>" data-id="<?php echo e($p->id); ?>">

                                             <?php $__currentLoopData = getInStockVarients($p); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <input type="hidden" class="varient" data-varient="<?php echo e($v->id); ?>" name="varient" value="<?php echo e($v->id); ?>"  data-price='<?php echo e(get_price(get_price_varients($v))); ?>' data-mrp='<?php echo e(get_price(get_mrp_varients($v))); ?>' data-savings='<?php echo e(get_savings_varients($v)); ?>' checked>
                                             <input type="hidden" class="qtyPicker qtyPicker-single-page qty" name="qty" type="number" id="qty-<?php echo e($v->id); ?>" name="qty" data-min="1" min="1" max="<?php echo e((int)$v->stock+1); ?>" data-max="<?php echo e((int)$v->stock+1); ?>" data-max-allowed="<?php echo e(Cache::get('max_cart_items_count')+1); ?>" value="<?php echo e($v->cart_count+1); ?>" readonly data-qty="<?php echo e($v->cart_count+1); ?>">
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                             <input type="hidden" class="slug" value="<?php echo e($p->slug); ?>" data-slug="<?php echo e($p->slug); ?>">
                                             <input type="hidden" class="name" name="name" value="<?php echo e($p->name); ?>" data-name="<?php echo e($p->name); ?>">
                                             <input type="hidden" class="image" name="image" value="<?php echo e($p->image); ?>" data-image="<?php echo e($p->image); ?>">
                                             <input type="hidden" class="price" name="price" value="<?php echo e(print_price($p)); ?>" data-price="<?php echo e(print_price($p)); ?>">
                                             <?php if(count(getInStockVarients($p))>1): ?>
                                             <li class="add_to_cart productmodal" data-bs-toggle="modal" data-bs-target="#modal_box" data-tab="login"><a title="Add to cart"><span class="fas fa-shopping-cart"></span></a></li>
                                             <?php else: ?>
                                             <li class="add_to_cart addtocart_single" data-id="<?php echo e($p->id); ?>" data-varient="<?php echo e($v->id); ?>" data-qty="1"><a title="Add to cart"><span class="fas fa-shopping-cart"></span></a></li>
                                             <?php endif; ?>
                                             <li class="quick_button productmodal"><a title="quick view"><span class="fas fa-eye"></span></a></li>
                                             <?php endif; ?>
                                             <?php if(session()->has('favourite')): ?>
                                             <?php if(in_array($p->id, session()->get('favourite'))): ?>
                                             <li class="wishlist"><a  title="Add to Wishlist" class="saved" data-id='<?php echo e($p->id); ?>'></a></li>
                                             <?php else: ?>
                                             <li class="wishlist"><a  title="Add to Wishlist" class="save" data-id='<?php echo e($p->id); ?>'></a></li>
                                             <?php endif; ?>
                                             <?php else: ?>
                                             <li class="wishlist"><a  title="Add to Wishlist" class="<?php echo e((isset($p->is_favorite) && intval($p->is_favorite)) ? 'saved' : 'save'); ?>" data-id='<?php echo e($p->id); ?>'></a></li>
                                             <?php endif; ?>
                                          </ul>
                                       </span>
                                    </div>
                                 </div>
                                 <figcaption class="product_content">
                                    <h4 class="product_name"><a href="<?php echo e(route('product-single', $p->slug)); ?>"><?php if(strlen(strip_tags($p->name)) > 30): ?> <?php echo substr(strip_tags($p->name), 0,30)."..."; ?> <?php else: ?> <?php echo substr(strip_tags($p->name), 0,30); ?> <?php endif; ?></a></h4>
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
                        <?php else: ?>
                        <?php break; ?>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         </div>
      </div>
   </section>
</div>
<style>
* {
  box-sizing: border-box;
}

.column1 {
  float: left;
  width: 33.33%;
  /*padding: 5px;*/
  
}
#row1{
    /*padding-left: 15px;*/
    /*padding-right: 15px;*/
}

/* Clearfix (clear floats) */
.row1::after {
  content: "";
  clear: both;
  display: table;
}
</style>


<div class="row1 my-2 main-content">
  <div class="column1 main-content">
    <img src="https://grocery.zennit.in/upload/images/img-4.jpg" alt="shopping" style="width:100%">
  </div>
  <div class="column1 main-content">
    <img src="https://grocery.zennit.in/upload/images/img-5.jpg" alt="shopping" style="width:100%">
  </div>
  <div class="column1 main-content">
    <img src="https://grocery.zennit.in/upload/images/img-6.jpg" alt="shopping" style="width:100%">
  </div>
</div>

<?php endif; ?><?php /**PATH /home2/zennit/public_html/web.grocery/resources/views/themes/eCart/parts/style_1.blade.php ENDPATH**/ ?>