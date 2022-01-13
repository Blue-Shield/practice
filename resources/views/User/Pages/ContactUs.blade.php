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
  .gif{
    margin-left: 150px;
  }
</style>
   <main class="main checkout">
      <!-- <div class="page-header bg-dark"
        style="background-image: url('images/shop/page-header-back.jpg'); background-color: #3C63A4;">
        <h1 class="page-title">Checkout</h1>
        <ul class="breadcrumb">
          <li><a href="demo1.html"><i class="d-icon-home"></i></a></li>
          <li>Checkout</li>
        </ul>
      </div> -->
      <!-- End PageHeader -->
      <div class="page-content  pb-10">
         <div class="row">
          <ul class="breadcrumb">
         <li><a href="{{ route('/') }}">Home</a></li>
         <li><a href="#">Contact us</a></li>
       </ul>
        </div>
        <div class="container mt-8">
          <div class="row">
            <div class="col-md-6">
              <h5 class="about-page">Bespoke Clothing That Will Make The Heads Turn</h5>
              <p>
                Are you looking for bespoke clothing for men and women? Look no further than Emmat Online Shopping Mall today. Based in Croydon, South East London, we offer a varied clothing line for customers who are looking for something a little different. Have a look at our online store for beautiful products that are handmade by our highly talented craftsmen. Add a twist of Africa into your style!
              </p>
            </div>
             <div class="col-md-6">
              <h5 class="about-page">Returns/Exchange Policy</h5>
              <p>
                We are happy to accept any returns or exchanges within 14 days of receiving your goods. If you have any issues with your goods, please contact us directly. For customized and perishable orders, we cannot accept returns or exchanges unless the item is damaged. The buyer is responsible for the cost of return and if the item is not in its original condition, the buyer is responsible for any costs incurred.
              </p>
            </div>
          </div>
            <div class="row">
                       <div class="col-md-4">
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
                            <i class="fa fa-envelope" style="color: #3c91f6;"></i>&nbsp; &nbsp; info@emmatshopping.co.uk
                        </p>
                       </div> 
                       <div class="col-md-8 forms">
                        <form id="form" class="form">
                          <div class="row">
                            <div class="col-md-6"><input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your Name" name="name"></div>
                            <div class="col-md-6">
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                            </div> 
                          </div>
                          <br>
                            <div class="row"> 
                            <div class="col-md-6">
                               <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Date" name="date">
                            </div>
                            <div class="col-md-6">
                                <input type="number"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="mobile">
                            </div>
                          </div>
                          <br>
                          <div class="row">
                              <div class="col-md-12">
                                  <textarea class="comment" placeholder="Message" name="message"></textarea>
                              </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-md-4">
                                 <button type="submit" class="btn btn-primary mb-2" style="width: 50%;">SEND</button>
                            </div>
                          </div>
                      </form>
                       <div class="gif" style="display: none">
                         <img src="{{ url('/') }}/public/User/images/spinner.gif">
                       </div>
                       </div>
                      
                    </div> 
        </div>
      </div>
    </main>
    @endsection