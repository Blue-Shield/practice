<!DOCTYPE html>
<html lang="en">
@php
$url = url()->full();
$isAvailable = DB::table('seosections')->where('url',$url)->count();
if($isAvailable>0)
{
  $Seo = DB::table('seosections')->where('url','=',$url)->first();
}
else
{
  $Seo = DB::table('seosections')->where('url','=','http://localhost/emmatshopping')->first();
}
@endphp

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="google-site-verification" content="XwznOMzUu9aYS5yubnfd6iYIZoLyhM9fuhEFZn3g89A" />
    <meta name="keywords" content="Are you looking for African Boutique Clothing London? We offer to buy African Fashion Dresses, quality bags, sculptures, shoes, and jewellery at affordable prices." />
    <meta name="title" content="{{ $Seo->meta_title }}">
    <meta name="description" content="{{ $Seo->meta_description }}">
    <meta name="author" content="Online Shopping Mall London - African Fashion Dresses and Boutique">
    <title>{{ $Seo->meta_title }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ url('/') }}/User/images/logo.jpg">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-155399425-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-155399425-1');
    </script>
     <link rel="canonical" href=" https://emmatshopping.com/" />
     <meta property="og:locale" content="en_US" />
      <meta property="og:type" content="website" />
      <meta property="og:title" content="African Fashion Dresses London | African Boutique Clothing" />
      <meta property="og:description" content=" Are you looking for African Boutique Clothing London? We offer to buy African Fashion Dresses, quality bags, sculptures, shoes, and jewellery at affordable prices." />
      <meta property="og:url" content=" https://emmatshopping.com/" />
      <meta property="og:site_name" content="Emmat Online Shopping Mall" />
      <meta name="twitter:card" content="summary_large_image" />
