@extends('User/Component/Layout')
@section('content')
@php
$Categories = DB::table('categories')->select('id','category_name')->orderBy('id','DESC')->get();
$Cat = DB::table('categories')->select('id','category_name')->orderBy('id','DESC')->where('id',$Products->category_id)->first();
$Subcategory = DB::table('subcategories')->where('id',$Products->subcategory_id)->select('id','subcategory_name')->first();
$RelatedProducts = DB::table('products')->where('category_id',$Products->category_id)->get();
$noOfReviews = DB::table('ratings')->where('product_id',$Products->id)->count();
$TotalReviews = DB::table('ratings')->where('product_id',$Products->id)->orderBy('id','DESC')->first();
$CategoryName = DB::table('categories')->where('id',$Products->category_id)->select('category_name')->first();
$SubcategoryName = DB::table('subcategories')->where('id',$Products->subcategory_id)->select('subcategory_name')->first();
if($noOfReviews>0)
{
$float_val = $TotalReviews->total_ratings/$noOfReviews;
$AverageRatings = intval($float_val);
}
else{
$AverageRatings = 0;
}
$Review = DB::table('ratings')->where('product_id',$Products->id)->get();
$Cart = Session::get('Cart');
if(!$Cart)
{
$Cart = [];
}
@endphp
<style>
   .checked{
   color:orange;
   }
   .btn-carts{
   border: 0;
   flex: 1;
   min-width: 13rem;
   font-size: 1.4rem;
   background-color: #26b;
   cursor: pointer;
   max-width: 20.7rem;
   height: 4.5rem;
   }
   /*.product-name{*/
   /*font-size: 2.1rem !important;*/
   /*}*/
   .product-images{
   height: 313px;
   }
   .product-cat a{
       font-weight:700;
   }
   .product-single .product-name {
    font-size: 1.7rem !important;
    height: 81px;
    text-align:justify;
    font-weight:600;
    word-spacing:0px;
}
   .no-reviews{
   color:red;
   text-align:center;
   }
   .gif{
     margin-left: 500px;
   }
   .message{
    margin-left: 500px;
    color: green;
    font-size: 20px;
    font-weight: bold;
   }
   .breadcrumb-single-page{
       margin:0px;
font-size: inherit;
padding: 0px 0px 10px;
list-style: none;
background-color: #fff !important;
display: flex;
flex-wrap: wrap;
color: #fff;
font-family: "Open Sans",sans-serif;
   }
