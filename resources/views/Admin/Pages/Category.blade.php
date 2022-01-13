@extends('Admin/Layout/Layout');
@section('content')
@php
$Categories = DB::table('categories')->get();
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
  }
}
</style>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Categories Table</h1>
          <p>You can get Categories details here..</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active"><a href="#">Categories Table</a></li>
        </ul>
      </div> 
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive" style="margin-top: 30px;">
               <div class="text-center btn-add">
                  <a href="{{ route('add-category') }}" class="btn btn-info color">Add Category</a>
               </div>
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>Category ID</th>
                      <th>Category Name</th>
                      <th>Category Image</th>
                      <th>Added On</th>
                      <th>Operations</th>
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach($Categories as $Category)
                  	<tr>
                      <td>{{ $Category->id }}</td>
                      <td>{{ $Category->category_name }}</td>
                      <td style="text-align: center;"><img src="{{ url('/') }}/Admin/CategoryImage/{{ $Category->category_image }}" height="100px" width="100px"></td>
                      <td>{{ date('d/m/Y',strtotime($Category->created_at)) }}</td>
                      <td>
                        <a href="{{ route('edit-category',$Category->id) }}" class="btn btn-primary mr-1" style="color: #fff">Edit</a>
                        <a onclick="return confirm('Do you want to delete this ?')" href="{{ route('delete-category',$Category->id) }}" class="btn btn-danger" style="color: #fff">Delete</a>
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