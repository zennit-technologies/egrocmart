<!DOCTYPE html>
<!--v1.0.5 -->
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

    <head>
        <link rel="icon" type="image/x-icon" href="<?php echo e(_asset(Cache::get('favicon', 'images/favicon.ico'))); ?>" />
        <title>
            <?php echo e(((isset($data['title']) && trim($data['title']) != "") ? $data['title']." | " : ''). Cache::get('app_name', get('name'))); ?>

        </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <meta http-equiv="pragma" content="no-cache" />
        <meta http-equiv="cache-control" content="max-age=604800" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="author" content="WRTeam">
        <meta name="keywords" content="<?php echo e(Cache::get('common_meta_keywords', '')); ?>">
        <meta name="description" content="<?php echo e(Cache::get('common_meta_description', '')); ?>">
        <meta property="og:image:width" content="450"/>
        <meta property="og:image:height" content="298"/>

        <!-- fontaweosme icon common-->
        <link href="<?php echo e(theme('fontawesome/css/all.min.css')); ?>" rel="stylesheet" type="text/css" />


        <!-- this for gulp if you dont know about that then dont change it or not uncomment it-->
        <!-- ****************************** gulp start **************************************** -->

        <!-- ltr gulp -->
        <!-- <link href="<?php echo e(theme('css/bundle.css')); ?>" rel="stylesheet" type="text/css" /> -->

        <!-- rtl gulp -->
        <!-- <link href="<?php echo e(theme('css/rtlbundle.css')); ?>" rel="stylesheet" type="text/css" />-->

        <!-- headerbundle gulp -->
        <!--<script src="<?php echo e(theme('js/headerbundle.js')); ?>"></script>-->

        <!-- ****************************** gulp end **************************************** -->


        <link href="<?php echo e(theme('css/select2.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(theme('css/semantic.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(theme('css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(theme('css/jquery-ui.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(theme('css/plugin.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(theme('css/owl-carousel.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(theme('css/calender.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(theme('css/spectrum.min.css')); ?>" rel="stylesheet" type="text/css" />

        <!-- rtl -->
        <!-- <link href="<?php echo e(theme('css/bootstrap.rtl.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(theme('css/rtlcustom.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(theme('css/rtlintlTelInput.css')); ?>" rel="stylesheet" type="text/css" /> -->

        <link href="<?php echo e(theme('css/sweetalert.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(theme('css/intlTelInput.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(theme('css/animate.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(theme('css/custom.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(theme('css/sweetalert.min.css')); ?>" rel="stylesheet" >
        <link href="<?php echo e(theme('css/alertify.min.css')); ?>" rel="stylesheet" type="text/css" />

        <script src="<?php echo e(theme('js/jquery-3.5.1.min.js')); ?>"></script>
        <script src="<?php echo e(theme('js/bootstrap.bundle.min.js')); ?>"></script>
        <script src="<?php echo e(theme('js/jquery-ui.min.js')); ?>"></script>
        <script src="<?php echo e(theme('js/intlTelInput.js')); ?>"></script>
        <script src="<?php echo e(theme('js/alertify.min.js')); ?>"></script>
        <script src="<?php echo e(theme('js/sweetalert.min.js')); ?>"></script>

    <style>
        :root {
            --buttons: <?php echo e(Cache::get('color', '')); ?>;
            --a-hover:<?php echo e(Cache::get('color', '')); ?>;
        }
    </style>

    <script>
        var home = "<?php echo e(get('home_url')); ?>";
        var suc_msg = "<?php echo e(Session::get('suc')); ?>";
        var err_msg = "<?php echo e(Session::get('err')); ?>";
        var error_code = "<?php echo e(Session::get('error_code')); ?>";
        var msg = <?php echo json_encode(__('msg'), JSON_HEX_TAG); ?>;
        var deactivate_user = "<?php echo e($user->status ??''); ?>";
        var user_id = "<?php echo e($user->user_id ??''); ?>";
    </script>

</head>

