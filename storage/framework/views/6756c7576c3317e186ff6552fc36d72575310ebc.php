<!-- breadcumb -->
<section class="page_title corner-title overflow-visible">
   <div class="container">
      <div class="row">
         <div class="col-md-12 text-center">
            <h1><?php echo e(__('msg.my_address')); ?></h1>
            <ol class="breadcrumb">
               <li class="breadcrumb-item">
                  <a href="<?php echo e(route('home')); ?>"><?php echo e(__('msg.home')); ?></a>
               </li>
               <li class="breadcrumb-item active">
                  <?php echo e(__('msg.my_address')); ?>

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
                  <div class="sub-title text-center"><span></span><em class="far fa-user"></em> <?php echo e(__('msg.my_account')); ?>

                  </div>
               </div>
            </div>
            <div class="account-tab-inner">
               <ul class="account-tab-stap">
                  <li>
                     <a href="<?php echo e(route('cart')); ?>"><em class="fas fa-wallet"></em><?php echo e(__('msg.cart')); ?><em class="fa fa-angle-right"></em> </a>
                  </li>
                  <li class="active">
                     <a href="#"><em class="fas fa-wallet"></em><?php echo e(__('msg.Address')); ?><em class="fa fa-angle-right"></em> </a>
                  </li>
                  <li>
                     <a href="#"><em class="far fa-heart"></em><?php echo e(__('msg.checkout_summary')); ?><em class="fa fa-angle-right"></em> </a>
                  </li>
                  <li>
                     <a href="#"><em class="fas fa-digital-tachograph"></em><?php echo e(__('msg.payment')); ?><em class="fa fa-angle-right"></em> </a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
      <div class="col-lg-9 col-md-12 col-12">
         <?php if(isset($data['address']) && is_array($data['address']) && count($data['address'])): ?>
         <div id="data-step1" class="">
            <div class="m-0 outer_box px-2 py-4 px-md-4 py-md-3 bg-white shadow rounded"  id="address">

               <div class="row" id="mydesc">
                  <div class="section_title d-flex mb-3 align-items-baseline border-bottom pl-0">
                     <h2>
                        <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block "><?php echo e(__('msg.Account Information')); ?></span>
                     </h2>
                  </div>

                  <form action="<?php echo e(route('checkout')); ?>" method="POST">
                     <div class="row">
                        <?php $__currentLoopData = $data['address']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(isset($a->id) && intval($a->id)): ?>
                        <div class="col-md-6 mb-1">
                           <div class="cart-total-table address-box commun-table">
                              <div class="table-responsive">
                                 <table class="table table-shopping-cart" aria-describedby="mydesc" aria-hidden="true">
                                    <thead>
                                       <tr class="delivery-address">
                                          <th scope="col"><input type="radio" name="id" value="<?php echo e($a->id); ?>" <?php echo e((count($data['address']) == 1 || (isset($a->is_default) && intval($a->is_default)) ? 'checked=checked' : '')); ?>> <?php echo e($a->type); ?>

                                             <span class="form-group edit-delete">
                                             <button class="btn editAddress" data-data='<?php echo e(json_encode($a)); ?>'> <em class="fa fa-pencil-alt"></em></button>
                                             <a href="<?php echo e(route('address-remove', $a->id)); ?>" class="btn"> <em class="fas fa-times text-danger"></em></a>
                                             </span>
                                          </th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td>
                                             <ul class="address__data">
                                                <li class="inner-heading"> <strong><?php echo e($a->name ?? ''); ?></strong></li>
                                                <li>
                                                   <p><?php echo e($a->address ?? ''); ?>, <?php echo e($a->area_name ?? ''); ?><br>
                                                      <?php echo e($a->city_name ?? ''); ?> - <?php echo e($a->pincode ?? ''); ?><br>
                                                      <?php echo e(__('msg.mobile')); ?>: <?php echo e(($a->country_code ?? '') ." ". ($a->mobile ?? '-')); ?>

                                                   </p>
                                                </li>
                                             </ul>
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </div>
                     <div class="d-flex justify-content-between">
                        <div class="add_new_address_btn">
                           <span onclick="address()" class="btn btn-primary"><?php echo e(__('msg.add_new_address')); ?>&nbsp;&nbsp;<em class="fas fa-plus"></em></span>
                        </div>
                        <?php if(isset($data['address'][0])): ?>
                        <div class="add_new_address_btn">
                           <button type="submit" class="btn btn-primary add-to-cart float-right"><?php echo e(__('msg.Proceed to Checkout')); ?>&nbsp;&nbsp;<em class="fas fa-angle-double-right"></em></button>
                        </div>
                        <?php endif; ?>
                     </div>
                  </form>
               </div>
            </div>
            <div class="row ">
               <div class="col-md-12" id="editAddress">
                  <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow rounded">
                     <div class="section_title d-flex mb-3 align-items-baseline border-bottom pl-0">
                        <h2>
                           <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block "><?php echo e(__('msg.edit_address')); ?></span>
                        </h2>
                     </div>
                        <div class="card-body">
                           <div class="row">
                              <div class="col-lg">
                                 <form action="<?php echo e(route('address-add')); ?>" id='formEditAddress' method="POST">
                                    <input type="hidden" name="id">
                                    <input type="hidden" name="latitude" value="0">
                                    <input type="hidden" name="longitude" value="0">
                                    <input type="hidden" name="country_code" value="0">
                                    <div class="row">
                                       <div class="form-group col-md-6">
                                          <label><?php echo e(__('msg.name')); ?></label>
                                          <div class="ui search focus">
                                             <div class="ui left icon input card-detail-desc">
                                                <input class="form-control" name="name" type="text">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group col-md-6">
                                          <label><?php echo e(__('msg.mobile_no')); ?></label>
                                          <div class="ui search focus">
                                             <div class="ui left icon input card-detail-desc">
                                                <input class="form-control" id='editPhone' type="number" name="mobile">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                       <div class="form-group col-md-6">
                                          <label><?php echo e(__('msg.alternate_mobile_no')); ?></label>
                                          <div class="ui search focus">
                                             <div class="ui left icon input card-detail-desc">
                                                <input class="form-control" type="number" name="alternate_mobile">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group col-md-6">
                                          <label><?php echo e(__('msg.address')); ?></label>
                                          <div class="ui search focus">
                                             <div class="ui left icon input card-detail-desc">
                                                <input class="form-control" type="text" name="address">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                       <div class="form-group col-md-6">
                                          <label><?php echo e(__('msg.landmark')); ?></label>
                                          <div class="ui search focus">
                                             <div class="ui left icon input card-detail-desc">
                                                <input class="form-control" type="text" name="landmark">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group col-md-6">
                                          <label><?php echo e(__('msg.select_city')); ?></label>
                                          <br>
                                          <select name='city' class="form-control" required>
                                          </select>
                                       </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                       <div class="form-group col-md-6">
                                          <label><?php echo e(__('msg.select_area')); ?></label>
                                          <br>
                                          <select name='area' class="form-control" required>
                                          </select>
                                       </div>
                                       <div class="form-group col-md-6">
                                          <label><?php echo e(__('msg.pincode')); ?></label>
                                          <br>
                                          <select name='pincode' class="form-control" required  readonly>
                                          </select>
                                       </div>
                                    </div>
                                    <br/>
                                    <div class="row">
                                       <div class="form-group col-md-6">
                                          <label><?php echo e(__('msg.state')); ?></label>
                                          <input class="form-control" type="text" name="state" required>
                                       </div>
                                       <div class="form-group col-md-6">
                                          <label><?php echo e(__('msg.country')); ?></label>
                                          <input class="form-control" type="text" name="country" required>
                                       </div>
                                    </div>
                                    <br/>


                                       <div class="d-flex">
                                          <div class="form-group">
                                             <label class="radio-inline">
                                             <input class="mr-2" type="radio" name="type" checked value="Home"><?php echo e(__('msg.home')); ?>

                                             </label>
                                          </div>
                                          <div class="form-group">
                                             <label class="radio-inline  ml-5">
                                             <input class="mr-2" type="radio" name="type" value="Work"><?php echo e(__('msg.work')); ?>

                                             </label>
                                          </div>
                                          <div class="form-group">
                                             <label class="radio-inline  ml-5">
                                             <input class="mr-2" type="radio" name="type" value="Other"><?php echo e(__('msg.other')); ?>

                                             </label>
                                          </div>
                                       </div>

                                    <br/>
                                    <div class="form-group mt-1">
                                       <input type="checkbox" name="is_default" class=" mt-1" />
                                       <label class="control-label" for="default-address"> <?php echo e(__('msg.set_as_default_address')); ?></label>
                                    </div>
                                    <br/>
                                    <hr>
                                    <div class="form-group text-end">
                                       <button type="submit" class="btn btn-primary btn-block text-uppercase"> <?php echo e(__('msg.update')); ?> <?php echo e(__('msg.address')); ?></button>
                                       <button class="btn btn-primary btn-block text-uppercase AddEditAddressCancel"> <?php echo e(__('msg.cancel')); ?> </button>
                                    </div>

                                 </form>
                              </div>
                           </div>
                        </div>

                  </div>
               </div>
            </div>
         </div>
            <?php endif; ?>
            <div class="row padding-bottom <?php echo e(count($data['address']) > 0 ? '' : 'visible'); ?>">
               <div class="col-md-12" id="addAddress">
                  <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow rounded">
                     <div class="section_title d-flex mb-3 align-items-baseline border-bottom pl-0">
                        <h2>
                           <span class="border-bottom border-primary border-width-2 pb-3 d-inline-block "><?php echo e(__('msg.add_new_address')); ?></span>
                        </h2>
                     </div>
                        <div class="card-body add-cash-body">
                           <div class="row">
                              <div class="col-lg-12 col-md-12">
                                 <form action="<?php echo e(route('address-add')); ?>" id='formAddAddress' method='POST'>
                                    <input type="hidden" name="latitude" value="0">
                                    <input type="hidden" name="longitude" value="0">
                                    <input type="hidden" name="country_code" value="0">
                                    <div class="row">
                                       <div class="form-group col-md-6 col-12">
                                          <label class=""><?php echo e(__('msg.name')); ?></label>
                                          <div class="ui search focus">
                                             <div class="ui left icon input card-detail-desc">
                                                <input class="card-inputfield" name="name" type="text" placeholder="Name" required>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group col-md-6 col-12">
                                          <label><?php echo e(__('msg.mobile_no')); ?></label>
                                          <div class="ui search focus">
                                             <div class="ui left icon input card-detail-desc">
                                                <input class="form-control card-inputfield" id='addPhone' type="number" placeholder="Mobile No" name="mobile" required>
                                             </div>
                                          </div>
                                       </div>

                                    </div>
                                    <br/>
                                    <div class="row">
                                       <div class="form-group  col-md-6 col-12">
                                          <label><?php echo e(__('msg.alternate_mobile_no')); ?></label>
                                          <div class="ui search focus">
                                             <div class="ui left icon input card-detail-desc">
                                                <input class="form-control" type="number" placeholder="Altername Mobile No" name="alternate_mobile">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group col-md-6 col-12">
                                          <label><?php echo e(__('msg.address')); ?></label>
                                          <div class="ui search focus">
                                             <div class="ui left icon input card-detail-desc">
                                                <input class="form-control" type="text" placeholder="Address" name="address" required>
                                             </div>
                                          </div>
                                       </div>

                                    </div>
                                    <br/>
                                    <div class="row">
                                       <div class="form-group col-md-6 col-12">
                                          <label><?php echo e(__('msg.landmark')); ?></label>
                                          <div class="ui search focus">
                                             <div class="ui left icon input card-detail-desc">
                                                <input class="form-control" type="text" placeholder="Landmark" name="landmark" required>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group col-md-6 col-12">
                                          <label><?php echo e(__('msg.select_city')); ?></label>
                                          <br>
                                          <select name='city' class="form-control" required></select>
                                       </div>

                                    </div>
                                    <br/>
                                    <div class="row">
                                          <div class="form-group col-md-6 col-12">
                                             <label><?php echo e(__('msg.select_area')); ?></label>
                                             <br>
                                             <select name='area' class="form-control" required></select>
                                          </div>
                                          <div class="form-group col-md-6 col-12">
                                             <label><?php echo e(__('msg.pincode')); ?></label>
                                             <select name='pincode' class="form-control" required readonly></select>
                                          </div>
                                    </div>

                                    <br/>
                                    <div class="row">
                                       <div class="form-group col-md-6 col-12">
                                          <label><?php echo e(__('msg.state')); ?></label>
                                          <div class="ui search focus">
                                             <div class="ui left icon input card-detail-desc">
                                                <input class="form-control" type="text" name="state" required placeholder="State">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group col-md-6 col-12">
                                          <label><?php echo e(__('msg.country')); ?></label>
                                          <div class="ui search focus">
                                             <div class="ui left icon input card-detail-desc">
                                                <input class="form-control" type="text" name="country" required placeholder="Country">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="d-flex mt-4">
                                       <div class="form-group">
                                          <label class="radio-inline">
                                             <input class="mr-2 " type="radio" name="type" value="Home" checked><?php echo e(__('msg.home')); ?>

                                          </label>
                                       </div>
                                       <div class="form-group">
                                          <label class="radio-inline  ml-5">
                                             <input class="mr-2" type="radio" name="type" value="Work"><?php echo e(__('msg.work')); ?>

                                          </label>
                                       </div>
                                       <div class="form-group">
                                          <label class="radio-inline  ml-5">
                                             <input class="mr-2" type="radio" name="type" value="Other"><?php echo e(__('msg.other')); ?>

                                          </label>
                                       </div>
                                    </div>
                              </div>
                              <div class="form-group mt-1 mb-4 mt-3">
                              <input type="checkbox" name="is_default" class=" mt-1" />
                              <label class="control-label" for="default-address"> <?php echo e(__('msg.set_as_default_address')); ?></label>
                              </div>
                           </div>
                           <hr>
                           <div class="form-group text-end">
                           <button type="submit" class="btn btn-primary btn-block text-uppercase"> <?php echo e(__('msg.add_new_address')); ?> </button>
                           <button class="btn btn-primary btn-block text-uppercase AddEditAddressCancel"> <?php echo e(__('msg.cancel')); ?> </button>
                           </div>
                           </form>
                        </div>

                  </div>
               </div>
            </div>
         </div>
      </div>
</section>
</div>
<script src="<?php echo e(theme('js/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/address.js')); ?>"></script><?php /**PATH /home2/zennit/public_html/web.grocery/resources/views/themes/eCart/checkout_address.blade.php ENDPATH**/ ?>