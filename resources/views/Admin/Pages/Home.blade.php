@extends('Admin/Layout/Layout')
@section('content')
@php
  $Products = DB::table('products')->count();
  $Categories = DB::table('categories')->count();
  $Subcategories = DB::table('subcategories')->count();
  $Orders = DB::table('shippings')->where('payment_status','paid')->count();
@endphp

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>Categories</h4>
              <p><b>{{ $Categories }}</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
            <div class="info">
              <h4>Subcategories</h4>
              <p><b>{{ $Subcategories }}</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
              <h4>Products</h4>
              <p><b>{{ $Products }}</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
            <div class="info">
              <h4>Orders</h4>
              <p><b>{{ $Orders }}</b></p>
            </div>
          </div>
        </div>
      </div>
    </main>

@endsection