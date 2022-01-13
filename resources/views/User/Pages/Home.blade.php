@extends('User/Component/Layout')
@section('content')
@php
$Categories = DB::table('categories')->select('id','category_name','category_image')->orderBy('id','DESC')->get();
$NewArrivals = DB::table('products')->select('id','product_name','product_price','product_spl_price','product_image')->orderBy('id','DESC')->get();
$Cart = Session::get('Cart');
if(!$Cart)
{
   $Cart = [];
}
@endphp
<style>
    .img-product{
        height: 280px !important;
        width: 280px !important;
    }
</style>
<main class="main">
   <div class="page-content">
     <section class="intro-section">
         <div class="owl-carousel owl-theme row owl-dot-inner owl-dot-white intro-slider animation-slider cols-1 gutter-no"
            data-owl-options="{
            'nav': false,
            'dots': true,
            'loop': true,
            'items': 1,
            'autoplay': true,
            'autoplayTimeout': 8000
            }">
            <div class="banner banner-fixed intro-slide1 intro-slide2" >
               <figure>
                  <img src="{{ url('/') }}/User/images/slider01.jpg" alt="intro-banner" width="100%"
                    style="height:100%;" />
               </figure>
               <div class="container">
                  <div class="banner-content y-50">
                     <h4 class="banner-subtitle text-uppercase font-weight-bold ls-l mb-2" style="border:5px solid #fff;">
                        <span class="d-inline-block slide-animate"
                           data-animation-options="{'name': 'fadeInRightShorter', 'duration': '1s', 'delay': '.2s'}"><span class="slider-pad welcome">WELCOME TO EMMAT ONLINE SHOPPING MALL</span></span>
                     </h4>
                     <h6 class="font-weight-normal mb-1 slide-animate" data-animation-options="{
                        'name': 'fadeInUpShorter',
                        'duration': '1.2s',
                        'delay': '1s'
                        }" style="text-align: center;">
                        <span style="color: rgb(247, 196, 33); text-align: center;">Jewellery / Bags / New Arrivals / Key Holders / Sculptures / Arts & Paintings / Men, Women and Kids Clothing </span>
                     </h6>
                  </div>
               </div>
            </div>
          
            <div class="banner banner-fixed video-banner intro-slide2">
               <figure>
                  <img src="{{ url('/') }}/User/images/go-green-slider.jpg" alt="intro-banner" width="100%"
                     style="height:100%;" />
               </figure>
            </div>
         </div>
      </section>
      <section class="product-wrapper container appear-animate mt-10 pt-3 pb-8" data-animation-options="{
         'delay': '.3s'
         }">
         <h2 class="title">SHOP BY CATEGORY</h2>
         <div class="owl-carousel owl-theme row  cols-2 cols-md-3 cols-lg-4 section-transiction" data-owl-options="{
            'items': 5,
            'loop': true,
            'nav':false,
            'margin': 20,
            'autoplay':true,
            'autoplayTimeout':3000,
            'autoplayHoverPause':true,
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
            @foreach($Categories as $Category)
            <div class="product">
               <div
                  class="category category-default category-default-1 category-absolute overlay-zoom">
                  <a href="{{ url('product-by-category',['category_name' =>str_replace(' ', '-', strtolower($Category->category_name)),'id' =>$Category->id]) }}">
                     <figure class="category-media">
                        <img src="{{ url('/') }}/Admin/CategoryImage/{{ $Category->category_image }}" alt="category"
                           width="300" height="300" />
                     </figure>
                  </a>
                  <div class="category-content">
                     <h4 class="category-name"><a href="{{ url('product-by-category',['category_name' =>str_replace(' ', '-', strtolower($Category->category_name)),'id' =>$Category->id]) }}">{{ $Category->category_name }}</a></h4>
                  </div>
               </div>
               <div style="padding: 10px; text-align: center;">
                  <a href="{{ url('product-by-category',['category_name' =>str_replace(' ', '-', strtolower($Category->category_name)),'id' =>$Category->id]) }}" type="button" class="btn btn-primary" style="border-radius: 7px;">VIEW NOW</a> 
               </div>
            </div>
            @endforeach
         </div>
      </section>
      <section class="gradient-background">
         <div class="container">
            <div class="row">
               <div class="col-md-7 rotateInDownLeft">
                  <h2 style="color:#fff;">THE LATEST IN AFRICAN FASHION</h2>
                  <p>It’s EMMAT mission to be the most favoured shopping destination for all online shoppers by
                     delivering a wide range of great products and offering clients an exceptional service quality and to ensure that all dispatches are made within the right time frame and target to the satisfaction of the customers’ expectations and demand.
                  </p>
                  <p>When our client is happy, we are too. We aspire to always provide high-quality products and serve our clients with a unique and efficient service.</p>
                  <p>“Client talks, we listen. We empathise, we deliver”.</p>
                  <p>Most of our products are handmade by talented and highly skilful artisans from Africa.</p>
                  <p class="readmore-btn"><a href="#">Read More</a></p>
               </div>
               <div class="col-md-5 rotateInDownLeft">
                  <iframe width="100%" height="380" src="https://www.youtube.com/embed/R2WUDLo0Nt8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen ></iframe>
               </div>
            </div>
         </div>
      </section>
      <section class="product-wrapper container appear-animate mt-10 pt-3 pb-8" data-animation-options="{
         'delay': '.3s'
         }">
         <h2 class="title">NEW ARRIVALS</h2>
         <div class="owl-carousel owl-theme row owl-nav-full cols-2 cols-md-3 cols-lg-4 fadedown" data-owl-options="{
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
            @foreach($NewArrivals as $NewArrival)
            <div class="product">
               <figure class="product-media">
                  <a href="{{ url('product-single-page',['product_name' =>str_replace(' ', '-', strtolower($NewArrival->product_name)),'id' => $NewArrival->id]) }}">
                  <img src="{{ url('/') }}/Admin/ProductImage/{{ $NewArrival->product_image }}" alt="Blue Pinafore Denim Dress" class="img-product">
                  </a>
                  <div class="product-label-group">
                     <label class="product-label label-new">Sale</label>
                  </div>
                  <!-- <div class="product-action-vertical">
                     <a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
                         data-target="#addCartModal" title="Add to cart"><i class="d-icon-bag"></i></a>
                     </div>-->
                  <div class="product-action">
                     <!--<a href="#" class="btn-product btn-quickview" title="Quick View">Quick View</a>-->
                  </div>
               </figure>
               <div class="product-details">
                  <p >
                     <a href="#">{{ substr($NewArrival->product_name, 0, 40) }}</a>
                  </p>
                  <div class="product-price">
                     <del class="old-price">£{{ $NewArrival->product_price }}</del>&nbsp; &nbsp; &nbsp;<ins class="new-price">£{{ $NewArrival->product_spl_price }}</ins>
                  </div>
                  <div class="ratings-container">
                    <div class="{{ $NewArrival->id }}">
                     @if(isset($Cart[$NewArrival->id]))
                     <a class="btn btn-outline btn-md btn-dark btn-icon-right" onclick="addtoCart('{{ $NewArrival->id }}')">
                        UPDATE CART
                     </a>
                     @else
                     <a class="btn btn-outline btn-md btn-dark btn-icon-right" onclick="addtoCart('{{ $NewArrival->id }}')">
                        ADD TO CART
                     </a>
                     @endif
                        
                    </div>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
      </section>
      <section class="banner-group mb-9 container-fluid text-uppercase appear-animate" style="padding:0px;">
         <div class="row">
            <div class="col-lg-3 col-sm-6 col-md-6" style="padding: 0px;">
               <a href="{{ url('product-by-category',['category_name' =>str_replace(' ', '-', strtolower('AFRICA DESIGN CLOTHING')),'id' =>7]) }}">
                  <div class="banner banner-1 banner-fixed content-middle">
                     <figure>
                        <img src="{{ url('/') }}/User/images/cat01.jpg" alt="banner" width="100%" style="height:100%;"
                           />
                     </figure>
                     <div class="banner-content" style="width:100%;">
                        <h4 class="" style="color:#fff; font-weight: 400 !important; text-align: center; ">Men's and women's clothing
                        </h4>
                     </div>
                  </div>
               </a>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6" style="padding: 0px;">
               <a href="{{ url('product-by-category',['category_name' =>'BAGS','id' =>6]) }}">
               <div class="banner banner-1 banner-fixed content-middle">
                  <figure>
                     <img src="{{ url('/') }}/User/images/cat02.jpg" alt="banner" width="100%" style="height:100%;" />
                  </figure>
                  <div class="banner-content" style="width:100%;">
                        <h4 class="" style="color:#fff; font-weight: 400 !important; text-align: center; ">Bags and purses
                        </h4>
                     </div>
               </div>
            </a>
            </div>
            <div class="col-lg-3 col-sm-6" style="padding: 0px;">
               <a href="{{ url('product-by-category',['category_name' =>str_replace(' ', '-', strtolower('AFRICA DESIGN CLOTHING')),'id' =>7]) }}">
               <div class="banner banner-1 banner-fixed content-middle">
                  <figure>
                     <img src="{{ url('/') }}/User/images/cat03.jpg" alt="banner" width="100%" style="height:100%;" />
                  </figure>
                  <div class="banner-content" style="width:100%;">
                   <h4 class="centered" style="color:#fff; font-weight: 400 !important; text-align: center; ">Dresses, t-shirts, trousers, suits, skirts and shirts  
                     </h4>
                     </div>
               </div>
            </a>
            </div>
            <div class="col-lg-3 col-sm-6" style="padding: 0px;">
               <a href="{{ url('product-by-category',['category_name' =>str_replace(' ', '-', strtolower('ARTS & PAINTINGS')),'id' =>10]) }}">
               <div class="banner banner-1 banner-fixed content-middle">
                  <figure>
                     <img src="{{ url('/') }}/User/images/cat04.jpg" alt="banner" width="100%" style="height:100%;"/>
                  </figure>
                   <div class="banner-content" style="width:100%;">
                   <h4 class="centered" style="color:#fff; font-weight: 400 !important; text-align: center; ">Art and wall paintings  
                     </h4>
                     </div>
               </div>
            </a>
            </div>
            <div class="col-lg-3 col-sm-6" style="padding: 0px;">
               <a href="{{ url('product-by-category',['category_name' =>str_replace(' ', '-', strtolower('AFRICA DESIGN CLOTHING')),'id' =>7]) }}">
               <div class="banner banner-1 banner-fixed content-middle">
                  <figure>
                     <img src="{{ url('/') }}/User/images/cat05.jpg" alt="banner" width="100%" style="height:100%;" />
                  </figure>
                  <div class="banner-content" style="width:100%;">
                   <h4 class="centered" style="color:#fff; font-weight: 400 !important; text-align: center; ">African clothing 
                     </h4>
                     </div>
               </div>
            </a>
            </div>
            <div class="col-lg-3 col-sm-6" style="padding: 0px;">
               <a href="{{ url('product-by-category',['category_name' =>'SCULPTURES','id' =>9]) }}">
               <div class="banner banner-1 banner-fixed content-middle">
                  <figure>
                     <img src="{{ url('/') }}/User/images/cat06.jpg" alt="banner" width="100%" style="height:100%;" />
                  </figure>
                  <div class="banner-content" style="width:100%;">
                   <h4 class="centered" style="color:#fff; font-weight: 400 !important; text-align: center; ">Collectible items and sculptures
                     </h4>
                     </div>
               </div>
            </a>
            </div>
            <div class="col-lg-3 col-sm-6" style="padding: 0px;">
               <a href="{{ url('product-by-subcategory',['subcategory_name' =>str_replace(' ', '-', strtolower('WOMEN WEAR')), 'id' => 11]) }}">
               <div class="banner banner-1 banner-fixed content-middle">
                  <figure>
                     <img src="{{ url('/') }}/User/images/cat07.jpg" alt="banner" width="100%" style="height:100%;" />
                  </figure>
                   <div class="banner-content" style="width:100%;">
                     <h4 class="centered" style="color:#fff; font-weight: 400 !important; text-align: center; ">Maternity clothes 
                     </h4>
                  </div>
               </div>
            </a>
            </div>
            <div class="col-lg-3 col-sm-6" style="padding: 0px;">
               <a href="{{ url('product-by-category',['category_name' =>str_replace(' ', '-', strtolower('AFRICA DESIGN CLOTHING')),'id' =>7]) }}">
               <div class="banner banner-1 banner-fixed content-middle">
                  <figure>
                     <img src="{{ url('/') }}/User/images/cat08.jpg" alt="banner" width="100%" style="height:100%;" />
                     
                  </figure>
                  <div class="banner-content" style="width:100%;">
                     <h4 class="centered" style="color:#fff; font-weight: 400 !important; text-align: center; ">Beach wear, formal wear and evening wear
                     </h4>
                  </div>
               </div>
            </a>
            </div>
         </div>
      </section>
      <section>
         <div class="container">
            <div class="tab" style="padding: 0 0 35px;" align="center">                      
               <button class="tablinks" onclick="openCity(event, 'payment')" id="defaultOpen">
               <i class="fa fa-credit-card" style="font-size:20px;"></i><br><br>
              <h4>Payment</h4>
               </button>
               <button class="tablinks" onclick="openCity(event, 'delivery')">
               <i class="fa fa-truck" style="font-size:20px;"></i><br><br>
               <h4>Delivery</h4>
               </button>
            </div>
            <div class="row">
               <div id="payment" class="tabcontent">
                  <h5>Payment Security-</h5>
                  <p>Payment security is very essential at Emmat Online Shopping Mall. All credit and debit card holders are subject to validation checks and authorisation by the card issuer. If the issuer of card refuses to or does not for any reason authorise payment then we will not be able to accept your order. We also have encryption software to ensure your information is always secured.</p>
                  <h5>Payment Methods -</h5>
                  <p>We accept the following major credit and debit cards: visa, visa electron, MasterCard, maestro and solo.</p>
               </div>
               <div id="delivery" class="tabcontent">
                  <h5>UK Standard Delivery -</h5>
                  <p>Standard delivery to the UK Mainland (excluding Highlands, Islands and Isle of Man) will take between 2 - 5 working days from when the order is placed and cost £3.99 fees for postage.</p>
                  <p>All orders are dispatched from our warehouse between Monday and Friday. However, orders are not dispatched from our warehouse between Monday and Friday. However, orders are not dispatched from our warehouse on Saturday or Sunday. Standard delivery to Northern Ireland, the Highlands, Channel Islands, Isle of Man and all UK offshore Islands will take 5 - 7 working days and cost £6.99 postage fee.</p>
                  <p>Please note, signature is required upon order receipt. During sale periods like bank holidays, Black Friday and Christmas days standard delivery may be up to 7 working days from when your order is placed.</p>
                  <h5>UK Express Delivery -</h5>
                  <p>We accept the following major credit and debit cards: visa, visa electron, MasterCard, maestro and solo.</p>
                  <p>Please note, all orders are normally dispatched from our warehouse Monday to Friday . All orders could be tracked via our website and we will provide customer with the needed tracking details. Signature required upon order receipt.</p>
                  <h5>Home Delivery Service -</h5>
                  <p>Customers could request for a home delivery special service where order would be delivered to a client’s address by EMMAT staff but there is a fee for this service which range between £5 - £15 depending on distance between EMMAT warehouse and buyer’s designated address. We normally offer this service within London locality. If this service would not be available as at the time of your order, we would gladly let you know any feedback as soon as possible. Any form of ID, and an invoice or receipt of purchase would be required before release of package for security reasons.</p>
                  <h5>International Delivery -</h5>
                  <p>International delivery service is available and we aim to deliver your order within 5 - 10 working days. Please Beware that all purchases would be made in pounds sterling and international credit card providers or banks will determine the exchange rate as required. However, if package does not reach you in the stipulated time. Please allow up to 15 working days from the date you receive your dispatch email to contact our customer service team. Note, we will provide you with to required tracking information to track your parcel.</p>
                  <h5>Delivery Problems -</h5>
                  <p>If you are not at home when delivery man tries to deliver and they can not find a safe location or alternative delivery point, they will leave a card and then re-attempt to deliver 2 more times usually on the following days.</p>
                  <p>To arrange a more convenient delivery day, please follow the instructions on the card left by the courier. If by any reason you do not receive the parcel within 7days of dispatch or parcel believe to be missing in transit, feel free to report it to our customer service team via email.</p>
                  <h5>Orders Requested to be left in a Safe Location -</h5>
                  <p>If you wish to have your order left in a secured location, please let us know as soon as order is placed, but beware that orders left as requested by yourself in a safe location is at owner’s own risk.</p>
               </div>
            </div>
         </div>
      </section>
      <section class="banner parallax" data-option="{'offset': 0}"
         data-image-src="{{ url('/') }}/User/images/demos/demo1/parallax.png" style="background-color: #44352d;">
         <div class="container banner-content appear-animate text-center" data-animation-options="{
            'name': 'blurIn',
            'delay': '.3s'
            }">
            <h3 class="text-white font-weight-bold mb-2"><span
               class="label-star bg-primary text-uppercase text-white ml-2 mr-2"><i class="fa fa-phone fa-rotate-90" aria-hidden="true"></i>&nbsp;CALL NOW</span>
            </h3>
            <br>
            <p class="font-primary text-white mb-6">If you are looking for high-quality African fashion, visit our store or feel free to call us
            </p>
            <!-- <a href="#" class="btn btn-solid pl-5 pr-5">Discover&nbsp;Now</a>-->
         </div>
      </section>
      <section>
         <div class="container" style="margin: 80px auto;">
            <div class="row">
               <div class="col-md-3">
                  <h4>Fill the Form or</h4>
                  <h2>CALL US</h2>
                  <p style="margin-bottom: 1rem;">
                     <i class="fa fa-map-marker" style="color: #3c91f6;"></i>&nbsp; &nbsp; Emmat Online Shopping Mall
                  </p>
                  <p style="padding-left: 25px; margin-bottom: 1rem;">Denmark Rd, London</p>
                  <p style="padding-left: 25px;">SE25 5RD</p>
                  <p>
                     <i class="fa fa-phone fa-rotate-90" style="color: #3c91f6;"></i>&nbsp; &nbsp; 07869693914
                  </p>
                  <p>
                     <i class="fa fa-envelope" style="color: #3c91f6;"></i>&nbsp; &nbsp; emmatinternational@gmail.com
                  </p>
               </div>
               <div class="col-md-9">
                  <form action="{{ route('call-us') }}" method="post" enctype="multipart/form-data">
                    @csrf
                     <div class="row">
                        <div class="col-md-4"><input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your Name" name="name" required=""></div>
                        <div class="col-md-4">
                           <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" required="">
                        </div>
                        <div class="col-md-4">
                           <input type="number"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="mobile" required="">
                        </div>
                     </div>
                     <br>
                     <div class="row">
                        <div class="col-md-12">
                           <textarea class="comment" placeholder="Message" name="message" required="" style="border:1px solid #e3e3e3;"></textarea>
                        </div>
                     </div>
                     <br>
                     <div class="row">
                        <div class="col-md-4"><input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Measurement" name="meassurement" required=""></div>
                        <div class="col-md-4">
                           <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="date" required="">
                        </div>
                        <div class="col-md-4">
                           <input type="text"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Delivery Location" name="location" required="">
                        </div>
                     </div>
                     <br>
                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <label for="exampleFormControlFile1">Example file input</label>
                              <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image" required="">
                           </div>
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-2" align="right">
                           <button type="submit" class="btn btn-primary mb-2" >SEND</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </section>
   </div>
</main>
@endsection