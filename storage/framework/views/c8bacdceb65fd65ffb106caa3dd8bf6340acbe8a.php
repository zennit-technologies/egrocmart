<!-- breadcumb -->
<section class="page_title corner-title overflow-visible">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1><?php echo e(__('msg.favourites')); ?></h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(route('my-account')); ?>"><?php echo e(__('msg.my_account')); ?></a>
                    </li>
                    <li class="breadcrumb-item active">
                        <?php echo e(__('msg.favourites')); ?>

                    </li>
                </ol>
                <div class="divider-15 d-none d-xl-block"></div>
            </div>
        </div>
    </div>
</section>
<!-- eof breadcumb -->
<div class="main-content">
    <section class="favourite_sec checkout-section ptb-70">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-12 mb-4">
                    <?php echo $__env->make("themes.".get('theme').".user.sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="col-xl-9 col-lg-8 col-12">
                    <!--shop wrapper start-->
                    <?php if(isset($data['list']) && isset($data['list']['data']) && is_array($data['list']['data']) && count($data['list']['data'])): ?>
                    <!--shop toolbar start-->
                    <div class="shop_toolbar_content px-2 py-4 px-md-4 py-md-3 bg-white shadow rounded mb-3">
                        <div class="shop_toolbar_btn">
                            <button data-role="grid-view" type="button" class="active btn-grid-view" data-toggle="tooltip" title="grid"></button>
                            <button data-role="list-view" type="button"  class="btn-list-view" data-toggle="tooltip" title="List"></button>
                        </div>
                    </div>
                    <!--shop toolbar end-->
                    <div class="row right_shop_content grid-view">
                        <?php $__currentLoopData = $data['list']['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(count($p->variants)): ?>
                        <div class="col-xxl-3 col-xl-4 col-md-6 col-sm-6 col-12" id="fav<?php echo e($p->product_id ?? $p->id); ?>">
                            <div class="single_product_content px-2 py-4 px-md-4 py-md-3 bg-white shadow rounded">
                                <?php if(!count(getInStockVarients($p))): ?>
                                <div class="content_label">
                                    <span class="sold-out"><?php echo e(__('msg.sold_out')); ?></span>
                                </div>
                                <?php endif; ?>
                                <div class="inner_product_content">

                                    <a class="img_content" href="<?php echo e(route('product-single', $p->slug ?? '-')); ?>"><img class="lazy" data-original="<?php echo e($p->image); ?>" alt="<?php echo e($p->image); ?>"></a>

                                    <div class="share_links inner product_data">
                                        <?php if(count(getInStockVarients($p))): ?>
                                        <form action="<?php echo e(route('cart-add-single-varient')); ?>" method="POST">
                                            <input type="hidden" class="id" name="id" value="<?php echo e($p->product_id ?? $p->id); ?>" data-id="<?php echo e($p->product_id ?? $p->id); ?>">
                                            <?php $__currentLoopData = getInStockVarients($p); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <input type="hidden" class="qtyPicker qtyPicker-single-page qty" name="qty" type="number" id="qty-<?php echo e($v->id); ?>" data-min="1" min="1" max="<?php echo e((int)$v->stock+1); ?>" data-max="<?php echo e((int)$v->stock+1); ?>" data-max-allowed="<?php echo e(Cache::get('max_cart_items_count')+1); ?>" value="<?php echo e($v->cart_count+1); ?>" readonly data-qty="<?php echo e($v->cart_count+1); ?>">
                                            <input type="hidden" class="varient" data-varient="<?php echo e($v->id); ?>" name="varient" value="<?php echo e($v->id); ?>"  data-price='<?php echo e(get_price(get_price_varients($v))); ?>' data-mrp='<?php echo e(get_price(get_mrp_varients($v))); ?>' data-savings='<?php echo e(get_savings_varients($v)); ?>' checked>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <input type="hidden" class="slug" value="<?php echo e($p->slug); ?>" data-slug="<?php echo e($p->slug); ?>">
                                            <ul>
                                                <?php if(count(getInStockVarients($p))>1): ?>
                                                <li class="add_to_cart productmodal"><a  title="Add to cart"><span class="fas fa-shopping-cart"></span></a></li>
                                                <?php else: ?>
                                                <li class="add_to_cart addtocart_single" data-id="<?php echo e($p->product_id ?? $p->id); ?>" data-varient="<?php echo e($v->id); ?>" data-qty="1"><a title="Add to cart"><span class="fas fa-shopping-cart"></span></a></li>
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
                                                <li class="wishlist"><a  title="Add to Wishlist" class="<?php echo e((isset($p->is_favorite) && intval($p->is_favorite)) ? 'saved' : 'save'); ?>" data-id='<?php echo e($p->product_id); ?>'></a></li>
                                                <?php endif; ?>
                                            </ul>
                                        </form>
                                    </div>
                                </div>
                                <div class="product_content inner_grid_content">
                                    <h4 class="product_name"><a href="<?php echo e(route('product-single', $p->slug ?? '-')); ?>"><?php if(strlen(strip_tags($p->name)) > 30): ?> <?php echo substr(strip_tags($p->name), 0,30)."..."; ?> <?php else: ?> <?php echo substr(strip_tags($p->name), 0,30); ?> <?php endif; ?></a></h4>
                                    <div class="price_box">
                                        <span class="current_price" id="price_<?php echo e($p->id); ?>"><?php echo print_price($p); ?></span>
                                        <span class="old_price" id="mrp_<?php echo e($p->id); ?>"><?php echo print_mrp($p); ?></span>
                                        <?php if(get_savings_varients($p->variants[0])): ?>
                                        <span class="discount-percentage discount-product" id="savings_<?php echo e($p->id); ?>"><?php echo e(get_savings_varients($p->variants[0])); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="product_content inner_list_content">
                                    <h4 class="product_name"><a href="<?php echo e(route('product-single', $p->slug ?? '-')); ?>"><?php echo e($p->name); ?></a></h4>
                                    <div class="price_box">
                                        <span class="current_price"><?php echo print_price($p); ?></span>
                                        <span class="old_price"><?php echo print_mrp($p); ?></span>
                                        <?php if(get_savings_varients($p->variants[0])): ?>
                                        <span class="discount-percentage discount-product" id="savings_<?php echo e($p->id); ?>"><?php echo e(get_savings_varients($p->variants[0])); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="product_desc">
                                        <p><?php if(strlen(strip_tags($p->description)) > 180): ?> <?php echo substr(strip_tags($p->description), 0,180) ."..."; ?> <?php else: ?> <?php echo substr(strip_tags($p->description), 0,180); ?> <?php endif; ?></p>
                                    </div>
                                    <div class="share_links list_action_right inner product_data">
                                        <ul>
                                            <?php if(count(getInStockVarients($p))): ?>
                                            <input type="hidden" class="id" name="id" value="<?php echo e($p->product_id ?? $p->id); ?>" data-id="<?php echo e($p->product_id ?? $p->id); ?>">

                                            <?php $__currentLoopData = getInStockVarients($p); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <input type="hidden" class="qtyPicker qtyPicker-single-page qty" name="qty" type="number" id="qty-<?php echo e($v->id); ?>" name="qty" data-min="1" min="1" max="<?php echo e((int)$v->stock+1); ?>" data-max="<?php echo e((int)$v->stock+1); ?>" data-max-allowed="<?php echo e(Cache::get('max_cart_items_count')+1); ?>" value="<?php echo e($v->cart_count+1); ?>" readonly data-qty="<?php echo e($v->cart_count+1); ?>">
                                            <input type="hidden" class="varient" data-varient="<?php echo e($v->id); ?>" name="varient" value="<?php echo e($v->id); ?>"  data-price='<?php echo e(get_price(get_price_varients($v))); ?>' data-mrp='<?php echo e(get_price(get_mrp_varients($v))); ?>' data-savings='<?php echo e(get_savings_varients($v)); ?>' checked>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <input type="hidden" class="slug" value="<?php echo e($p->slug); ?>" data-slug="<?php echo e($p->slug); ?>">
                                            <?php if(count(getInStockVarients($p))>1): ?>
                                            <li class="add_to_cart productmodal" data-bs-toggle="modal" data-bs-target="#modal_box" data-tab="login"><a title="Add to cart"><?php echo e(__('msg.add_to_cart')); ?></span></a></li>
                                            <?php else: ?>
                                            <li class="add_to_cart addtocart_single" data-id="<?php echo e($p->product_id ?? $p->id); ?>" data-varient="<?php echo e($v->id); ?>" data-qty="1"><a title="Add to cart"><?php echo e(__('msg.add_to_cart')); ?></span></a></li>
                                            <?php endif; ?>
                                            <?php endif; ?>
                                            <?php if(session()->has('favourite')): ?>
                                            <?php if(in_array($p->id, session()->get('favourite'))): ?>
                                            <li class="wishlist"><a  title="Add to Wishlist" class="saved" data-id='<?php echo e($p->id); ?>'></a></li>
                                            <?php else: ?>
                                            <li class="wishlist"><a  title="Add to Wishlist" class="save" data-id='<?php echo e($p->id); ?>'></a></li>
                                            <?php endif; ?>
                                            <?php else: ?>
                                            <li class="wishlist"><a  title="Add to Wishlist" class="<?php echo e((isset($p->is_favorite) && intval($p->is_favorite)) ? 'saved' : 'save'); ?>" data-id='<?php echo e($p->product_id); ?>'></a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php else: ?>
                        <div class="">
                            <div class="col">
                                <br><br>
                                <h1 class="text-center"><?php echo e(__('msg.no_favorites_product_found')); ?></h1>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="shop_toolbar t_bottom">
                        <div class="pagination">
                        </div>
                    </div>
                    <!--shop toolbar end-->
                    <!--shop wrapper end-->
                </div>
            </div>
        </div>
    </section>
</div>
<?php /**PATH /home2/zennit/public_html/web.grocery/resources/views/themes/eCart/user/favorites.blade.php ENDPATH**/ ?>