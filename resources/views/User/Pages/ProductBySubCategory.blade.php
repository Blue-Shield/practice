@extends('User/Component/Layout')
@section('content')
@php
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
<hr/>

<main class="main">
      <div class=" pt-2 pb-2 pr-4 pl-4">
          <h3 class="title title-simple">{{ $SubCategoryName }}</h3>
          
        </div>
        <div class="row">
          <ul class="breadcrumb">
            <li><a href="{{ route('/') }}">Home</a></li>
            <li><a href="#">SubCategories</a></li>
            <li><a href="#">{{ $SubCategoryName }}</a></li>
          </ul>
        </div>
      <div class="page-content">
        <div class="container">
          <div class="row main-content-wrap gutter-lg">
            <div class="col-lg-12 main-content">
              <nav class="toolbox sticky-toolbox sticky-content fix-top">
                <div class="toolbox-left">
                  <a href="#"
                    class="toolbox-item left-sidebar-toggle btn btn-sm btn-outline btn-primary d-lg-none">Filters
                    <i class="d-icon-arrow-right"></i></a>
                  <div class="toolbox-item toolbox-sort">
                    <label> Showing all {{ count($Products) }} results </label>
                  </div>
                </div>
                <div class="toolbox-right">
                  <!--<div class="toolbox-item toolbox-show select-box">-->
                  <!--   <select name="orderby" class="form-control">-->
                  <!--    <option value="default">Default</option>-->
                  <!--    <option value="popularity" selected="selected">Most Popular</option>-->
                  <!--    <option value="rating">Average rating</option>-->
                  <!--    <option value="date">Latest</option>-->
                  <!--    <option value="price-low">Sort forward price low</option>-->
                  <!--    <option value="price-high">Sort forward price high</option>-->
                  <!--    <option value="">Clear custom sort</option>-->
                  <!--  </select>-->
                  <!--</div>-->
                                  </div>
              </nav>
              <div class="row cols-2 cols-sm-3 cols-md-4 product-wrapper">
                @foreach($Products as $Product)
                <div class="product">
                    <figure class="product-media">
                        <a href="{{ url('product-single-page',['product_name' => str_replace(' ', '-', strtolower($Product->product_name)),'id' => $Product->id]) }}">
                            <img src="{{ url('/') }}/public/Admin/ProductImage/{{ $Product->product_image }}"
                                class="img-product">
                        </a>
                        <div class="product-label-group">
                            <label class="product-label label-new">NEW</label>
                        </div>
                        <div class="product-action">
                            <!--<a href="#" class="btn-product btn-quickview" title="Quick View">Quick View</a>-->
                        </div>
                    </figure>
                    <div class="product-details">
                        
                        <p >
                            <a href="{{ url('product-single-page',['product_name' => str_replace(' ', '-', strtolower($Product->product_name)),'id' => $Product->id]) }}">{{ substr($Product->product_name, 0, 35)}}</a>
                        </p>
                        <div class="product-price">
                            <del class="old-price">£{{ $Product->product_price }}</del>&nbsp; &nbsp; &nbsp;<ins class="new-price">£{{ $Product->product_spl_price }}</ins>
                        </div>
                        <div class="ratings-container">
                          <div class="{{ $Product->id }}">
                            @if(isset($Cart[$Product->id]))
		                     <a class="btn btn-outline btn-md btn-dark btn-icon-right" onclick="addtoCart('{{ $Product->id }}')">
		                        UPDATE CART
		                     </a>
		                     @else
		                     <a class="btn btn-outline btn-md btn-dark btn-icon-right" onclick="addtoCart('{{ $Product->id }}')">
		                        ADD TO CART
		                     </a>
		                     @endif
		                 </div>
                        </div>
                    </div>
                </div>

                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection