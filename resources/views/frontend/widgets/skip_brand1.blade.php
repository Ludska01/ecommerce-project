@php
        use App\Models\Product;
        use App\Models\Brand;
        $skip_brand_1 = Brand::skip(1)->first();
    	$skip_brand_product_1 = Product::where('status',1)->where('brand_id',$skip_brand_1->id)->orderBy('id','DESC')->get();
@endphp




<section class="section featured-product wow fadeInUp">
    <h3 class="section-title">
@if(session()->get('language') == 'serbian') {{ $skip_brand_1->brand_name_srb }} @else {{ $skip_brand_1->brand_name_en }} @endif
      </h3>
    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">


      @foreach($skip_brand_product_1 as $product)
      <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img  src="{{ asset($product->product_thumbnail) }}" alt=""></a> </div>
                    <!-- /.image -->

  @php
  $amount = $product->selling_price - $product->discount_price;
  $discount = ($amount/$product->selling_price) * 100;
  @endphp                  

    <div>
      @if ($product->discount_price == NULL)
      <div class="tag new"><span>new</span></div>
      @else
      <div class="tag hot"><span>{{ round($discount) }}%</span></div>
      @endif
    </div>
                   </div>

                  <!-- /.product-image -->

  <div class="product-info text-left">
    <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
@if(session()->get('language') == 'serbian') {{ $product->product_name_srb }} @else {{ $product->product_name_en }} @endif
      </a></h3>
   
    <div class="description"></div>

   @if ($product->discount_price == NULL)
<div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span>  </div>
   @else
<div class="product-price"> <span class="price"> ${{ $product->discount_price }} </span> <span class="price-before-discount">$ {{ $product->selling_price }}</span> </div>
   @endif


    <!-- /.product-price --> 

  </div>
  <!-- /.product-info -->
  @include('frontend.widgets.cart_wishlist')
               
                </div>
                <!-- /.product --> 

              </div>
              <!-- /.products --> 
            </div>
      <!-- /.item -->
      @endforeach


    </div>
    <!-- /.home-owl-carousel --> 
  </section>
  <!-- /.section --> 
