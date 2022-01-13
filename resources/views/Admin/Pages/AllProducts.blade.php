@extends('Admin/Layout/Layout');
@section('content')
@php
$Products = DB::table('products')->orderBy('id','DESC')->get();
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
               <div class="text-center btn-add">
                  <a href="{{ route('add-product') }}" class="btn btn-info color">Add Product</a>
               </div>
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>Product ID</th>
                      <th>Product Name</th>
                      <th>Category Name</th>
                      <th>Subcategory Name</th>
                      <th>Product Type</th>
                      <th>Image</th>
                      <th>Operations</th>
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach($Products as $Product)
                  	<tr>
                      <td>{{ $Product->id }}</td>
                      <td>{{ $Product->product_name }}</td>
                      @php 
                      $Category = DB::table('categories')->where('id',$Product->category_id)->first();
                      $Subcategory = DB::table('subcategories')->where('id',$Product->subcategory_id)->first();
                      @endphp
                      <td>{{ $Category->category_name }}</td>
                      @if(!empty($Subcategory))
                      <td>{{ $Subcategory->subcategory_name }}</td>
                      @else
                      <td>Null</td>
                      @endif
                      <td>{{ $Product->type }}</td>
                      <td><img src="{{ url('/') }}/Admin/ProductImage/{{$Product->product_image  }}" height="100px" width="100px" /></td>
                      <td>
                        <a href="{{ route('edit-product',$Product->id) }}" class="btn btn-primary mr-1" style="color: #fff">Edit</a>
                        <a onclick="return confirm('Do you want to delete this ?')" href="{{ route('delete-product',$Product->id) }}" class="btn btn-danger" style="color: #fff">Delete</a>
                      </td>
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