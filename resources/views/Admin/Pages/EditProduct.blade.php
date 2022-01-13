@extends('Admin/Layout/Layout')
@section('content')
@php 
  $Categories= DB::table('categories')->get();
@endphp
<style type="text/css">
  .attribute{
    font-size: 16px;
    font-weight: bold;
  }
  .btn-delete{
        color: #fff;
    background: red;
  }
  .galleryimage{
    border: 2px solid #ddd;
    border-radius: 5%;
}
</style>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Edit Products</h1>
          <p>You can Edit Products here..</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active"><a href="#">Edit Product</a></li>
        </ul>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-9">
          <div class="tile">
            <h3 class="tile-title">Product Form</h3>
            <div class="tile-body">
              <form action="{{ route('update-product',$Product->id) }}" method="post" id="basic-form" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label class="control-label">Product Name</label>
                  <input class="form-control" type="text" placeholder="Type Something.." name="product_name" required="" value="{{ $Product->product_name }}">
                  <input  type="hidden" placeholder="Type Something.." name="type" id="type" value="simple">
                </div>
                <div class="form-group">
                  <label class="control-label">Product Price</label>
                  <input class="form-control" type="text" placeholder="Type Something.." name="product_price" required="" value="{{ $Product->product_price }}">
                </div>
                <div class="form-group">
                  <label class="control-label">Product Spl Price</label>
                  <input class="form-control" type="text" placeholder="Type Something.." name="product_spl_price"required="" value="{{ $Product->product_spl_price}}" >
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Product Image</label>
                      <input class="form-control" type="file" name="product_image" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <img src="{{ url('/') }}/Admin/ProductImage/{{ $Product->product_image }}" height="100px" width="200px" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label">Select Cateogry</label>
                  <select class="form-control"  name="category_id" onchange="getCategory(this.value)"required="" >
                    <option value="">Select Category</option>
                    @foreach($Categories as $Category)
                    @php 
                    if($Category->id == $Product->category_id )
                    {
                      $selected = 'selected';
                    }
                    else
                    {
                      $selected = '';
                    }
                    @endphp
                    <option value="{{ $Category->id }}" {{ $selected }}>{{ $Category->category_name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label class="control-label">Select SubCateogry</label>
                  <div class="subcategory">
                    <select class="form-control" name="subcategory_id">
                      @php
                      $Subcategory = DB::table('subcategories')->where('id',$Product->subcategory_id)->first();
                      @endphp
                      @if(!empty($Subcategory))
                      <option value="{{ $Subcategory->id }}">{{ $Subcategory->subcategory_name }}</option>
                      @else
                      <td>Null</td>
                      @endif
                      
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label">Product Short Description</label>
                  <div class="">
                    <textarea name="product_short_description" class="form-control">{{ $Product->product_short_description }}</textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label">Product Long Description</label>
                  <div class="">
                    <textarea name="product_description" id="editor1">{!! $Product->product_description !!}</textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label">Video Description</label>
                  <div class="">
                    <input type="text" name="product_video_description" class="form-control" value="{{ $Product->product_video_description }}">
                  </div>
                </div>
                <h3>Gallery Images</h3>
                <div class="row justify-content-center mt-3">
                  @foreach($Gallery as $Galleries)
                  <div class="col-md-3">
                    <img src="{{ url('/') }}/public/Admin/GalleryImage/{{ $Galleries->product_image }}" height="100px" width="140px" class="galleryimage">
                    <div class="text-center mt-1">
                      <a href="{{ route('delete-gallery-image',$Galleries->id) }}" style="color:#fff; padding-left: 14px;" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a>
                    </div>
                  </div>
                  @endforeach
                </div>
                 <!-- single product section -->
                <div class="form-group multiple mt-3">
                  <label class="control-label">Add Gallery..</label>
                  <input class="form-control" type="file" placeholder="Type Something.." name="image_gallery[]" multiple="">
                </div>
               
                <div class="mt-3">
                  <h3>Product Attributes</h3>
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Attribute Name</th>
                        <th scope="col">Attribute Value</th>
                        <th scope="col">Image</th>
                        <th scope="col">Price</th>
                        <th scope="col">Operation</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php 
                      $Attribute_name = '';
                      @endphp
                      @foreach($Attributes as $Attribute)
                      <tr>
                        <td>{{ $Attribute->attribute_name }}</td>
                        <td>{{ $Attribute->attribute_value }}</td>
                        <td><img src="{{ url('/') }}/public/Admin/AttributeImage/{{ $Attribute->attribute_image }}" height="100px" width="100px"></td>
                        <td>{{ $Attribute->attribute_price }}</td>
                        <td>
                          <a href="{{ route('edit-product-attribute',$Attribute->id) }}" class="btn btn-info mr-1">
                            Edit
                          </a>
                          <a href="{{ route('delete-product-attribute',$Attribute->id) }}" style="color:#fff" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                            Delete
                          </a>
                        </td>
                      </tr>
                      @php 
                        $Attribute_name = $Attribute->attribute_name;
                      @endphp
                      @endforeach 
                    </tbody>
                  </table>
                  <div class="row">
                  <div class="col-md-12 mt-2">
                    <div class="animated-checkbox">
                      <label>
                        <input type="checkbox" class="checkbox" id="checkbox"><span class="label-text">Check here to add more attributes..</span>
                      </label>
                    </div>
                  </div>
                </div>
                </div>
                <!-- Variable product section -->
                <div class="form-group variable">
                  <div>
                    <p class="attribute">Select Attribute</p>
                    <div class="animated-checkbox">
                        <label>Attribute Name</label>
                          <span style="font-weight: bold;font-size: 18px;">: ({{ $Attribute_name }})</span>
                          <input type="hidden" name="attribute_name" value="{{ $Attribute_name }}">
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
                <button class="btn btn-primary submit" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update to Products</button>&nbsp;&nbsp;&nbsp;
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