@extends('User/Component/Layout')
@section('content')
<style type="text/css">
   .messages{
      text-align: center;
      color: rgb(0,168,207);
      font-size: 16px;
   }
   .btn-submit {
   background-color: rgb(0,168,207) !important;
   color: white !important;
   padding: 12px 16px !important;
   border: none !important;
   cursor: pointer !important;
   width: 30% !important;
   display: block !important;
   font-size: 16px !important;
   }
   .sub-span{
          font-weight: 700;
   }
</style>
<main class="main account">
          <div class="row">
          <ul class="breadcrumb">
         <li><a href="{{ route('/') }}">Home</a></li>
         <li><a href="#">Profile</a></li>
       </ul>
        </div>
         <!-- End PageHeader -->
         <div class="page-content mt-10 mb-10">
            <div class="container pt-1">
               <div class="tab tab-vertical" style="margin-left: 0">
                  <ul class="nav nav-tabs mb-4" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link active" href="#account">Profile</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#orders">Orders</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#downloads">Cart</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#address">Addresses</a>
                     </li>
                     <li class="nav-item">
                        <a href="{{ route('user-logout') }}">Logout</a>
                     </li>
                  </ul>
                  <div class="tab-content">
                     <div class="tab-pane active" id="dashboard">
                        <div>
                           @if ($message = Session::get('success-message'))
                              <div class="messages">  
                                      <strong>{{ $message }}</strong>
                              </div>
                              @endif
                        </div>
                        <form action="{{ route('update-user-profile') }}" class="form" method="post">
                           @csrf
                           <div class="row">
                              <div class="col-sm-12">
                                 <label>Name *</label>
                                 <input type="text" class="form-control" name="name" required="" value="{{ Auth::user()->name }}">
                              </div>
                              <!-- <div class="col-sm-6">
                                 <label>Last Name *</label>
                                 <input type="text" class="form-control" name="last_name" required="">
                              </div> -->
                           </div>
                           <label>Email address *</label>
                           <input type="email" class="form-control" name="email" required="" value="{{ Auth::user()->email }}">
                           <label>Mobile *</label>
                           <input type="text" class="form-control" name="mobile" required="" value="{{ Auth::user()->mobile }}">
                           <label>Address *</label>
                           <input type="text" class="form-control" name="address" required="" value="{{ Auth::user()->address }}">
                           <button type="submit" class="btn-submit">SAVE CHANGES <i
                                 class="d-icon-arrow-right"></i></button>
                        </form>
                     </div>
                     <div class="tab-pane" id="orders">
                        

                         @if($isShipping > 0)
                         <section class="pt-10 pb-8 grey-section">
                             <div class="container mt-3">
                                 <div class="row">
                                     <div class="col-md-12 mb-12">
                                         <h2 class="title mb-6">Your Orders</h2>
                                         <div class="accordion accordion-boxed accordion-plus accordion-gutter-md">
                                             @foreach($Shippings as $Shipping)
                                             <div class="card">
                                                 <div class="card-header">
                                                     <a href="#collapse3-1" class="collapse">Order ID : {{ $Shipping->order_id }}, <span style="margin-left: 400px;">Status : {{ $Shipping->order_status }}</span></a>
                                                 </div>
                                                 <div id="collapse3-1" class="expanded">
                                                     <div class="card-body">
                                                         @php
                                                            $Orders = DB::table('orders')->where('order_id',$Shipping->order_id)->get()
                                                         @endphp
                                                         @foreach($Orders as $Order)
                                                         @php
                                                         $Attribute = json_decode($Order->product_attributes);
                                                         $ProductInfo = DB::table('products')->where('id',$Order->product_id)->select('type','product_image')->first();
                                                         if($ProductInfo->type == "simple")
                                                         {
                                                            $ProductImage = url('/')."/public/Admin/ProductImage/".$ProductInfo->product_image;
                                                         }
                                                         else
                                                         {
                                                            $ProductImage = $Attribute->attribute_image;
                                                         }
                                                         @endphp
                                                         <div class="row orders">
                                                            <div class="col-md-4">
                                                               <img src="{{ $ProductImage }}" height="100px" width="100px">
                                                            </div>
                                                            <div class="col-md-4">
                                                               <span>Price</span><br>
                                                               <span class="sub-span">{{ $Order->product_qty }}*{{ $Order->product_price }}={{ $Order->product_qty*$Order->product_price }} </span>
                                                            </div>
                                                            <div class="col-md-4">
                                                               <span>Delivered On</span><br>
                                                               <span class="sub-span">Will Update.</span>
                                                            </div>
                                                         </div>
                                                         @endforeach
                                                     </div>
                                                 </div>
                                             </div>
                                             @endforeach
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </section>
                         @else
                         <p class=" b-2">No order has been made yet.</p>
                        <a href="#" class="btn btn-primary">Go Shop</a>
                         @endif
                        </div>
                     <div class="tab-pane" id="downloads">
                        <p class="mb-2">Click here.</p>
                        <a href="{{ route('cart') }}" class="btn btn-primary">Go to Cart</a>
                     </div>
                     <div class="tab-pane" id="address">
                        <p class="mb-2">The following addresses will be used on the checkout page by default.
                        </p>
                        <div class="row">
                           <div class="col-lg-10 mb-4">
                              <div class="card card-address">
                                 <div class="card-body">
                                    <h5 class="card-title">Billing Address</h5>
                                    <p>{{ Auth::user()->name }}<br>
                                       {{ Auth::user()->address }}<br>
                                       {{ Auth::user()->mobile }}<br>
                                       {{ Auth::user()->email }}<br>
                                    </p>
                                    <!-- <a href="#" class="btn btn-link btn-secondary btn-underline">Edit <i
                                          class="far fa-edit"></i></a> -->
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane" id="account">
                        <form action="{{ route('update-user-profile') }}" class="form" method="post">
                           @csrf
                           <div class="row">
                              <div class="col-sm-12">
                                 <label>Name *</label>
                                 <input type="text" class="form-control" name="name" required="" value="{{ Auth::user()->name }}">
                              </div>
                              <!-- <div class="col-sm-6">
                                 <label>Last Name *</label>
                                 <input type="text" class="form-control" name="last_name" required="">
                              </div> -->
                           </div>
                           <label>Email address *</label>
                           <input type="email" class="form-control" name="email" required="" value="{{ Auth::user()->email }}">
                           <label>Mobile *</label>
                           <input type="text" class="form-control" name="mobile" required="" value="{{ Auth::user()->mobile }}">
                           <label>Address *</label>
                           <input type="text" class="form-control" name="address" required="" value="{{ Auth::user()->address }}">
                           <button type="submit" class="btn-submit">SAVE CHANGES <i
                                 class="d-icon-arrow-right"></i></button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </main>
@endsection