<style>
 .sml-logo {
  width: auto;
  height: 80px;
}
.header-static{
    height:120px;
}
.header-scroll{
    height:80px;
}
</style>
    <script>
        WebFontConfig = {
            google: { families: ['Open+Sans:400,600,700', 'Poppins:400,600,700'] }
        };
        (function (d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = 'js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/User/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/User/vendor/animate/animate.min.css">

    <!-- Plugins CSS File -->
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/User/vendor/magnific-popup/magnific-popup.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/User/vendor/owl-carousel/owl.carousel.min.css">

    <!-- Main CSS File -->
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/User/css/demo1.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/User/css/style.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/User/css/styles.css">
    @php
    $Cart = Session::get('Cart');
    $Categories = DB::table('categories')->get();
    @endphp
</head>
<body class="home">
    <div class="loading-overlay">
        <div class="bounce-loader">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
            <div class="bounce4"></div>
        </div>
    </div>
    <div class="page-wrapper">
        <h1 class="d-none">Online Shopping Mall London - African Fashion Dresses and Boutique</h1>
        <header class="header">
            <div class="header-middle sticky-header fix-top sticky-content order-2 header-static">
                <div class="container">
                    <div class="header-left">
                        <a href="#" class="mobile-menu-toggle">
                            <i class="d-icon-bars2"></i>
                        </a>
                    </div>
                    <div class="header-center">
                        <a href="{{ route('/') }}">
                            <img src="{{ url('/') }}/User/images/logo.jpg" alt="logo" width="91" height="39" class="logo" />
                        </a>
                        <!-- End of Header Search -->
                    </div>
                    <div class="header-right">
                            <nav class="main-nav">
                            <ul class="menu">
                                <li class="active">
                                    <a href="{{ route('/') }}">Home</a>
                                </li>
                                <li>
                                    <a href="{{ route('about-us') }}">About</a>
                                </li>
                                  <li>
                                    <a href="#">store</a>
                                    <ul>
                                      @foreach($Categories as $Category)
                                        <li>
                                            <a href="{{ url('product-by-category',['category_name' =>str_replace(' ', '-', strtolower($Category->category_name)),'id   ' =>$Category->id]) }}">{{ $Category->category_name }}</a>
                                             @php 
                                                $Subcategories = DB::table('subcategories')->where('category_id',$Category->id)->get();
                                                $ifExistSub = DB::table('subcategories')->where('category_id',$Category->id)->first();
                                             @endphp
                                             @if($ifExistSub)
                                              <ul>
                                                @foreach($Subcategories as $Subcategory)
                                                  <li>
                                                    <a href="{{ url('product-by-subcategory',['subcategory_name' => str_replace(' ', '-', strtolower($Subcategory->subcategory_name)), 'id' => $Subcategory->id]) }}">
                                                      {{ $Subcategory->subcategory_name }}
                                                    </a>
                                                  </li>
                                                @endforeach
                                              </ul>
                                              @endif
                                        </li>
                                      @endforeach
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ url('product-by-category/green-power/12') }}">Green Power</a>
                                </li>
                                <li>
                                    <a href="#">Blog</a>
                                </li>
                                <li>
                                    <a href="{{ route('contact') }}">Contact</a>
                                </li>
                                <li>
                                  <div class="cart-section">
                                  @if($Cart)
                                  <div class="dropdown cart-dropdown">
                                      <a href="#" class="cart-toggle">
                                          <i class="minicart-icon">
                                              <span class="cart-count">{{ count($Cart) }}</span>
                                          </i>
                                      </a>
                                      <!-- End of Cart Toggle -->
                                        <div class="dropdown-box">
                                          <div class="product product-cart-header">
                                              <span class="product-cart-counts">{{ count($Cart) }} items</span>
                                              <!--<span><a href="{{ route('cart') }}">View cart</a></span>-->
                                          </div>
                                          <div class="products scrollable">
                                              @php 
                                                $CartTotal = 0;
                                              @endphp
                                              @foreach($Cart as $Carts)
                                              @php 
                                                if($Carts['product_attribute_image'] == "")
                                                {
                                                  $image = url('/')."/Admin/ProductImage/".$Carts['product_image'];
                                                }
                                                else
                                                {
                                                  $image = $Carts['product_attribute_image'];
                                                }
                                                @endphp
                                              <div class="product product-cart">
                                                  <div class="product-detail">
                                                      <a href="product.html" class="product-name">
                                                        {{ $Carts['product_name'] }}
                                                      </a>
                                                      <div class="price-box">
                                                          <span class="product-quantity">{{ $Carts['product_qty'] }}</span>
                                                          <span class="product-price">£{{ $Carts['product_price'] }}</span>
                                                      </div>
                                                  </div>
                                                  <figure class="product-media">
                                                      <a href="#">
                                                          <img src="{{ $image }}" alt="product" width="90"
                                                              height="90" />
                                                      </a>
                                                      <button class="btn btn-link btn-close" onclick="removeCart('{{ $Carts['product_id'] }}')">
                                                          <i class="fas fa-times"></i>
                                                      </button>
                                                  </figure>
                                              </div>
                                              @php 
                                                $CartTotal = $CartTotal+$Carts['total_price'];
                                              @endphp
                                              @endforeach
                                              <!-- End of Cart Product -->
                                          </div>
                                          <!-- End of Products  -->
                                          <div class="cart-total">
                                              <label>Subtotal:</label>
                                              <span class="price">£{{ $CartTotal }}</span>
                                          </div>
                                          <!-- End of Cart Total -->
                                          <div class="cart-action">
                                              <a href="{{ route('cart') }}" class="btn btn-dark"><span>View Cart</span></a>
                                          </div>
                                          <!-- End of Cart Action -->
                                      </div>
                                      <!-- End of Dropdown Box -->
                                  </div>
                                  @else
                                  <div class="dropdown cart-dropdown">
                                    <a href="#" class="cart-toggle">
                                      <i class="minicart-icon">
                                        <span class="cart-count">0</span>
                                      </i>
                                    </a>
                                 </div>
                                @endif
                                </div>
                                </li>
                                <li>
                                       @if(Auth::user())
                        <a href="{{ route('user-profile') }}">
                            <button class="btn-login">{{ Auth::user()->name }}</button>
                        </a>
                        @else
                        <a href="{{ route('user-login') }}">
                            <button class="btn-login">LOGIN</button>
                        </a>
                        @endif
                        <div class="header-search hs-toggle mobile-search">
                            <a href="#" class="search-toggle">
                                <i class="d-icon-search"></i>
                            </a>
                            <form action="#" class="input-wrapper">
                                <input type="text" class="form-control" name="search" autocomplete="off"
                                    placeholder="Search your keyword..." required />
                                <button class="btn btn-search" type="submit">
                                    <i class="d-icon-search"></i>
                                </button>
                            </form>
                        </div>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <!-- End of Header -->
        @yield('content')

        <!-- End of Main -->
        <footer class="footer appear-animate" style="color: #ffffff;">
            <div class="container">
                
                <div class="footer-middle">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="widget ml-lg-4">
                                <h2 class="widget-title">Site Map</h2>
                                <ul class="widget-body">
                                    <li><a href="{{ route('/') }}">Home</a></li>
                                    <li><a href="{{ route('about-us') }}">About</a></li>
                                    <li><a href="{{ url('product-by-category',['category_name' =>str_replace(' ', '-', strtolower('AFRICA DESIGN CLOTHING')),'id' =>$Category->id]) }}">Store</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="{{ route('contact') }}">Contact</a></li>
                                </ul>
                            </div>
                            <!-- End of Widget -->
                        </div>
                          <div class="col-lg-3 col-md-6">
                            <div class="widget ml-lg-4">
                                <h2 class="widget-title">Store</h2>
                                <ul class="widget-body">
                                  @foreach($Categories as $Category)
                                    <li><a href="{{ url('product-by-category',['category_name' =>str_replace(' ', '-', strtolower($Category->category_name)),'id' =>$Category->id]) }}">{{ ucwords(strtolower($Category->category_name)) }}</a></li>
                                  @endforeach
                                </ul>
                            </div>
                            <!-- End of Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="widget ml-lg-4">
                                <h4 class="widget-title">Useful Links</h4>
                                <ul class="widget-body">
                                    <li><a href="#">Trading Terms</a></li>
                                    <li><a href="#">Terms of Use</a></li>
                                    <li><a href="#">Return Policy</a></li>
                                    <li><a href="#">Privacy & Cookie Policy</a></li>
                                    <li><a href="#">Sitemap</a></li>
                                </ul>
                            </div>
                            <!-- End of Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="widget ml-lg-4">
                              <div class="social-links">
                            <a href="https://www.facebook.com/EmmatOnlineShoppingMall/" class="social-link social-facebook fab fa-facebook-f"></a>
                            <a href="https://www.facebook.com/EmmatOnlineShoppingMall/" class="social-link social-twitter fab fa-twitter"></a>
                            <a href="http://www.linkedin.com/" class="social-link social-linkedin fab fa-linkedin-in"></a>
                        </div>
                        <br>
                        <br>
                        <h6 class="widget-title">Contact</h6> 
                        <p> Call: 07869693914</p>
                        <p>Email: emmatinternational@gmail.com</p>
                        <br>
                    <h6 class="widget-title">Information</h6> 
                        <p> Registration No: 12705298</p>
                        <p>VAT No: GB352549489000</p>
                        <figure class="payment">
                            <img src="{{ url('/') }}/User/images/payment.png" alt="payment" width="159" height="29" />
                        </figure>
                            </div>
                            <!-- End of Widget -->
                        </div>
                    </div>
                </div>
                <!-- End of FooterMiddle -->
                <div class="footer-bottom">
                    <div class="footer-left">
                        <p class="copyright">Copyright &copy; 2021 Emmat International - Crafted by <a href="https://saintellectsolutions.com/">SAIntellectsolutions</a></p>
                    </div>
                </div>
                <!-- End of FooterBottom -->
            </div>
        </footer>
        <!-- End of Footer -->
    </div>
    <!-- Sticky Footer -->
    <div class="sticky-footer sticky-content fix-bottom">
        <a href="{{ route('/') }}" class="sticky-link active">
            <i class="d-icon-home"></i>
            <span>Home</span>
        </a>
        <a class="sticky-link">
            <i class="d-icon-volume"></i>
            <span>Categories</span>
        </a>
        <a href="{{ route('user-profile') }}" class="sticky-link">
            <i class="d-icon-heart"></i>
            <span>Profile</span>
        </a>
        <a href="{{ route('user-login') }}" class="sticky-link">
            <i class="d-icon-user"></i>
            <span>Login</span>
        </a>
        <div class="dropdown cart-dropdown dir-up">
            <a class="sticky-link cart-toggle">
                <i class="d-icon-bag"></i>
                <span>Cart</span>
            </a>
            <div class="mobile-cart">
            @if($Cart)
            <!-- End of Cart Toggle -->
            <div class="dropdown-box">
              <div class="product product-cart-header">
                  <span class="product-cart-counts">{{ count($Cart) }} items</span>
                  <!--<span><a href="{{ route('cart') }}">View cart</a></span>-->
              </div>
              <div class="products scrollable">
                  @php 
                    $CartTotal = 0;
                  @endphp
                  @foreach($Cart as $Carts)
                  @php 
                    if($Carts['product_attribute_image'] == "")
                    {
                      $image = url('/')."/Admin/ProductImage/".$Carts['product_image'];
                    }
                    else
                    {
                      $image = url('/')."/Admin/AttributeImage/".$Carts['product_attribute_image'];
                    }
                    @endphp
                  <div class="product product-cart">
                      <div class="product-detail">
                          <a href="product.html" class="product-name">
                            {{ $Carts['product_name'] }}
                          </a>
                          <div class="price-box">
                              <span class="product-quantity">{{ $Carts['product_qty'] }}</span>
                              <span class="product-price">£{{ $Carts['product_price'] }}</span>
                          </div>
                      </div>
                      <figure class="product-media">
                          <a href="#">
                              <img src="{{ $image }}" alt="product" width="90"
                                  height="90" />
                          </a>
                          <!--<button class="btn btn-link btn-close" onclick="removeCart('{{ $Carts['product_id'] }}')">-->
                          <!--    <i class="fas fa-times"></i>-->
                          <!--</button>-->
                      </figure>
                  </div>
                  @php 
                    $CartTotal = $CartTotal+$Carts['total_price'];
                  @endphp
                  @endforeach
                  <!-- End of Cart Product -->
              </div>
              <!-- End of Products  -->
              <div class="cart-total">
                  <label>Subtotal:</label>
                  <span class="price">£{{ $CartTotal }}</span>
              </div>
              <!-- End of Cart Total -->
              <div class="cart-action">
                  <a href="{{ route('cart') }}" class="btn btn-dark"><span>View Cart</span></a>
              </div>
              <!-- End of Cart Action -->
          </div>
            @else
        @endif
        </div>
            <!-- End of Dropdown Box -->
        </div>
    </div>
    <!-- Scroll Top -->
