@extends('Admin/Layout/Layout');
@section('content')
@php
$Products = DB::table('products')->orderBy('id','DESC')->get();
$UserInformation = json_decode($Shippings->user_info);
$ShippingInfo = json_decode($Shippings->shipping_info);
@endphp
<style type="text/css">
  .btn-add{
    position: absolute;
    right: 38px;
    top: 9px;
}
.color{
  color: #fff;
}
.tile{
  padding: 5px !important;
  background-color: 
}
</style>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-laptop"></i> Cards</h1>
          <p>Material design inspired cards</p>
        </div>
        @if ($message = Session::get('success-message'))
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{{ $message }}</strong>
        </div>
        @endif



        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">UI</li>
          <li class="breadcrumb-item"><a href="#">Cards</a></li>
        </ul>
      </div>
      <div class="row" >
        <div class="clearfix"></div>
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title-w-btn">
             <h3 class="title">Order Informations <span style="font-size: 15px; background-color: yellow">({{ $Shippings->order_id }})-({{ $Shippings->order_status }})</span></h3>
              <p><a class="btn btn-primary icon-btn" href="{{ route('change-order-status',$Shippings->order_id) }}">Update to delivered </a></p>
            </div>
            <div class="tile-body">
             <div class="row"> 
              <div class="col-md-6">
                <b style="margin-left: 200px; font-size: 20px;">Product Infomation</b>
                @foreach($Orders as $Order)
                @php
                $Attributes = json_decode($Order->product_attributes);
                $product_image = DB::table('products')->where('id',$Order->product_id)->select('product_image')->first();
                @endphp
                <div class="tile text-center" style="font-weight: 600;background-color: #009688">{{ $Order->product_name }}</div>
                <div class="container">
                    <div class="row">
                    <div class="col-md-9">
                        <div class="product-info">
                          <div class="row mt-3">
                            <div class="col-md-4 text-right">
                              Product Name : 
                            </div>
                            <div class="col-md-8">
                              {{ $Order->product_name }}
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-4 text-right">
                              Product Price : 
                            </div>
                            <div class="col-md-8">
                              {{ $Order->product_price }}
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-4 text-right">
                              Product Qty : 
                            </div>
                            <div class="col-md-8">
                              {{ $Order->product_qty }}
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-4 text-right">
                              Attribute Name : 
                            </div>
                            <div class="col-md-8">
                              {{ $Attributes->attribute_name }}
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-4 text-right">
                              Attribute Value : 
                            </div>
                            <div class="col-md-8">
                              {{ $Attributes->attribute_value }}
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <img src='{{ url('/') }}/Admin/ProductImage/{{ $product_image->product_image }}' height="100px" width="100px" />
                    </div>
                </div>
                </div>
                @endforeach
               </div>

               <div class="col-md-6 text-center">
                <b style="font-size: 20px;">User Information</b>
                <div class="tile" style="font-weight: 600; background-color: #009688">Billing Address</div>
                <div class="row">
                  <div class="col-md-4 text-left">User Name:</div>
                  <div class="col-md-8 text-left ">{{ $UserInformation->name }}</div>
                </div>
                <div class="row">
                  <div class="col-md-4 text-left">User Mobile:</div>
                  <div class="col-md-8 text-left ">{{ $UserInformation->mobile }}</div>
                </div>
                <div class="row">
                  <div class="col-md-4 text-left">User Email:</div>
                  <div class="col-md-8 text-left ">{{ $UserInformation->email }}</div>
                </div>
                <div class="row">
                  <div class="col-md-4 text-left">User Address:</div>
                  <div class="col-md-8 text-left ">{{ $UserInformation->address }}</div>
                </div>
                <div class="row">
                  <div class="col-md-4 text-left">Pin code:</div>
                  <div class="col-md-8 text-left ">{{ $UserInformation->pin }}</div>
                </div>
                <div class="row">
                  <div class="col-md-4 text-left">State:</div>
                  <div class="col-md-8 text-left ">{{ $UserInformation->state }}</div>
                </div>
                <div class="tile" style="font-weight: 600; background-color: #009688">Shipping Information</div>
                <div class="row">
                  <div class="col-md-4 text-left">User Name:</div>
                  <div class="col-md-8 text-left ">{{ $ShippingInfo->name }}</div>
                </div>
                <div class="row">
                  <div class="col-md-4 text-left">Country:</div>
                  @php
                  $country = DB::table('countries')->where('id',$ShippingInfo->country)->first();
                  @endphp
                  <div class="col-md-8 text-left ">{{ $country->name }}</div>
                </div>
                <div class="row">
                  <div class="col-md-4 text-left">State:</div>
                  @php
                  $state = DB::table('states')->where('id',$ShippingInfo->state)->first();
                  @endphp
                  <div class="col-md-8 text-left ">{{ $state->name }}</div>
                </div>
                <div class="row">
                  <div class="col-md-4 text-left">City:</div>
                  <div class="col-md-8 text-left ">{{ $ShippingInfo->city }}</div>
                </div>
                <div class="row">
                  <div class="col-md-4 text-left">Pin:</div>
                  <div class="col-md-8 text-left ">{{ $ShippingInfo->pin }}</div>
                </div>
                <div class="row">
                  <div class="col-md-4 text-left">Address-1:</div>
                  <div class="col-md-8 text-left ">{{ $ShippingInfo->address1 }}</div>
                </div>
                <div class="row">
                  <div class="col-md-4 text-left">Address-2:</div>
                  <div class="col-md-8 text-left ">{{ $ShippingInfo->address2 }}</div>
                </div>
                <div class="row">
                  <div class="col-md-4 text-left">Payment Method:</div>
                  <div class="col-md-8 text-left ">{{ $ShippingInfo->payment_method }}</div>
                </div>
                <div class="row">
                  <div class="col-md-4 text-left">Payment Method:</div>
                  @php 
                  if(!isset($ShippingInfo->delivery_type))
                  {
                    $delivery = 'Postal';
                  }
                  else
                  {
                    $delivery = $ShippingInfo->delivery_type;
                  }
                  @endphp
                  <div class="col-md-8 text-left ">{{ $delivery }}</div>
                </div>
               </div>
             </div>
              
            </div>
          </div>
        </div>
        
      </div>
    </main>

@endsection