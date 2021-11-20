{{-- slider --}}
<div class="main-slider-sec">
   @if(Cache::has('sliders') && is_array(Cache::get('sliders')) && count(Cache::get('sliders')))
   <div class="slider-activation owl-carousel nav-style dot-style nav-dot-left">
      @foreach(Cache::get('sliders') as $i => $s)
      @if($s->type == 'product')
      <a href="{{ route('product-single', $s->slug ?? '-') }}">
         <div class="single-slider-content height-100vh bg-img" data-dot="0{{$i+1}}">
            <img class="lazy" src="{{ $s->image }}?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=10&q=60" alt="Slider1">
         </div>
      </a>
      @elseif($s->type == 'category')
      <a href="{{ route('category', $s->slug ?? '-') }}">
         <div class="single-slider-content height-100vh bg-img" data-dot="0{{$i+1}}">
            <img class="lazy" src="{{ $s->image }}?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=10&q=60" alt="Slider2">
         </div>
      </a>
      @else
      <a href="">
         <div class="single-slider-content height-100vh bg-img" data-dot="0{{$i+1}}">
            <img class="lazy" src="{{ $s->image }}?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=10&q=60" alt="Slider3">
         </div>
      </a>
      @endif
      @endforeach
   </div>
   @endif
</div>
<!-- shipping area -->
<section class="shipping-content">

   <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm outer-ship">

   <div class="shipping_inner_content">
      <div class="row">
         <div class="col-lg-3 col-md-6 col-12">
            <div class="single_shipping_content">
               <div class="shipping_icon">
                  <em class="far fa-{{__('msg.iconbox1_i')}}"></em>
               </div>
               <div class="shipping_content">
                  <h2>{{__('msg.iconbox1_h2')}}</h2>
                  <p>{{__('msg.iconbox1_p')}}</p>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-md-6 col-12">
            <div class="single_shipping_content">
               <div class="shipping_icon">
                  <em class="fab fa-{{__('msg.iconbox2_i')}}"></em>
               </div>
               <div class="shipping_content">
                  <h2>{{__('msg.iconbox2_h2')}}</h2>
                  <p>{{__('msg.iconbox2_p')}}</p>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-md-6 col-12">
            <div class="single_shipping_content">
               <div class="shipping_icon">
                  <em class="fas fa-{{__('msg.iconbox3_i')}}"></em>
               </div>
               <div class="shipping_content">
                  <h2>{{__('msg.iconbox3_h2')}}</h2>
                  <p>{{__('msg.iconbox3_p')}}</p>
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-md-6 col-12">
            <div class="single_shipping_content">
               <div class="shipping_icon">
                  <em class="fas fa-{{__('msg.iconbox4_i')}}"></em>
               </div>
               <div class="shipping_content">
                  <h2>{{__('msg.iconbox4_h2')}}</h2>
                  <p>{{__('msg.iconbox4_p')}}</p>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</section>