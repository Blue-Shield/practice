@extends('Admin/Layout/Layout')
@section('content')
@php 
  $Categories= DB::table('categories')->get();
@endphp
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Add Subcategory</h1>
          <p>You can Add Subcategory here..</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active"><a href="#">Add Subcategory Table</a></li>
        </ul>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="tile">
            <h3 class="tile-title">Subcategory Form</h3>
            <div class="tile-body">
              <form action="{{ route('subcategory_add') }}" method="post" enctype="multipart/form-data">
              	@csrf
                <div class="form-group">
                  <label class="control-label">Subcategory Name</label>
                  <input class="form-control" type="text" placeholder="Type Something.." name="subcategory_name">
                </div>
                <div class="form-group">
                  <label class="control-label">Subcateogry Image</label>
                  <input class="form-control" type="file" name="subcategory_image">
                </div>
                <div class="form-group">
                  <label class="control-label">Select Cateogry</label>
                  <select class="form-control" name="category_id">
                    <option>Select Category</option>
                    @foreach($Categories as $Category)
                    <option value="{{ $Category->id }}">{{ $Category->category_name }}</option>
                    @endforeach
                  </select>
                </div>
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add Subcategory</button>&nbsp;&nbsp;&nbsp;
            </div>
            </form> 
          </div>
        </div>
      </div> 
</main>
@endsection