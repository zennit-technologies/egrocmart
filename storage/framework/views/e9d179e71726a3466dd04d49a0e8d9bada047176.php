<section class="page_title corner-title overflow-visible">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1><?php echo e($data['product']->name ?? '-'); ?></h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(route('home')); ?>"><?php echo e(__('msg.home')); ?></a>
                    </li>
                    <li class="breadcrumb-item active">
                        <?php echo e($data['product']->name ?? '-'); ?>

                    </li>
                </ol>
                <div class="divider-15 d-none d-xl-block"></div>
            </div>
        </div>
    </div>
</section>
<!-- eof breadcumb -->


<div class="main-content my-lg-5  my-md-2">

    
    <section class="product-detail-sec my-2 my-md-3">
        <div class="container">
            <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow rounded">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 col-md-6 col-12">
                        <div class="product-details-tab">
                            <?php if(count(getInStockVarients($data['product']))): ?>
                            <?php else: ?>
                            <div class="content_label">
                                <span class="sold-out"><?php echo e(__('msg.sold_out')); ?></span>
                            </div>
                            <?php endif; ?>
                            <div id="img-1" class="zoomWrapper single-zoom">
                                <a href="#">
                                    <img id="zoom1" src="<?php echo e($data['product']->image); ?>"  alt="<?php echo e($data['product']->name ?? 'Product Image'); ?>" data-zoom-image="<?php echo e($data['product']->image); ?>" alt="big-1">
                                </a>
                            </div>
                            <div class="single-zoom-thumb">
                                <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                                    <?php $count=1; ?>
                                    <?php $__currentLoopData = $data['product']->other_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="#" class="elevatezoom-gallery active" data-update="" data-image="<?php echo e($img); ?>" data-zoom-image="<?php echo e($img); ?>" >
                                            <img src="<?php echo e($img); ?>" alt="<?php echo e($data['product']->name ?? 'Product Image'); ?>" />
                                        </a>
                                    </li>
                                    <?php $count++; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class=" col-xl-7 col-lg-6 col-md-6 col-12">
                        <div class="product_details_right productdetails2">
                            <h1><?php echo e($data['product']->name ?? '-'); ?></h1>
                            <?php if(count(getInStockVarients($data['product']))): ?>
                            <div class="price_box">
                                <span class="current_price" id="price_offer_<?php echo e($data['product']->id); ?>"><?php echo e(Cache::get('currency')); ?><span class='value '></span></span>
                                <span class="old_price" id="price_mrp_<?php echo e($data['product']->id); ?>"><?php echo e(Cache::get('currency')); ?>

                                    <span class='value single_p'></span></span>
                                <span class="current_price" id="price_regular_<?php echo e($data['product']->id); ?>"><?php echo e(Cache::get('currency')); ?>  <span class='value'></span></span>
                                <small class="pro_savings" id="price_savings_<?php echo e($data['product']->id); ?>"><?php echo e(__('msg.you_save')); ?>: <?php echo e(Cache::get('currency')); ?> <span class='value'></span></small>
                            </div>
                            <div class="product_desc">
                                <p><?php if(strlen(strip_tags($data['product']->description)) > 200): ?> <?php echo substr(strip_tags($data['product']->description), 0,200) ."..."; ?> <?php else: ?> <?php echo substr(strip_tags($data['product']->description), 0,200); ?> <?php endif; ?></p>
                                <?php if(strlen($data['product']->description) > 200): ?>
                                <a class="more-content" href="#info" id="description"><?php echo e(__('msg.read_more')); ?></a>
                                <?php endif; ?>
                            </div>
                            <div class="form">
                                <form action="<?php echo e(route('cart-add')); ?>" class="addToCart" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" class="name" name="name" value="<?php echo e($data['product']->name); ?>" data-name="<?php echo e($data['product']->name); ?>">
                                    <input type="hidden" class="image" name="image" value="<?php echo e($data['product']->image); ?>" data-image="<?php echo e($data['product']->image); ?>">
                                    <input type="hidden" class="price" name="price" value="" data-price="">
                                    <input type="hidden" name='id' value='<?php echo e($data['product']->id); ?>'>
                                    <input type="hidden" name="type" value='add'>
                                    <input type="hidden" name="child_id" value='0' id="child_<?php echo e($data['product']->id); ?>">

                                    <div class="product-variant1">
                                        <div class="product-variant__label"><?php echo e(__('msg.available')); ?></div>
                                        <div class="product-variant__list variant btn-group-toggle" data-toggle="buttons">
                                            <?php $firstSelected = true; ?>
                                            <?php $__currentLoopData = getInStockVarients($data['product']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <button class="product-variant__btn pdp-btn product-variant__btn--active trim btn <?php echo e($firstSelected); ?>"  data-id="<?php echo e($data['product']->id); ?>" >
                                                <?php echo e(get_varient_name($v)); ?>

                                                <input hidden type="radio" name="options" id="option<?php echo e($v->id); ?>" value="<?php echo e($v->id); ?>" data-id='<?php echo e($v->id); ?>' data-price='<?php $tax_discounted_price = get_price_varients($v)+(get_price_varients($v)*get_pricetax_varients($data['product']->tax_percentage)/100); print number_format($tax_discounted_price,2); ?> '
                                                data-tax='<?php echo e(get_pricetax_varients($data['product']->tax_percentage)); ?>'
                                                data-mrp='<?php
                                                $get_mrp_varients = get_mrp_varients($v);
                                                if($get_mrp_varients !== ''){
                                                $tax_mrp_price = (int)get_mrp_varients($v)+((int)get_mrp_varients($v)*(int)get_pricetax_varients($data['product']->tax_percentage)/100); print number_format($tax_mrp_price,2);
                                                }
                                                ?>'
                                                data-mrp_number='<?php $tax_mrp_price_number = intval(preg_replace('/[^\d.]/', '', $tax_mrp_price));  print  $tax_mrp_price_number; ?>'
                                                data-savings='<?php echo e(get_savings_varients($v, false)); ?>' data-stock='<?php echo e(intval(getMaxQty($v))); ?>' data-max-allowed-stock='<?php echo e(intval(getMaxQtyAllowed($v))); ?>'
                                                    data-cart_count='<?php echo e(intval(get_cart_count($v))); ?>'
                                                    data-qty='1' autocomplete="off" >
                                            </button>
                                            <?php if($firstSelected == true): ?>
                                            <?php echo e($firstSelected = false); ?>

                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                    <div class="product_variant quantity">
                                    <label><?php echo e(__('msg.quantity')); ?> :</label>
                                    <button class="cart-qty-minus button-minus button-minus-single-page" type="button" id="button-minus" value="-">-</button>
                                    <input class="qtyPicker qtyPicker-single-page" type="number" id="qtyPicker_<?php echo e($data['product']->id); ?>" name="qty" data-min="1" min="1" max="1" data-max="1" data-max-allowed="1" value="1" readonly>
                                    <button class="cart-qty-plus button-plus button-plus-single-page" type="button" id="button-plus" value="+">+</button>
                                    <button class="btn btn-primary  outline-inward" type="submit"><em class="fas fa-shopping-cart pr-2"></em>&nbsp;&nbsp;<?php echo e(__('msg.add_to_cart')); ?></button>
                                    <li class="btn btn-primary pro_fav  <?php echo e(isset($data['product']->is_favorite) && intval($data['product']->is_favorite) ? 'saved' : 'save'); ?>" data-id='<?php echo e($data['product']->id); ?>'></li>
                                </div>
                                </form>
                            </div>
                            <div class="col-lg-6 col-md-6 product__details">
                                <ul class="top_bar_left mb-3">
                                    <li class="price-marquee">
                                        <?php if(Cache::has('pincode_no')): ?>
                                        <p>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pincodeModalsingle">
                                                <em class="fas fa-map-marker-alt">&nbsp;<span class='pincode_msg'><?php echo e(__('msg.Deliverable_to:')); ?> <?php echo e(Cache::get('pincode_no')); ?></span></em>
                                            </button>
                                        </p>
                                        <?php else: ?>
                                        <?php if(isset($data['pincodedata']['error']) && $data['pincodedata']['error'] == true): ?>
                                        <p>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pincodeModalsingle">
                                                <em class="fas fa-map-marker-alt">&nbsp;<span class='pincode_msg'><?php echo e(__('msg.Can_not_deliverable_to')); ?> <?php echo e($data['pincode_no'] ?? '-'); ?></span></em>
                                            </button>
                                        </p>
                                        <?php elseif(isset($data['pincodedata']['error']) && $data['pincodedata']['error'] == false): ?>
                                        <p>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pincodeModalsingle">
                                                <em class="fas fa-map-marker-alt">&nbsp;<span class='pincode_msg'><?php echo e(__('msg.Deliverable_to:')); ?> <?php echo e($data['pincode_no'] ?? '-'); ?></span></em>
                                            </button>
                                        </p>
                                        <?php else: ?>
                                        <p>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pincodeModalsingle">
                                                <em class="fas fa-map-marker-alt">&nbsp;<span class='pincode_msg'><?php echo e(__('msg.Select_a_location_to_see_product_availability')); ?></span></em>
                                            </button>
                                        </p>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                    </li>
                                </ul>
                            </div>
                            <div class='row'>
                                <div class='col-lg-6 col-12'>
                                    <h6>Check Pincode</h6>
                                    <form  method='POST' class='pincode_form'>
                                        <?php echo csrf_field(); ?>
                                        <input type="text" name="product_id" class="form-control" value="<?php echo e($data['product']->id); ?>" hidden>
                                        <input type="text" name="slug" class="form-control" value="<?php echo e($data['product']->slug); ?>" hidden>
                                        <div class="quick_deliver"><input type="text" name="pincode" class="form-control" id="pincode_no" placeholder="Enter a Pincode">
                                            <button class="btn btn-primary" type="submit" name="submit">Apply</button>
                                        </div>
                                    </form>
                                    <br/>
                                </div>
                            </div>
                            <?php else: ?>
                            <?php endif; ?>
                            <div class="priduct_social">
                                <ul>
                                    <li>
                                        <a class="facebook" href="https://facebook.com/sharer.php?u=<?php echo e(url()->current()); ?>" target="_blank" title="facebook"><em class="fab fa-facebook-f"></em><?php echo e(__('msg.Facebook')); ?></a>
                                    </li>
                                    <li>
                                        <a class="twitter" href="http://twitter.com/share?url=<?php echo e(url()->current()); ?>" target="_blank" title="twitter"><em class="fab fa-twitter"></em><?php echo e(__('msg.Twitter')); ?></a>
                                    </li>
                                    <li>
                                        <a class="pinterest" href="http://pinterest.com/pin/create/button/?url=http://www.google.com&media=<?php echo e($data['product']->image); ?>" target="_blank" title="pinterest"><em class="fab fa-pinterest"></em><?php echo e(__('msg.pinterest')); ?></a>
                                    </li>
                                    <li>
                                        <a class="linkedin" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo e(url()->current()); ?>" target="_blank" title="linkedin"><em class="fab fa-linkedin"></em><?php echo e(__('msg.linkedin')); ?></a>
                                    </li>
                                </ul>
                            </div>

                            <!-- policy content -->
                            <div class="card-content text-center policycontent">
                                <?php if(isset($data['product']->return_status)): ?>
                                <div class="col-md-3">
                                    <div class="card productcard returnpolicy">
                                        <?php if(intval($data['product']->return_status)): ?>
                                        <div class="card-img pb-2">
                                            <span class="creativity">
                                                <img class="lazy" data-original="<?php echo e(asset('images/returnable.svg')); ?>" alt="Returnable">
                                            </span>
                                        </div>
                                        <div class="card-box">
                                            <h6 class="card-title text-center">
                                                <?php echo e(Cache::get('max-product-return-days')); ?>

                                                <?php echo e(__('msg.days')); ?> <?php echo e(__('msg.returnable')); ?>

                                            </h6>
                                        </div>
                                        <?php else: ?>
                                        <div class="card-img pb-2">
                                            <span class="creativity">
                                                <img class="lazy" data-original="<?php echo e(asset('images/not-returnable.svg')); ?>" alt="notReturnable">
                                            </span>
                                        </div>
                                        <div class="card-box">
                                            <h6 class="card-title text-center"><?php echo e(__('msg.not_returnable')); ?></h6>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <?php if(isset($data['product']->cancelable_status)): ?>
                                <div class="col-md-3">
                                    <div class="card productcard returnpolicy">
                                        <?php if(intval($data['product']->cancelable_status)): ?>
                                        <div class="card-img pb-2">
                                            <span class="creativity">
                                                <img class="lazy" data-original="<?php echo e(asset('images/cancellable.svg')); ?>" alt="Cancellable">
                                            </span>
                                        </div>
                                        <div class="card-box">
                                            <h6 class="card-title text-center">
                                                <?php echo e(__('msg.order_can_cancel_till_order')); ?>

                                                <?php echo e(strtoupper($data['product']->till_status ?? '')); ?>

                                            </h6>
                                        </div>
                                        <?php else: ?>
                                        <div class="card-img pb-2">
                                            <span class="creativity">
                                                <img class="lazy" data-original="<?php echo e(asset('images/not-cancellable.svg')); ?>" alt="notCancellable">
                                            </span>
                                        </div>
                                        <div class="card-box">
                                            <h6 class="card-title text-center"><?php echo e(__('msg.not_cancellable')); ?></h6>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="seller_name">
                                <p>
                                    <strong><?php echo e(__('msg.seller')); ?></strong>
                                    <a href="<?php echo e(route('seller', $data['product']->seller_slug ?? '-')); ?>"><?php echo ($data['product']->seller_name); ?> </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--product info start-->
    <section class="product_d_info my-2 my-md-3">
        <div class="container">
            <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow rounded">
                <div class="row">
                    <div class="col-12">
                        <div class="product_d_inner">
                            <div class="product_info_button">
                                <ul class="nav" role="tablist">
                                    <li>
                                        <a class="active" data-bs-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false"><?php echo e(__('msg.description')); ?></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="info" role="tabpanel">
                                    <div class="product_info_content">
                                        <?php if(isset($data['product']->manufacturer) && !(empty($data['product']->manufacturer))): ?>
                                        <p> <?php echo e(__('msg.manufacturer')); ?> <?php echo ($data['product']->manufacturer); ?> </p>
                                        <?php endif; ?>
                                        <?php if(isset($data['product']->made_in) && !(empty($data['product']->made_in))): ?>
                                        <p><?php echo e(__('msg.made_in')); ?> <?php echo ($data['product']->made_in); ?></p>
                                        <?php endif; ?>
                                        <p> <?php echo ($data['product']->description); ?> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <?php if(isset($data['similarProducts']) && !empty($data['similarProducts'])): ?>
    <section class="similar-product-sec my-2 my-md-3">
        <div class="container">
            <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow rounded">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product_right_bar">
                            <div class="product_container">
                                <div class="section_title d-flex mb-3 align-items-baseline border-bottom">
                                    <h2>
                                        <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block"><?php echo e(__('msg.similar_products')); ?></span>
                                    </h2>
                                    <div class="desc_title">
                                        
                                    </div>
                                </div>
                                <div class="product_carousel_content similar-pro-carousel owl-carousel">
                                    <?php $__currentLoopData = $data['similarProducts']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="product_items">
                                        <article class="single_product">
                                            <figure>
                                                <?php if(!count(getInStockVarients($p))): ?>
                                                <div class="content_label">
                                                   <span class="label_sale"><?php echo e(__('msg.sold_out')); ?></span>
                                                </div>
                                             <?php endif; ?>
                                                <div class="product_thumb">
                                                    <a class="primary_img" href="<?php echo e(route('product-single', $p->slug)); ?>"><img class="lazy" data-original="<?php echo e($p->image); ?>" alt="<?php echo e($p->name ?? 'Product Image'); ?>"></a>

                                                    <div class="action_links">
                                                        <span class="inner product_data">
                                                            <ul>
                                                                <?php if(count(getInStockVarients($p))): ?>
                                                                <input type="hidden" class="id" name="id" value="<?php echo e($p->id); ?>" data-id="<?php echo e($p->id); ?>">
                                                                <?php $__currentLoopData = getInStockVarients($p); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <input type="hidden" class="qtyPicker qtyPicker-single-page qty" name="qty" type="number" id="qty-<?php echo e($v->id); ?>" name="qty" data-min="1" min="1" max="<?php echo e((int)$v->stock+1); ?>" data-max="<?php echo e((int)$v->stock+1); ?>" data-max-allowed="<?php echo e(Cache::get('max_cart_items_count')+1); ?>" value="<?php echo e($v->cart_count+1); ?>" readonly data-qty="<?php echo e($v->cart_count+1); ?>">
                                                                <input type="hidden" class="varient" data-varient="<?php echo e($v->id); ?>" name="varient" value="<?php echo e($v->id); ?>" data-price='<?php echo e(get_price(get_price_varients($v))); ?>' data-mrp='<?php echo e(get_price(get_mrp_varients($v))); ?>' data-savings='<?php echo e(get_savings_varients($v)); ?>' checked>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <input type="hidden" class="slug" value="<?php echo e($p->slug); ?>" data-slug="<?php echo e($p->slug); ?>">
                                                                <?php if(count(getInStockVarients($p)) > 1): ?>
                                                                <li class="add_to_cart productmodal"><a title="Add to cart"><span class="fas fa-shopping-cart"></span></a>
                                                                </li>
                                                                <?php else: ?>
                                                                <li class="add_to_cart addtocart_single" data-id="<?php echo e($p->id); ?>" data-varient="<?php echo e($v->id); ?>" data-qty="1"><a title="Add to cart"><span class="fas fa-shopping-cart"></span></a>
                                                                </li>
                                                                <?php endif; ?>

                                                                <?php endif; ?>
                                                                <li class="quick_button productmodal">
                                                                    <a title="quick view"><span class="fas fa-search"></span></a>
                                                                </li>
                                                                <li class="wishlist">
                                                                    <a title="Add to Wishlist" class="<?php echo e(isset($p->is_favorite) && intval($p->is_favorite) ? 'saved' : 'save'); ?>" data-id='<?php echo e($p->id); ?>'>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </span>
                                                    </div>
                                                </div>
                                                <figcaption class="product_content">
                                                    <h4 class="product_name">
                                                        <a href="<?php echo e(route('product-single', $p->slug)); ?>"><?php if(strlen(strip_tags($p->name)) > 30): ?> <?php echo substr(strip_tags($p->name), 0,30)."..."; ?> <?php else: ?> <?php echo substr(strip_tags($p->name), 0,30); ?> <?php endif; ?></a>
                                                    </h4>
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
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </section>
</div>

<div class="modal fade" id="pincodeModalsingle" tabindex="-1" aria-labelledby="pincodeModalLabelsingle" aria-hidden="true">
    <div class="pincode modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="defaulthead modal-header">
                <h5 class="modal-title" id="pincodeModalLabelsingle"><?php echo e(__('msg.Check Pincode')); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-header">
                <h6 class="warning-title"><?php echo e(__('msg.Enter Pincode')); ?></h6>
            </div>
            <div class="modal-body">
                <div class="productwrapper">
                    <form action="<?php echo e(route('check-product-availability', $data['product']->slug ?? '-')); ?>" method="POST">
                        <input type="text" name="product_id" class="form-control" value="<?php echo e($data['product']->id ?? '-'); ?>" hidden>
                        <input type="text" name="slug" class="form-control" value="<?php echo e($data['product']->slug ?? '-'); ?>" hidden>
                        <input type="text" name="pincode" class="form-control">
                        <button class="btn btn-primary"><?php echo e(__('msg.Apply')); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home2/zennit/public_html/web.grocery/resources/views/themes/eCart/product.blade.php ENDPATH**/ ?>