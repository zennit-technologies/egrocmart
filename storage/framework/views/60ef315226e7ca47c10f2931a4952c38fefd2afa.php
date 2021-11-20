<!-- breadcumb -->
<section class="page_title corner-title overflow-visible">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1><?php echo e(__('msg.checkout_summary')); ?></h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(route('home')); ?>"><?php echo e(__('msg.home')); ?></a>
                    </li>
                    <li class="breadcrumb-item active">
                        <?php echo e(__('msg.checkout_summary')); ?>

                    </li>
                </ol>
                <div class="divider-15 d-none d-xl-block"></div>
            </div>
        </div>
    </div>
</section>
<!-- eof breadcumb -->
<div class="main-content">
    <section class="checkout-section ptb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-12 mb-4">
                    <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow rounded account-sidebar account-tab mb-sm-30">
                        <div class="dark-bg tab-title-bg">
                            <div class="heading-part">
                                <div class="sub-title text-center"><span></span><em class="far fa-user"></em> <?php echo e(__('msg.my_account')); ?></div>
                            </div>
                        </div>
                        <div class="account-tab-inner">
                            <ul class="account-tab-stap">
                                <li class="active">
                                    <a href="#"><em class="fas fa-wallet"></em><?php echo e(__('msg.cart')); ?><em class="fa fa-angle-right"></em></a>
                                </li>
                                <li>
                                    <a><em class="fas fa-wallet"></em><?php echo e(__('msg.Address')); ?><em class="fa fa-angle-right"></em></a>
                                </li>
                                <li>
                                    <a><em class="far fa-heart"></em><?php echo e(__('msg.checkout_summary')); ?><em class="fa fa-angle-right"></em></a>
                                </li>
                                <li>
                                    <a><em class="fas fa-digital-tachograph"></em><?php echo e(__('msg.payment')); ?><em class="fa fa-angle-right"></em></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12 col-12">
                    <div id="data-step1" class="account-content" data-temp="tabdata">

                            <div class=" cart-main-content pb-2 pb-lg-5">
                                <div class="outer_box px-2 py-4 px-md-4 py-md-3 bg-white shadow rounded mb-3">
                                    <div class="section_title d-flex mb-3 align-items-baseline border-bottom">
                                        <h2>
                                           <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block"><?php echo e(__('msg.Order Summary')); ?></span>
                                        </h2>
                                     </div>
                                    
                                    <div class="row mb-3">
                                        <div class="col-lg-12 col-md-12 col-12">
                                            <div class="table_description">
                                                <div class="cart_page-content">
                                                    <table aria-describedby="cart-table">
                                                        <thead>
                                                            <tr class="cart-header">
                                                                <th scope="col" class="header_product_thumb"><?php echo e(__('msg.Image')); ?></th>
                                                                <th scope="col" class="header_product_name"><?php echo e(__('msg.product')); ?></th>
                                                                <th scope="col" class="header_product-price"><?php echo e(__('msg.price')); ?></th>
                                                                <th scope="col" class="header_product_quantity"><?php echo e(__('msg.qty')); ?></th>
                                                                <th scope="col" class="header_product_total"><?php echo e(__('msg.subtotal')); ?></th>
                                                                <th scope="col" class="header_product_total"><?php echo e(__('msg.action')); ?></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <?php $ready_to_checkout = '1'; ?>
                                                            <?php if(isset($data['cart']['cart']['data']) && is_array($data['cart']['cart']['data']) && count($data['cart']['cart']['data'])): ?>

                                                            <?php $__currentLoopData = $data['cart']['cart']['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if(isset($p->item[0])): ?>
                                                            <?php
                                                            if(isset($p->qty) &&  ($p->qty) > 0){
                                                            $qty = $p->qty;
                                                            }else{
                                                            $qty = $data['cart']['cart_session'][$p->product_variant_id]['quantity'];
                                                            }
                                                            ?>

                                                            <tr>
                                                                <td class="header_product_thumb">
                                                                    <span class="cart__page"><?php echo e(__('msg.Image')); ?></span>
                                                                    <a href="#"><img class="lazy" data-original="<?php echo e($p->item[0]->image); ?>" alt=""></a>
                                                                </td>
                                                                <td class="header_product_name">
                                                                    <span class="cart__page pt-3"><?php echo e(__('msg.product')); ?></span>
                                                                    <?php if(($p->item[0]->is_item_deliverable == false) && (Cache::get('pincode_no') == true)): ?>
                                                                    <p class="deliver_notice"><?php echo e(__('msg.Not Deliverable for')); ?> <?php echo e(Cache::get('pincode_no')); ?></p>
                                                                    <?php $ready_to_checkout = '0'; ?>
                                                                    <?php endif; ?>
                                                                    <a href="#"><?php echo e(strtoupper($p->item[0]->name) ?? '-'); ?></a>
                                                                    <p class="small text-muted text-center"><?php echo e(get_varient_name($p->item[0])); ?>

                                                                        <?php if(intval($p->item[0]->discounted_price)): ?>
                                                                        (<?php echo e(intval($p->item[0]->discounted_price)); ?> X <?php echo e(($qty ?? 1)); ?>)
                                                                        <?php else: ?>
                                                                        (<?php echo e(intval($p->item[0]->price)); ?> X <?php echo e(($qty ?? 1)); ?>)
                                                                        <?php endif; ?>
                                                                        <br><?php echo e(__('msg.tax')." (".$p->item[0]->tax_percentage); ?>% <?php echo e($p->item[0]->tax_title); ?>)
                                                                    </p>
                                                                </td>
                                                                <td class="header_product-price">
                                                                    <span class="cart__page"><?php echo e(__('msg.price')); ?></span>
                                                                    <?php if(intval($p->item[0]->discounted_price)): ?>
                                                                    <?php if(isset($p->item[0]->tax_percentage) && $p->item[0]->tax_percentage > 0): ?>
                                                                    <?php echo e($p->item[0]->discounted_price+($p->item[0]->discounted_price*$p->item[0]->tax_percentage/100) ?? ''); ?>

                                                                    <?php else: ?>
                                                                    <?php echo e($p->item[0]->discounted_price ?? ''); ?>

                                                                    <?php endif; ?>
                                                                    <?php else: ?>
                                                                    <?php if(isset($p->item[0]->tax_percentage) && $p->item[0]->tax_percentage > 0): ?>
                                                                    <?php echo e($p->item[0]->price+($p->item[0]->price*$p->item[0]->tax_percentage/100) ?? ''); ?>

                                                                    <?php else: ?>
                                                                    <?php echo e($p->item[0]->price ?? ''); ?>

                                                                    <?php endif; ?>
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td class="cart sep_cart">
                                                                    <span class="cart__page"><?php echo e(__('msg.qty')); ?></span>
                                                                    <div class="price-wrap cartShow"><?php echo e($qty??1); ?></div>
                                                                    <form action="<?php echo e(route('cart-update-cartpage', $p->product_id)); ?>" method="POST" class="cartEdit">
                                                                        <?php echo csrf_field(); ?>
                                                                        <input type="hidden" name="child_id" value="<?php echo e($p->product_variant_id); ?>">
                                                                        <input type="hidden" name="product_id" value="<?php echo e($p->product_id); ?>">
                                                                        <div class="button-container col pr-0 my-1">
                                                                            <button class="cart-qty-minus button-minus" type="button" id="button-minus<?php echo e($p->product_id); ?>" value="-">-</button>
                                                                            <input class="form-control qtyPicker" type="number" name="qty" data-min="1" min="1" max="<?php echo e(intval(getMaxQty($p->item[0]))); ?>" data-max="<?php echo e(intval(getMaxQty($p->item[0]))); ?>" data-max-allowed="<?php echo e(Cache::get('max_cart_items_count')); ?>" value="<?php echo e($qty??1); ?>" readonly>
                                                                            <button class="cart-qty-plus button-plus" type="button" id="button-plus<?php echo e($p->product_id); ?>" value="+">+</button>
                                                                        </div>
                                                                    </form>
                                                                </td>
                                                                <td class="header_product_total">
                                                                    <span class="cart__page"><?php echo e(__('msg.subtotal')); ?></span>
                                                                    <?php if(intval($p->item[0]->discounted_price)): ?>
                                                                    <?php if(isset($p->item[0]->tax_percentage) && $p->item[0]->tax_percentage > 0): ?>
                                                                    <?php echo e(($p->item[0]->discounted_price+($p->item[0]->discounted_price*$p->item[0]->tax_percentage/100)) * ($qty ?? 1)); ?>

                                                                    <?php else: ?>
                                                                    <?php echo e($p->item[0]->discounted_price * ($qty ?? 1)); ?>

                                                                    <?php endif; ?>
                                                                    <?php else: ?>
                                                                    <?php if(isset($p->item[0]->tax_percentage) && $p->item[0]->tax_percentage > 0): ?>
                                                                    <?php echo e(($p->item[0]->price+($p->item[0]->price*$p->item[0]->tax_percentage/100)) * ($qty ?? 1)); ?>

                                                                    <?php else: ?>
                                                                    <?php echo e($p->item[0]->price * ($qty ?? 1)); ?>

                                                                    <?php endif; ?>
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td>
                                                                    <span class="cart__page"><?php echo e(__('msg.action')); ?></span>
                                                                    <button class="btn btn-light btn-round btnEdit cartShow">
                                                                        <em class="fa fa-pencil-alt"></em>
                                                                    </button>
                                                                    <button class="btn btn-light btn-round cartSave cartEdit cartEditmini">
                                                                        <em class="fas fa-check"></em>
                                                                    </button>
                                                                    <button class="btn btn-light btn-round btnEdit cartEdit cartEditmini">
                                                                        <em class="fa fa-times"></em>
                                                                    </button>
                                                                    <a href="<?php echo e(route('cart-remove-cartpage', $p->product_variant_id )); ?>" class="btn btn-light btn-round"> <em class="fas fa-trash-alt"></em></a>
                                                                </td>
                                                            </tr>
                                                            <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php else: ?>
                                                            <tr>
                                                                <td colspan="6" class="text-center">
                                                                    <img class="lazy" data-original="<?php echo e(asset('images/empty-cart.png')); ?>" alt="No Items In Cart">
                                                                </td>
                                                            </tr>
                                                            <?php endif; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="cart_submit">
                                                    <a href="<?php echo e(route('shop')); ?>" class="btn cart_shopping"><em class="fas fa-angle-double-left"></em>&nbsp;&nbsp;<?php echo e(__('msg.Continue Shopping')); ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <?php if(isset($data['cart']['cart']['data']) && is_array($data['cart']['cart']['data']) && count($data['cart']['cart']['data'])): ?>
                                    <div class="col-12 float-right">
                                        <div class="outer_box px-2 py-4 px-md-4 py-md-3 bg-white shadow rounded">
                                            <div class="grand-total-content">
                                                <div class="title-wrap">
                                                    <h4 class="cart-bottom-title section-bg-gary-cart"><?php echo e(__('msg.Cart Total')); ?></h4>
                                                </div>
                                                <h5><?php echo e(__('msg.subtotal')); ?> : <span><?php echo e(get_price(sprintf("%0.2f",$data['cart']['subtotal'] ?? '-'))); ?></span></h5>
                                                <?php if(isset($data['cart']['cart']) && is_array($data['cart']['cart']) && count($data['cart']['cart'])): ?>
                                                <td colspan="" class="text-end checkoutbtn">
                                                    <?php if(Cache::has('min_order_amount') && intval($data['cart']['subtotal']) >= intval(Cache::get('min_order_amount'))): ?>
                                                    <?php if(Cache::has('pincode')): ?>
                                                    <?php if($ready_to_checkout == '1'): ?>
                                                    <?php if(isLoggedIn()): ?>
                                                    <a href="<?php echo e(route('checkout-address')); ?>" class="btn btn-primary"><?php echo e(__('msg.checkout')); ?>

                                                        <em class="fa fa-arrow-right"></em>
                                                    </a>
                                                    <?php else: ?>
                                                    <a class="btn btn-primary login-popup"><?php echo e(__('msg.checkout')); ?>

                                                        <em class="fa fa-arrow-right"></em>
                                                    </a>
                                                    <?php endif; ?>
                                                    <?php else: ?>
                                                    <a class="btn btn-primary checkout-dbutton"><?php echo e(__('msg.checkout')); ?>

                                                        <em class="fa fa-arrow-right"></em>
                                                    </a>
                                                    <?php endif; ?>
                                                    <?php else: ?>
                                                    <a class="btn btn-primary checkout-spincode-button"><?php echo e(__('msg.checkout')); ?>

                                                        <em class="fa fa-arrow-right"></em></a>
                                                    <?php endif; ?>
                                                    <?php else: ?>
                                                    <a href="" class="btn btn-primary" disabled><?php echo e(__('msg.checkout')); ?>

                                                        <em class="fa fa-arrow-right"></em>
                                                    </a>
                                                    <?php endif; ?>
                                                    <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div><?php /**PATH /home2/zennit/public_html/web.grocery/resources/views/themes/eCart/cart.blade.php ENDPATH**/ ?>