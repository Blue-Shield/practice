@extends('User/Component/Layout')
@section('content')
@php
$Cart = Session::get('Cart');
$CartTotal = 0;

$Countries = DB::table('countries')->get();
$UserInfo = DB::table('users')->where('id',Auth::user()->id)->first();

$Shipping= Session::get('Shipping');
$Orders= Session::get('Orders');

$shipping_information = json_decode($Shipping['shipping_info']);
$user_information = json_decode($Shipping['user_info']);
if(!isset($Shipping))
{
   return redirect('/');
}
@endphp

<!-- Page Content Appears -->

   <main class="main order">
         <div class="page-content pb-10">
             <div class="row">
         <ul class="breadcrumb">
            <li><a href="{{ route('/') }}">Home</a></li>
            <li><a href="#">Thank You</a></li>
            <li style="color: #fff">Do not refresh the page, It will automatically redirected to Home after 1 Minute !</li>
         </ul>
      </div>
            
            <div class="container mt-8">
               <div class="order-message">
                  <i class="fas fa-check"></i>Thank you, Your order has been received.
                  <span>Do not refresh the page...</span>
               </div>
               <div class="order-results pt-8 pb-8">
                  <div class="overview-item">
                     <span>Order number</span>
                     <strong>{{ $Shipping->order_id }}</strong>
                  </div>
                  <div class="overview-item">
                     <span>Status</span>
                     <strong>Processing</strong>
                  </div>
                  <div class="overview-item">
                     <span>Date</span>
                     <strong>{{ date('D/M/Y', strtotime($Shipping->created_at)) }}</strong>
                  </div>
                  <div class="overview-item">
                     <span>Total</span>
                     <strong>£{{ $Shipping->total_price }}</strong>
                  </div>
                  <div class="overview-item">
                     <span>Payment method</span>
                     <strong>{{ $shipping_information->payment_method }}</strong>
                  </div>
               </div>

               <h2 class="title title-simple text-left pt-3">Order Details</h2>
               <div class="order-details mb-1">
                  <table class="order-details-table">
                     <thead>
                        <tr class="summary-subtotal">
                           <td>
                              <h3 class="summary-subtitle">Product</h3>
                           </td> 
                           <td></td>      
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($Orders as $Order)
                        <tr>
                           <td class="product-name">{{ $Order->product_name }} <span> <i class="fas fa-times"></i> {{ $Order->product_qty }}</span></td>
                           <td class="product-price">£{{ $Order->product_price }}</td>
                        </tr>
                        @endforeach 
                        <tr class="summary-subtotal">
                           <td>
                              <h4 class="summary-subtitle">Shipping:</h4>
                           </td>
                           <td class="summary-subtotal-price">£{{ $shipping_information->shipping }}</td>                                  
                        </tr>
                        <tr class="summary-subtotal">
                           <td>
                              <h4 class="summary-subtitle">Payment method:</h4>
                           </td>
                           <td class="summary-subtotal-price">{{ $shipping_information->payment_method }}</td>                                  
                        </tr> 
                        <tr class="summary-subtotal">
                           <td>
                              <h4 class="summary-subtitle">Total</h4>
                           </td>
                           <td>
                              <p class="summary-total-price">£{{ $Shipping->total_price }}</p>
                           </td>                                  
                        </tr>
                     </tbody>
                  </table>
               </div>

               <h2 class="title title-simple text-left pt-8 mb-2">Shipping Address</h2>
               <div class="address-info pb-8 mb-6">
                  <p class="address-detail pb-2">
                     {{ $shipping_information->name }}<br>
                     {{ $shipping_information->address1 }}<br>
                     {{ $shipping_information->address2 }}<br>
                     {{ $user_information->mobile }}
                  </p>
                  <p class="email">{{ $user_information->email }}</p>
               </div>

               <a href="{{ route('/') }}" class="btn btn-icon-left btn-back btn-md mb-4"><i class="d-icon-arrow-left"></i> Back to Home</a>
            </div>
         </div>
      </main>

<!-- Page Content Appears -->

@endsection
<script>
setTimeout(function(){ 
   window.location.href = "{{ route('/') }}";
 }, 60000);
</script>
