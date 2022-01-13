@extends('Admin/Layout/Layout');
@section('content')
@php
$Orders = DB::table('orders')->orderBy('id','DESC')->get();
$Shippings = DB::table('shippings')->orderBy('id','DESC')->where('payment_status','paid')->get();

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
</style>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Products Table</h1>
          <p>You can get Product details here..</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active"><a href="#">Products Table</a></li>
        </ul>
      </div> 
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive" style="margin-top: 30px;">
              <!--  <div class="text-center btn-add">
                  <a href="{{ route('add-product') }}" class="btn btn-info color">Add Product</a>
               </div> -->
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>Order Id</th>
                      <th>Order Date</th>
                      <th>Delivery Type</th>
                      <th>Order Status</th>
                      <th>Total Amount</th>
                      <th>More About</th>
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach($Shippings as $Shipping)
                    @php 
                    $UserInformations = json_decode($Shipping->user_info);
                    $ShippingInfo = json_decode($Shipping->shipping_info);
                    if(!isset($ShippingInfo->delivery_type))
                    {
                      $delivery = 'Postal';
                    }
                    else
                    {
                      $delivery = $ShippingInfo->delivery_type;
                    }
                    @endphp
                  	<tr>
                      <td>{{ $Shipping->order_id }}</td>
                      <td>{{ date('d/M/Y', strtotime($Shipping->created_at)) }}</td>
                      <td>{{ $delivery }}</td>
                      <td>{{ $Shipping->order_status }}</td>
                      <td>{{ $Shipping->total_price }}</td>
                      <td><a href="{{ route('get-all-orderDetails',$Shipping->order_id) }}">view more</a></td>
                    </tr> 
                  	@endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

@endsection