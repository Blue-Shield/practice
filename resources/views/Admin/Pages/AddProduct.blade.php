@extends('Admin/Layout/Layout')
@section('content')
@php 
  $Categories= DB::table('categories')->get();
  $Attributes = DB::table('attributes')->get();
@endphp
<style type="text/css">
  .attribute{
    font-size: 16px;
    font-weight: bold;
  }
</style>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Add Products</h1>
          <p>You can Add Products here..</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active"><a href="#">Add Product</a></li>
        </ul>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-9">
          <div class="tile">
            <h3 class="tile-title">Product Form</h3>
            <div class="tile-body">
              <form action="{{ route('product-add') }}" method="post" id="basic-form" enctype="multipart/form-data">
              	@csrf
                <div class="form-group">
                  <label class="control-label">Product Name</label>
                  <input class="form-control" type="text" placeholder="Type Something.." name="product_name" required="">
                  <input  type="hidden" placeholder="Type Something.." name="type" id="type" value="simple">
                </div>
                <div class="form-group">
                  <label class="control-label">Product Price</label>
                  <input class="form-control" type="text" placeholder="Type Something.." name="product_price" required="">
                </div>
                <div class="form-group">
                  <label class="control-label">Product Spl Price</label>
                  <input class="form-control" type="text" placeholder="Type Something.." name="product_spl_price"required="" >
                </div>
                <div class="form-group">
                  <label class="control-label">Product Image</label>
                  <input class="form-control" type="file" name="product_image"required="" >
                </div>
                <div class="form-group">
                  <label class="control-label">Select Cateogry</label>
                  <select class="form-control"  name="category_id" onchange="getCategory(this.value)"required="" >
                    <option value="">Select Category</option>
                    @foreach($Categories as $Category)
                    <option value="{{ $Category->id }}">{{ $Category->category_name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label class="control-label">Select SubCateogry</label>
                  <div class="subcategory">
                    <select class="form-control" name="subcategory_id">
                      <option>Select Subcategory</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label">Product Short Description</label>
                  <div class="">
                    <textarea name="product_short_description" class="form-control"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label">Product Long Description</label>
                  <div class="">
                    <textarea name="product_description" id="editor1"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label">Video Description</label>
                  <div class="">
                    <input type="text" name="product_video_description" class="form-control" placeholder="add a link..">
                  </div>
                </div>
                <div class="row">
                <div class="col-md-12">
                  <div class="animated-checkbox">
                    <label>
                      <input type="checkbox" class="checkbox" id="checkbox"><span class="label-text">Check here for variable products..</span>
                    </label>
                  </div>
                </div>
              </div>
            
            <!-- single product section -->
            <div class="form-group">
              <label class="control-label">Product Gallery..</label>
              <input class="form-control" type="file" placeholder="Type Something.." name="image_gallery[]" multiple="">
            </div>
            <!-- End Product Section  -->
            <!-- Variable product section -->
                <div class="form-group variable">
                  <div>
                    <p class="attribute">Select Attribute</p>
                    <div class="animated-checkbox">
                      <label>
                          @foreach($Attributes as $Attribute)
                          <input type="radio" name="attribute_name" value="{{ $Attribute->attribute_name }}" id=""><span style="margin-left: 7px;" class="label-text">{{ $Attribute->attribute_name }}</span>
                          @endforeach
                          <!--<input type="radio" name="attribute_name" value="size" id=""><span style="margin-left: 7px;" class="label-text">Size</span>-->
                          <!--<input type="radio" style="margin-left: 10px;" name="attribute_name" value="color" id=""><span style="margin-left: 7px;" class="label-text">Color</span>-->
                        </label>
                      </div>
                  </div> 
                   <table class="table table-bordered" id="dynamicTable">  
                    <tr>
                        <th>Attribute Value</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Action</th> 
                    </tr>
                    <tr>  
                        <td><input type="text" name="attribute[0][attr_name]" placeholder="Enter Attribute Name" class="form-control" /></td>  
                        <td><input type="file" name="attribute[0][attr_image]" placeholder="Enter your Qty" class="form-control" /></td>  
                        <td><input type="text" name="attribute[0][attr_price]" placeholder="Enter your Price" class="form-control" /></td>  
                        <td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td>  
                    </tr>  
                </table> 
                </div>
            <!-- End Variable Product Section  -->

              <div class="tile-footer">
                <button class="btn btn-primary submit" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add to Products</button>&nbsp;&nbsp;&nbsp;
              </div>
            </form>
            </div> 
          </div>
        </div>
      </div> 
</main>
@endsection
<script src="{{ url('/') }}/Admin/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
     $('.submit').click(function(){
        // e.preventDefault();
        if($('#checkbox').is(':checked')){

          return true;
        }
        else
        {
          return true;
        }
     });
  });
</script>