<!--<div id="sy-whatshelp" onclick="openForm()">-->
<!--  <div class="sywh-services">-->
<!--    <a href="" class="messenger" data-tooltip="Livechat" data-placement="left" target="_blank">-->
<!--      <i class="fa fa-comments"></i>-->
<!--    </a>-->
<!--    <a href="" class="whatsapp" data-tooltip="WhatsApp" data-placement="left" target="_blank">-->
<!--      <i class="fa fa-whatsapp"></i>-->
<!--    </a>-->
<!--    <a href="" class="call" data-tooltip="Call" data-placement="left">-->
<!--      <i class="fa fa-phone"></i>-->
<!--    </a>-->
<!--  </div>-->
<!--  <a class="sywh-open-services" data-placement="left">-->
<!--                <i class="fa fa-comments"></i>-->
<!--    <i class="fa fa-times"></i>-->
<!--  </a>-->
<!--</div>-->
<!--<div class="form-popup" id="myForm">-->
<!--  <form action="/action_page.php" class="form-container">-->
<!--    <button type="button" onclick="closeForm()" style="float:right;">X</button>-->
<!--    <p>Send message</p>-->
<!--<p style="text-align: center;">Please fill out the form below and we will get back to you as soon as possible.</p>-->
<!--    <input type="text" placeholder="*Enter Name" name="name" required>-->
<!--   <input type="email" placeholder="*Enter Email" name="email" required>-->
<!--   <textarea class="comment2">Message</textarea>-->
<!--    <button type="submit" class="btn">SUBMIT</button>-->
<!--  </form>-->
<!--</div>-->
<div class="row">
  <div class="alert alert-primary btn-of-cart" role="alert">
 Cart Updated!
