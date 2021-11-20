<!-- breadcumb -->
<section class="page_title corner-title overflow-visible">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1><?php echo e($data['title']); ?></h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(route('home')); ?>"><?php echo e(__('msg.home')); ?></a>
                    </li>
                    <li class="breadcrumb-item active">
                        <?php echo e($data['title']); ?>

                    </li>
                </ol>
                <div class="divider-15 d-none d-xl-block"></div>
            </div>
        </div>
    </div>
</section>
<!-- eof breadcumb -->
<div class="main-content mt-4 my-md-2">
    <section class="new-arrival mb-lg-5">
        <div class="container">
            <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product_right_bar">
                            <div class="product_container">
                                <div class="section_title d-flex mb-3 align-items-baseline border-bottom">
                                    <h2>
                                        <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block"><?php echo e(__('msg.subcategory')); ?></span>
                                    </h2>

                                </div>
                                <?php if(isset($data['sub-categories']) && COUNT($data['sub-categories'])): ?>
                                <div class="product_carousel_content subcategory-carousel owl-carousel">
                                    <?php $__currentLoopData = $data['sub-categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="product_items">
                                        <article class="single_product">
                                            <figure>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="<?php echo e(route('shop', ['category' => $data['category']->slug, 'sub-category' => $c->slug])); ?>">
                                                        <img class="lazy" data-original="<?php echo e($c->image); ?>" alt="<?php echo e($c->name ?? ''); ?>">
                                                    </a>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name">
                                                        <a href="<?php echo e(route('shop', ['category' => $data['category']->slug, 'sub-category' => $c->slug])); ?>"><?php echo e($c->name); ?></a>
                                                    </h4>
                                                    <p class="pb-4"><?php echo e($c->subtitle); ?></p>
                                                </figcaption>
                                            </figure>
                                        </article>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <?php else: ?>
                                <div class="">
                                    <div class="col">
                                        <br><br>
                                        <h1 class="text-center"><?php echo e(__('msg.no_subcategory_found')); ?></h1>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded mt-3">
                <div class="row">
                    <div class="col-md-12">
                        <?php if(isset($data['list']) && isset($data['list']) && is_array($data['list']) && count($data['list'])): ?>
                        <?php $__currentLoopData = $data['list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(isset($p->variants) && count($p->variants)): ?>
                        <?php if($loop->first): ?>
                        <div class="shop_toolbar_content mb-3">
                            <div class="shop_toolbar_btn sub_Cat">
                                <button data-role="grid-view" type="button" class="active btn-grid-view" data-toggle="tooltip" title="grid"></button>
                                <button data-role="list-view" type="button"  class="btn-list-view" data-toggle="tooltip" title="List"></button>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <!--shop toolbar end-->
                        <div class="row right_shop_content grid-view">
                            <?php $__currentLoopData = $data['list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(isset($p->variants) && count($p->variants)): ?>
                            <div class="col-xxl-3 col-xl-4 col-md-6 col-sm-6 col-12">
                                <div class="single_product_content px-2 py-4 px-md-4 py-md-3 bg-white shadow rounded">
                                    <?php if(!count(getInStockVarients($p))): ?>
                                    <div class="content_label">
                                        <span class="sold-out"><?php echo e(__('msg.sold_out')); ?></span>
                                    </div>
                                    <?php endif; ?>
                                    <div class="inner_product_content">

                                        <a class="img_content" href="<?php echo e(route('product-single', $p->slug ?? '-')); ?>">
                                            <img class="lazy" data-original="<?php echo e($p->image); ?>" alt="<?php echo e($p->image); ?>">
                                        </a>

                                        <div class="share_links inner product_data">
                                            <?php if(count(getInStockVarients($p))): ?>
                                            <form action="<?php echo e(route('cart-add-single-varient')); ?>" method="POST">
                                                <input type="hidden" class="id" name="id" value="<?php echo e($p->id); ?>" data-id="<?php echo e($p->id); ?>">
                                                <?php $__currentLoopData = getInStockVarients($p); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <input type="hidden" class="qtyPicker qtyPicker-single-page qty" name="qty" type="number" id="qty-<?php echo e($v->id); ?>" name="qty" data-min="1" min="1" max="<?php echo e((int)$v->stock+1); ?>" data-max="<?php echo e((int)$v->stock+1); ?>" data-max-allowed="<?php echo e(Cache::get('max_cart_items_count')+1); ?>" value="<?php echo e($v->cart_count+1); ?>" readonly data-qty="<?php echo e($v->cart_count+1); ?>">
                                                <input type="hidden" class="varient" data-varient="<?php echo e($v->id); ?>" name="varient" value="<?php echo e($v->id); ?>"  data-price='<?php echo e(get_price(get_price_varients($v))); ?>' data-mrp='<?php echo e(get_price(get_mrp_varients($v))); ?>' data-savings='<?php echo e(get_savings_varients($v)); ?>' checked>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <input type="hidden" class="slug" value="<?php echo e($p->slug); ?>" data-slug="<?php echo e($p->slug); ?>">
                                                <ul>
                                                    <?php if(count(getInStockVarients($p))>1): ?>
                                                    <li class="add_to_cart productmodal">
                                                        <a  title="Add to cart"><span class="fas fa-shopping-cart"></span></a>
                                                    </li>
                                                    <?php else: ?>
                                                    <li class="add_to_cart addtocart_single" data-id="<?php echo e($p->id); ?>" data-varient="<?php echo e($v->id); ?>" data-qty="1">
                                                        <a title="Add to cart"><span class="fas fa-shopping-cart"></span></a>
                                                    </li>
                                                    <?php endif; ?>
                                                    <li class="quick_button productmodal"><a title="quick view"><span class="fas fa-eye"></span></a></li>
                                                    <?php endif; ?>
                                                    <li class="wishlist">
                                                        <a class="<?php echo e((isset($p->is_favorite) && intval($p->is_favorite)) ? 'saved' : 'save'); ?>" data-id='<?php echo e($p->id); ?>' title="Add to Wishlist"></a>
                                                    </li>
                                                </ul>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="product_content inner_grid_content">
                                        <h4 class="product_name"><a href="<?php echo e(route('product-single', $p->slug ?? '-')); ?>"><?php echo e($p->name); ?></a></h4>
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
                                                <input type="hidden" class="id" name="id" value="<?php echo e($p->id); ?>" data-id="<?php echo e($p->id); ?>">
                                                <?php $__currentLoopData = getInStockVarients($p); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <input type="hidden" class="qtyPicker qtyPicker-single-page qty" name="qty" type="number" id="qty-<?php echo e($v->id); ?>" name="qty" data-min="1" min="1" max="<?php echo e((int)$v->stock+1); ?>" data-max="<?php echo e((int)$v->stock+1); ?>" data-max-allowed="<?php echo e(Cache::get('max_cart_items_count')+1); ?>" value="<?php echo e($v->cart_count+1); ?>" readonly data-qty="<?php echo e($v->cart_count+1); ?>">
                                                <input type="hidden" class="varient" data-varient="<?php echo e($v->id); ?>" name="varient" value="<?php echo e($v->id); ?>"  data-price='<?php echo e(get_price(get_price_varients($v))); ?>' data-mrp='<?php echo e(get_price(get_mrp_varients($v))); ?>' data-savings='<?php echo e(get_savings_varients($v)); ?>' checked>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <input type="hidden" class="slug" value="<?php echo e($p->slug); ?>" data-slug="<?php echo e($p->slug); ?>">
                                                <?php if(count(getInStockVarients($p))>1): ?>
                                                <li class="add_to_cart productmodal" data-bs-toggle="modal" data-bs-target="#modal_box" data-tab="login">
                                                    <a title="Add to cart"><?php echo e(__('msg.add_to_cart')); ?></span></a>
                                                </li>
                                                <?php else: ?>
                                                <li class="add_to_cart addtocart_single" data-id="<?php echo e($p->id); ?>" data-varient="<?php echo e($v->id); ?>" data-qty="1">
                                                    <a title="Add to cart"><?php echo e(__('msg.add_to_cart')); ?></span></a>
                                                </li>
                                                <?php endif; ?>
                                                <?php endif; ?>
                                                <li class="wishlist">
                                                    <a title="Add to Wishlist" class="<?php echo e((isset($p->is_favorite) && intval($p->is_favorite)) ? 'saved' : 'save'); ?>" data-id='<?php echo e($p->id); ?>'></a>
                                                </li>
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
                                <h1 class="text-center"><?php echo e(__('msg.no_product_found')); ?></h1>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div><?php /**PATH /home2/zennit/public_html/web.grocery/resources/views/themes/eCart/sub-categories.blade.php ENDPATH**/ ?>