ul.breadcrumb-single-page li {
    display: inline;
    font-size: 16px;
}
.breadcrumb-single-page li:not(:last-child) {
    padding-right: .8rem;
}
.breadcrumb-single-page li a {
    color: #999;
    text-decoration: none;
}
.breadcrumb-single-page li:not(:last-child)::after {
    content: '\f105';
    position: relative;
    margin-left: .7rem;
    font-size: -0.9rem;
    color: #a59999;
    font-weight: 600;
    font-family: 'Font Awesome 5 Free';
}
.d-icon-bag{
    margin-right:8px;
}
.product-navigation li {
     padding: 0px 0 0rem;
}
.product-single{
    margin-bottom:10px;
}
.ul{
	list-style-type: none;
	/*float: left;*/
}
.ul li{
	float: left;
	margin-right: 18px;
	cursor: pointer;
}
.ul li img{
	width: 90px;
	height: 90px;
}
.small_img{
    max-width:180px;
    max-height:110px;
    cursor:pointer;
    opacity:0.5;
    border:2px solid black;
    margin-bottom:10px;   
}
.small_img:hover{
    opacity:1;
}
.active{
    opacity:1;
}
.big_img{
	height:500px;
	width: 450px;
	margin-top: 20px;
	float: left;
	margin-left: 20px;
	border:2px solid #ddd;
	margin-bottom:25px;
}
.slider-wrapper{
    align-items: center;
    max-width: 700;
    float: left;
}
.slider{
    max-width: 530px;
    flex-wrap: nowrap;
    overflow: hidden;
    max-height: 500px;
}
.scroll{
    font-size:23px;
    cursor:pointer;
    margin-left: 40px;
}
.price-deatils{
    font-size: 20px;
    color: #000;
    opacity: 0.5;
}
.product-short-desc{
    margin-top: 10px;
    font-weight: bold;
    color: black;
    opacity: 0.8;
} 
</style>
<main class="main mt-6 single-product">
   <div class="page-content">
      <div class="container">
         <div class="product product-single row mb-7">
            @if($Product_Gallery_count>0)
            <div class="col-md-1 sticky-sidebar-wrapper">
                <div class="slider-wrapper">
                    <i class="fa fa-angle-up scroll" aria-hidden="true"></i>
                    <div class="slider">
                    	@foreach($Product_Gallery as $key=>$Product_Galleries)
                    	<img img src="{{ url('/') }}/public/Admin/GalleryImage/{{ $Product_Galleries->product_image }}" class="small_img {{ $key }}" onmouseover="hellowmoto('{{$key}}')" />
                        @endforeach
                    </div>
                    <i class="fa fa-angle-down scroll" aria-hidden="true"></i>
                </div>
            </div>
            <div  class="col-md-5">
              <div class="product-image-gallery">
                    <img src="{{ url('/') }}/public/Admin/GalleryImage/{{ $Product_Single_Gallery->product_image }}" class="big_img" />
                </div>
            </div>
            @else
             <div class="col-md-1 sticky-sidebar-wrapper">
                <div class="slider-wrapper">
                    <i class="fa fa-angle-up scroll" aria-hidden="true"></i>
                    <div class="slider">
                      <img img src="{{ url('/') }}/public/Admin/ProductImage/{{ $Products->product_image }}" class="small_img" />
                    </div>
                    <i class="fa fa-angle-down scroll" aria-hidden="true"></i>
                </div>
            </div>
            <div  class="col-md-5">
              <div class="product-image-gallery">
                    <img src="{{ url('/') }}/public/Admin/ProductImage/{{ $Products->product_image }}" class="big_img" />
                </div>
            </div>
            @endif
            <div class="col-md-6">
               <div class="product-details">
                  <div class="product-navigation">
                     <ul class="breadcrumb-single-page">
                        <li><a href="{{ route('/') }}"><i class="d-icon-home"></i></a></li>
                        <li><a href="#" class="active">Details Page</a></li>
                     </ul>
                  </div>
                  <h3 class="product-single">{{ $Products->product_name }}</h3>
                  <div class="product-meta">
                     Category: <span class="product-sku">{{ $CategoryName->category_name }}</span>
                     Subcategory: <span class="product-brand">@if($SubcategoryName!= null){{ $SubcategoryName->subcategory_name }}@endif</span>
                  </div>
                  <div class="product-price">£{{ $Products->product_spl_price }} <span class="price-deatils">£<del>{{ $Products->product_price }}</del></span></div>
                  <div class="ratings-container">
                     <div class="">
                        <span class="fa fa-star 1"></span>
                        <span class="fa fa-star 2"></span>
                        <span class="fa fa-star 3"></span>
                        <span class="fa fa-star 4"></span>
                        <span class="fa fa-star 5"></span>
                     </div>
                     <a href="#product-tab-reviews" class="link-to-tab rating-reviews">( {{ $noOfReviews }} reviews )</a>
                  </div>
                  <p class="product-short-desc">{{ $Products->product_short_description }}</p>
                  <form id="addToCart">
                     <div class="product-form product-variations product-color">
                        @if($Product_Attribute_count>0)
                        <label>{{ $Product_Attribute_name }}:</label>
                        <div class="select-box">
                           <input type="hidden" name="attribute_name" value="{{ $Product_Attribute_name }}" />
                           <input type="hidden" name="product_id" value="{{ $Products->id }}" />
                           <input type="hidden" name="attribute_image" value="" id="attribute_image" />
                           <input type="hidden" name="attribute_price" value="" id="attribute_price" />
                           <select name="color" class="form-control" onchange="changeImage(this.value)" name="attribute_value" required>
                              <option value="" selected="selected">Choose an Option</option>
                              @foreach($Product_Attribute as $Product_Attributes)
                              @php
                              $attribute_image = DB::table('productattributes')->where('attribute_value',$Product_Attributes->attribute_value)->where('product_id',$Products->id)->first();
                              @endphp
                              <option value="{{ url('/') }}/public/Admin/AttributeImage/{{ $attribute_image->attribute_image }},{{ $attribute_image->attribute_price }}">{{ $Product_Attributes->attribute_value }}</option>
                              @endforeach
                           </select> 
                        </div>
                     </div>
                     <hr class="product-divider">
                     <div class="product-form product-qty">
                        <div class="product-form-group">
                           <div class="product-addto-cart-btn">
                              @if(isset($Cart[$Products->id]))
                              <a href="{{ route('cart') }}" class="btn-product font-weight-semi-bold btn-carts" type="button"><i class="d-icon-bag"></i>View Cart</a>
                              @else
                              <button class="btn-product font-weight-semi-bold btn-carts" type="submit"><i class="d-icon-bag"></i>Add to Cart</button>
                              @endif
                           </div>
                        </div>
                     </div>
                  </form>
                  @else
                  <div class="product-form product-qty">
                     <div class="product-form-group">
                        <div class="product-addto-cart-btn">
                           @if(isset($Cart[$Products->id]))
                           <a href="{{ route('cart') }}" class="btn-product font-weight-semi-bold btn-carts" type="button"><i class="d-icon-bag"></i>View Cart</a>
                           @else
                           <a  style="cursor:pointer" onclick="addToCartFromProductPage('{{ $Products->id }}')" class="btn-product font-weight-semi-bold btn-carts" type="submit"><i class="d-icon-bag"></i>Add to Cart</a>
                           @endif
                        </div>
                     </div>
                  </div>
                  @endif
                  <hr class="product-divider mb-3">
                  <!--<div class="product-footer">-->
                  <!--	<div class="social-links mr-4">-->
                  <!--		<a href="#" class="social-link social-facebook fab fa-facebook-f"></a>-->
                  <!--		<a href="#" class="social-link social-twitter fab fa-twitter"></a>-->
                  <!--		<a href="#" class="social-link social-pinterest fab fa-pinterest-p"></a>-->
                  <!--	</div>-->
                  <!--	<span class="divider d-lg-show"></span>-->
                  <!--	<a href="#" class="btn-product btn-wishlist mr-6"><i class="d-icon-heart"></i>Add to-->
                  <!--		wishlist</a>-->
                  <!--	<a href="#" class="btn-product btn-compare"><i class="d-icon-compare"></i>Add-->
                  <!--		to-->
                  <!--		compare</a>-->
                  <!--</div>-->
               </div>
            </div>
         </div>
         <div class="tab tab-nav-simple product-tabs">
            <ul class="nav nav-tabs justify-content-center" role="tablist">
               <li class="nav-item">
                  <a class="nav-link active" href="#product-tab-description">Description</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#product-tab-reviews">Reviews ({{ $noOfReviews }})</a>
               </li>
            </ul>
            <div class="tab-content">
               @if(!empty($Products->product_video_description))
               <div class="tab-pane active in" id="product-tab-description">
                  <div class="row mt-6">
                     <div class="col-md-5">
                        <h5 class="description-title mb-4 font-weight-semi-bold ls-m">Features</h5>
                        {!! $Products->product_description !!}
                     </div>
                     <div class="col-md-7 pl-md-6 pt-4 pt-md-0">
                        <h5 class="description-title font-weight-semi-bold ls-m mb-5">Video Description</h5>
                        <iframe id="player" type="text/html" width="640" height="390"
                           src="{{ $Products->product_video_description }}"
                           frameborder="0"></iframe>
                     </div>
                  </div>
               </div>
               @else
               @if(!empty($Products->product_description))
               <div class="tab-pane active in" id="product-tab-description">
                  <div class="row mt-6">
                     <div class="col-md-12">
                        <h5 class="description-title mb-4 font-weight-semi-bold ls-m">Features</h5>
                        {!! $Products->product_description !!}
                     </div>
                  </div>
               </div>
               @endif
               @endif
               <!--<div class="tab-pane" id="product-tab-additional">-->
               <!--   <ul class="list-none">-->
               <!--      <li>-->
               <!--         <label>Brands:</label>-->
               <!--         <p>SkillStar, SLS</p>-->
               <!--      </li>-->
               <!--      <li>-->
               <!--         <label>Color:</label>-->
               <!--         <p>Blue, Brown</p>-->
               <!--      </li>-->
               <!--      <li>-->
               <!--         <label>Size:</label>-->
               <!--         <p>Large, Medium, Small</p>-->
               <!--      </li>-->
               <!--   </ul>-->
               <!--</div>-->
               <!--<div class="tab-pane " id="product-tab-size-guide">-->
               <!--   <figure class="size-image mt-4 mb-4">-->
               <!--      <img src="{{ url('/') }}/public/User/images/product/size_guide.png" alt="Size Guide Image" width="217"-->
               <!--         height="398">-->
               <!--   </figure>-->
               <!--   <figure class="size-table mt-4 mb-4">-->
               <!--      <table>-->
               <!--         <thead>-->
               <!--            <tr>-->
               <!--               <th>SIZE</th>-->
               <!--               <th>CHEST(IN.)</th>-->
               <!--               <th>WEIST(IN.)</th>-->
               <!--               <th>HIPS(IN.)</th>-->
               <!--            </tr>-->
               <!--         </thead>-->
               <!--         <tbody>-->
               <!--            <tr>-->
               <!--               <th>XS</th>-->
               <!--               <td>34-36</td>-->
               <!--               <td>27-29</td>-->
               <!--               <td>34.5-36.5</td>-->
               <!--            </tr>-->
               <!--            <tr>-->
               <!--               <th>S</th>-->
               <!--               <td>36-38</td>-->
               <!--               <td>29-31</td>-->
               <!--               <td>36.5-38.5</td>-->
               <!--            </tr>-->
               <!--            <tr>-->
               <!--               <th>M</th>-->
               <!--               <td>38-40</td>-->
               <!--               <td>31-33</td>-->
               <!--               <td>38.5-40.5</td>-->
               <!--            </tr>-->
               <!--            <tr>-->
               <!--               <th>L</th>-->
               <!--               <td>40-42</td>-->
               <!--               <td>33-36</td>-->
               <!--               <td>40.5-43.5</td>-->
               <!--            </tr>-->
               <!--            <tr>-->
               <!--               <th>XL</th>-->
               <!--               <td>42-45</td>-->
               <!--               <td>36-40</td>-->
               <!--               <td>43.5-47.5</td>-->
               <!--            </tr>-->
               <!--            <tr>-->
               <!--               <th>XXL</th>-->
               <!--               <td>45-48</td>-->
               <!--               <td>40-44</td>-->
               <!--               <td>47.5-51.5</td>-->
               <!--            </tr>-->
               <!--         </tbody>-->
               <!--      </table>-->
               <!--   </figure>-->
               <!--</div>-->
               <div class="tab-pane " id="product-tab-reviews">
                  <div class="comments mb-8 pt-2 pb-2 border-no">
                     <ul>
                        @if($noOfReviews>0)
                        @foreach($Review as $Reviews)
                        <li>
                           <div class="comment">
                              <figure class="comment-media">
                                 <a href="#">
                                 <img src="{{ url('/') }}/public/User/images/dummy.png" alt="avatar">
                                 </a>
                              </figure>
                              <div class="comment-body">
                                 <!--<div class="comment-rating ratings-container mb-0">-->
                                 <!--   <div class="ratings-full">-->
                                 <!--      <span class="ratings" style="width:80%"></span>-->
                                 <!--      <span class="tooltiptext tooltip-top">4.00</span>-->
                                 <!--   </div>-->
                                 <!--</div>-->
                                 <div class="comment-user">
                                    <span class="comment-date text-body">{{ date('d/M/Y', strtotime($Reviews->created_at)) }}</span>
                                    <h4><a href="#">{{ $Reviews->name }}</a></h4>
                                 </div>
                                 <div class="comment-content">
                                    <p>{{ $Reviews->comment }}
                                    </p>
                                 </div>
                              </div>
                           </div>
                        </li>
                        @endforeach
                        @else
                        <div class="no-reviews">No Reviews Yet..</div>
                        @endif
                     </ul>
                  </div>
                  </form>
                  <!-- End Comments -->
                  <div class="replies">
                  <div class="reply">
                     <div class="title-wrapper text-left">
                        <h3 class="title title-simple text-left text-normal">Add a Review</h3>
                        <p>Your email address will not be published. Required fields are marked *</p>
                     </div>
                    <form id="ratings-submit">
                     <div class="rating-form">
                       <label for="rating">Your rating: </label>
                       <span class="rating-stars selected">
                       <a class="star-1 rate" href="javascript:void(0)" onclick="ratingsUpdate(1)">1</a>
                       <a class="star-2 rate" href="javascript:void(0)" onclick="ratingsUpdate(2)">2</a>
                       <a class="star-3 rate" href="javascript:void(0)" onclick="ratingsUpdate(3)">3</a>
                       <a class="star-4 rate" href="javascript:void(0)" onclick="ratingsUpdate(4)">4</a>
                       <a class="star-5 rate" href="javascript:void(0)" onclick="ratingsUpdate(5)">5</a>
                       </span>
                    </div>
                    <textarea id="reply-message" cols="30" rows="6" class="form-control mb-4"
                           placeholder="Comment *" name="comment" required></textarea> 
                       <input type="hidden" name="ratings" id="rating-value" value="">
                       <input type="hidden" name="product_id" id="rating-value" value="{{ $Products->id }}">
                    <div class="row">
                       <div class="col-md-6 mb-5">
                          <input type="text" class="form-control" id="reply-name"
                             placeholder="Name *" name="name" required />
                       </div>
                       <div class="col-md-6 mb-5">
                          <input type="email" class="form-control" id="reply-email"
                             name="email" placeholder="Email *" required />
                       </div>
                    </div>
                    <!--<div class="form-checkbox mb-4">-->
                    <!--   <input type="checkbox" class="custom-checkbox" id="signin-remember"-->
                    <!--      name="signin-remember" />-->
                    <!--   <label class="form-control-label" for="signin-remember">-->
                    <!--   Save my name, email, and website in this browser for the next time I-->
                    <!--   comment.-->
                    <!--   </label>-->
                    <!--</div>-->
                    <button type="submit" class="btn btn-primary btn-rounded">Submit<i
                       class="d-icon-arrow-right"></i></button>
                  </div>
                  </div>
                   </form>
                  <div class="gif" style="display: none">
                     <img src="{{ url('/') }}/public/User/images/spinner.gif">
                   </div>
                  <!-- End Reply -->
               </div>
            </div>
         </div>
        <section class="pt-3">
            <h2 class="title justify-content-center">Related Products</h2>
            <div class="owl-carousel owl-theme owl-nav-full row cols-2 cols-md-3 cols-lg-4"
               data-owl-options="{
               'items': 5,
               'nav': false,
               'loop': false,
               'dots': true,
               'margin': 20,
               'responsive': {
               '0': {
               'items': 2
               },
               '768': {
               'items': 3
               },
               '992': {
               'items': 4,
               'dots': false,
               'nav': true
               }
               }
               }">
               @foreach($RelatedProducts as $RelatedProduct)
               <div class="product">
                  <figure class="product-media">
                     <a href="{{ url('product-single-page',['product_name' =>str_replace(' ', '-', strtolower($RelatedProduct->product_name)),'id' => $RelatedProduct->id]) }}">
                     <img src="{{ url('/') }}/public/Admin/ProductImage/{{ $RelatedProduct->product_image }}" alt="product" class="product-images">
                     </a>
                     <div class="product-label-group">
                        <label class="product-label label-new">SALE</label>
                     </div>
                     <div class="product-action-vertical">
                        <!--<a href="#" class="btn-product-icon btn-cart" data-toggle="modal"-->
                        <!--   data-target="#addCartModal" title="Add to cart"><i-->
                        <!--   class="d-icon-bag"></i></a>-->
                        <!--<a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><i-->
                        <!--   class="d-icon-heart"></i></a>-->
                     </div>
                  </figure>
                  <div class="product-details">
                     <div class="product-cat">
                        @php
                        $Category = DB::table('categories')->where('id',$RelatedProduct->category_id)->first();
                        @endphp
                        <a href="#">{{ $Category->category_name }}</a>
                     </div>
                     <h3 class="product-name">
                        <a href="{{ url('product-single-page',['product_name' =>str_replace(' ', '-', strtolower($RelatedProduct->product_name)),'id' => $RelatedProduct->id]) }}">{{ $RelatedProduct->product_name }}</a>
                     </h3>
                     <div class="product-price">
                        <span class="price">$ {{ $RelatedProduct->product_spl_price }}</span>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
         </section>
      </div>
   </div>
</main>
@endsection
<script src="{{ url('/') }}/public/User/vendor/jquery/jquery.min.js"></script>
<script>
   $(document).ready(function(){
       var id = "{{ $AverageRatings+1 }}";
       
       for(var i=1; i<id; i++)
       {
           $('.'+i).addClass('checked');
       }
       
   });
</script>