</div>
</div>
    <a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="fas fa-chevron-up"></i></a>

    <!-- MobileMenu -->
    <div class="mobile-menu-wrapper">
        <div class="mobile-menu-overlay">
        </div>
        <!-- End of Overlay -->
        <a class="mobile-menu-close" href="#"><i class="d-icon-times"></i></a>
        <!-- End of CloseButton -->
        <div class="mobile-menu-container scrollable">
            <form action="#" class="input-wrapper">
                <input type="text" class="form-control" name="search" autocomplete="off"
                    placeholder="Search your keyword..." required />
                <button class="btn btn-search" type="submit">
                    <i class="d-icon-search"></i>
                </button>
            </form>
            <!-- End of Search Form -->
            <ul class="mobile-menu mmenu-anim">
                <li class="active">
                    <a href="{{ route('/') }}">Home</a>
                </li>
               <li>
                                    <a href="{{ route('about-us') }}">About</a>
               </li>
                <li>
                    <a href="#">Store</a>
                           <ul>
                                      @foreach($Categories as $Category)
                                        <li>
                                            <a href="{{ url('product-by-category',['category_name' =>str_replace(' ', '-', strtolower($Category->category_name)),'id' =>$Category->id]) }}">{{ $Category->category_name }}</a>
                                             @php 
                                                $Subcategories = DB::table('subcategories')->where('category_id',$Category->id)->get();
                                                $ifExistSub = DB::table('subcategories')->where('category_id',$Category->id)->first();
                                             @endphp
                                             @if($ifExistSub)
                                              <ul>
                                                @foreach($Subcategories as $Subcategory)
                                                  <li>
                                                    <a href="{{ url('product-by-category',['category_name' =>str_replace(' ', '-', strtolower($Category->category_name)),'id' =>$Category->id]) }}">
                                                      {{ $Subcategory->subcategory_name }}
                                                    </a>
                                                  </li>
                                                @endforeach
                                              </ul>
                                              @endif
                                        </li>
                                      @endforeach
                                    </ul>
                </li>
                <li>
                    <a href="{{ url('green-power/12') }}">Green Power</a>
                </li>
                <li>
                    <a href="#">Blog</a>
                </li>
                <li>
                 <a href="{{ route('contact') }}">Contact</a>
                 </li>
            </ul>
            <!-- End of MobileMenu -->
            <!-- <ul class="mobile-menu mmenu-anim">
                <li><a href="login.html">Login</a></li>
                <li><a href="cart.html">My Cart</a></li>
                <li><a href="wishlist.html">Wishlist</a></li>
            </ul> -->
            <!-- End of MobileMenu -->
        </div>
    </div>
    <script>
        $(function() { var logo = $(".header-static"); $(window).scroll(function() {
var scroll = $(window).scrollTop();

    if (scroll >= 150) {
      if(!logo.hasClass("header-scroll")) {
        logo.hide();
        logo.removeClass('header-static').addClass("header-scroll").fadeIn( "slow");
      }
    } else {
      if(!logo.hasClass("header-static")) {
        logo.hide();
        logo.removeClass("header-scroll").addClass('header-static').fadeIn( "slow");
      }
    }

});
});
    </script>
    <script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
    <script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
    <!-- Plugins JS File -->
    <script src="{{ url('/') }}/User/vendor/jquery/jquery.min.js"></script>
    <script src="{{ url('/') }}/User/vendor/parallax/parallax.min.js"></script>
    <script src="{{ url('/') }}/User/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <!--<script src="{{ url('/') }}/User/vendor/elevatezoom/jquery.elevatezoom.min.js"></script>-->
    <script src="{{ url('/') }}/User/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="{{ url('/') }}/User/zoomsl.js" type="text/javascript"></script>
    <script src="{{ url('/') }}/User/vendor/owl-carousel/owl.carousel.min.js"></script>
    <!-- Main JS File -->
    <script src="{{ url('/') }}/User/js/main.js"></script>
    <script>
      // Add to Cart Functionality
      // $(document).ready(function(){
      //   $('.btn-of-cart').hide();
      // });
      var attribute_value = '';
      var status = 'active';
     
     function reArrangeGallery(val)
     {
         if(status == 'deactive')
         {
             $.ajax({
              url:'{{ route("rearrange-gallery") }}',
              method:'get',
              data:{ product_id:val },
              success:function(success){
                //   $('.join').html(success.figure);
                //   $('.rejoin').html(success);
                console.log(success);
              },
              error:function(error){
                console.log(error);
              }
            });
         }
     }
      
     
     function addtoCart(val){
        $.ajax({
          url:'{{ route("add-to-cart") }}',
          method:'get',
          data:{ product_id:val },
          success:function(success){
            $('.cart-section').html(success.Information);
            $('.mobile-cart').html(success.mobile_cart);
            $('.btn-of-cart').show();
            var cartButton = '<a class="btn btn-outline btn-md btn-dark btn-icon-right" onclick="addtoCart('+val+')">Update Cart</a>';
            $('.'+val).html(cartButton);
            setTimeout(function(){ $('.btn-of-cart').hide(); }, 1000);
            console.log(success);
          },
          error:function(error){
            console.log(error);
          }
        });
      }

      function removeCart(val)
      {
        $.ajax({
          url:'{{ route("remove-cart") }}',
          method:'get',
          data:{ product_id:val },
          success:function(success){
            $('.cart-section').html(success.Information);
            $('.mobile-cart').html(success.mobile_cart);
            $('.btn-of-cart').show();
            setTimeout(function(){ $('.btn-of-cart').hide(); }, 1000);
            var cartButton = '<a class="btn btn-outline btn-md btn-dark btn-icon-right" onclick="addtoCart('+val+')">ADD TO CART</a>';
            $('.'+val).html(cartButton);

           // update in cart page
            $('.cart-table').html(success.CartInformation);
            let total = '<p class="summary-subtotal-price">£'+success.cart_total+'</p>';
            $('.cart-total').html(total);
            let sub_total = '<p class="summary-total-price">£'+success.cart_total+'</p>';
            $('.sub-total').html(sub_total);
          },
          error:function(error){
            console.log(error);
          }
        });
      }

      function increaseCart(val)
      {
        $('.calculation'+val).hide();
        $('.calculation-gif'+val).show();
        $.ajax({
          url:'{{ route("increase-cart") }}',
          method:'get',
          data:{ product_id:val },
          success:function(success){
            $('.cart-section').html(success.Information);
            $('.mobile-cart').html(success.mobile_cart);
            $('.cart-table').html(success.CartInformation);
            $('.btn-of-cart').show();
            setTimeout(function(){ $('.btn-of-cart').hide(); }, 1000);
            // var cart_total ='<p class="summary-subtotal-price">£'+success.cart_total'</p>';
            let total = '<p class="summary-subtotal-price">£'+success.cart_total+'</p>';
            $('.cart-total').html(total);
            let sub_total = '<p class="summary-total-price">£'+success.cart_total+'</p>';
            $('.sub-total').html(sub_total);
            console.log(success);
            $('.calculation'+val).show();
            $('.calculation-gif'+val).hide();
          },
          error:function(error){
            console.log(error);
          }
        });
      }
      function getGalleryImage(val)
      {
        var productImage = '<img src="{{ url('/') }}/Admin/GalleryImage/'+val+'" alt="Blue Pinafore Denim Dress" width="100%" height="500">';
          $('.product-image').html(productImage);
      }
      function getAttributeImage(val)
      {
        var productImage = '<img src="{{ url('/') }}/Admin/AttributeImage/'+val+'" alt="Blue Pinafore Denim Dress" width="100%" height="500">';
          $('.product-image').html(productImage);
      }
      function addToCartFromProductPageForAttribute(val)
      {
        alert(val);
      }

      function decreaseCart(val, qty)
      {
        $('.calculation'+val).hide();
        $('.calculation-gif'+val).show();
        // $('.cart-table').hide();
        $('.spinner-show').show();
        if(qty!=1)
        {
          $.ajax({
          url:'{{ route("decrease-cart") }}',
          method:'get',
          data:{ product_id:val },
          success:function(success){
            $('.cart-section').html(success.Information);
            $('.mobile-cart').html(success.mobile_cart);
            $('.cart-table').html(success.CartInformation);
            $('.btn-of-cart').show();
            setTimeout(function(){ $('.btn-of-cart').hide(); }, 1000);
            // var cart_total ='<p class="summary-subtotal-price">£'+success.cart_total'</p>';
            let total = '<p class="summary-subtotal-price">£'+success.cart_total+'</p>';
            $('.cart-total').html(total);
            let sub_total = '<p class="summary-total-price">£'+success.cart_total+'</p>';
            $('.sub-total').html(sub_total);
            $('.spinner-show').hide();
            // $('.cart-table').show();
            console.log(success);
            $('.calculation'+val).show();
            $('.calculation-gif'+val).hide();
          },
          error:function(error){
            console.log(error);
          }
        });
        }
        else
        {
          $('.calculation'+val).show();
            $('.calculation-gif'+val).hide();
          false;
        }
      }
      function addToCartFromProductPage(val)
      {
        $.ajax({
          url:'{{ route("addto-cart-productpage") }}',
          method:'get',
          data:{ product_id:val },
          success:function(success){
            $('.cart-section').html(success.Information);
            $('.mobile-cart').html(success.mobile_cart);
            // $('.cart-table').html(success.CartInformation);
            $('.btn-of-cart').show();
            setTimeout(function(){ $('.btn-of-cart').hide(); }, 1000);
            let cartButton = '<a href="{{ route("cart") }}" class="btn-product btn-carts"><i class="d-icon-bag"></i>View Cart</a>';
                $('.product-addto-cart-btn').html(cartButton);
          },
          error:function(error){
            console.log(error);
          }
        });
      }
      function hellowmoto(val)
      {
           $('.small_img').removeClass('active');
          $('.'+val).addClass('active');
      }
      $(document).ready(function(){
      $('.small_img').hover(function(){
			$('.big_img').attr('src', $(this).attr('src'));
        });
        
        	$('.big_img').imagezoomsl({
        		zoomrange:[3,3]
        	});
          
          $('.fa-angle-up').click(function(){
             $('.slider').animate({scrollTop:'-=100'});
          });
          
          $('.fa-angle-down').click(function(){
             $('.slider').animate({scrollTop:'+=100'});
          });
          
          
          $(function() { var logo = $(".logo"); $(window).scroll(function() {
            var scroll = $(window).scrollTop();
            
                if (scroll >= 150) {
                  if(!logo.hasClass("sml-logo")) {
                    logo.hide();
                    // logo.removeClass('logo').addClass("sml-logo").fadeIn( "slow");
                  }
                } else {
                //   if(!logo.hasClass("logo")) {
                //     logo.hide();
                //     logo.removeClass("sml-logo").addClass('logo').fadeIn( "slow");
                //   }
                logo.show();
                }
            
            });
            });
        $('#ratings-submit').submit(function(e){
          $('.reply').hide();
          $('.gif').show();
          e.preventDefault();
          $.ajax({
            url:'{{ route("ratings-submit") }}',
            method:'get',
            data:$(this).serialize(),
            success:function(success){
              let message = "<div class='message'> "+success+" </div>";
              $('.gif').hide();
              $('.replies').html(message);
              console.log(success);
            },
            error:function(error){
              console.log(error);
            }
          });
        });
        $('#form').submit(function(e){
          e.preventDefault();
          $('.form').hide();
          $('.gif').show();
          $.ajax({
            url:'{{ route("contactus") }}',
            method:'get',
            data:$(this).serialize(),
            success:function(success){
              let message = "<div class='message'> "+success.message+" </div>";
              // $('.gif').hide();
              $('.forms').html(message);
              console.log(success);
            },
            error:function(error){
              console.log(error);
            }
          });
        });
        $('#addToCart').submit(function(e){
          e.preventDefault();
          $.ajax({
              url:'{{ route("addto-cart-productpage-attribute") }}',
              method:'get',
              data:$('#addToCart').serialize(),
              success:function(success){
                $('.cart-section').html(success.Information);
                // $('.cart-table').html(success.CartInformation);
                $('.btn-of-cart').show();
                setTimeout(function(){ $('.btn-of-cart').hide(); }, 1000);
                let cartButton = '<a href="{{ route("cart") }}" class="btn-product btn-carts"><i class="d-icon-bag"></i>View Cart</a>';
                $('.product-addto-cart-btn').html(cartButton);
                console.log(success);
              },
              error:function(error){
                console.log(error);
              }
            });
        });
      })
      function removeItemFromCartPage(val)
      {
        $.ajax({
          url:'{{ route("remove-item-from-cart") }}',
          method:'get',
          data:{ product_id:val },
          success:function(success){
            $('.cart-section').html(success.Information);
            $('.btn-of-cart').show();
            setTimeout(function(){ $('.btn-of-cart').hide(); }, 1000);
            // var cartButton = '<a class="btn btn-outline btn-md btn-dark btn-icon-right" onclick="addtoCart('+val+')">ADD TO CART</a>';
            // $('.'+val).html(cartButton);
           // update in cart page
            $('.cart-table').html(success.CartInformation);
            let total = '<p class="summary-subtotal-price">£'+success.cart_total+'</p>';
            $('.cart-total').html(total);
            let sub_total = '<p class="summary-total-price">£'+success.cart_total+'</p>';
            $('.sub-total').html(sub_total);
          },
          error:function(error){
            console.log(error);
          }
        });
      }

      function changeImage(val){
          var newData = val.split(",");
          var image = newData[0];
          var price = newData[1];
          $('#attribute_image').val(image);
            $('#attribute_price').val(price);
          $('.big_img').attr('src', image);return;
        $.ajax({
          url:'{{ route("get-attribute-image") }}',
          method:'get',
          data:{ product_id:id, attribute_value:val },
          success:function(success){
            var productImage = '<img src="'+success.image+'" class="big_img" />';
            var productPrice = '£'+success.price+'';
            $('.product-image-gallery').html(productImage);
            var change = '<li class="li"><img src="'+success.image+'" class="small_img"></li>';
            $('.ul').append(change);
            // $('.product-price').html(productPrice);
            $('.big_img').attr('src', success.image);
            $('#attribute_image').val(success.attribute_image);
            $('#attribute_price').val(success.price);
            // $('.product-thumb').removeClass('active');
            // $('.owl-next').addClass('disabled');
            var newImage = '<div class="product-thumb"> <img src="https://emmatshopping.com/Admin/GalleryImage/941623669894.jpg" alt="product thumbnail" width="109" height="122"> </div>';
            $('.product-thumbs').append(newImage);
            // $('.new-active').addClass('active');
            status = 'deactive';
            var updatedImage = '<div class="owl-item" style="width: 461px;"><figure class="product-image"> <div class="product-image-gallery"> <img src="https://emmatshopping.com/Admin/GalleryImage/631623669894.jpg" data-zoom-image="https://emmatshopping.com/Admin/GalleryImage/631623669894.jpg" width="800" height="900"> <div class="zoomContainer" style="-webkit-transform: translateZ(0);position:absolute;left:0px;top:0px;height:518.625px;width:461px;"><div class="zoomWindowContainer" style="width: 400px;"><div style="z-index: 999; overflow: hidden; margin-left: 0px; margin-top: 0px; background-position: 0px 0px; width: 461px; height: 518.625px; float: left; display: none; cursor: crosshair; border: 0px solid rgb(136, 136, 136); background-repeat: no-repeat; position: absolute; background-image: url(&quot;https://emmatshopping.com/Admin/GalleryImage/631623669894.jpg&quot;);" class="zoomWindow">&nbsp;</div></div></div></div> </figure></div>';
            $('.owl-stage').append(updatedImage);
            console.log(productImage);
          },
          error:function(error){
            console.log(error);
          }
        });
      }
      function ratingsUpdate(val){
        $('.rate').removeClass('active');
        $('.star-'+val).addClass('active');
        $('#rating-value').val(val);
      }
      function getStates(val)
      {
        $.ajax({
          url:'{{ route("get-states") }}',
          method:'get',
          data:{ country_id:val },
          success:function(success){
            $('.states').html(success);
            console.log(success);
          },
          error:function(error){
            console.log(error);
          }
        });
      }
      function getCities(val)
      {
         $.ajax({
          url:'{{ route("get-cities") }}',
          method:'get',
          data:{ city_id:val },
          success:function(success){
            $('.city').html(success);
            console.log(success);
          },
          error:function(error){
            console.log(error);
          }
        });
      }
      function getPayment()
      {
        let country= $('#country').val();
        let state= $('#state').val();
        let sub_total= $('#sub-total').val();

        $.ajax({
          url:'{{ route("get-payment") }}',
          method:'get',
          data:{ country:country, state:state, sub_total:sub_total },
          success:function(success){
            $('.payments').html(success.delivery_type);

            if(success.payment && success.total)
            {
              $('.shipping-price').text('£'+success.payment);
              $('.total-summary-price').text('£'+success.total);
            }
            console.log(success);
            $('.shipping').val(success.payment);
              $('.total').val(success.total);
          },
          error:function(error){
            console.log(error);
          }
        });

      }
      function getDeliveyType(val){

        let country= $('#country').val();
        let state= $('#state').val();
        let sub_total= $('#sub-total').val();

        $.ajax({
          url:'{{ route("get-payment-london") }}',
          method:'get',
          data:{ country:country, state:state, sub_total:sub_total, type:val },
          success:function(success){
            $('.shipping-price').text('£'+success.payment);
            // $('.delivery').html(success.delivery_type);
            $('.total-summary-price').text('£'+success.total);
            console.log(success);
            $('.shipping').val(success.payment);
            $('.total').val(success.total);
          },
          error:function(error){
            console.log(error);
          }
        });
      }

      function paymentMethod(val)
      { 
        $('.payment_method').val(val);
      }
        jQuery(function ($) {
          $('a.sywh-open-services').click(function () {
            if ($('.sywh-services').hasClass('active')) {
              $('.sywh-services').removeClass('active');
              $('a.sywh-open-services i.fa-times').hide();
              $('a.sywh-open-services i.fa-comments').show();
              $('a.sywh-open-services').removeClass('data-tooltip-hide');
              $('.sywh-services a:nth-child(1)').delay(0).fadeOut();
              $('.sywh-services a:nth-child(2)').delay(100).fadeOut();
              $('.sywh-services a:nth-child(3)').delay(200).fadeOut();
              $('.sywh-services a:nth-child(4)').delay(300).fadeOut();
              $('.sywh-services a:nth-child(5)').delay(400).fadeOut();
            } else {
              $('.sywh-services').addClass('active');
              $('a.sywh-open-services i.fa-comments').hide();
              $('a.sywh-open-services i.fa-times').show();
              $('a.sywh-open-services').addClass('data-tooltip-hide');
              $('.sywh-services a:nth-child(5)').delay(0).fadeIn();
              $('.sywh-services a:nth-child(4)').delay(100).fadeIn();
              $('.sywh-services a:nth-child(3)').delay(200).fadeIn();
              $('.sywh-services a:nth-child(2)').delay(300).fadeIn();
              $('.sywh-services a:nth-child(1)').delay(400).fadeIn();
            }
          });
        });
            </script>
</body> 

</html>