<body>
    <div id="wrapper">

        <a href="#" id="return-to-top" class="shadow"><em class="fas fa-chevron-up"></em></a>

        <div class="loader">
            <img src="<?php echo e(_asset(Cache::get('loading'))); ?>" alt="preloader">
        </div>

        <!--header area start-->

        <!--offcanvas mobile menu area start-->
        <div class="mobile_overlay"></div>
        <div class="mobile_menu">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="mobile_canvas_open">
                            <a href="javascript:void(0)"><em class="fas fa-bars"></em></a>
                        </div>
                        <div class="mobile_wrapper">
                            <div class="mobile_canvas_close">
                                <a href="javascript:void(0)"><em class="fas fa-times"></em></a>
                            </div>
                            <?php if(Cache::has('social_media') && is_array(Cache::get('social_media')) && count(Cache::get('social_media'))): ?>
                            <div class="header_social_icon text-end">
                                <ul>
                                    <?php $__currentLoopData = Cache::get('social_media'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e($c->link); ?>" target="_blank"><em class="fab <?php echo e($c->icon); ?>"></em></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                            <?php if(trim(Cache::get('support_number', '')) != ''): ?>
                            <div class="connect-with-us">
                                <p><a href="#"><?php echo e(Cache::get('support_number')); ?></a>
                                    <?php echo e(__('msg.customer_support')); ?>

                                </p>
                            </div>
                            <?php endif; ?>
                            <div id="menu" class="text-left ">
                                <ul class="offcanvas_main_menu">
                                    <li class="menu-item-has-children active">
                                        <a href="<?php echo e(route('home')); ?>"><?php echo e(__('msg.home')); ?></a>
                                        <a href="">Catagiries</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="<?php echo e(route('about')); ?>"><?php echo e(__('msg.about us')); ?></a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="<?php echo e(route('page', 'faq')); ?>"><?php echo e(__('msg.faq')); ?></a>
                                    </li>
                                    
                                    <li class="menu-item-has-children">
                                        <a href="<?php echo e(route('contact')); ?>"> <?php echo e(__('msg.contact us')); ?></a>
                                    </li
                                    
                                </ul>
                            </div>
                            <div class="col-lg-12">
                                <p class="text-center"><a href="#"><em class="fas fa-envelope"></em>
                                        <?php echo e(__('msg.support@zennits.com')); ?></a></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--offcanvas menu area end-->

        <header>
            <div class="main_header sticky-header">
                <div class="middle_content ">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-lg-2 col-md-3 col-sm-3 col-12">
                                <div class="logo">
                                    <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(_asset(Cache::get('web_logo'))); ?>" alt="logo"></a>
                                </div>
                            </div>
                            <div class="col-lg-10 col-md-6 col-sm-7 col-12">
                                <div class="content_right_info">
                                    <div class="col d-flex justify-content-center pin__code">
                                        <?php if(isset($data['carticon']) && $data['carticon'] == 0 ): ?>
                                            <button type="button" class="btn hide" data-bs-toggle="modal" data-bs-target="#pincodeModal">
                                                <em class="fas fa-map-marker-alt">&nbsp;<?php echo e(__('msg.deliver to')); ?> <?php echo e(Cache::get('pincode_no')??'All'); ?></em>
                                            </button>
                                            <?php else: ?>
                                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#pincodeModal">
                                                <em class="fas fa-map-marker-alt">&nbsp;<?php echo e(__('msg.deliver to')); ?> <?php echo e(Cache::get('pincode_no')??'All'); ?></em>
                                            </button>
                                        <?php endif; ?>
                                    </div>

                                    <div class="col-8 justify-content-center mobile_screen_none">
                                        <div class="searchbar_content">
                                            <form action="<?php echo e(route('shop')); ?>">
                                                <div class="category_hover_content">
                                                    <?php
                                                    $categories = Cache::get('categories', []);
                                                    ?>
                                                    <select class="" name="category">
                                                        <option selected>All</option>
                                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($c->slug); ?>"><?php echo e($c->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                                <div class="search-box">
                                                    <input placeholder="Search product..." value="<?php echo e(isset($_GET['s']) ? trim($_GET['s']) : ''); ?>" name="s" type="text" class="typeahead" autocomplete="off" id="search">
                                                    <button type="submit"><em class="fas fa-search"></em></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="header_account_area">
                                            <div class="header_account_list register login-sec">
                                                <?php if(isLoggedIn()): ?>
                                                <ul>
                                                    <li>
                                                        <a class="profile__name"><?php echo e(__('msg.hello')); ?> <?php echo e(strlen($user->name) > 10 ? substr($user->name,0,10)."..." : $user->name); ?> <em class="fas fa-chevron-down fa-xs"></em></a>
                                                        <ul class="sub_menu myaccount">
                                                            <li>
                                                                <a href="<?php echo e(route('my-account')); ?>" >
                                                                    <span class="my-profile-img"><img class="lazy" data-original="<?php echo e($user->profile); ?>" alt="profile"></span>
                                                                    <span class="side-menu account-profile "><?php echo e(__('msg.my_profile')); ?></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="<?php echo e(route('change-password')); ?>"><em class="fas fa-key"></em>
                                                                    <span class="side-menu"><?php echo e(__('msg.change_password')); ?></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="<?php echo e(route('my-orders')); ?>"><em class="far fa-list-alt"></em>
                                                                    <span class="side-menu"><?php echo e(__('msg.my_orders')); ?></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="<?php echo e(route('wallet-history')); ?>"><em class="far fa-list-alt"></em>
                                                                    <span class="side-menu"><?php echo e(__('msg.wallet_history')); ?></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="<?php echo e(route('notification')); ?>"><em class="fa fa-bell"></em>
                                                                    <span class="side-menu"><?php echo e(__('msg.notifications')); ?></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="<?php echo e(route('favourite')); ?>"><em class="fa fa-heart"></em>
                                                                    <span class="side-menu"><?php echo e(__('msg.favourite')); ?></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="<?php echo e(route('transaction-history')); ?>"><em class="fa fa-outdent"></em>
                                                                    <span class="side-menu"><?php echo e(__('msg.transaction_history')); ?></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="<?php echo e(route('refer-earn')); ?>"><em class="fas fa-rupee-sign"></em>
                                                                    <span class="side-menu"><?php echo e(__('msg.refer_and_earn')); ?></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="<?php echo e(route('addresses')); ?>"><em class="fa fa-wrench"></em>
                                                                    <span class="side-menu"><?php echo e(__('msg.manage_addresses')); ?></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="<?php echo e(route('logout')); ?>"><em class="fa fa-sign-out-alt"></em>
                                                                    <span class="side-menu"><?php echo e(__('msg.logout')); ?></span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                                <?php else: ?>

                                                    <a data-bs-toggle="modal" data-bs-target="#myModal" data-tab="login"><em class="far fa-user "></em></a>

                                                <?php endif; ?>
                                            </div>
                                            <div class="header_account_list header_wishlist">
                                                <a href="<?php echo e(route('favourite')); ?>"><em class="far fa-heart"></em></a>
                                            </div>
                                            <?php if(isLoggedIn() && isset($data['cart']['cart']) && is_array($data['cart']['cart']) && count($data['cart']['cart'])): ?>
                                            <?php if(isset($data['carticon']) && $data['carticon'] == 0 ): ?>
                                            <div class="header_account_list ">
                                                <?php else: ?>
                                                <div class="header_account_list  mini_cart_wrapper">
                                                    <?php endif; ?>
                                                    <?php else: ?>
                                                    <div class="header_account_list mini_cart_wrapper" id="mini_cart_wrapper_ajax">
                                                        <?php endif; ?>
                                                        <a href="#"><em class="fab fa-opencart "></em>
                                                            <span class="cart_count">
                                                                <?php if(isset($data['cart']['cart']['data']) && is_array($data['cart']['cart']['data']) && count($data['cart']['cart']['data'])): ?>
                                                                <?php if(isset($data['carticon']) && $data['carticon'] == 0 ): ?>
                                                                <span class="hide"></span>
                                                                <?php else: ?>
                                                                <span class="item_count" id="item_count"><?php echo e($data['cart']['cart']['total']); ?></span>
                                                                <?php endif; ?>
                                                                <?php endif; ?>
                                                            </span>
                                                        </a>
                                                        <div class="mini_cart">
                                                            <span class="mini_cart_close">
                                                                <a href="#"><em class="fas fa-times"></em></a>
                                                            </span>
                                                            <?php if(isset($data['cart']['cart']) && is_array($data['cart']['cart']) && count($data['cart']['cart'])): ?>
                                                            <!--mini cart-->
                                                            <div class="cart_gallery">
                                                                <div class="cart_close"></div>
                                                                <table id="myTable" class="table " aria-describedby="minicart">
                                                                    <th scope="col"></th>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="mini_cart-subtotal">
                                                                                <?php if(isset($data['cart']['cart']) && is_array($data['cart']['cart']) && count($data['cart']['cart'])): ?>
                                                                                <span class="text-end innersubtotal">
                                                                                    <p class="product-name"><?php echo e(__('msg.total')); ?> :
                                                                                        <span><?php echo e(get_price(sprintf("%0.2f",$data['cart']['subtotal'])) ?? '-'); ?></span>
                                                                                    </p>
                                                                                </span>
                                                                            </td>
                                                                            <?php endif; ?>
                                                                        </tr>
                                                                        <?php $ready_to_checkout = '1'; ?>
                                                                        <?php if(isset($data['cart']['cart']['data']) &&
                                                                        is_array($data['cart']['cart']['data']) &&
                                                                        count($data['cart']['cart']['data'])): ?>
                                                                        <?php $__currentLoopData = $data['cart']['cart']['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php if(isset($p->item[0])): ?>
                                                                        <?php
                                                                        if(isset($p->qty) &&  ($p->qty) > 0){
                                                                         $qty = $p->qty;
                                                                        }else{
                                                                         $qty = $data['cart']['cart_session'][$p->product_variant_id]['quantity'];
                                                                        }
                                                                        ?>

                                                                        <tr class="cart1price">
                                                                            <td class="text-end checktrash cart">
                                                                                <?php if(($p->item[0]->is_item_deliverable == false) && (Cache::get('pincode_no') == true)): ?>
                                                                                <p class="deliver_notice"><?php echo e(__('msg.Not Deliverable for')); ?> <?php echo e(Cache::get('pincode_no')); ?></p>
                                                                                <?php $ready_to_checkout = '0'; ?>
                                                                                <?php endif; ?>
                                                                                <a href="">
                                                                                    <figure class="itemside">
                                                                                        <div class="aside">
                                                                                            <img src="<?php echo e($p->item[0]->image); ?>" class="img-sm" alt="<?php echo e($p->item[0]->name ?? 'Product Image'); ?>">
                                                                                        </div>
                                                                                        <figcaption class="info minicartinfo">
                                                                                            <a href="" class="title text-dark"><?php echo e($p->item[0]->name ?? '-'); ?></a>
                                                                                            <span class="small"><?php echo e(get_varient_name($p->item[0]) ?? '-'); ?></span>
                                                                                            <br />
                                                                                            <span class="price-wrap cartShow"><?php echo e($qty??'1'); ?></span>
                                                                                            <form action="<?php echo e(route('cart-update', $p->product_id)); ?>" method="POST" class="cartEdit cartEditmini">
                                                                                                <?php echo csrf_field(); ?>
                                                                                                <input type="hidden" name="child_id" value="<?php echo e($p->product_variant_id); ?>">
                                                                                                <input type="hidden" name="product_id" value="<?php echo e($p->product_id); ?>">
                                                                                                <div class="button-container col pr-0 my-1 mini_cart_button">
                                                                                                    <button class="cart-qty-minus button-minus" type="button" id="button-minus-<?php echo e($p->product_variant_id); ?>" value="-">-</button>
                                                                                                    <input class="form-control qtyPicker midd_button" type="number" name="qty" data-min="1" min="1" max="<?php echo e(intval(getMaxQty($p->item[0]))); ?>" data-max="<?php echo e(intval(getMaxQty($p->item[0]))); ?>" data-max-allowed="<?php echo e((Cache::get('max_cart_items_count'))); ?>" value="<?php echo e($qty ?? '1'); ?>" readonly>
                                                                                                    <button class="cart-qty-plus button-plus-cart" type="button" id="button-plus-<?php echo e($p->product_variant_id); ?>" value="+">+</button>
                                                                                                </div>
                                                                                            </form>
                                                                                            <?php if(intval($qty??'1') > 1): ?>
                                                                                            <?php if(intval($p->item[0]->discounted_price)): ?>
                                                                                            x<small class="text-muted">
                                                                                                <?php if(isset($p->item[0]->tax_percentage) && $p->item[0]->tax_percentage > 0): ?>
                                                                                                <?php
                                                                                                $tax_price  =  $p->item[0]->discounted_price + ($p->item[0]->discounted_price * $p->item[0]->tax_percentage/100);
                                                                                                ?>
                                                                                                <?php echo e(get_price($tax_price)); ?></small>
                                                                                            <?php else: ?>
                                                                                            <?php echo e(get_price($p->item[0]->discounted_price)); ?></small>
                                                                                            <?php endif; ?>
                                                                                            <?php else: ?>
                                                                                            x<small class="text-muted">
                                                                                                <?php if(isset($p->item[0]->tax_percentage) && $p->item[0]->tax_percentage > 0): ?>
                                                                                                <?php
                                                                                                $tax_price  =  $p->item[0]->price + ($p->item[0]->price * $p->item[0]->tax_percentage/100);
                                                                                                ?>
                                                                                                <?php echo e(get_price($tax_price)); ?></small>
                                                                                            <?php else: ?>
                                                                                            <?php echo e(get_price($p->item[0]->price)); ?></small>
                                                                                            <?php endif; ?>
                                                                                            <?php endif; ?>
                                                                                            <?php endif; ?>
                                                                                        </figcaption>
                                                                                    </figure>
                                                                                </a>
                                                                                <div class="price-wrap">
                                                                                    <var class="price">
                                                                                        <?php if(isset($p->item[0]->tax_percentage) && $p->item[0]->tax_percentage > 0): ?>
                                                                                        <?php if(intval($p->item[0]->discounted_price)): ?>
                                                                                        <?php
                                                                                        $tax_price  =  $p->item[0]->discounted_price + ($p->item[0]->discounted_price * $p->item[0]->tax_percentage/100);
                                                                                        ?>
                                                                                        <?php echo e(get_price(sprintf("%0.2f", $tax_price * ($qty ?? 1) ))); ?>

                                                                                        <?php else: ?>
                                                                                        <?php
                                                                                        $tax_price  =  $p->item[0]->price + ($p->item[0]->price * $p->item[0]->tax_percentage/100);
                                                                                        ?>
                                                                                        <?php echo e(get_price(sprintf("%0.2f",$tax_price * ($qty ?? 1) ))); ?>

                                                                                        <?php endif; ?>
                                                                                        <?php else: ?>
                                                                                        <?php if(intval($p->item[0]->discounted_price)): ?>
                                                                                        <?php echo e(get_price(sprintf("%0.2f", $p->item[0]->discounted_price * ($qty ?? 1) ))); ?>

                                                                                        <?php else: ?>
                                                                                        <?php echo e(get_price(sprintf("%0.2f", $p->item[0]->price * ($qty ?? 1) ))); ?>

                                                                                        <?php endif; ?>
                                                                                        <?php endif; ?>
                                                                                    </var>
                                                                                </div>
                                                                                <button class="btn btn-light btn-round btnEdit cartShow">
                                                                                    <em class="fa fa-pencil-alt"></em>
                                                                                </button>
                                                                                <button class="btn btn-light btn-round cartSave cartEdit cartEditmini">
                                                                                    <em class="fas fa-check"></em>
                                                                                </button>
                                                                                <button class="btn btn-light btn-round btnEdit cartEdit cartEditmini">
                                                                                    <em class="fa fa-times"></em>
                                                                                </button>
                                                                                <button class="btn btn-light btn-round cartDelete" data-varient="<?php echo e($p->product_variant_id); ?>">
                                                                                    <em class="fas fa-trash-alt"></em>
                                                                                </button>
                                                                            </td>
                                                                        </tr>
                                                                        <?php endif; ?>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php else: ?>
                                                                        <tr>
                                                                            <td colspan="4" class="text-center">
                                                                                <img src="<?php echo e(asset('images/empty-cart.png')); ?>" alt="No Items In Cart">
                                                                                <br><br>
                                                                                <a href="<?php echo e(route('shop')); ?>" class="btn btn-primary"><em class="fa fa-chevron-left  mr-1"></em><?php echo e(__('msg.continue_shopping')); ?></a>
                                                                            </td>
                                                                        </tr>
                                                                        <?php endif; ?>
                                                                    </tbody>
                                                                    <tfoot>
                                                                        <tr>
                                                                            <?php if(isset($data['cart']['cart']['data']) && is_array($data['cart']['cart']['data']) && count($data['cart']['cart']['data'])): ?>
                                                                            <td colspan="" class="text-end checkoutbtn">
                                                                                <?php if(Cache::has('min_order_amount') && intval($data['cart']['subtotal']) >= intval(Cache::get('min_order_amount'))): ?>
                                                                                <?php if(Cache::has('pincode')): ?>
                                                                                <?php if($ready_to_checkout == '1'): ?>
                                                                                <?php if(isLoggedIn()): ?>
                                                                                <a href="<?php echo e(route('checkout-address')); ?>" class="btn btn-primary"><?php echo e(__('msg.checkout')); ?>

                                                                                    <em class="fa fa-arrow-right"></em></a>
                                                                                <?php else: ?>
                                                                                <a class="btn btn-primary login-popup"><?php echo e(__('msg.checkout')); ?>

                                                                                    <em class="fa fa-arrow-right"></em>
                                                                                </a>
                                                                                <?php endif; ?>
                                                                                <?php else: ?>
                                                                                <a class="btn btn-primary checkout-dbutton"><?php echo e(__('msg.checkout')); ?>

                                                                                    <em class="fa fa-arrow-right"></em></a>
                                                                                <?php endif; ?>
                                                                                <?php else: ?>
                                                                                <a class="btn btn-primary checkout-spincode-button"><?php echo e(__('msg.checkout')); ?> <em class="fa fa-arrow-right"></em></a>
                                                                                <?php endif; ?>
                                                                                <?php else: ?>
                                                                                <a href="" class="btn btn-primary" disabled><?php echo e(__('msg.checkout')); ?> <em class="fa fa-arrow-right"></em></a>
                                                                                <?php endif; ?>
                                                                                <a href="<?php echo e(route('cart')); ?>" class="btn btn-primary"><?php echo e(__('msg.viewcart')); ?>

                                                                                    <em class="fa fa-arrow-right"></em>
                                                                                </a>
                                                                            </td>
                                                                            <td colspan="" class="text-center mini_cart-subtotal ">
                                                                                <?php if(isset($data['cart']['cart']['saved_price']) && floatval($data['cart']['cart']['saved_price'])): ?>
                                                                                <p class="product-name text-center"><?php echo e(__('msg.saved_price')); ?> : <span> <?php echo e(get_price(sprintf("%0.2f", $data['cart']['cart']['saved_price']))); ?></span></p>
                                                                                <?php endif; ?>
                                                                            </td>
                                                                            <?php endif; ?>
                                                                        </tr>
                                                                    </tfoot>
                                                                </table>
                                                            </div>
                                                            <!--mini cart end-->
                                                            <?php else: ?>
                                                            <div class="text-center mini_no_cart">
                                                                <img src="<?php echo e(asset('images/empty-cart.png')); ?>" alt="No Items In Cart">
                                                                <br><br>
                                                                <a href="<?php echo e(route('shop')); ?>" class="btn btn-primary text-white"><em class="fa fa-chevron-left  mr-1"></em><?php echo e(__('msg.continue_shopping')); ?></a>
                                                            </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="header_bottom">
                        <div class="container-fluid">
                            <div class="row align-items-center">

                                <div class="col-lg-3 col-md-6 mb-sm-2 mb-2 mb-md-0">
                                    <div class="categories_menu">
                                        <?php
                                        $categories = Cache::get('categories', []);
                                        $maxProductToShow = 10;
                                        $totalCategories = count($categories);
                                        ?>
                                        <div class="title_content">

                                            <h2 class="categories_toggle"><em class="fas fa-bars"></em><?php echo e(__('msg.all_categories')); ?></h2>
                                            <em class="fas fa-chevron-down fa-xs"></em>
                                        </div>
                                        <div class="categories_content_toggle">
                                            <ul>
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(isset($c->childs) && count((array)$c->childs)): ?>
                                                <li class="menu_item_content <?php echo e($k >= $maxProductToShow ? 'hidden' : ''); ?>">
                                                    <a href="<?php echo e(route('category', $k)); ?>"><?php echo e($c->name); ?><em class="fas fa-plus fa-xs"></em></a>
                                                    <ul class="cate_mega_menu">
                                                        <?php $__currentLoopData = $c->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li><a href="<?php echo e(route('shop', ['category' => $c->slug, 'sub-category' => $child->slug])); ?>"><?php echo e($child->name); ?></a></li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                </li>
                                                <?php else: ?>
                                                <li class="menu_item_content <?php echo e($k >= $maxProductToShow ? 'hidden' : ''); ?>">
                                                    <a href="<?php echo e(route('category', $k)); ?>"><?php echo e($c->name); ?></a>
                                                </li>
                                                <?php endif; ?>
                                                <?php if(intval(--$maxProductToShow)): ?>
                                                <?php else: ?>
                                                <?php if($maxProductToShow == 0): ?>
                                                <li>
                                                    <a href="#" id="more-btn"><em class="fa fa-plus" aria-hidden="true"></em>
                                                        <?php echo e(__('msg.more_categories')); ?>

                                                    </a>
                                                </li>
                                                <?php endif; ?>
                                                <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="mobail_s_block">
                                        <div class="searchbar_content">
                                            <form action="<?php echo e(route('shop')); ?>">
                                                <div class="category_hover_content">
                                                    <?php
                                                    $categories = Cache::get('categories', []);
                                                    ?>
                                                    <select class="" name="category">
                                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($c->slug); ?>"><?php echo e($c->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                                <div class="search-box">
                                                    <input placeholder="Search product..." value="<?php echo e(isset($_GET['s']) ? trim($_GET['s']) : ''); ?>" name="s" type="text" class="typeahead search" autocomplete="off" id="searchm">
                                                    <button type="submit"><span class="fas fa-search"></span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                     <!--main menu start-->
                                     <div class="main_menu_content main_menu_position">
                                        <nav>
                                            <ul>
                                                <li>
                                                    <a href="<?php echo e(route('home')); ?>" class="<?php echo e(request()->is('/') ? 'active' : ''); ?>"><?php echo e(__('msg.home')); ?>

                                                    </a>
                                                </li>
                                                <!--<li class="mega_items_content"><a href="<?php echo e(route('shop')); ?>" class="<?php echo e(request()->is('shop') ? 'active' : ''); ?>"><?php echo e(__('msg.shop')); ?></a>-->
                                                <!--</li>-->
                                                <li class="mega_items_content"><a href="<?php echo e(route('about')); ?>" class="<?php echo e(request()->is('about') ? 'active' : ''); ?>"><?php echo e(__('msg.about us')); ?></a></li>
                                                <li class="mega_items_content"><a href="<?php echo e(route('page', 'faq')); ?>" class="<?php echo e(request()->is('page/contact') ? 'active' : ''); ?>"><?php echo e(__('msg.faq')); ?></a></li>
                                                
                                                <li>
                                                    <a href="<?php echo e(route('contact')); ?>" class="<?php echo e(request()->is('contact') ? 'active' : ''); ?>"> <?php echo e(__('msg.contact us')); ?></a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <!--main menu end-->

                                </div>
                                <div class="col-lg-3">
                                    <?php if(trim(Cache::get('support_number', '')) != ''): ?>
                                    <div class="connect-with-us">
                                    <em class="fas fa-mobile"></em>
                                        <p>
                                            <a href="#"><?php echo e(Cache::get('support_number')); ?></a>
                                            <?php echo e(__('msg.customer_support')); ?>

                                        </p>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </header>
        <!--header area end-->
        <!-- modal area start-->
        <div class="modal fade" id="productvariant" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="quick_view modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><em class="fas fa-times"></em></span>
                    </button>
                    <div class="modal_body product_details">
                        <div class="container productmodaldetails">
                            <span class="productmodaldetails">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id='loader2'>
            <img src="<?php echo e(asset('images/loading.gif')); ?>"  id="preloader" alt="preloader">
        </div>

        <div class="modal fade" id="pincodeModal" tabindex="-1" aria-labelledby="pincodeModalLabel" aria-hidden="true">
            <div class="pincode modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="defaulthead modal-header">
                        <h5 class="modal-title" id="pincodeModalLabel"> <?php echo e(__('msg.Default Delivery Location')); ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-header">
                        <h6 class="warning-title"> <?php echo e(__('msg.selected location line')); ?></h6>
                    </div>
                    <div class="modal-body">
                        <div class="wrapper-dropdown-5 dd" tabindex="1">
                            <?php if(Cache::has('locations') && is_array(Cache::get('locations')) && !empty(Cache::get('locations')['data'])): ?>
                            <input class="inP live-search-box form-control" type="text" name="selected_pincode" placeholder="<?php echo e(Cache::get('pincode_no')); ?>" autocomplete="off" onkeyup="searchclick()" id="searchclick">
                            <ul class="dropdown live-search-list">
                            <li class="item">
                                <a class="close-pincode-modal" href="<?php echo e(route('home-pincode-clear')); ?>"> <?php echo e(__('msg.all')); ?></a>
                            </li>
                            <?php $__currentLoopData = Cache::get('locations')['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!empty($loc->pincode)): ?>
                            <li class="item">
                                <a class="close-pincode-modal" href="<?php echo e(route('home-pincode', $loc->id)); ?>"><?php echo e($loc->pincode); ?></a>
                            </li>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php /**PATH /home2/zennit/public_html/web.grocery/resources/views/themes/eCart/common/header.blade.php ENDPATH**/ ?>