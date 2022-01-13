@extends('User/Component/Layout')
@section('content')
@php
$Cart = Session::get('Cart');
$CartTotal = 0;
if(!$Cart)
{
   return redirect('/');
}
foreach($Cart as $Carts)
{
  $CartTotal = $CartTotal+$Carts['total_price'];
}
if(!$Cart)
{
   $Cart = [];
}
$Countries = DB::table('countries')->get();
$UserInfo = DB::table('users')->where('id',Auth::user()->id)->first();
@endphp


<main class="main checkout">
   <div class="page-content pt-10 pb-10">
      <div class="pt-2 pb-2 pr-4 pl-4">
         <h3 class="title title-simple">Checkout</h3>
      </div>
      <div class="row">
         <ul class="breadcrumb">
            <li><a href="{{ route('/') }}">Home</a></li>
            <li><a href="#">Checkout</a></li>
         </ul>
      </div>
      <div class="container mt-8">
         <form class="form" action="{{ route('checkout-submit') }}" method="post">
            @csrf
            <div class="row gutter-lg">
               <div class="col-lg-4 mb-6">
                  <h4 class="title title-simple text-left">Billing Address</h4>
                  <div class="row">
                     <div class="col-lg-10">
                        <p><b>NAME:</b> {{ $UserInfo->name }}</p>
                        <p><b>MOBILE:</b> {{ $UserInfo->mobile }}</p>
                        <p><b>EMAIIL:</b> {{ $UserInfo->email }}</p>
                        <p><b>ADDRESS :</b> {{ $UserInfo->address }},</p>
                        <p><b>PIN :</b> {{ $UserInfo->pin }}</p>
                        <p><b>State :</b> {{ $UserInfo->state }}</p>
                        <p><b>Country :</b> {{ $UserInfo->country }}</p>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 mb-6">
                  <h4 class="title title-simple text-left">Shipping Details</h4>
                  <div class="row">
                     <div class="col-xs-12">
                        <label>Name *</label>
                        <input type="text" class="form-control" name="name" placeholder="Name.." required="" />
                     </div>
                  </div>
                  <div class=" pb-4 mt-3">
                     <label>Country*</label>   
                     <select name="country" class="form-control" id="country" onchange="getStates(this.value)" required="">
                        <option value="">Select Country</option>
                        @foreach($Countries as $Country)
                        <option value="{{ $Country->id }}">{{ $Country->name }}</option>
                        @endforeach
                     </select>
                     <input type="hidden" id="sub-total" value="{{ $CartTotal }}">
                     <label>State*</label> 
                     <div class="states">
                        <select name="country" class="form-control">
                           <option value="default">Select state</option>
                        </select>
                     </div>
                     <span class="payments"></span>
                     <span class="delivery"></span>
                     <div class="city">
                        <input type="text" class="form-control" name="city" placeholder="Town / city" required />
                     </div>
                     <input type="text" class="form-control" name="pin" placeholder="zip" required />
                     <!-- <a onclick="getPayment()" class="btn btn-md">Update Shipping Charge</a> -->
                  </div>
                  <label>Street Address *</label>
                  <input type="text" class="form-control" name="address1" required=""
                     placeholder="House number and Street name" />
                  <input type="text" class="form-control" name="address2" required=""
                     placeholder="Appartments, suite, unit etc ..." />
               </div>
               <aside class="col-lg-4 sticky-sidebar-wrapper">
                  <div class="sticky-sidebar" data-sticky-options="{'bottom': 50}">
                     <h3 class="title title-simple text-left">Your Order</h3>
                     <div class="summary mb-4">
                        <table class="shipping">
                           <tr class="summary-subtotal">
                              <td>
                                 <h4 class="summary-subtitle">Subtotal</h4>
                              </td>
                              <td>
                                 <span class="cart-total">
                                    <p class="summary-subtotal-price">£{{ $CartTotal }}</p>
                                 </span>
                              </td>
                           </tr>
                           <tr class="sumnary-shipping shipping-row-last">
                              <td colspan="2">
                           <tr class="summary-subtotal">
                              <td>
                                 <h4 class="summary-subtitle">Shipping</h4>
                              </td>
                              <td>
                                 <span class="cart-total">
                                    <p class="shipping-price">£</p>
                                 </span>
                              </td>
                           </tr>
                           </td>
                           </tr>
                        </table>
                        <table>
                           <tr class="summary-subtotal">
                              <td>
                                 <h4 class="summary-subtitle">Total</h4>
                              </td>
                              <td>
                                 <div class="sub-total">
                                    <p class="summary-total-price total-summary-price">£{{ $CartTotal }}</p>
                                    <input type="hidden" class="total" name="total" value="{{ $CartTotal }}">
                                    <input type="hidden" class="shipping" name="shipping" value="0">
                                 </div>
                              </td>
                           </tr>
                        </table>
                        <div class="payment accordion radio-type">
                           <h4 class="summary-subtitle">Payment Methods</h4>
                           <div class="card" onclick="paymentMethod('cod')">
                              <div class="card-header">
                                 <a href="#collapse1" class="collapse">Cash on Delivery
                                 </a>
                              </div>
                              <div id="collapse1" class="expanded" style="display: block;">
                              </div>
                           </div>
                           <div class="card">
                              <div class="card-header" onclick="paymentMethod('paypal')">
                                 <a href="#collapse2" class="expand">Paypal</a>
                              </div>
                              <div id="collapse2" class="collapsed">
                                <input type="hidden" name="payment_method" value="cod" class="payment_method">
                                 <!-- <div class="card-body">
                                    Ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio.
                                    Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.
                                    </div> -->
                              </div>
                           </div>
                           <div class="card">
                              <div class="card-header" onclick="paymentMethod('square')">
                                 <a href="#collapse2" class="expand">Square/Credit Card</a>
                              </div>
                              <div id="collapse2" class="collapsed">
                                <input type="hidden" name="payment_method" value="cod" class="payment_method">
                                 <!-- <div class="card-body">
                                    Ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio.
                                    Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.
                                    </div> -->
                              </div>
                           </div>
                        </div>
                        <p class="checkout-info">Your personal data will used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.</p>
                        <button type="submit" class="btn btn-dark btn-order">Place Order</button>
                     </div>
                  </div>
               </aside>
            </div>
         </form>
      </div>
   </div>
</main>




@endsection