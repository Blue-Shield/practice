@extends('User/Component/Layout')
@section('content')
@php
$Cart = Session::get('Cart');
$CartTotal = 0;
if(!$Cart)
{
   $Cart = [];
}
@endphp
<style type="text/css">
  .calculation-gif{
    display: none;
    height: 65px;
  }
</style>
  <main class="main">
            <div class="page-content">
            <div class=" pt-2 pb-2 pr-4 pl-4">
          <h3 class="title title-simple">The latest in African fashion</h3>
          
        </div>
        <div class="row">
          <ul class="breadcrumb">
            <li><a href="{{ route('/') }}">Home</a></li>
            <li><a href="#">About Us</a></li>
          </ul>
        </div>
        <div class="container">
          <div class="row gutter-lg mt-8 mb-4">
           <p>
             It’s EMMAT mission to be the most favored shopping destination for all online shoppers by delivering a wide range of great products and offering clients an exceptional service quality and to ensure that all dispatches are made within the right time frame and target to the satisfaction of the customers’ expectations and demand.
           </p>
           <p>When our client is happy, we are too. We aspire to always provide high-quality products and serve our clients with a unique and efficient service.</p>
           <p>“Client talks, we listen. We empathize, we deliver”.</p>
           <p>Most of our products are handmade by talented and highly skillful artisans from Africa.</p>
           <p>Emmat Online Shopping Mall delivers great African fashion wears that are hip, well-designed and fashionable, created by our exceptional team of artisans. We have something for everyone for all people of all ages and gender. For clients who want an outfit that’s unique with a little more colour, look no further – we are the solution.</p>
           <p>At EMMAT Online Shopping Mall, we provide an exquisite range of fashion and a variety of beautiful coloured African handmade bead products. We also stock fantastic and well-made sculptures and works of art, suitable for your home and office. We believe that these beautiful products can be used to turn houses into beautiful homes; to motivate and inspire lost souls and to bring happiness into the hearts of others.</p>
           <p>By shopping with us, we promise only one outcome – A big smile on our client’s faces.</p>
           <p>Come shop with us, we are what you need.</p>
           <p>Our Range of Clothing</p>
          </div>
           <div class="row">
            <div class="col-md-4">
              <h4 class="about-page">Why choose Us.</h4>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi quidem minus id omnis, nam expedita, ea fuga commodi voluptas iusto, hic autem deleniti dolores explicabo labore enim repellat earum perspiciatis.
              </p>
            </div>
             <div class="col-md-4">
              <h4 class="about-page">Our Mission.</h4>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi quidem minus id omnis, nam expedita, ea fuga commodi voluptas iusto, hic autem deleniti dolores explicabo labore enim repellat earum perspiciatis.
              </p>
            </div>
             <div class="col-md-4">
              <h4 class="about-page">What we Do.</h4>
              <p>
                 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi quidem minus id omnis, nam expedita, ea fuga commodi voluptas iusto, hic autem deleniti dolores explicabo labore enim repellat earum perspiciatis.
              </p>
            </div>
          </div>
          <div class="row" align="center">
            <h4 class="about-testimonial">Testimonial</h4>
            </div>
           <section class="product-wrapper container appear-animate mt-10 pt-3 pb-8" data-animation-options="{
                    'delay': '.3s'
                }">
                    <div class="owl-carousel owl-theme row" data-owl-options="{
                        'items': 5,
                        'loop': true,
                        'nav':false,
                        'margin': 20,
                          'autoplay':true,
    'autoplayTimeout':3000,
    'autoplayHoverPause':true,
                        'responsive': {
                            '0': {
                                'items': 1
                            },
                            '768': {
                                'items': 1
                            },
                            '992': {
                                'items': 1,
                                'dots': false,
                                'nav': true
                            }
                        }
                    }">
                        <div class="product">
                              <div>
                                  <p>Good work done Emmat…Thanks to you guys.</p>
                                    
                                </div>
                              
                        </div>
                   <div class="product">
                              <div>
                                  <p>Good work done Emmat…Thanks to you guys.</p>
                                    
                                </div>
                              
                        </div>
                        <div class="product">
                              <div>
                                  <p>Good work done Emmat…Thanks to you guys.</p>
                                    
                                </div>
                              
                        </div>
                       <div class="product">
                              <div>
                                  <p>Good work done Emmat…Thanks to you guys.</p>
                                    
                                </div>
                              
                        </div>
                    <div class="product">
                              <div>
                                  <p>Good work done Emmat…Thanks to you guys.</p>
                                    
                                </div>
                              
                        </div>
                    <div class="product">
                              <div>
                                  <p>Good work done Emmat…Thanks to you guys.</p>
                                    
                                </div>  
                        </div>
                    </div>
                </section>
              </div>
            </div>
        </main>
    @endsection